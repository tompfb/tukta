<?php
$servername = "localhost";
$username = "xnzwfbsi_12cai0ebh3gtfbb3dua6s";
$password = "xn--12cai0ebh3gtfbb3dua6s";
$database = "xnzwfbsi_xn--12cai0ebh3gtfbb3dua6s";

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_query($conn, "SET NAMES 'utf8'");
if (!$conn) {
    printf("Errormessage: %s\n", $mysqli->error);
}
