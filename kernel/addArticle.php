<?php
require_once 'AdminSite.php';
$site = new Admin();

if ($site->avt->userDb->admin != 1 || !$site->avt->avtTriger) {
    echo '<script>document.location.href = "/"</script>';
}

$info = '';

if ($_POST) {
    $info = '<span style="color: black;font-weight: bold;">' . $site->addArticle() . '</span>';
}

echo '<script>alert("' . $info . '")</script>';
echo '<script>document.location.href = "/kernel/siteadminka/article"</script>';