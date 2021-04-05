<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/** @var CMain $APPLICATION */
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
global $arStatic;
$logo = CFile::GetPath($arStatic['LOGO']);
?>
<? if($arStatic['CUR_DIR'] != SITE_DIR): ?>
    </div>
<? endif; ?>
<footer class="footer">

        <div class="container">

            <div class="row">

                <div class="footer_col_1">
                    <div class="footer_logo">
                        <a href="<?= SITE_DIR; ?>"><img src="<?= $logo; ?>" alt=""></a>
                    </div>
                    <div class="footer_link">
                        <a class="btn_blue" href=""><?= Loc::getMessage('TEMPLATE_BAUSH_WANT_WORK'); ?></a>
                    </div>
                    <div class="footer_link">
                        <a class="btn_blue btn_popup_feedback" href="javascript:void(0)">
                            <?= Loc::getMessage('TEMPLATE_BAUSH_CALLBACK'); ?>
                        </a>
                    </div>
                </div>
                <div class="footer_col_2">
                    <div class="footer_menu">
                        <?
                        $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "footer",
                            Array(
                                "ROOT_MENU_TYPE" => "footer",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "",
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
                </div>
                <div class="footer_col_3">
                    <div class="footer_address">
                        <? if($arStatic['PHONE']): ?>
                            <a href="tel:<?= showNumbers($arStatic['PHONE']); ?>" class="footer_address_link">
                                <img src="<?= SITE_TEMPLATE_PATH?>/assets/img/call_24px.svg" alt="">
                                <?= $arStatic['PHONE']; ?>
                            </a>
                        <? endif; ?>
                        <? if($arStatic['EMAIL']): ?>
                            <a href="mailto:<?= $arStatic['EMAIL']; ?>" class="footer_address_link">
                                <img src="<?= SITE_TEMPLATE_PATH?>/assets/img/mail_outline_24px.svg" alt="">
                                <?= $arStatic['EMAIL']; ?>
                            </a>
                        <? endif; ?>
                        <? if($arStatic['ADDRESS']): ?>
                            <a href="<?= ($arStatic['ADDRESS_LINK'] ? $arStatic['ADDRESS_LINK'] : 'javascript:void(0)'); ?>"
                               class="footer_address_link"
                               target="<?= ($arStatic['ADDRESS_LINK'] ? '_blank' : ''); ?>"
                            >
                                <img src="<?= SITE_TEMPLATE_PATH?>/assets/img/location_on_24px.svg" alt="">
                                <?= $arStatic['ADDRESS']; ?>
                            </a>
                        <? endif; ?>
                    </div>
                </div>
                <div class="footer_col_4">
                    <div class="footer_copyright_links">
                        <? if($arStatic['POLICY_LINK']): ?>
                            <a href="<?= $arStatic['POLICY_LINK']; ?>">
                                <?= Loc::getMessage('TEMPLATE_BAUSH_POLICY_TEXT'); ?>
                            </a>
                        <? endif; ?>
                        <? if($arStatic['USER_AGREEMENT_LINK']): ?>
                            <a href="<?= $arStatic['USER_AGREEMENT_LINK']; ?>">
                                <?= Loc::getMessage('TEMPLATE_BAUSH_USER_AGREEMENT_TEXT'); ?>
                            </a>
                        <? endif; ?>
                        <? if($arStatic['CONSENT_TO_PROCESSING_LINK']): ?>
                            <a href="<?= $arStatic['CONSENT_TO_PROCESSING_LINK']; ?>">
                                <?= Loc::getMessage('TEMPLATE_BAUSH_CONSENT_TO_PROCESSING_TEXT'); ?>
                            </a>
                        <? endif; ?>
                    </div>
                    <div class="footer_copyright">
                        © Bausch Health, 1960 – <?= date('Y'); ?>
                    </div>
                </div>

            </div>

        </div>

    </footer>

<?
$APPLICATION->IncludeComponent(
    'baush:iblock.form',
    'callback',
    [
        'IBLOCK_ID' => '8',
        'USE_PREVIEW_TEXT_AS_TEXTAREA' => 'N',
        'REQUIRED' => [
            'PREVIEW_TEXT',
            'FIRST_NAME',
        ],
        'FIELDS_GENERATE_NAME' => [
            'NAME',
        ],
        'USE_CAPTCHA' => 'N',
        'NEED_POLICY_CONFIRM' => 'Y',
        'FORM_NAME' => 'Напишите нам',
        'MAIL_EVENT' => 'FORM_SEND'
    ]
);
?>

<?
if(!$_SESSION['country'])
{
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "select_country_popup",
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
}

?>


</body>
</html>