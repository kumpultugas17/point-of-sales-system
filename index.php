<?php
session_start();
if (!isset($_SESSION['login'])) {
   header('location: login.php');
   exit();
}

header('location: main.php?module=dashboard');
