<?php 
// $uri = $_SERVER['REQUEST_URI'];


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// dd($uri);


// 1 
// if ($uri === '/demo/') {
//     require './controllers/index.php';
// } elseif ($uri === '/demo/about') {
//     require './controllers/about.php';
// } elseif ($uri === '/demo/contact') {
//     require './controllers/contact.php';
// } elseif ($uri === '/demo/testing') {
//     require './controllers/testing.php';
// } elseif ($uri === '/demo/notes') {
//     require './controllers/notes.php';
// }


// 2
$routes = [

    '/demo/' => './controllers/index.php',
    '/demo/about' => './controllers/about.php',
    '/demo/contact' => './controllers/contact.php',
    '/demo/testing' => './controllers/testing.php',
    '/demo/notes' => './controllers/notes.php',

];


function routeToController($uri ,$routes ){
    
    if (array_key_exists($uri , $routes)) {
        require $routes[$uri];
    } else {
        abort(404);
    }
}

function abort($code = 404) {
   http_response_code($code);

    require "./view/{$code}.php";

    die();
}

routeToController($uri ,$routes);

?>