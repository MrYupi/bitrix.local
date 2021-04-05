<?php
//Очищаем статичный кеш
AddEventHandler("iblock", "OnAfterIBlockElementAdd", "clearStaticCache");
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", "clearStaticCache");
function clearStaticCache(&$arFields)
{
    $IBLOCK_ID = $arFields['IBLOCK_ID'];
    $arIblock = [
        STATIC_IBLOCK_ID => 'global_static_content',
    ];
    if (array_key_exists($IBLOCK_ID, $arIblock)) {
        $cache = \Bitrix\Main\Application::getInstance()->getManagedCache();
        $cache->clean(md5($arIblock[$IBLOCK_ID]));
    }
}
