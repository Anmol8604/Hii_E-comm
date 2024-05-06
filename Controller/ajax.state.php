<?php

$countryVal = $_POST['countryVal'];
function state($countryVal)
{
    $public = require_once '../config.php';
    require_once '../Model/State.php';
    $state = new State($public['Public']);

    $res = $state->getStates($countryVal);
    foreach ($res as $state) {
        $str .= "<option value=\"$state[0]\">$state[1]</option>";
    }
    echo $str;
}
state($countryVal);
