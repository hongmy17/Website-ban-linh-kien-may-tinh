<?php

namespace App;

class Router
{
  private array $routes = [];

  public function add(string $path, array $params, array $middlewares = [])
  {
    $this->routes[] = [
      "path" => $path,
      "params" => $params,
      "middlewares" => $middlewares,
    ];
  }

  public function match(string $path)
  {
    foreach ($this->routes as $route) {
      if ($route["path"] === $path) {
        foreach ($route["middlewares"] as $middleware) {
          if (is_callable($middleware)) {
            $middleware();
          } elseif (class_exists($middleware)) {
            $middleware::handle();
          }
        }

        return $route["params"];
      }
    }

    return false;
  }
}