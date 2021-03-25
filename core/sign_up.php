<?php

if(isset($_POST['sign_up'])) {

  session_start();

  $error = '';

  if(isset($_POST['login']) && !empty(trim($_POST['login']))) $login = trim($_POST['login']);
  else $error = 'Enter your login';

  if(isset($_POST['email']) && !empty(trim($_POST['email']))) $email = trim($_POST['email']);
  else $error = 'Enter your email';

  if(isset($_POST['password']) && !empty(trim($_POST['password']))) $password = trim($_POST['password']);
  else $error = 'Enter your password';

  if(isset($_POST['confirm_password']) && !empty(trim($_POST['confirm_password']))) $confirm_password = trim($_POST['confirm_password']);
  else $error = 'Confirm your password';

  if(empty($error))
    if($password !== $confirm_password) $error = 'Passwords don\'t match';

  if(empty($error)) {

    require_once 'connect.php';

    $exist = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1")->rowCount();

    if(!$exist) {

      $resp = $pdo->prepare("INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES (NULL, :login, :email, :password)")
                  ->execute([
                      'login' => $login,
                      'email' => $email,
                      'password' => $password
                    ]);

      if($resp) $_SESSION['login'] = $login;
      else $error = 'Something went wrong!';

    } else $error = 'User with such login is already exists!';

  }

  if(!empty($error)) {

    $_SESSION['signup_error'] = $error;
    header("Location: " . $_SERVER['HTTP_REFERER']);

  } else header("Location: " . "http://forum/");


} else header("Location: " . $_SERVER['HTTP_REFERER']);

?>
