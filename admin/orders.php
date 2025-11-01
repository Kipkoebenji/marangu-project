<?php
require_once __DIR__ . '/../src/ecommerce.php';
requireAdmin($pdo);

if (!empty($_GET['mark']) && !empty($_GET['id'])) {
  $stmt = $pdo->prepare('UPDATE orders SET status = ? WHERE id = ?');
  $stmt->execute([$_GET['mark'], $_GET['id']]);
  header('Location: /admin/orders.php'); exit;
}

$orders = $pdo->query('SELECT * FROM orders ORDER BY created_at DESC')->fetchAll();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Orders</title>
  <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
  <header class="admin-header"><div class="container"><div style="display:flex;justify-content:space-between;align-items:center">Orders <div class="admin-nav"><a href="/admin/dashboard.php">Dashboard</a></div></div></div></header>
  <div class="container">
    <h2>Orders</h2>
    <table class="cart-table">
      <thead><tr><th>ID</th><th>Name</th><th>Total</th><th>Payment</th><th>Status</th><th>Created</th><th></th></tr></thead>
      <tbody>
      <?php foreach($orders as $o): ?>
        <tr>
          <td><?php echo $o['id']; ?></td>
          <td><?php echo sanitize($o['name']); ?></td>
          <td>$<?php echo number_format($o['total_amount'],2); ?></td>
          <td><?php echo sanitize($o['payment_method']); ?></td>
          <td><?php echo sanitize($o['status']); ?></td>
          <td><?php echo $o['created_at']; ?></td>
          <td>
            <a href="/admin/orders.php?id=<?php echo $o['id']; ?>&mark=processing">Mark processing</a> |
            <a href="/admin/orders.php?id=<?php echo $o['id']; ?>&mark=shipped">Mark shipped</a> |
            <a href="/admin/orders.php?id=<?php echo $o['id']; ?>&mark=completed">Complete</a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
