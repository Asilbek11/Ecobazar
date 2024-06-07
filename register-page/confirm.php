<?php

require '../php/conect.php';
require './sendMail.php';

$error = false;
$passkeyErr = "";
$timeleft = 50;
session_start();

if (empty($_SESSION['randomNum'])) {
  header('Location: ./index.php');
}
if($_SERVER['REQUEST_METHOD'] == "GET" && empty($_GET)){
  $_SESSION['time'] = date('Y-m-d H:i:s',time()+50);
}
if($_SERVER['REQUEST_METHOD'] == "GET"){
  if(!empty($_GET["undo"]) && $_GET["undo"]){
    sendMail($_SESSION['user_data']['email']);
    $_SESSION['time'] = date('Y-m-d H:i:s',time()+50);
    $timeleft = (strtotime($_SESSION['time']) - time());
    $_SESSION["lefttime"] = $timeleft;
  }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $passkey = $_POST['passkey'];
  echo $_SESSION['randomNum']." | ".$passkey;
  var_dump(strtotime($_SESSION['time'])>time());
  if (empty($passkey)) {
    $error = true;
    $passkeyErr = 'Kodni kiriting!';
  }

  if (!$error && $_SESSION['randomNum'] == $passkey && time() < strtotime($_SESSION['time'])) {
    $email = $_SESSION['user_data']['email'];
    $password = $_SESSION['user_data']['password'];
    $sql = "INSERT INTO user_list (email,password,firstName,lastName,phone,avatar)
      VALUES ('$email','$password','NULL','NULL','NULL','NULL')";
    if (mysqli_query($con, $sql)) {
      session_unset();
      session_destroy();
      header('Location: ../login-page/index.php');
    }
  }else{
    $passkeyErr = 'Kod kiritishda xatolik yuz berdi!';
  }

  $timeleft = (strtotime($_SESSION['time']) - time());
  $_SESSION["lefttime"] = $timeleft;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tasdiqlash</title>
  <link rel="shortcut icon" href="/home-page/img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../fontawesome-free-6.5.2-web/css/all.min.css">
  <link rel="stylesheet" href="../main.css">
  <link rel="stylesheet" href="../login-page/login.css">
</head>

<body>
  <section class="auth-section">
    <div class="container">
      <form class="auth-form" action="<?= htmlspecialchars("confirm.php") ?>" method="post">
        <h2>Kodni kiriting</h2>
        <div class="input-box">
          <input type="text" name="passkey" placeholder="XXXXX">
        </div>
        <p class="form-err"><?= $passkeyErr ?></p>
        <div class="form-text">
          <div class="resend"></div>
          <div data-time="<?= $timeleft ?>"></div>
        </div>
        <button type="submit">Tasdiqlash</button>
      </form>
    </div>
  </section>
  <script>
    const resend = document.querySelector(".resend");
    const formText = document.querySelector("[data-time]");
    let time = parseInt(formText.getAttribute("data-time"));

    function countTime() {
      let zero = "00 : ";
      if (time < 10) zero = "00 : 0";
      if (time <= 0) {
        formText.innerHTML = zero + "0";
        resend.innerHTML = "<a href='confirm.php?undo=1'>Kodni qayta jo'natish</a>";
        return;
      }
      formText.innerHTML = zero + time;
      time--;
      setTimeout(countTime, 1000);
    }
    countTime();
  </script>
</body>

</html>