<?php
$connect = mysqli_connect("localhost", "root", "", "doll") or die("Error server");

class connectDB

{
    public $conn;
    private $hostName = "localhost";
    private $userName = "root";
    private $password = "";
    private $dbName = "doll";

    function __construct()

    {
        $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
        if (!$this->conn) {
            die("Connection failed" . mysqli_connect_error());
        }
    }
}
