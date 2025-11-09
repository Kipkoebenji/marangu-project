<?php
require_once __DIR__ . '/../src/ecommerce.php';

$id = $_GET['id'] ?? null;
if (!$id) { header('Location: /shop.php'); exit; }
$product = getProductById($pdo, $id);
if (!$product) { echo 'Product not found'; exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['add_to_cart'])) {
  $qty = max(1, (int)($_POST['qty'] ?? 1));
  cartAdd($product['id'], $qty);
  header('Location: /cart.php'); exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo sanitize($product['name']); ?> - Local Business</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header class="">
    <div class="header-inner">
      <div class="brand"><a href="/index.php" style="color:white;text-decoration:none">Local Business</a></div>
      <div class="nav">
        <a href="/shop.php">Shop</a>
        <a href="/cart.php">Cart (<?php echo array_sum($_SESSION['cart'] ?? []); ?>)</a>
        <?php if(isLoggedIn()): ?>
          <a href="/profile.php">Profile</a>
        <?php endif; ?>
        <a href="/contact.php">Contact</a>
        <div class="topbar-actions">
          <?php if(isLoggedIn()): ?>
            <a href="/logout.php">Logout</a>
          <?php else: ?>
            <a href="/login.php" class="btn-link">Login</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="product-detail">
      <div>
        <img src="/images/<?php echo sanitize($product['image'] ?? 'placeholder.svg'); ?>" alt="<?php echo sanitize($product['name']); ?>">
      </div>
      <div>
        <h2><?php echo sanitize($product['name']); ?></h2>
        <div class="price">$<?php echo number_format($product['price'],2); ?></div>
        <p><?php echo nl2br(sanitize($product['description'])); ?></p>
        <form method="post">
          <div class="form-row">
            <label>Quantity</label>
            <input type="number" name="qty" value="1" min="1">
          </div>
          <button class="btn" name="add_to_cart">Add to Cart</button>
        </form>
      </div>
    </div>
  </div>

  <div class="footer"><div class="container">&copy; <?php echo date('Y'); ?></div></div>
</body>
</html>
