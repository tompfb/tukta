<?php

include_once('db.php');

class memberFunction extends connectDB
{
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        return $this->conn->query($sql);
    }

    public function memberLogin($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        return $this->conn->query($sql);
    }

    public function memberRegister($username, $password)
    {
        $sql = "INSERT INTO users(username, password) 
            VALUES ('$username', '$password');";
        return $this->conn->query($sql);
    }

    public function memberExists($username)
    {
        $sql = "SELECT * FROM users WHERE username='$username'";
        return $this->conn->query($sql);
    }

    public function memberGetById($userId)
    {
        $sql = "SELECT * FROM users WHERE id='$userId'";
        return $this->conn->query($sql);
    }

    public function memberUpdate($memId, $fullname, $gender, $age, $idcard, $address, $phone, $email)
    {
        $sql = "UPDATE tb_member SET Member_fullname='$fullname',Member_gender='$gender',Member_age='$age',Member_idcard='$idcard',Member_address='$address',
        Member_phone='$phone',Member_email='$email' WHERE Member_id='$memId'";
        return $this->conn->query($sql);
    }
}
