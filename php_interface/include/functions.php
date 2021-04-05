<?php
if (!function_exists('collectStatic'))
{
    function collectStatic($array = [])
    {
        if(count($array) && STATIC_IBLOCK_ID && STATIC_ELEMENT_ID)
        {
            $option['component_cache_on'] = COption::GetOptionString('main', 'component_cache_on');
            $option['component_managed_cache_on'] = COption::GetOptionString('main', 'component_managed_cache_on');
            $IBLOCK_ID = STATIC_IBLOCK_ID;
            $ID = STATIC_ELEMENT_ID;
            $arFilter['ID'] = $array;
            if ($option['component_cache_on'] == 'Y' && $option['component_managed_cache_on'] == 'Y')
            {
                $cache = \Bitrix\Main\Application::getInstance()->getManagedCache();
                if ($cache->read('999999999', md5('global_static_content')))
                {
                    $temp = $cache->get(md5('global_static_content'));
                }
                else
                {
                    \Bitrix\Main\Loader::includeModule('iblock');

                    $res = CIBlockElement::GetProperty(
                        $IBLOCK_ID,
                        $ID,
                        [],
                        $arFilter
                    );
                    while ($arFields = $res->GetNext())
                    {
                        $key = $arFields['CODE'];
                        if ($arFields['MULTIPLE'] == 'Y')
                        {
                            $temp[$key][] = [
                                'VALUE' => $arFields['~VALUE'],
                                'DESCRIPTION' => $arFields['DESCRIPTION'],
                            ];
                        }
                        elseif ($arFields['PROPERTY_TYPE'] == 'L')
                        {
                            $temp[$key] = [
                                'VALUE' => $arFields['~VALUE'],
                                'XML_VALUE' => $arFields['VALUE_XML_ID'],
                            ];
                        }
                        else
                        {
                            $temp[$key] = $arFields['~VALUE'];
                        }
                    }
                    $cache->set(md5('global_static_content'), $temp);
                }
            }
            else
            {
                \Bitrix\Main\Loader::includeModule('iblock');
                $res = CIBlockElement::GetProperty(
                    $IBLOCK_ID,
                    $ID,
                    [],
                    $arFilter
                );
                while ($arFields = $res->GetNext())
                {
                    $key = $arFields['CODE'];
                    if ($arFields['MULTIPLE'] == 'Y')
                    {
                        $temp[$key][] = [
                            'VALUE' => $arFields['~VALUE'],
                            'DESCRIPTION' => $arFields['DESCRIPTION'],
                        ];
                    }
                    elseif ($arFields['PROPERTY_TYPE'] == 'L')
                    {
                        $temp[$key] = [
                            'VALUE' => $arFields['~VALUE'],
                            'XML_VALUE' => $arFields['VALUE_XML_ID'],
                        ];
                    }
                    else
                    {
                        $temp[$key] = $arFields['~VALUE'];
                    }
                }
            }
            return $temp;
        }
    }
}

if (!function_exists('debug'))
{
    function debug($item)
    {
        echo '<pre style="background: black; padding: 10px; color: white">';
        print_r($item);
        echo '</pre>';
    }
}

if (!function_exists('showProperties'))
{
    function showProperties($array, $prop_name, $showFile = 'Y')
    {
        if ($array['PROPERTIES'][$prop_name]['VALUE'])
        {
            if ($array['PROPERTIES'][$prop_name]['PROPERTY_TYPE'] == 'F')
            {
                if ($showFile == 'Y')
                {
                    return CFile::GetPath($array['PROPERTIES'][$prop_name]['VALUE']);
                }
                else
                {
                    return $array['PROPERTIES'][$prop_name]['VALUE'];
                }
            }
            else
            {
                return $array['PROPERTIES'][$prop_name]['~VALUE'];
            }
        }
        else
        {
            return false;
        }
    }
}

if (!function_exists('showNumbers'))
{
    function showNumbers($item, $use_plus = 'Y')
    {
        if ($use_plus == 'Y')
        {
            $item = preg_replace("/[^+0-9]/", '', $item);
        }
        else
        {
            $item = preg_replace("/[^0-9]/", '', $item);
        }

        return $item;
    }
}

if (!function_exists('numberEnd'))
{
    function numberEnd($number, $titles)
    {
        $cases = array(2, 0, 1, 1, 1, 2);
        return $titles[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
    }
}

