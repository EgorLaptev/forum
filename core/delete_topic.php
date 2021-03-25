<?php

$id = $_POST['id'];

require_once 'connect.php';

$pdo->query("DELETE FROM `topics` WHERE `id` = '$id'");

?>
