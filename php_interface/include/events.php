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

//Добавляем месяца в события
AddEventHandler("iblock", "OnAfterIBlockSectionAdd", "addMonthToYear");
function addMonthToYear($arFields)
{
    $IBLOCK_ID = [6,7];
    if(in_array($arFields['IBLOCK_ID'], $IBLOCK_ID))
    {
        $arMonth = [
            'Январь',
            'Февраль',
            "Март",
            "Апрель",
            "Май",
            "Июнь",
            "Июль",
            "Август",
            "Сентябрь",
            "Октябрь",
            "Ноябрь",
            "Декабрь"
        ];
        if(intval($arFields['RESULT']))
        {
            if (\Bitrix\Main\Loader::includeModule('iblock'))
            {
                $el = new CIBlockElement();
                $sort = 10;
                foreach ($arMonth as $month)
                {
                    $fields = [
                        'IBLOCK_ID' => $arFields['IBLOCK_ID'],
                        'NAME' => $month,
                        'IBLOCK_SECTION_ID' => intval($arFields['RESULT']),
                        'ACTIVE' => 'Y',
                        'SORT' => $sort,
                    ];
                    $el->Add($fields);
                    $sort += 10;
                }
            }
        }
    }
}
