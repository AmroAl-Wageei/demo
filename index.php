<?php

require './function/function.php';




$uri = $_SERVER['REQUEST_URI'];


if ($uri === '/demo/') {
    require './controllers/index.php';
} elseif ($uri === '/demo/controllers/about.php') {
    require './controllers/about.php';
}



// dd($_SERVER);

// /demo/
?>