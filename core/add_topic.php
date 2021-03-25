<?php

if(isset($_POST['add_topic'])) {

  session_start();

  $error = '';

  if(isset($_POST['title']) && !empty(trim($_POST['title']))) $title = trim($_POST['title']);
  else $error = 'Enter title';

  if(isset($_POST['description']) && !empty(trim($_POST['description']))) $description = trim($_POST['description']);
  else $error = 'Enter description';

  if(isset($_POST['content']) && !empty(trim($_POST['content']))) $content = trim($_POST['content']);
  else $error = 'Enter content';

  if(empty($error)) {

    require_once 'connect.php';

    $author = $_SESSION['login'];

    $resp = $pdo->prepare("INSERT INTO `topics` (`id`, `title`, `description`, `content`, `date`, `author`) VALUES (NULL, :title, :description, :content, current_timestamp(), :author)")
        ->execute([
          'title' => $title,
          'description' => $description,
          'content' => $content,
          'author' => $author
        ]);

    if(!$resp) $error = 'Something went wrong';

  }

  if(!empty($error)) {

    $_SESSION['addtopic_error'] = $error;
    header("Location: " . $_SERVER['HTTP_REFERER']);

  } else header("Location: " . "http://forum/");


} else header("Location: " . $_SERVER['HTTP_REFERER']);

?>
