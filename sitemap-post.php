<?php
include './conn/connect.php';
?>
<?php header('Content-type: application/xml; charset=utf-8') ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->

  <?php
  $entries = "SELECT * FROM tb_article";
  $r = mysqli_query($conn, $entries);
  while ($row = mysqli_fetch_assoc($r)) {
    $url_articles_seo = stripslashes($row['Seo_url']);
    $date = date('Y-m-d\TH:i:sP', strtotime($row['Article_date']));
    $encode = urlencode($url_articles_seo);
    echo "
      <url>
      <loc>https://www.xn--12cai0ebh3gtfbb3dua6s.com/read-article/$encode</loc>
      <lastmod>" . $date . "</lastmod>
      <priority>0.75</priority>
      </url>";
  }
  ?>
</urlset>