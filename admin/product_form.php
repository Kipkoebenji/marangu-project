<?php
require_once __DIR__ . '/../src/ecommerce.php';
requireAdmin($pdo);

$id = $_GET['id'] ?? null;
if ($id) {
  $product = getProductById($pdo, $id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = sanitize($_POST['name'] ?? '');
  $desc = sanitize($_POST['description'] ?? '');
  $price = (float)($_POST['price'] ?? 0);
  $category = sanitize($_POST['category'] ?? '');
  $image = sanitize($_POST['image'] ?? 'placeholder.svg');

  if ($id) {
    $stmt = $pdo->prepare('UPDATE products SET name=?, description=?, image=?, price=?, category=? WHERE id=?');
    $stmt->execute([$name,$desc,$image,$price,$category,$id]);
  } else {
    $stmt = $pdo->prepare('INSERT INTO products (name,description,image,price,category) VALUES (?,?,?,?,?)');
    $stmt->execute([$name,$desc,$image,$price,$category]);
  }
  header('Location: /admin/products.php'); exit;
}

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $id ? 'Edit' : 'Add'; ?> Product</title>
  <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
  <header class="admin-header"><div class="container"><div style="display:flex;justify-content:space-between;align-items:center"><?php echo $id? 'Edit':'Add'; ?> Product <div class="admin-nav"><a href="/admin/products.php">Back</a></div></div></div></header>
  <div class="container">
    <form method="post">
      <div class="form-row"><label>Name</label><input type="text" name="name" value="<?php echo $product['name'] ?? ''; ?>" required></div>
      <div class="form-row"><label>Description</label><textarea name="description"><?php echo $product['description'] ?? ''; ?></textarea></div>
      <div class="form-row"><label>Image filename (place in public/images/)</label><input type="text" name="image" value="<?php echo $product['image'] ?? 'placeholder.svg'; ?>"></div>
      <div class="form-row"><label>Price</label><input type="number" step="0.01" name="price" value="<?php echo $product['price'] ?? '0.00'; ?>"></div>
      <div class="form-row"><label>Category</label><input type="text" name="category" value="<?php echo $product['category'] ?? ''; ?>"></div>
      <button class="btn"><?php echo $id? 'Update':'Create'; ?></button>
    </form>
  </div>
</body>
</html>
