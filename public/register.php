<?php
require_once __DIR__ . '/../src/ecommerce.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = sanitize($_POST['name'] ?? '');
  $email = sanitize($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  if ($name && $email && $password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (name,email,password) VALUES (?,?,?)');
    try {
      $stmt->execute([$name,$email,$hash]);
      $_SESSION['user_id'] = $pdo->lastInsertId();
      header('Location: /index.php'); exit;
    } catch (PDOException $e) {
      $error = 'Unable to register (email may be in use).';
    }
  } else {
    $error = 'Please fill all fields.';
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header>
    <div class="header-inner">
      <div class="brand"><a href="/index.php" style="color:white;text-decoration:none">Local Business</a></div>
      <div class="nav">
        <a href="/shop.php">Shop</a>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="auth-form">
      <h2>Register</h2>
      <?php if (!empty($error)) echo '<p class="error-msg">'.sanitize($error).'</p>'; ?>
      <form method="post">
        <div class="form-row"><label>Name</label><input type="text" name="name" required></div>
        <div class="form-row"><label>Email</label><input type="email" name="email" required></div>
        <div class="form-row"><label>Password</label><input type="password" name="password" required></div>
        <button class="btn">Create account</button>
      </form>
      <p>Already have an account? <a href="/login.php">Login</a></p>
    </div>
  </div>
  <div class="footer"><div class="container">&copy; <?php echo date('Y'); ?> Local Business</div></div>
</body>
</html>
