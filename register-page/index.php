<?php

require './sendMail.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];
  $passwordValue = "";
  $error = false;

  $emailEr = $passwordEr = $confirmEr = '';

  if (empty($email)) {
    $error = true;
    $emailEr = "Email kiriting!";
  }
  if (empty($password)) {
    $error = true;
    $passwordEr = "Parol kiriting!";
  }
  if (empty($confirm)) {
    $error = true;
    $confirmEr = "Parolni tastiqlang!";
  }
  if ($confirm != $password) {
    $error = true;
    $passwordValue = $password;
    $confirmEr = "Parolni to'g'ri tastiqlang!";
  }

  if (!$error) {
    session_start();
    $_SESSION['user_data'] = $_POST;
    sendMail($email);
    header('Location: ./confirm.php');
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="shortcut icon" href="/home-page/img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../fontawesome-free-6.5.2-web/css/all.min.css">
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="../login-page/login.css">
</head>

<body>
  <section class="auth-section">
    <div class="container">
      <form class="auth-form" action="<?= htmlspecialchars("index.php") ?>" method="post">
        <h2>Sign up</h2>
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" value="<?= $email ?>">
        </div>
        <p class="form-err"><?= $emailEr ?></p>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" value="<?=$passwordValue?>">
          <i class="fa-regular fa-eye-slash eye-btn"></i>
        </div>
        <p class="form-err"><?= $passwordEr ?></p>
        <div class="input-box">
          <input type="password" name="confirm" placeholder="Confirm Password">
          <i class="fa-regular fa-eye-slash eye-btn"></i>
        </div>
        <p class="form-err"><?= $confirmEr ?></p>
        <div class="form-text">
          <label for="accept">
            <input type="checkbox" name="accept" id="accept">
            <span>Accept all terms & Conditions</span>
          </label>
        </div>
        <button type="submit">Create Account</button>
        <div class="form-text">
          <p>
            Already have account
            <a href="../login-page/index.php">Login</a>
          </p>
        </div>
      </form>
    </div>
  </section>

  <script src="../login-page/login.js"></script>
</body>

</html>