<?php


function dd($value) {

    echo "<pre>" ;
    var_dump($value);
    echo "</pre>";
    
    die();
}

function urlIs($value) {
    $_SERVER['REQUEST_URI'] === $value;
    // echo $_SERVER['REQUEST_URI'];
    // die($_SERVER['REQUEST_URI']);
}

function authorize($condition , $status = Response::FORBIDDEN ) {
    if (! $condition){
        abort($status);
    }
}


?>