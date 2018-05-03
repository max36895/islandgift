<?php
header('Content-Type: text/xml; charset=UTF-8');
require 'kernel/AdminSite.php';
$map = new Admin();
$sitemap = $map->showSitemap();
echo $sitemap;
