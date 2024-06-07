<?php
require '../php/conect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $error = false;

  $emailEr = $passwordEr = '';

  if (empty($email)) {
    $error = true;
    $emailEr = "Email kiriting!";
  }
  if (empty($password)) {
    $error = true;
    $passwordEr = "Parol kiriting!";
  }

  if (!$error) {
    $sql = "SELECT email,password FROM user_list WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    $info = mysqli_fetch_assoc($result);
    var_dump($info);
    if ($info['num_rows'] == 0) {
      if ($info['password'] == $password) {
        session_start();
        $_SESSION['user'] = $email;
        header('Location: ../index.html');
      }else{
        $emailValue = $email;
        $passwordEr = "Parol xato kiritildi";
      }
    } else {
      $emailEr = "Bunday foydalanuvchi mavjudemas.";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="shortcut icon" href="/home-page/img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../fontawesome-free-6.5.2-web/css/all.min.css">
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="./login.css">
</head>

<body>
  <section class="auth-section">
    <div class="container">
      <form action="<?= htmlspecialchars("index.php") ?>" method="post" class="auth-form">
        <h2>Sign in</h2>
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" value="<?=$emailValue?>">
        </div>
        <p class="form-err"><?= $emailEr ?></p>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password">
          <i class="fa-regular fa-eye-slash eye-btn"></i>
        </div>
        <p class="form-err"><?= $passwordEr ?></p>
        <div class="form-text">
          <label for="remember">
            <input type="checkbox" name="remember" id="remember">
            <span>Remember me</span>
          </label>
          <a href="#">Forget Password</a>
        </div>
        <button type="submit">Login</button>
        <div class="form-text">
          <p>
            Don’t have account?
            <a href="../register-page/index.php">Register</a>
          </p>
        </div>
      </form>
    </div>
  </section>

  <script src="./login.js"></script>
</body>

</html>