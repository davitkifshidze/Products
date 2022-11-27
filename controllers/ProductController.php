<?php

namespace app\controllers;

use app\Router;
use app\models\ProductBook;
use app\models\ProductDvd;
use app\models\ProductFurniture;

class ProductController
{

    static function new(Router $router)
    {
        $productData = [
            'type'      => '',
            'sku'       => '',
            'name'      => '',
            'price'     => '',
            'weight'    => '',
            'size'      => '',
            'height'    => '',
            'width'     => '',
            'length'    => '',
        ];

        $error = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if (isset($_POST['type']) && !empty($_POST['type'])) {
                $type = $_POST['type'];
            }

            $productData['type']    = $type;
            $productData['sku']     = $_POST['sku'];
            $productData['name']    = $_POST['name'];
            $productData['price']   = $_POST['price'];

            if($router->product_god->checkProductSku($productData['sku'])){
                if($type === "1"):
                    $productData['weight']   = $_POST['weight'];
                    $product = new ProductBook($productData['type'],$productData['sku'],$productData['name'],$productData['price'],$productData['weight']);
                elseif($type === "2"):
                    $productData['size']   = $_POST['size'];
                    $product = new ProductDvd($productData['type'],$productData['sku'],$productData['name'],$productData['price'],$productData['size']);
                elseif($type === "3"):
                    $productData['height']   = $_POST['height'];
                    $productData['width']    = $_POST['width'];
                    $productData['length']   = $_POST['length'];
                    $product = new ProductFurniture($productData['type'],$productData['sku'],$productData['name'],$productData['price'],$productData['height'],$productData['width'],$productData['length'],);
                endif;

                $product->create($productData);

                header('Location: /products');
                exit();
            }else{

                $error['sku__error'] = 'SKU already exists';

            }

        }

        $product__type = $router->product_god->getType();

        $router->renderView('products/new', [
            'product__type' => $product__type,
            'product' => $productData,
            'error' => $error,
        ] );
    }

    static function index(Router $router)
    {
        $products = $router->product_god->getProducts();

        $router->renderView('products/list', [
            'products' => $products
        ] );
    }

    static function delete(Router $router)
    {
        $sku__data = $_POST['sku__data'];

        foreach ($sku__data as $key => $item) {
            $router->product_god->deleteProducts($item);
        }

        return json_encode($sku__data);
    }

}