<?php
  if(session_status() != 2) session_start();
  require_once 'core/connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="media/css/style.css">
  <link rel="stylesheet" href="media/css/header.css">
  <link rel="stylesheet" href="media/css/index.css">
  <title>Forum</title>
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
    <ul class="topics">
      <?php
          $topics = $pdo->query("SELECT * FROM `topics`")
                        ->fetchAll(PDO::FETCH_ASSOC);

          foreach($topics as $topic) :
      ?>
        <li class="topic">
          <a href="/pages/topic.php?id=<?=$topic['id']?>"></a>
          <h3 class="topic-title"><?=$topic['title']?></h3>
          <p class="topic-description"><?=$topic['description']?></p>
          <span class="topic-author"><?=$topic['author']?></span>
          <time class="topic-date" datetime="2021-03-24"><?=$topic['date']?></time>
        </li>
      <?php endforeach; ?>
    </ul>
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

  <script defer src="media/js/dropdown.js" charset="utf-8"></script>


</body>

</html>
