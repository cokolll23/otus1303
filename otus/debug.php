<?php
function writeToLog($data, $title = ''){
    if (!DEBUG_FILE_NAME)
        return false;
    $log = "\n------------------------\n";
    $log .= date("Y.m.d G:i:s")."\n";
    $log .= (strlen($title) > 0 ? $title : 'DEBUG')."\n";
    $log .= print_r($data, 1);
    $log .= "\n------------------------\n";
    file_put_contents(__DIR__."/".DEBUG_FILE_NAME, $log, FILE_APPEND);
    return true;
}

$var = [];
Bitrix\Main\Diag\Debug::writeToFile($var, $varName = '', $fileName = '');
Bitrix\Main\Diag\Debug::dumpToFile($var, $varName = '', $fileName = '');