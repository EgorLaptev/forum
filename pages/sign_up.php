<?php
  if(session_status() != 2) session_start();
  require_once '../core/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../media/css/header.css">
  <link rel="stylesheet" href="../media/css/style.css">
  <link rel="stylesheet" href="../media/css/sign_up.css">
  <title>Sign up</title>
</head>

<body>

  <header class="page-header">
    <span class="header-logo"><a href="http://forum">Forum</a></span>
    <ul class="header-menu">
      <li><a href="http://forum">Home</a></li>
      <?php if(isset($_SESSION['login']) && !empty(trim($_SESSION['login']))) : ?>
        <li>
          <select class="dropdown-menu" id="dropdown-menu">
            <option disabled selected style="display: none;"><?= $_SESSION['login'] ?></option>
            <option value="http://forum/pages/add_topic.php">Add topic</option>
            <option value="http://forum/pages/my_topics.php">My topics</option>
            <option value="http://forum/pages/my_comments.php">My comments</option>
            <option value="http://forum/core/log_out.php">Log out</option>
          </select>
        </li>
      <?php else : ?>
        <li><a href="http://forum/pages/sign_up.php">Sign up</a></li>
        <li><a href="http://forum/pages/sign_in.php">Sign in</a></li>
      <?php endif; ?>
    </ul>
  </header>

  <main class="main-content">
    <h1 class="page-title">Sign up</h1>
    <form action="../core/sign_up.php" method="POST" id="sign_up_form" class="sign_up_form">
      <input type="text" name="login" placeholder="Login" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm password" required>
      <input type="submit" name="sign_up" value="Sign up">
    </form>

    <span class="error">
      <?php if(isset($_SESSION['signup_error'])) echo $_SESSION['signup_error'] ?>
    </span>

  </main>

  <footer class="page-footer">
    <a href="tel:+79217708973" class="phone">+7 (921) 770 89-73</a>
    <ul class="footer-menu">
      <li><a href="http://forum/">Home</a></li>
      <li><a href="http://forum/pages/sign_up.php">Sign up</a></li>
      <li><a href="http://forum/pages/sign_in.php">Sign in</a></li>
      <li><a href="http://forum/pages/add_topic.php">Add topic</a></li>
      <li><a href="http://forum/pages/my_topics.php">My topics</a></li>
      <li><a href="http://forum/pages/my_comments.php">My comments</a></li>
    </ul>
    <span class="copyright">© Forum 2020-2021 г. Все права защищены.</span>
  </footer>


  <script defer src="../media/js/dropdown.js" charset="utf-8"></script>

</body>

</html>
