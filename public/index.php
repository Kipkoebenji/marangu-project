<?php
require_once __DIR__ . '/../src/ecommerce.php';
$products = getProducts($pdo, ['q' => '']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Local Business - Home</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header>
    <div class="header-inner">
      <div class="brand"><a href="/index.php" style="color:white;text-decoration:none">Local Business</a></div>
      <div class="nav">
        <a href="/shop.php">Shop</a>
        <a href="/cart.php">Cart <span class="badge"><?php echo array_sum($_SESSION['cart'] ?? []); ?></span></a>
        <?php if(isLoggedIn()): ?>
          <a href="/profile.php">Profile</a>
        <?php endif; ?>
        <a href="/contact.php">Contact</a>
        <form id="searchForm" class="search" action="/shop.php" method="get">
          <input type="text" name="q" placeholder="Search products...">
        </form>
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
    <div class="banner">
      <h2>Welcome to our store</h2>
      <p>Special offers on local products. Free pickup in town.</p>
    </div>

    <h3>Featured products</h3>
    <div class="grid">
      <?php foreach(array_slice($products,0,6) as $p): ?>
        <div class="card">
          <img src="/images/<?php echo sanitize($p['image'] ?? 'placeholder.svg'); ?>" alt="<?php echo sanitize($p['name']); ?>">
          <h3><?php echo sanitize($p['name']); ?></h3>
          <div class="product-meta"><?php echo sanitize($p['category']); ?></div>
          <div class="price">$<?php echo number_format($p['price'],2); ?></div>
          <div style="margin-top:auto"><a class="btn" href="/product.php?id=<?php echo $p['id']; ?>">View</a></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="footer">
    <div class="container">&copy; <?php echo date('Y'); ?> Local Business</div>
  </div>
</body>
</html>
