<?php
session_start();

unset($SESSION['user']);
session_destroy();
header("Location: is.php");
?>