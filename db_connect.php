<?php

$servername = "localhost";
$username ="root";  //default xammpp username
$password = "";
$database = "chatroom";

//creating datbase connection

$conn = mysqli_connect($servername,$username,$password,$database);

// check connection

if (!$conn) {
    die("Failed to connect".mysqli_connect_error());
}

?>