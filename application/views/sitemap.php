<?php 

$base_url = "https://nexthealth.pk/product/";
$base_url_static = "https://nexthealth.pk/cms/";
header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;



foreach ($pages as $key1 => $value1) {
    echo '<url>' . PHP_EOL;
 echo '<loc>'.$base_url_static. $value1["url_key"] .'/</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
}


foreach ($products as $key => $value) {
 echo '<url>' . PHP_EOL;
 echo '<loc>'.$base_url. $value["product_url"] .'/</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
}


echo '</urlset>' . PHP_EOL;



?>