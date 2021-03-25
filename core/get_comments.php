<?php

$id = $_POST['id'];

require_once 'connect.php';

$comments = $pdo->query("SELECT * FROM `comments` WHERE `topic_id` = '$id'")
                ->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($comments, JSON_UNESCAPED_UNICODE);

?>
