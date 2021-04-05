<?php

define("myserver", "localhost");
define("myusername", "root");
define("mypass", "");
define("mydbname", "dbheavy");


try {
    $pdo = new PDO("mysql:host=" . myserver . ";dbname=" . mydbname, myusername, mypass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $th){
    die("Could not connect to the database". $th->getMessage());
}