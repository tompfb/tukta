<?php
$connect = mysqli_connect("localhost", "xnzwfbsi_12cai0ebh3gtfbb3dua6s", "xn--12cai0ebh3gtfbb3dua6s", "xnzwfbsi_xn--12cai0ebh3gtfbb3dua6s") or die("Error server");

class connectDB

{
    public $conn;
    private $hostName = "localhost";
    private $userName = "xnzwfbsi_12cai0ebh3gtfbb3dua6s";
    private $password = "xn--12cai0ebh3gtfbb3dua6s";
    private $dbName = "xnzwfbsi_xn--12cai0ebh3gtfbb3dua6s";

    function __construct()

    {
        $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
        if (!$this->conn) {
            die("Connection failed" . mysqli_connect_error());
        }
    }
}
