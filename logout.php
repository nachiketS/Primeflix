<?php
session_start();
session_destroy();
// Unset all of the session variables.
$_SESSION = array();
header("Location: login.php");
?>