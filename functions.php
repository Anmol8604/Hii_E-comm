<?php

function dd($data = ">>>> Here <<<<"){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}


?>