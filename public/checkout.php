<?php
require_once __DIR__ . '/../src/ecommerce.php';

$items = cartItems($pdo);
if (empty($items)) {
  header('Location: /cart.php'); exit;
}

$total = cartTotal($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // collect form
  $name = sanitize($_POST['name'] ?? '');
  $email = sanitize($_POST['email'] ?? '');
  $address = sanitize($_POST['address'] ?? '');
  $phone = sanitize($_POST['phone'] ?? '');
  $payment = sanitize($_POST['payment'] ?? 'cod');

  // insert order
  $stmt = $pdo->prepare('INSERT INTO orders (user_id, total_amount, payment_method, status, name, email, address, phone) VALUES (?,?,?,?,?,?,?,?)');
  $uid = $_SESSION['user_id'] ?? null;
  $stmt->execute([$uid, $total, $payment, 'pending', $name, $email, $address, $phone]);
  $orderId = $pdo->lastInsertId();

  // insert items
  $stmtItem = $pdo->prepare('INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?,?,?,?)');
  foreach($items as $it) {
    $stmtItem->execute([$orderId, $it['id'], $it['quantity'], $it['price']]);
  }

  // clear cart
  unset($_SESSION['cart']);

  // show confirmation
  header('Location: /checkout.php?success=1&order=' . $orderId);
  exit;
}

$success = !empty($_GET['success']);
$orderId = $_GET['order'] ?? null;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Checkout - Local Business</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header class="">
    <div class="header-inner">
      <div class="brand"><a href="/index.php" style="color:white;text-decoration:none">Local Business</a></div>
      <div class="nav">
        <a href="/shop.php">Shop</a>
        <a href="/cart.php">Cart</a>
        <?php if(isLoggedIn()): ?>
          <a href="/profile.php">Profile</a>
        <?php endif; ?>
        <a href="/contact.php">Contact</a>
      </div>
    </div>
  </header>

  <div class="container">
    <?php if ($success): ?>
      <h2>Thank you! Your order #<?php echo intval($orderId); ?> has been placed.</h2>
      <p>We will contact you with the order details.</p>
      <p><a href="/index.php">Return to shop</a></p>
    <?php else: ?>
      <h2>Checkout</h2>
      <p>Order total: <strong>$<?php echo number_format($total,2); ?></strong></p>
      <form method="post">
        <div class="form-row">
          <label>Name</label>
          <input type="text" name="name" required>
        </div>
        <div class="form-row">
          <label>Email</label>
          <input type="email" name="email" required>
        </div>
        <div class="form-row">
          <label>Address</label>
          <textarea name="address" required></textarea>
        </div>
        <div class="form-row">
          <label>Phone</label>
          <input type="text" name="phone">
        </div>
        <div class="form-row">
          <label>Payment method</label>
          <select name="payment">
            <option value="cod">Cash on Delivery</option>
            <option value="online">Online (simulated)</option>
          </select>
        </div>
        <button class="btn">Place order</button>
      </form>
    <?php endif; ?>
  </div>

  <div class="footer"><div class="container">&copy; <?php echo date('Y'); ?></div></div>
</body>
</html>
