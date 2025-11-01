<?php
// Shared helper functions for the e-commerce app

require_once __DIR__ . '/db_connect.php';

session_start();

function sanitize($v) {
    return htmlspecialchars(trim($v), ENT_QUOTES, 'UTF-8');
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function currentUser(PDO $pdo) {
    if (!isLoggedIn()) return null;
    $stmt = $pdo->prepare('SELECT id, name, email, is_admin FROM users WHERE id = ?');
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch();
}

function requireAdmin(PDO $pdo) {
    if (!isLoggedIn()) {
        header('Location: /admin/login.php'); exit;
    }
    $user = currentUser($pdo);
    if (!$user || !$user['is_admin']) {
        echo "Access denied."; exit;
    }
}

function getProducts(PDO $pdo, $filters = []) {
    $sql = 'SELECT * FROM products WHERE 1=1';
    $params = [];
    if (!empty($filters['category'])) {
        $sql .= ' AND category = ?';
        $params[] = $filters['category'];
    }
    if (!empty($filters['min_price'])) {
        $sql .= ' AND price >= ?';
        $params[] = $filters['min_price'];
    }
    if (!empty($filters['max_price'])) {
        $sql .= ' AND price <= ?';
        $params[] = $filters['max_price'];
    }
    if (!empty($filters['q'])) {
        $sql .= ' AND (name LIKE ? OR description LIKE ?)';
        $q = '%' . $filters['q'] . '%';
        $params[] = $q; $params[] = $q;
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getProductById(PDO $pdo, $id) {
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Cart helpers using PHP session
function cartAdd($productId, $qty = 1) {
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    $productId = (int)$productId;
    $qty = (int)$qty;
    if ($qty < 1) $qty = 1;
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $qty;
    } else {
        $_SESSION['cart'][$productId] = $qty;
    }
}

function cartUpdate($productId, $qty) {
    if (!isset($_SESSION['cart'])) return;
    $productId = (int)$productId;
    $qty = (int)$qty;
    if ($qty < 1) {
        unset($_SESSION['cart'][$productId]);
    } else {
        $_SESSION['cart'][$productId] = $qty;
    }
}

function cartRemove($productId) {
    if (!isset($_SESSION['cart'])) return;
    $productId = (int)$productId;
    unset($_SESSION['cart'][$productId]);
}

function cartItems(PDO $pdo) {
    $items = [];
    if (empty($_SESSION['cart'])) return $items;
    $ids = array_keys($_SESSION['cart']);
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute($ids);
    $rows = $stmt->fetchAll();
    foreach ($rows as $r) {
        $pid = $r['id'];
        $r['quantity'] = $_SESSION['cart'][$pid] ?? 0;
        $r['subtotal'] = $r['quantity'] * $r['price'];
        $items[] = $r;
    }
    return $items;
}

function cartTotal(PDO $pdo) {
    $items = cartItems($pdo);
    $total = 0;
    foreach ($items as $it) $total += $it['subtotal'];
    return $total;
}

?>
