<?php
include_once("db.php");

class cateFunction extends connectDB
{

    public function cateCount()
    {
        $sql = "SELECT COUNT(*) FROM tb_category";
        return $this->conn->query(($sql));
    }

    function getAllcate()
    {
        date_default_timezone_set('Asia/Bangkok');
        $sqlQueryString = "SELECT tb_category.c_id,tb_category.c_name,tb_category.c_create_at,tb_admin.c_username FROM `tb_category` INNER JOIN tb_admin ON tb_category.c_id = tb_admin.id";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("ERROR IN Query: $sqlQueryString " . mysqli_error($this->conn));
        return $result_set;
    }
    function getFromAllcate()
    {
        $sqlQueryString = "SELECT * FROM `tb_category` ORDER BY c_id ASC";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("ERROR IN Query: $sqlQueryString " . mysqli_error($this->conn));
        return $result_set;
    }
    function getCateById($cateId)
    {
        date_default_timezone_set('Asia/Bangkok');
        $sqlQueryString = "SELECT tb_category.c_id,tb_category.c_name,tb_category.c_create_at,tb_admin.c_username FROM `tb_category` INNER JOIN tb_admin ON tb_category.c_id = tb_admin.id WHERE tb_category.c_id = $cateId";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("ERROR in query: $sqlQueryString" . mysqli_error($this->conn));
        return $result_set;
    }
    function getFromCateById($cateId)
    {
        date_default_timezone_set('Asia/Bangkok');
        $sqlQueryString = "SELECT * FROM `tb_category`  WHERE tb_category.c_id = $cateId";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("ERROR in query: $sqlQueryString" . mysqli_error($this->conn));
        return $result_set;
    }

    function checkDuplicateCateName($cateName)
    {
        date_default_timezone_set('Asia/Bangkok');
        $count = 0;
        $sqlQueryString = "SELECT COUNT(*) as count FROM tb_category where tb_category.c_name = '$cateName'";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($this->conn));
        $count_var = mysqli_fetch_array($result_set);
        $count = $count_var['count'];
        return $count;
    }
    // CHECK Duplicate sequence
    function checkDupSqu($newValue, $oldValue, $id)
    {
        date_default_timezone_set('Asia/Bangkok');
        $valueCheckDup = "SELECT * FROM tb_category where tb_category.c_sequence = '$newValue'";
        $result_fetch = mysqli_query($this->conn, $valueCheckDup) or die("Error in query: $valueCheckDup " . mysqli_error($this->conn));
        $result_dup = mysqli_fetch_array($result_fetch);
        if (@$result_dup) {
            $idDup = $result_dup["c_id"];
            $sqlQueryString1 = "UPDATE tb_category SET c_sequence='$newValue' WHERE tb_category.c_id='$id'";
            mysqli_query($this->conn, $sqlQueryString1) or die("Error in query: $sqlQueryString1 " . mysqli_error($this->conn));
            $sqlQueryString2 = "UPDATE tb_category SET c_sequence='$oldValue' WHERE tb_category.c_id='$idDup'";
            mysqli_query($this->conn, $sqlQueryString2) or die("Error in query: $sqlQueryString2 " . mysqli_error($this->conn));
            // echo "<script type='text/javascript'>";
            // echo "alert('เเก้ไขข้อมูลสำเร็จ');";
            // echo "window.location='../category.php';";
            // echo "</script>";
        } else {
            $sqlQueryString = "UPDATE tb_category SET c_sequence='$newValue' WHERE tb_category.c_id='$id'";
            mysqli_query($this->conn, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($this->conn));
            // echo "<script type='text/javascript'>";
            // echo "alert('เเก้ไขข้อมูลสำเร็จ');";
            // echo "window.location='../category.php';";
            // echo "</script>";
        }
    }
}
