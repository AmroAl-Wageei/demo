<?php 
$routes = [
    '/' => '../index.view.php',
    '/about' => '../about.view.php',
    '/contact' => '../contact.view.php',
    '/notes' => '../notes.view.php',
    '/testing' => '../testing.view.php'
];

$route = $_SERVER['REQUEST_URI'];

$pageContent = $routes[$route] ?? '<h1>404 Not Found</h1><p>The requested page was not found.</p>';
?>