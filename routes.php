<?php

$routes = [
    "home" => "index.php",
    "login" => "Auth/login.php",
    "register" => "Auth/register.php",
    "dashboard" => "dashboard.php",
    "logout" => "logout.php",
    "quiz" => "topic.php"
];

if (isset($_GET["route"])) {
    $route = $_GET["route"];

    if (array_key_exists($route, $routes)) {
        header("Location: " . $routes[$route]);
        exit();
    } else {
        echo "404 - Lapa neeksistē";
    }
}