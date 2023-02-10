<?php
$connect = mysqli_connect("localhost", "u6b9bxecj1irs", "xn--12cai0ebh3gtfbb3dua6s.com", "dbuoakuygcawek") or die("Error server");

class connectDB

{
    public $conn;
    private $hostName = "localhost";
    private $userName = "u6b9bxecj1irs";
    private $password = "xn--12cai0ebh3gtfbb3dua6s.com";
    private $dbName = "dbuoakuygcawek";


    function __construct()

    {
        $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
        if (!$this->conn) {
            die("Connection failed" . mysqli_connect_error());
        }
    }
}
