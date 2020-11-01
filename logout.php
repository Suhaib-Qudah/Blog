<?php

session_start();
unset($_SESSION['user_name']);
unset($_SESSION['author'] );
unset($_SESSION['id']);
unset($_SESSION['user_type']);
unset($_SESSION['type']) ;
unset($_SESSION['key']);
session_destroy();

header("Location: http://localhost/blog_task/login.php");
?>