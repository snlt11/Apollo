<?php

namespace App\Routing;

use AltoRouter;

class RouterDispatcher
{
    private $match;
    private $controller;
    private $method;

    public function __construct(AltoRouter $router)
    {
        $this->match = $router->match();
        $this->dispatch();
    }

    private function dispatch(): void
    {
        if ($this->match) {
            $this->extractControllerAndMethod();
            $this->invokeControllerAndMethod();
        } else {
            $this->errorHandler(404, 'Page not found');
        }
    }

    private function extractControllerAndMethod(): void
    {
        list($this->controller, $this->method) = explode('@', $this->match['target']);
    }

    private function invokeControllerAndMethod(): void
    {
        if (class_exists($this->controller)) {
            $controllerInstance = new $this->controller();

            if (is_callable([$controllerInstance, $this->method])) {
                call_user_func_array([$controllerInstance, $this->method], $this->match['params']);
            } else {
                $this->errorHandler(501, 'Method not implemented');
            }
        } else {
            $this->errorHandler(500, 'Controller not found');
        }
    }

    private function errorHandler(int $statusCode = 404, string $message = ''): void
    {
        switch ($statusCode) {
            case 404:
                $statusText = 'Not Found';
                break;
            case 500:
                $statusText = 'Internal Server Error';
                break;
            case 501:
                $statusText = 'Not Implemented';
                break;
            default:
                $statusCode = 500;
                $statusText = 'Internal Server Error';
                break;
        }

        header($_SERVER["SERVER_PROTOCOL"] . ' ' . $statusCode . ' ' . $statusText);
        echo $statusCode . ' ' . $statusText . ' - ' . $message;
    }
}
