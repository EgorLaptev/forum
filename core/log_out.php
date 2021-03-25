<?php

session_start();
unset($_SESSION['login']);
setcookie(session_name(), '', time()-1, '/');

header("Location: " . "http://forum/");

?>
