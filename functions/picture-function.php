<?php

include_once("db.php");

class pictureFunction extends connectDB
{
    public function pictureProductCreate($name, $product_id)
    {
        $sql = "INSERT INTO tb_picture(Picture_name,Product_id) VALUES ('$name', '$product_id')";
        return $this->conn->query($sql);
    }
    public function pictureArticleCreate($name, $article_id)
    {
        $sql = "INSERT INTO tb_picture(Picture_name,Article_id) VALUES ('$name', '$article_id')";
        return $this->conn->query($sql);
    }

    public function pictureGetAll()
    {
        $sql = "SELECT * FROM tb_picture ORDER BY Picture_id ASC";
        return $this->conn->query($sql);
    }

    public function pictureGetByProductId($product_id)
    {
        $sql = "SELECT * FROM tb_picture WHERE Product_id='$product_id' ORDER BY Picture_id ASC";
        return $this->conn->query($sql);
    }
    public function pictureGetByArticleId($article_id)
    {
        $sql = "SELECT * FROM tb_picture WHERE Article_id='$article_id' ORDER BY article_id ASC";
        return $this->conn->query($sql);
    }

    public function pictureDelete($id)
    {
        $sql = "DELETE FROM tb_picture WHERE Picture_id='$id'";
        return $this->conn->query($sql);
    }

    public function pictureGetById($id)
    {
        $sql = "SELECT * FROM tb_picture WHERE Picture_id='$id'";
        return $this->conn->query($sql);
    }
}
