<?php

$id = $_GET['id'];

require_once 'connect.php';

$pdo->query("DELETE FROM `comments` WHERE `id` = '$id'");

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
