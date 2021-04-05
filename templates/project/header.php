<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
/** @var CMain $APPLICATION  */
//Инициализация глобальных данных проекта
use Bitrix\Main\Page\Asset,
    \Bitrix\Main\Localization\Loc,
    \Bitrix\Main\Service\GeoIp\Manager;
Loc::loadMessages(__FILE__);
global $arStatic, $USER;
$arStatic = collectStatic([
    1,
    2,
    3,
    4,
    5,
    6,
    7,
    53,
    54,
    55
]);
$arStatic['CUR_PAGE'] = $APPLICATION->GetCurPage();
$arStatic['CUR_DIR'] = dirname(\Bitrix\Main\Context::getCurrent()->getServer()->get('REAL_FILE_PATH')) . '/';
if($arStatic['CUR_DIR'] == SITE_DIR || !$arStatic['CUR_DIR'])
{
    $arStatic['CUR_DIR'] = $arStatic['CUR_PAGE'];
}
$arStatic['COUNTRY_CODE'] = Manager::getCountryCode();
$logo = CFile::GetPath($arStatic['LOGO']);
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html>
	<head>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>
        <?
        Asset::getInstance()->addString('<meta charset="utf-8">');
        Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">');
        Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1">');
        Asset::getInstance()->addString('<link rel="apple-touch-icon" href="apple-touch-icon.png">');
        Asset::getInstance()->addString('<link rel="preconnect" href="https://fonts.gstatic.com">');
        Asset::getInstance()->addString('<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" /> 	');

        Asset::getInstance()->addCss('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/slick.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/slick-theme.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/main.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/media.css');

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/vendor/jquery-1.11.2.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/slick.min.js');
        Asset::getInstance()->addJs('https://unpkg.com/simplebar@latest/dist/simplebar.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/main.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/script.js');
        ?>

	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>

        <div class="header_mobile">
            <div class="row">
                <div class="header_mobile_logo">
                    <a href="<?= SITE_DIR; ?>">
                        <img src="<?= $logo; ?>" alt="">
                    </a>
                </div>
                <div class="header_mobile_btn">
                    <button class="btn_menu"></button>
                </div>
            </div>
        </div>
        <div class="popup_menu">
            <div class="popup_menu_wrap">
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "header_mobile",
                    Array(
                        "ROOT_MENU_TYPE" => "main",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "sub",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "Y",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "36000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => ""
                    )
                );
                ?>
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "header_county_mobile",
                    Array(
                        "ACTIVE_DATE_FORMAT" => "",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array("", ""),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => 2,
                        "IBLOCK_TYPE" => "TECH_DATA",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MEDIA_PROPERTY" => "",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Страны",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            "FLAG",
                            "LINK",
                            'LANGUAGE'
                        ),
                        "SEARCH_PAGE" => "",
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SLIDER_PROPERTY" => "",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "NAME",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N",
                        "TEMPLATE_THEME" => "",
                        "USE_RATING" => "N",
                        "USE_SHARE" => "N",
                        'COUNTRY' => $arStatic['COUNTRY_CODE'],
                        'LANGUAGE' => LANGUAGE_ID,
                        'SHOW_QUESTION' => $_SESSION['country'] ? false : true
                    )
                );
                ?>



                <? if($USER->IsAuthorized()): ?>
                    <div class="popup_menu_lk_wrap">
                        <div class="popup_menu_lk_wrap_headered">
                            <?= Loc::getMessage('TEMPLATE_BAUSH_PERSONAL_CABINET'); ?>
                        </div>
                        <div class="popup_menu_lk_list">
                            <?
                            $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "header_personal",
                                Array(
                                    "ROOT_MENU_TYPE" => "personal",
                                    "MAX_LEVEL" => "1",
                                    "CHILD_MENU_TYPE" => "sub",
                                    "USE_EXT" => "Y",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "Y",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_TIME" => "36000",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "MENU_CACHE_GET_VARS" => "",
                                    'DOP_CLASS' => ''
                                )
                            );
                            ?>
                        </div>
                    </div>
                <? else: ?>
                    <div class="popup_menu_btn_spec">
                        <button class="btn_blue_lock">
                            <img src="<?= SITE_TEMPLATE_PATH?>/assets/img/icon_lock.svg" alt="">
                            <?= Loc::getMessage('TEMPLATE_BAUSH_PERSONAL_SPECIALISTS'); ?>
                        </button>
                    </div>
                <? endif; ?>
            </div>
        </div>
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="left_header_col">
                        <a class="logo_header" href="<?= SITE_DIR; ?>">
                            <img src="<?= $logo; ?>" alt="">
                        </a>
                        <?
                        $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "header_desktop",
                            Array(
                                "ROOT_MENU_TYPE" => "main",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "sub",
                                "USE_EXT" => "Y",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "Y",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "36000",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => ""
                            )
                        );
                        ?>
                    </div>

                    <div class="right_header_col">
                        <?
                        $APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "header_county_desktop",
                            Array(
                                "ACTIVE_DATE_FORMAT" => "",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "CHECK_DATES" => "Y",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_DATE" => "N",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "N",
                                "DISPLAY_PREVIEW_TEXT" => "N",
                                "DISPLAY_TOP_PAGER" => "N",
                                "FIELD_CODE" => array("", ""),
                                "FILTER_NAME" => "",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => 2,
                                "IBLOCK_TYPE" => "TECH_DATA",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "INCLUDE_SUBSECTIONS" => "N",
                                "MEDIA_PROPERTY" => "",
                                "MESSAGE_404" => "",
                                "NEWS_COUNT" => "20",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "PAGER_DESC_NUMBERING" => "N",
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_SHOW_ALWAYS" => "N",
                                "PAGER_TEMPLATE" => ".default",
                                "PAGER_TITLE" => "Страны",
                                "PARENT_SECTION" => "",
                                "PARENT_SECTION_CODE" => "",
                                "PREVIEW_TRUNCATE_LEN" => "",
                                "PROPERTY_CODE" => array(
                                    "FLAG",
                                    "LINK",
                                    'LANGUAGE'
                                ),
                                "SEARCH_PAGE" => "",
                                "SET_BROWSER_TITLE" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "SLIDER_PROPERTY" => "",
                                "SORT_BY1" => "SORT",
                                "SORT_BY2" => "NAME",
                                "SORT_ORDER1" => "ASC",
                                "SORT_ORDER2" => "ASC",
                                "STRICT_SECTION_CHECK" => "N",
                                "TEMPLATE_THEME" => "",
                                "USE_RATING" => "N",
                                "USE_SHARE" => "N",
                                'COUNTRY' => $arStatic['COUNTRY_CODE'],
                                'LANGUAGE' => LANGUAGE_ID,
                                'SHOW_QUESTION' => $_SESSION['country'] ? false : true
                            )
                        );
                        ?>
                        <? if($USER->IsAuthorized()): ?>

                        <div class="btn_specialist_header btn_lk_header_wrap">
                            <button class="btn_blue_lock btn_lk_header">
                                <img src="<?= SITE_TEMPLATE_PATH?>/assets/img/icon_lock.svg" alt="">
                                <?= Loc::getMessage('TEMPLATE_BAUSH_PERSONAL_CABINET'); ?>
                            </button>
                            <div class="lk_menu_dropdown">
                                <?
                                $APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "header_personal",
                                    Array(
                                        "ROOT_MENU_TYPE" => "personal",
                                        "MAX_LEVEL" => "1",
                                        "CHILD_MENU_TYPE" => "sub",
                                        "USE_EXT" => "Y",
                                        "DELAY" => "N",
                                        "ALLOW_MULTI_SELECT" => "Y",
                                        "MENU_CACHE_TYPE" => "N",
                                        "MENU_CACHE_TIME" => "36000",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "MENU_CACHE_GET_VARS" => "",
                                        'DOP_CLASS' => 'lk_menu_dropdown_list'
                                    )
                                );
                                ?>
                            </div>
                        </div>
                        <? else: ?>
                            <div class="btn_specialist_header">
                                <button class="btn_blue_lock">
                                    <img src="<?= SITE_TEMPLATE_PATH?>/assets/img/icon_lock.svg" alt="">
                                    <?= Loc::getMessage('TEMPLATE_BAUSH_PERSONAL_SPECIALISTS'); ?>
                                </button>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </header>
        <? if($arStatic['CUR_DIR'] != SITE_DIR): ?>
            <div class="page">
                <?$APPLICATION->ShowViewContent('brand_header_banner');?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumb",
                    Array(
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => SITE_ID
                    )
                );?>
        <? endif; ?>
	
						