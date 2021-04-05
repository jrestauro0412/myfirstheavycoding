<?php

session_start();

if(!isset($_SESSION['access']) && $_SESSION['access'] !== true) {
    header("location: signin.php");
    exit();
}