<?php

session_start();

$error = '';

if(isset($_POST['content']) && !empty(trim($_POST['content']))) $content = trim($_POST['content']);
else $error = 'Enter content please!';


if(empty($error)) {

  require_once 'connect.php';

  $resp = $pdo->prepare("INSERT INTO `comments` (`id`, `topic_id`, `content`, `date`, `author`) VALUES (NULL, :topic_id, :content, current_timestamp(), :author)")
      ->execute([
        'topic_id' => $_POST['id'],
        'content' => $content,
        'author' => $_SESSION['login']
      ]);

  if(!$resp) $error = 'Something went wrong';

}

if(!empty($error)) echo $error;


?>
