<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');

require_once '../kernel/AdminSite.php';
$admin = new Admin();
echo $admin->rssProduct(true);
