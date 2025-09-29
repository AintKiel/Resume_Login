<?php
session_start();
require 'db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT id, firstname, email, password FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['firstname']; 
        header("Location: welcome.php");
        exit();
    } else {
        $error = "❌ Invalid email or password! Try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .container {
      flex-direction: row-reverse;
    }
  </style>
</head>
<body>
  <div class="container">

    <!-- Left Panel -->
    <div class="left-panel">
      <h2>Welcome Back!</h2>
      <p>Sign in to continue your journey<br>and manage your projects.</p>
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
      <h2>Sign In</h2>

      <form action="" method="POST">
        <input type="email" name="email" placeholder="Email address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn-primary">Login →</button>
      </form>

      <!-- Error Message -->
      <?php if (!empty($error)): ?>
        <div class="error-msg"><?php echo $error; ?></div>
      <?php endif; ?>

      <p class="form-toggle">
        Don’t have an account? <a href="index.html">Sign Up</a>
      </p>
    </div>
  </div>
</body>
</html>
