<?php
require_once __DIR__ . '/../src/ecommerce.php';

  // Handle actions: add/update/remove
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';
  if ($action === 'add' && !empty($_POST['id'])) {
    cartAdd($_POST['id'], $_POST['qty'] ?? 1);
  }
  if ($action === 'update' && !empty($_POST['id'])) {
    cartUpdate($_POST['id'], $_POST['qty'] ?? 1);
  }
  if ($action === 'remove' && !empty($_POST['id'])) {
    cartRemove($_POST['id']);
  }
  header('Location: /cart.php'); exit;
}

$items = cartItems($pdo);
$total = cartTotal($pdo);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Your Cart - Local Business</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header>
    <div class="header-inner">
      <div class="brand"><a href="/index.php" style="color:white;text-decoration:none">Local Business</a></div>
      <div class="nav">
        <a href="/shop.php">Shop</a>
        <a href="/cart.php">Cart</a>
        <div class="topbar-actions">
          <?php if(isLoggedIn()): ?>
            <a href="/logout.php">Logout</a>
          <?php else: ?>
            <a href="/login.php" class="btn-link">Login</a>
            <a href="/register.php" class="btn-link">Register</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <h2>Your Cart</h2>
    <?php if (empty($items)): ?>
      <p>Your cart is empty. <a href="/shop.php">Shop now</a></p>
    <?php else: ?>
      <table class="cart-table">
        <thead><tr><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr></thead>
        <tbody>
        <?php foreach($items as $it): ?>
          <tr>
            <td><?php echo sanitize($it['name']); ?></td>
            <td>$<?php echo number_format($it['price'],2); ?></td>
            <td>
              <form method="post" style="display:flex;gap:6px;align-items:center">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php echo $it['id']; ?>">
                <input type="number" name="qty" value="<?php echo $it['quantity']; ?>" min="1" style="width:64px">
                <button class="btn">Update</button>
              </form>
            </td>
            <td>$<?php echo number_format($it['subtotal'],2); ?></td>
            <td>
              <form method="post">
                <input type="hidden" name="action" value="remove">
                <input type="hidden" name="id" value="<?php echo $it['id']; ?>">
                <button class="btn">Remove</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <div style="margin-top:12px">
        <strong>Total: $<?php echo number_format($total,2); ?></strong>
      </div>
      <div style="margin-top:12px">
        <a class="btn" href="/checkout.php">Proceed to Checkout</a>
      </div>
    <?php endif; ?>
  </div>

  <div class="footer"><div class="container">&copy; <?php echo date('Y'); ?></div></div>
</body>
</html>
