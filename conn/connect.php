<?php
$servername = "localhost";
$username = "u6b9bxecj1irs";
$password = "xn--12cai0ebh3gtfbb3dua6s.com";
$database = "dbuoakuygcawek";

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_query($conn, "SET NAMES 'utf8'");
if (!$conn) {
    printf("Errormessage: %s\n", $mysqli->error);
}
