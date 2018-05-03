<?php
include 'SITE.php';
require_once 'AdminSite.php';
$site = new Admin();

if ($site->avt->userDb->admin != 1 || !$site->avt->avtTriger) {
    header('HTTP/1.0 404 Not Found');
    header('Status: 404 Not Found');
    echo '<script>document.location.href = "/"</script>';
}

$productDb = new Product();

$products = $productDb->allGift();

if($products){
    while($product = mysqli_fetch_array($products,MYSQLI_NUM)){
        if(strpos(mb_strtolower($product[5]),'.jpg') !== false) {
            system("convert " . $product[5] . " -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB " . $product[5] . "");
        echo "convert " . $product[5] . " -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB " . $product[5] . "<br>";
        }else {
            system("convert " . $product[5] . " -strip [-resize WxH] [-alpha Remove] " . $product[5] . "");
            echo "convert " . $product[5] . " -strip [-resize WxH] [-alpha Remove] " . $product[5] . "<br>";
        }
    }
    mysqli_free_result($products);
}