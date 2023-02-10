<?php
include './conn/connect.php';
?>
<?php header('Content-type: application/xml; charset=utf-8') ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->
    <sitemap>
        <loc>https://xn--12cai0ebh3gtfbb3dua6s.com/sitemap-page.xml</loc>
        <lastmod>2022-05-26T02:46:27+00:00</lastmod>
    </sitemap>

    <?php
    $sqlArticle = "SELECT Article_id FROM tb_article";
    $resArticle = mysqli_query($conn, $sqlArticle);
    $countArticle = mysqli_num_rows($resArticle);
    if ($countArticle !== 0) {
        echo "
            <sitemap>
                <loc>http://xn--123-mml3a0e9aw.com/sitemap-post.xml</loc>
                <lastmod>2022-05-26T02:46:27+00:00</lastmod>
            </sitemap>
      ";
    }
    ?>

</sitemapindex>