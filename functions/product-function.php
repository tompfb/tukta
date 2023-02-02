<?php

include_once("db.php");

class productFunction extends connectDB
{
    public function productCount()
    {
        $sql = "SELECT COUNT(*) FROM tb_product";
        return $this->conn->query(($sql));
    }
    public function productCountCategory()
    {
        $sql = "SELECT COUNT(*) FROM tb_product";
        return $this->conn->query(($sql));
    }

    public function productCreate($name, $desc, $price, $amount, $status, $url, $cate)
    {
        $sql = "INSERT INTO tb_product(Product_name,Product_description,Product_price,Product_amount,Product_status,product_url,Product_category) VALUES ('$name','$desc','$price','$amount','$status','$url','$cate')";
        return $this->conn->query($sql);
    }

    public function productGetAll()
    {
        $sql = "SELECT * FROM tb_product";
        return $this->conn->query($sql);
    }
    public function countProductAll()
    {
        $sqlQueryString = "SELECT COUNT(*) as count FROM tb_product";
        $result_set = mysqli_query($this->conn, $sqlQueryString) or die("Error in query: $sqlQueryString " . mysqli_error($this->conn));
        $count_var = mysqli_fetch_array($result_set);
        $count = $count_var['count'];
        return $count;
    }

    //! ORDER All Product BY
    public function productOrderbyView($page_start, $per_page)
    {
        $sql = "SELECT * FROM tb_product ORDER BY Product_view DESC LIMIT $page_start ,$per_page";
        return $this->conn->query($sql);
    }
    public function productGetAllCurrent($page_start, $per_page)
    {
        $sql = "SELECT * FROM tb_product ORDER BY Product_id DESC LIMIT $page_start ,$per_page";
        return $this->conn->query($sql);
    }

    public function productOrderByASC($page_start, $per_page)
    {
        $sql = "SELECT * FROM tb_product ORDER BY Product_price ASC LIMIT $page_start ,$per_page";
        return $this->conn->query($sql);
    }

    public function productOrderByDESC($page_start, $per_page)
    {
        $sql = "SELECT * FROM tb_product ORDER BY Product_price DESC LIMIT $page_start ,$per_page";
        return $this->conn->query($sql);
    }
    public function productOrderBySequence($page_start, $per_page)
    {
        $sql = "SELECT * FROM tb_category ORDER BY c_sequence LIMIT $page_start ,$per_page";
        return $this->conn->query($sql);
    }

    // public function getProductByCategory($catName)
    // {
    //     $sql = "SELECT * FROM tb_product WHERE Product_category='$catName'";
    //     return $this->conn->query($sql);
    // }

    public function getProductByCategory($catName)
    {
        $sql =
            "SELECT
            tb_product.Product_id,
            tb_product.Product_name,
            tb_product.Product_price,
            tb_product.Product_status,
            tb_product.product_url,
            tb_category.c_name,
            tb_category.category_url
        FROM tb_product,tb_category
        WHERE tb_product.Product_category = tb_category.c_name
        AND tb_category.category_url='$catName'";
        $result_set = $this->conn->query($sql);
        return $result_set;
    }

    // public function getProductByCategoryAndOrder($orderBy, $catName, $page_start, $per_page)
    // {
    //     $sql = "SELECT * FROM tb_product WHERE Product_category='$catName' ORDER BY $orderBy LIMIT $page_start ,$per_page";
    //     return $this->conn->query($sql);
    // }
    public function getProductByCategoryAndOrder($orderBy, $catName, $page_start, $per_page)
    {
        $sql = "SELECT
            tb_product.Product_id,
            tb_product.Product_name,
            tb_product.Product_price,
            tb_product.Product_status,
            tb_product.product_url,
            tb_category.c_name,
            tb_category.category_url
        FROM tb_product,tb_category
        WHERE tb_product.Product_category = tb_category.c_name
        AND tb_category.category_url='$catName'
        ORDER BY $orderBy LIMIT $page_start ,$per_page";
        return $this->conn->query($sql);
    }

    public function productGetById($id)
    {
        $sql = "SELECT * FROM tb_product WHERE Product_id='$id'";
        return $this->conn->query($sql);
    }

    public function getProductByName($name)
    {
        $sql = "SELECT * FROM tb_product WHERE product_url='$name'";
        return $this->conn->query($sql);
    }

    public function productUpdate($id, $name, $desc, $price, $amount, $status, $url, $cate)
    {
        $sql = "UPDATE tb_product SET Product_name='$name',Product_description='$desc',Product_price='$price', Product_amount='$amount' , Product_status='$status',product_url = '$url',Product_category='$cate'  WHERE Product_id='$id'";
        return $this->conn->query($sql);
    }

    public function updateAmount($productId, $amount)
    {
        $product = $this->productGetById($productId)->fetch_assoc();
        $stockAmount = $product['Product_amount'] - $amount;

        $sql = "UPDATE tb_product SET Product_amount='$stockAmount' WHERE Product_id='$productId'";
        return $this->conn->query($sql);
    }

    public function productGetLast()
    {
        $sql = "SELECT * FROM tb_product ORDER BY Product_id DESC";
        return $this->conn->query($sql)->fetch_assoc();
    }

    public function productDelete($id)
    {
        $sql = "DELETE FROM tb_product WHERE Product_id='$id'";
        return $this->conn->query($sql);
    }

    public function checkTagLog($tagName)
    {
        $sql = "SELECT * FROM tag WHERE Tag_name = $tagName";
        return $this->conn->query($sql);
    }

    public function getProductTag()
    {
        $sql = "SELECT DISTINCT tag.Tag_id,tag.Tag_name FROM tag INNER JOIN tag_log ON tag.Tag_id=tag_log.Tag_id WHERE Tag_product_id!='null'";
        return $this->conn->query($sql);
    }

    public function getProductByTag($tagId)
    {
        $sql = "SELECT * FROM tb_product INNER JOIN tag_log ON tb_product.Product_id=tag_log.Tag_product_id WHERE tag_log.Tag_id = $tagId";
        return $this->conn->query($sql);
    }


    public function getProductByTagPage($tagId, $page_start, $per_page)
    {
        $sql = "SELECT * FROM tb_product INNER JOIN tag_log ON tb_product.Product_id=tag_log.Tag_product_id WHERE tag_log.Tag_id = $tagId LIMIT $page_start ,$per_page";
        return $this->conn->query($sql);
    }

    public function productTagDelete($id)
    {
        $sql = "DELETE FROM tag_log WHERE Tag_product_id='$id' ";
        return $this->conn->query($sql);
    }

    public function productUpdateTag($tag_id, $id, $adminId)
    {
        $sql = "INSERT INTO tag_log (Tag_id,Tag_product_id,Admin_id) VALUES ('$tag_id','$id',$adminId)";
        return $this->conn->query($sql);
    }
}
