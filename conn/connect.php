<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "master_articles";

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_query($conn, "SET NAMES 'utf8'");
if (!$conn) {
    printf("Errormessage: %s\n", $mysqli->error);
}
