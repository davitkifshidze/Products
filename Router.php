<?php

namespace app;

use app\models\God;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public ?Database $database;
    public God $product_god;

    public function __construct(Database $database, God $product_god)
    {
        $this->database = $database;
        $this->product_god = $product_god;
    }

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['REQUEST_URI'] ?? '/';

        if (strpos($url, '?') !== false) {
            $url = substr($url, 0, strpos($url, '?'));
        }

        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }

        if (!$fn) {
            echo "Page Not Found";
            exit();
        }

        echo call_user_func($fn, $this);

    }

    public function renderView($view, $params = [])
    {

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/views/_layout.php";
    }

}





