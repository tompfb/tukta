<?php

include_once("db.php");

class articleFunction extends connectDB
{

    public function articleCOUNT()
    {
        $sql = "SELECT COUNT(*) FROM tb_article";
        return $this->conn->query(($sql));
    }

    public function articleCreate(
        $artitle,
        $desc,
        $seotitle,
        $seodesc,
        $seourl,
        $seokey
    ) {
        $sql = "INSERT INTO tb_article(
            Article_title,
            Article_description,
            Seo_title,
            Seo_description,
            Seo_url,
            Seo_keyword
            )
        VALUES ('$artitle', '$desc','$seotitle','$seodesc','$seourl','$seokey')";
        return $this->conn->query($sql);
    }

    public function articleGetAll()
    {
        $sql = "SELECT * FROM tb_article ORDER BY Article_id ASC";
        return $this->conn->query($sql);
    }

    public function articleGetById($id)
    {
        $sql = "SELECT * FROM tb_article WHERE Article_id='$id'";
        return $this->conn->query($sql);
    }
    public function getArticleByUrlSeo($seo)
    {
        $sql = "SELECT * FROM tb_article WHERE Seo_url='$seo'";
        return $this->conn->query($sql);
    }

    public function articleUpdate($id, $artitle, $desc, $seotitle, $seodesc, $seourl, $seokey)
    {
        $sql = "UPDATE tb_article SET
            Article_title='$artitle',
            Article_description='$desc' ,
            Seo_title='$seotitle' ,
            Seo_description='$seodesc',
            Seo_url='$seourl',
            Seo_keyword=' $seokey'
        WHERE Article_id='$id'";
        return $this->conn->query($sql);
    }

    public function articleTagDelete($id)
    {
        $sql = "DELETE FROM tag_log WHERE Tag_article_id='$id' ";
        return $this->conn->query($sql);
    }

    public function articleUpdateTag($tag_id, $id, $adminId)
    {
        $sql = "INSERT INTO tag_log (Tag_id,Tag_article_id,Admin_id) VALUES ('$tag_id','$id',$adminId)";
        return $this->conn->query($sql);
    }

    public function articleGetLast()
    {
        $sql = "SELECT * FROM tb_article ORDER BY Article_id DESC";
        return $this->conn->query($sql)->fetch_assoc();
    }

    public function articleDelete($id)
    {
        $sql = "DELETE FROM tb_article WHERE Article_id='$id'";
        return $this->conn->query($sql);
    }

    public function getArticleLastForIndex()
    {
        $sql = "SELECT * FROM tb_article ORDER BY Article_date DESC Limit 5";
        return $this->conn->query($sql);
    }
}
