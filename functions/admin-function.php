<?php

include_once('db.php');

class adminFunction extends connectDB
{
    public function adminCOUNT()
    {
        $sql = "SELECT COUNT(*) FROM tb_admin";
        return $this->conn->query(($sql));
    }

    public function adminLogin($username, $password)
    {
        $sql = "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'";
        return $this->conn->query($sql);
    }

    public function adminGetAll()
    {
        $sql = "SELECT * FROM tb_admin ";
        return $this->conn->query($sql);
    }

    public function adminRegister($username, $fname, $lname, $password)
    {
        $sql = "INSERT INTO tb_admin (username,$fname,$lname, password) 
            VALUES ('$username','$fname' ,'$lname','$password');";
        return $this->conn->query($sql);
    }

    public function adminExists($username)
    {
        $sql = "SELECT * FROM users WHERE username='$username'";
        return $this->conn->query($sql);
    }

    public function adminGetById($userId)
    {
        $sql = "SELECT * FROM users WHERE id='$userId'";
        return $this->conn->query($sql);
    }

    public function adminUpdate($memId, $fullname, $gender, $age, $idcard, $address, $phone, $email)
    {
        $sql = "UPDATE tb_member SET Member_fullname='$fullname',Member_gender='$gender',Member_age='$age',Member_idcard='$idcard',Member_address='$address',
        Member_phone='$phone',Member_email='$email' WHERE Member_id='$memId'";
        return $this->conn->query($sql);
    }
}
