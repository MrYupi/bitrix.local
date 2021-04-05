<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
/** @var CMain $APPLICATION */

//Инициализация глобальных данных проекта
use Bitrix\Main\Page\Asset,
    \Bitrix\Main\Localization\Loc,
    \Bitrix\Main\Service\GeoIp\Manager;

Loc::loadMessages(__FILE__);
global $arStatic, $USER;
//Собираем статичный контент
$arStatic = collectStatic([
]);
$arStatic['CUR_PAGE'] = $APPLICATION->GetCurPage();
$arStatic['CUR_DIR'] = dirname(\Bitrix\Main\Context::getCurrent()->getServer()->get('REAL_FILE_PATH')) . '/';
if ($arStatic['CUR_DIR'] == SITE_DIR || !$arStatic['CUR_DIR'])
{
    $arStatic['CUR_DIR'] = $arStatic['CUR_PAGE'];
}
$arString = [
    ''
];
$arCss = [
    ''
];
$arJs = [
    ''
]
?>
<!doctype html>
<html lang="<?= LANGUAGE_ID;?>">
<head>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle();?></title>
    <?
    foreach ($arString as $string)
    {
        Asset::getInstance()->addString($string);
    }
    foreach ($arCss as $css)
    {
        Asset::getInstance()->addCss($css);
    }
    foreach ($arJs as $js)
    {
        Asset::getInstance()->addJs($js);
    }

    ?>
</head>
<body>
<div id="panel">
    <?$APPLICATION->ShowPanel();?>
</div>
<?
if(!STATIC_IBLOCK_TYPE)
{
    debug('Задайте тип ИБ для статичного контента');
}
if(!STATIC_IBLOCK_ID)
{
    debug('Задайте ИД ИБ статичного контента');
}
if(!STATIC_ELEMENT_ID)
{
    debug('Задайте ИД элемента ИБ со статичным контентом');
}
?>
