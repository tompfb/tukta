<?php
include_once("db.php");

class tagFunction extends connectDB
{

    public function tagCount()
    {
        $sql = "SELECT COUNT(*) FROM tag";
        return $this->conn->query(($sql));
    }

    function getAllTag()
    {
        date_default_timezone_set('Asia/Bangkok');
        $sqlQueryString = "SELECT tag.Tag_id,tag.Tag_name,tag.Tag_create_at,tb_admin.username FROM `tag` INNER JOIN tb_admin ON tag.Tag_id = tb_admin.id";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("ERROR IN Query: $sqlQueryString " . mysqli_error($this->conn));
        return $result_set;
    }
    function getFromAllTag()
    {
        $sqlQueryString = "SELECT * FROM `tag` ORDER BY Tag_id ASC";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("ERROR IN Query: $sqlQueryString " . mysqli_error($this->conn));
        return $result_set;
    }
    function getTagById($tagId)
    {
        date_default_timezone_set('Asia/Bangkok');
        $sqlQueryString = "SELECT tag.Tag_id,tag.Tag_name,tag.Tag_create_at,tb_admin.username FROM `tag` INNER JOIN tb_admin ON tag.Tag_id = tb_admin.id WHERE tag.Tag_id = $tagId";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("ERROR in query: $sqlQueryString" . mysqli_error($this->conn));
        return $result_set;
    }
    function getFromTagById($tagId)
    {
        date_default_timezone_set('Asia/Bangkok');
        $sqlQueryString = "SELECT * FROM `tag`  WHERE tag.Tag_id = $tagId";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("ERROR in query: $sqlQueryString" . mysqli_error($this->conn));
        return $result_set;
    }

    function checkDuplicateTagName($tagName)
    {
        date_default_timezone_set('Asia/Bangkok');
        $count = 0;
        $sqlQueryString = "SELECT COUNT(*) as count FROM tag where tag.Tag_name = '$tagName'";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($this->conn));
        $count_var = mysqli_fetch_array($result_set);
        $count = $count_var['count'];
        return $count;
    }

    function getTagByProduct($prodId)
    {
        $sql = "SELECT DISTINCT tag.Tag_id,tag.Tag_name FROM tag INNER JOIN tag_log ON tag.Tag_id=tag_log.Tag_id WHERE Tag_product_id=$prodId";
        return $this->conn->query($sql);
    }
}
