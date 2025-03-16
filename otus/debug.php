<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?php
$currentDate = new DateTime();
echo $curDate =$currentDate->format('Y-m-d H:i:s');
$var = [];
Bitrix\Main\Diag\Debug::writeToFile($curDate, $varName = 'curDateTime', $fileName = '/log.txt');
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/logs/log.txt', $curDate . PHP_EOL, FILE_APPEND);

//Bitrix\Main\Diag\Debug::dumpToFile($var, $varName = '', $fileName = '');