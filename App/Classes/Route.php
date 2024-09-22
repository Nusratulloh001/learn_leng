<?php

namespace App\Classes;

use App\Classes\Request;

class Route
{
    private static array $routes = [];

    public static function addRoute(string $method, string $route, $controller, string $controllerMethod): void
    {
        self::$routes[strtoupper($method)][$route] = [$controller => $controllerMethod];
    }

    public static function get(string $route, $controller, string $controllerMethod): void
    {
        self::addRoute('GET', $route, $controller, $controllerMethod);
    }

    public static function post(string $route, $controller, string $controllerMethod): void
    {
        self::addRoute('POST', $route, $controller, $controllerMethod);
    }

    public static function put(string $route, $controller, string $controllerMethod): void
    {
        self::addRoute('PUT', $route, $controller, $controllerMethod);
    }

    public static function patch(string $route, $controller, string $controllerMethod): void
    {
        self::addRoute('PATCH', $route, $controller, $controllerMethod);
    }

    public static function delete(string $route, $controller, string $controllerMethod): void
    {
        self::addRoute('DELETE', $route, $controller, $controllerMethod);
    }

    public static function fallback($controller, string $controllerMethod): void
    {
        self::$routes['FALLBACK'] = [$controller => $controllerMethod];
    }

    public static function resources(string $uri, $controller): void
    {
        self::get("$uri", $controller, 'index');
        self::get("$uri/create", $controller, 'create');
        self::post("$uri", $controller, 'store');
        self::get("$uri/{id}", $controller, 'show');
        self::get("$uri/{id}/edit", $controller, 'edit');
        self::put("$uri/{id}", $controller, 'update');
        self::patch("$uri/{id}", $controller, 'update');
        self::delete("$uri/{id}", $controller, 'destroy');
    }

    public static function dispatch(string $requestedUrl, string $requestMethod)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method'])) {
            $requestMethod = strtoupper($_POST['_method']);
        } else {
            $requestMethod = strtoupper($requestMethod);
        }
        foreach (self::$routes[$requestMethod] as $route => $className) {
            $pattern = preg_replace('/\{id\}/', '([0-9_]+)', $route);
            if (preg_match("#^$pattern$#", $requestedUrl, $matches)) {
                array_shift($matches); // Удаляем первый элемент, так как он содержит всю строку
                foreach ($className as $controller => $method) {
                    return call_user_func_array([new $controller, $method], $matches);
                }
            }
        }
        if (isset(self::$routes['FALLBACK'])) {
            foreach (self::$routes['FALLBACK'] as $controller => $method) {
                return call_user_func_array([new $controller, $method], []);
            }
        }
        return '';
    }

    public static function getRoutes () : array
    {
        return self::$routes;
    }
}