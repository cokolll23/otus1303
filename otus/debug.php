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

//Замер времени выполнения кода
Bitrix\Main\Diag\Debug::startTimeLabel('SomeLabel');
Bitrix\Main\Diag\Debug::endTimeLabel('SomeLabel');
Bitrix\Main\Diag\Debug::dump(Bitrix\Main\Diag\Debug::getTimeLabels());
// array(1) {
// ["SomeLabel"]=>
// array(2) {
// ["start"]=>
// float(1536585978.9713)
// ["time"]=>
// float(0.0065689086914062)
// }
// }

//Получение стека вызова функций
Bitrix\Main\Diag\Helper::getBackTrace($limit = 0, $options = null);


//Отладка SQL-запросов
\Bitrix\Main\Application::getConnection()->startTracker(false);
$query = $strEntityDataClass::getList($arEntityDataParams);
\Bitrix\Main\Application::getConnection()->stopTracker();
$sql = $query->getTrackerQuery()->getSql();
/*Можно также использовать объект возвращаемый методом startTracker. В нем будут
объекты всех запросов, их можно перебирать.*/