<?php
session_start();
define("ROOT_URL", "http://localhost/mo-blog/"); 

// Clear all sessions variables
unset($_SESSION['userLoggedIn']);

// Go to homepage
header("Location: " . ROOT_URL . "homepage.php");