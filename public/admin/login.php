<?php
require_once __DIR__ . '/../../src/ecommerce.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = sanitize($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  $stmt = $pdo->prepare('SELECT id, password, is_admin FROM users WHERE email = ? LIMIT 1');
  $stmt->execute([$email]);
  $u = $stmt->fetch();
  if ($u && $u['password'] && password_verify($password, $u['password']) && $u['is_admin']) {
    $_SESSION['user_id'] = $u['id'];
    header('Location: /admin/dashboard.php'); exit;
  } else {
    $error = 'Invalid admin credentials';
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header>
    <div class="header-inner">
      <div class="brand"><a href="/index.php" style="color:white;text-decoration:none">Local Business - Admin</a></div>
    </div>
  </header>
  <div class="container">
    <div class="auth-form">
      <h2>Admin Login</h2>
      <?php if (!empty($error)) echo '<p class="error-msg">'.sanitize($error).'</p>'; ?>
      <form method="post">
        <div class="form-row"><label>Email</label><input type="email" name="email" required autofocus></div>
        <div class="form-row"><label>Password</label><input type="password" name="password" required></div>
        <button class="btn">Login</button>
      </form>
      <p style="margin-top:16px; text-align:center;"><small>Admin credentials: admin@example.com / admin123</small></p>
    </div>
  </div>
  <div class="footer"><div class="container">&copy; <?php echo date('Y'); ?> Local Business</div></div>
</body>
</html>
