<?php
require_once __DIR__ . '/../src/ecommerce.php';
requireAdmin($pdo);

// some stats
$totalOrders = $pdo->query('SELECT COUNT(*) FROM orders')->fetchColumn();
$totalProducts = $pdo->query('SELECT COUNT(*) FROM products')->fetchColumn();
$totalCustomers = $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
  <header class="admin-header">
    <div class="container">
      <div style="display:flex;justify-content:space-between;align-items:center">
        <div>Admin Dashboard</div>
        <div class="admin-nav"><a href="/admin/products.php">Products</a> <a href="/admin/orders.php">Orders</a> <a href="/public/logout.php">Logout</a></div>
      </div>
    </div>
  </header>
  <div class="container">
    <h2>Overview</h2>
    <ul>
      <li>Total orders: <?php echo intval($totalOrders); ?></li>
      <li>Total products: <?php echo intval($totalProducts); ?></li>
      <li>Total customers: <?php echo intval($totalCustomers); ?></li>
    </ul>
  </div>
</body>
</html>
