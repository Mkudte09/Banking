<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tsf_bank";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn)
{
    echo "Sorry for trouble we will get back to you soon";
}

?>