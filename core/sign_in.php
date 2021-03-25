<?php

if(isset($_POST['sign_in'])) {

  session_start();

  $error = '';

  if(isset($_POST['login']) && !empty(trim($_POST['login']))) $login = trim($_POST['login']);
  else $error = 'Enter your login';

  if(isset($_POST['password']) && !empty(trim($_POST['password']))) $password = trim($_POST['password']);
  else $error = 'Enter your password';

  if(empty($error)) {

    require_once 'connect.php';

    $user = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1")
                ->fetch(PDO::FETCH_ASSOC);

    if($user) {

      if($user['password'] == $password) {
        $_SESSION['login'] = $login;
      } else $error = 'Wrong password';

    } else $error = 'We cannot found user with such login';

  }

  if(!empty($error)) {

    $_SESSION['signin_error'] = $error;
    header("Location: " . $_SERVER['HTTP_REFERER']);

  } else header("Location: " . "http://forum/");


} else header("Location: " . $_SERVER['HTTP_REFERER']);

?>
