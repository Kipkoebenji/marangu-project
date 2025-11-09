<?php
require_once __DIR__ . '/../src/ecommerce.php';

// Require user to be logged in
if (!isLoggedIn()) {
  header('Location: /login.php');
  exit;
}

$user = currentUser($pdo);

// Get user's orders with items
$stmt = $pdo->prepare("
  SELECT o.*, 
    (SELECT SUM(quantity * price) FROM order_items WHERE order_id = o.id) as order_total,
    (SELECT COUNT(*) FROM order_items WHERE order_id = o.id) as item_count
  FROM orders o 
  WHERE o.user_id = ? 
  ORDER BY o.created_at DESC
");
$stmt->execute([$user['id']]);
$orders = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>My Profile - Local Business</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header>
    <div class="header-inner">
      <div class="brand"><a href="/index.php" style="color:white;text-decoration:none">Local Business</a></div>
      <div class="nav">
        <a href="/shop.php">Shop</a>
        <a href="/cart.php">Cart <span class="badge"><?php echo array_sum($_SESSION['cart'] ?? []); ?></span></a>
        <a href="/profile.php" class="active">Profile</a>
        <a href="/contact.php">Contact</a>
        <div class="topbar-actions">
          <a href="/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <h1>My Profile</h1>

    <!-- User Details Section -->
    <div class="profile-section">
      <div class="card">
        <h2>Account Details</h2>
        <div class="profile-info">
          <div class="info-row">
            <span class="info-label">Name:</span>
            <span class="info-value"><?php echo htmlspecialchars($user['name']); ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Email:</span>
            <span class="info-value"><?php echo htmlspecialchars($user['email']); ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Member Since:</span>
            <span class="info-value"><?php echo date('F j, Y', strtotime($user['created_at'])); ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Purchase History Section -->
    <div class="profile-section">
      <h2>Purchase History (<?php echo count($orders); ?> orders found)</h2>
      <?php if (empty($orders)): ?>
        <div class="card">
          <p>You haven't made any purchases yet.</p>
          <a href="/shop.php" class="btn">Start Shopping</a>
        </div>
      <?php else: ?>
        <div class="orders-list">
          <?php foreach ($orders as $order): ?>
            <div class="order-card card">
              <div class="order-header">
                <div class="order-info">
                  <h3>Order #<?php echo $order['id']; ?></h3>
                  <p class="order-date"><?php echo date('F j, Y', strtotime($order['created_at'])); ?></p>
                </div>
                <div class="order-status">
                  <span class="status-badge status-<?php echo strtolower($order['status']); ?>">
                    <?php echo ucfirst($order['status']); ?>
                  </span>
                </div>
              </div>
              
              <div class="order-details">
                <div class="detail-row">
                  <span class="detail-label">Customer:</span>
                  <span><?php echo htmlspecialchars($order['name']); ?></span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Email:</span>
                  <span><?php echo htmlspecialchars($order['email']); ?></span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Address:</span>
                  <span><?php echo htmlspecialchars($order['address']); ?></span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Items:</span>
                  <span><?php echo $order['item_count']; ?> item(s)</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Total:</span>
                  <span class="order-total">$<?php echo number_format($order['order_total'], 2); ?></span>
                </div>
              </div>

              <!-- Get order items -->
              <?php
              $stmtItems = $pdo->prepare("
                SELECT oi.*, p.name as product_name, p.image_url 
                FROM order_items oi 
                JOIN products p ON oi.product_id = p.id 
                WHERE oi.order_id = ?
              ");
              $stmtItems->execute([$order['id']]);
              $items = $stmtItems->fetchAll();
              ?>
              
              <div class="order-items">
                <h4>Items Ordered:</h4>
                <?php foreach ($items as $item): ?>
                  <div class="order-item">
                    <img src="<?php echo htmlspecialchars($item['image_url']); ?>" 
                         alt="<?php echo htmlspecialchars($item['product_name']); ?>"
                         class="item-image">
                    <div class="item-details">
                      <span class="item-name"><?php echo htmlspecialchars($item['product_name']); ?></span>
                      <span class="item-quantity">Qty: <?php echo $item['quantity']; ?></span>
                      <span class="item-price">$<?php echo number_format($item['price'], 2); ?> each</span>
                    </div>
                    <div class="item-subtotal">
                      $<?php echo number_format($item['quantity'] * $item['price'], 2); ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <footer>
    <p>&copy; <?php echo date('Y'); ?> Local Business. All rights reserved.</p>
  </footer>
</body>
</html>
