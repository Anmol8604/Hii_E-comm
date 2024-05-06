<?php

$stateVal = $_POST['stateVal'];
function city($stateVal)
{
    $public = require_once '../config.php';
    require_once '../Model/City.php';
    $city = new City($public['Public']);

    $res = $city->getCity($stateVal);
    foreach ($res as $city) {
        $str .= "<option value=\"$city[0]\">$city[1]</option>";
    }
    echo $str;
}
city($stateVal);
