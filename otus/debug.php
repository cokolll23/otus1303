<?php
$var = [];
Bitrix\Main\Diag\Debug::writeToFile($curDate, $varName = 'curDateTime', $fileName = '/log.txt');
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/logs/log.txt', $curDate . PHP_EOL, FILE_APPEND);

//Bitrix\Main\Diag\Debug::dumpToFile($var, $varName = '', $fileName = '');