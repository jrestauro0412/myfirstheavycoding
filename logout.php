<?php
session_start();
if(isset($_POST['logtrigger']) == true){
    $_SESSION = array();
    session_destroy();
    echo json_encode(array("statusCode" => "logout"));
}