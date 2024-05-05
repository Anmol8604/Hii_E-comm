<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$route = [
    '/Admin/' => 'BeforeAuth@login',
    '/Admin/register' => 'BeforeAuth@register',
    '/Admin/completeprofile' => 'BeforeAuth@completeProfile',
    '/Admin/home' => 'AfterAuth@index'
];

if (array_key_exists($uri, $route)) {
    $action = $route[$uri];
    if (strpos($action, '@') !== false) {
        list($controller, $method) = explode('@', $action);
        require_once 'Controller/' . $controller . '.php';
        $obj = new $controller();
        $obj->$method();
    } else {
        require_once $action;
    }
} else {
    require_once 'View/404.view.php';
}
