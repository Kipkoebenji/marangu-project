<?php
require_once __DIR__ . '/../src/ecommerce.php';

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
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login</title>
  <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
  <div class="container">
    <h2>Admin Login</h2>
    <?php if (!empty($error)) echo '<p style="color:red">'.sanitize($error).'</p>'; ?>
    <form method="post">
      <div class="form-row"><label>Email</label><input type="email" name="email" required></div>
      <div class="form-row"><label>Password</label><input type="password" name="password" required></div>
      <button class="btn">Login</button>
    </form>
  </div>
</body>
</html>
