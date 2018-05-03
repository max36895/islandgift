<?php $param = include'kernel/param/PageParam.php';?><!DOCTYPE html><html lang="ru"><head>
<meta name="yandex-verification" content="6206f1cfc106076b"><meta name="google-site-verification" content="BpQLTn-L_2RzFfBvKFa2uPyKNTzIGLowK0Eqm-Ovq0o"/><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title><?= $title ?></title><meta name="description" content="<?= $meta_d ?>"><link rel="amphtml" href="https://www.islandgift.ru/amp<?= $_SERVER['REQUEST_URI'] ?>">
<meta name="keywords" content="<?=$param['global_keywords']?> <?= $meta_k ?>">
<meta name="DC.Title" content="<?=$title?>"><meta name="DC.Creator" content="MaxImko"><meta name="DC.Subject" content="<?=str_replace(' ',', ',$param['global_keywords'])?> <?= str_replace(' ',', ', $meta_k) ?>"><meta name="DC.Description" content="<?=$meta_d?>"><meta name="DC.Publisher" content="Maximko"><meta name="DC.Contributor" content="Inna"><meta name="DC.Date" content="<?=date('Y-m-d')?>"><meta name="DC.Type" content="Обслуживание"><meta name="DC.Format" content="text/html"><meta name="DC.Identifier" content="https://www.islandgift.ru<?= $_SERVER['REQUEST_URI'] ?>"><meta name="DC.Source" content="https://www.islandgift.ru<?= $_SERVER['REQUEST_URI'] ?>"><meta name="DC.Language" content="ru:RU"><meta name="DC.Coverage" content="World"><meta name="DC.Rights" content="Maximko">
<meta property="og:type" content="website"><meta property="og:site_name" content="MaxImko"><meta property="og:title" content="<?= $title ?>"><meta property="og:description" content="<?= $meta_d ?>"><meta name="robots" content="all">
<link rel="image_src" href="https://www.islandgift.ru/ms-icon-310x310.png"><meta property="og:image" content="https://www.islandgift.ru/ms-icon-310x310.png"><meta property="og:image:width" content="310"><meta property="og:image:height" content="310">
<meta property="og:url" content="https://www.islandgift.ru<?= $_SERVER['REQUEST_URI'] ?>"><link rel="canonical" href="https://www.islandgift.ru<?= $_SERVER['REQUEST_URI'] ?>"/><link rel="alternate" hreflang="ru" href="https://www.islandgift.ru<?= $_SERVER['REQUEST_URI'] ?>" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"><link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png"><link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png"><link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png"><link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png"><link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png"><link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png"><link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png"><link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png"><link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png"><link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png"><link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png"><link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png"><link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png"><link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ff8502"><meta name="msapplication-TileImage" content="/ms-icon-144x144.png"><meta name="theme-color" content="#ff8502"><meta name="msapplication-navbutton-color" content="#ff8502"><meta name="apple-mobile-web-app-status-bar-style" content="#ff8502">
<link href="/css/lib/bootstrap.css" rel="stylesheet"><link class="js-style-main" rel="stylesheet" href="/templates/c_bestday/css/main.min.css">
<!--<link class="js-main-cecutient" href="/css/ulib/cecutient.css" rel="stylesheet" disabled="disabled">--><script src="/js/lib/jquery-3.3.1.min.js"></script></head><body>
<div id="cecutient-container" class="UL ul-cecutient g-theme-site-3" data-enabled="false" data-showpanel="false" data-postionhandler="center" data-themeclass="g-theme-block-2" data-grayscale="false" data-font-size="small" data-background-color="g-theme-site-1" data-cecutientimage-hide="true"><div class="ul-cecutient-disabled js-cecutient-disabled g-theme-block-2"><span class="ul-cecutient-disabled-eye g-theme-block-2 g-color-text-1"> <span class="fa fa-eye"></span> <!--<span class="ul-cecutient-disabled-text g-color-text-1"> Перейти на версию для слабовидящих </span>--> </span></div><?php $t = '<!--<div class="ul-cecutient-inner"><div class="container ul-options-wrap"><div class="ul-cecutient-font ul-cecutient-col col-xs-12 col-sm-6 col-md-3 col-lg-3"><div class="ul-cecutient-options-title"> Размер шрифта</div><span class="ul-cecutient-size-text js-size-text" title="Маленький" data-size="small">A</span> <spanclass="ul-cecutient-size-text js-size-text" title="Средний" data-size="medium">A</span> <spanclass="ul-cecutient-size-text js-size-text active" title="Большой" data-size="max">A</span></div><div class="ul-cecutient-background ul-cecutient-col col-xs-12 col-sm-6 col-md-3 col-lg-3"><div class="ul-cecutient-options-title"> Цветовая схема</div><div class="js-color-background ul-color-background-wrap" title="Черный на белом"data-color="g-theme-site-1"><span class="ul-color-background">a</span></div><div class="js-color-background ul-color-background-wrap" title="Белый на черном"data-color="g-theme-site-2"><span class="ul-color-background">a</span></div></div><div class="ul-cecutient-image ul-cecutient-col col-xs-12 col-sm-6 col-md-3 col-lg-3"><div class="ul-cecutient-options-title"> Изображения</div><label class="ul-checkbox-switch ul-image-show js-cecutient-image-show" title="Показаны"> <inputtype="checkbox" name="imgShow" checked="checked"> <span class="ul-fake-input"></span> <spanclass="ul-fake-input-text ul-fake-input-text-show">Показаны</span> </label><div class="clearfix"></div><label class="ul-checkbox-switch ul-image-grayscale js-cecutient-image-grayscale" title="Цветные"style="display: none"><input type="checkbox" name="grayscale" checked="checked"> <spanclass="ul-fake-input"></span><span class="ul-fake-input-text ul-fake-input-text-show">Цветные</span></label></div><div class="ul-cecutient-switch ul-cecutient-col col-xs-12 col-sm-6 col-md-3 col-lg-3"><aclass="ul-cecutient-off ul-cecutient-switcher js-cecutient-button-disabled"title="Обычная версия"><span class="fa fa-eye"></span> Обычная версия </a><div class="clearfix"></div><a class="ul-cecutient-switcher js-cecutient-toggle" title="Свернуть панель"> <spanclass="fa fa-arrow-up"></span> Свернуть панель </a></div></div><span class="ul-cecutient-open js-cecutient-toggle" data-show="true"> <span class="fa fa-arrow-down"></span> Развернуть панель </span></div>-->'; ?></div>
<div id="main" class="page_loading"><div id="body" class="g-theme-site-3" data-mode="published" data-site-theme="g-theme-site-3"><div id="body-fict" class="g-theme-block-2 ul-page-common-index" data-block_theme="g-theme-block-2" style="" data-parallax="none">