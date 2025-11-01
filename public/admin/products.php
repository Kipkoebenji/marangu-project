<?php
require_once __DIR__ . '/../../src/ecommerce.php';
requireAdmin($pdo);

if (!empty($_GET['delete'])){
  $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
  $stmt->execute([$_GET['delete']]);
  header('Location: /admin/products.php'); exit;
}

$products = $pdo->query('SELECT * FROM products ORDER BY created_at DESC')->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Manage Products - Admin</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header class="admin-header"><div class="container"><div style="display:flex;justify-content:space-between;align-items:center">Products <div class="admin-nav"><a href="/admin/dashboard.php">Dashboard</a> <a href="/admin/product_form.php">Add product</a> <a href="/logout.php">Logout</a></div></div></div></header>
  <div class="container">
    <h2>Products</h2>
    <table class="cart-table">
      <thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Category</th><th></th></tr></thead>
      <tbody>
      <?php foreach($products as $p): ?>
        <tr>
          <td><?php echo $p['id']; ?></td>
          <td><?php echo sanitize($p['name']); ?></td>
          <td>$<?php echo number_format($p['price'],2); ?></td>
          <td><?php echo sanitize($p['category']); ?></td>
          <td><a href="/admin/product_form.php?id=<?php echo $p['id']; ?>">Edit</a> | <a href="/admin/products.php?delete=<?php echo $p['id']; ?>" onclick="return confirm('Delete?')">Delete</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
