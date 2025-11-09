<?php
require_once __DIR__ . '/../src/ecommerce.php';

$filters = [];
if (!empty($_GET['category'])) $filters['category'] = sanitize($_GET['category']);
if (!empty($_GET['min_price'])) $filters['min_price'] = (float)$_GET['min_price'];
if (!empty($_GET['max_price'])) $filters['max_price'] = (float)$_GET['max_price'];
if (!empty($_GET['q'])) $filters['q'] = sanitize($_GET['q']);

$products = getProducts($pdo, $filters);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Shop - Local Business</title>
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
          <input type="text" name="q" placeholder="Search products..." value="<?php echo $filters['q'] ?? ''; ?>">
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
    <h3>Shop</h3>
    <div style="margin-bottom:12px">
      <form method="get">
        <input type="text" name="q" placeholder="Search" value="<?php echo $filters['q'] ?? ''; ?>">
        <select name="category">
          <option value="">All categories</option>
          <?php
          // load distinct categories
          $cats = $pdo->query("SELECT DISTINCT category FROM products WHERE category IS NOT NULL AND category!='' ORDER BY category")->fetchAll();
          foreach($cats as $c) {
            $val = $c['category'];
            $sel = (isset($filters['category']) && $filters['category']==$val)?'selected':'';
            echo "<option value=\"".htmlspecialchars($val)."\" $sel>".htmlspecialchars($val)."</option>";
          }
          ?>
        </select>
        <button class="btn">Filter</button>
      </form>
    </div>

    <div class="grid">
      <?php foreach($products as $p): ?>
        <div class="card">
          <img src="/images/<?php echo sanitize($p['image'] ?? 'placeholder.svg'); ?>" alt="<?php echo sanitize($p['name']); ?>">
          <h3><?php echo sanitize($p['name']); ?></h3>
          <div class="product-meta"><?php echo sanitize($p['category']); ?></div>
          <div class="price">$<?php echo number_format($p['price'],2); ?></div>
          <div style="margin-top:auto; display:flex; gap:8px; flex-wrap:wrap;">
            <form method="post" action="/cart.php">
              <input type="hidden" name="action" value="add">
              <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
              <input type="hidden" name="qty" value="1">
              <button class="btn">Add to cart</button>
            </form>
            <a class="btn" href="/product.php?id=<?php echo $p['id']; ?>">Details</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="footer">
    <div class="container">&copy; <?php echo date('Y'); ?> Local Business</div>
  </div>
</body>
</html>
