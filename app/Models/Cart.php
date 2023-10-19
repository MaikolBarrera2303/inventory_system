<?php

namespace App\Models;

use Throwable;

class Cart
{
    /**
     * @param $requestQuantity
     * @param $requestCode
     * @return string[]
     */
    public function addCart($requestQuantity,$requestCode): array
    {
        if ($requestQuantity == 0)
            return [
                "type" => "error",
                "message" => "Ingrese un valor diferente a 0",
            ];

        if ($requestQuantity < 0){
            $response = $this->subtractCart($requestCode,$requestQuantity);
            return [
                "type" => $response["type"],
                "message" => $response["message"],
            ];
        }

        $product = Product::where("code",$requestCode)->first();

        if (!$product)
            return [
                "type" => "error",
                "message" => "El producto no existe",
            ];

        if ($product->quantity < $requestQuantity)
            return [
                "type" => "error",
                "message" => "No hay suficiente stock del producto: ".$product->name,
            ];

        $priceFinish = (($product->price*$product->tax)+$product->price);
        $totalQuantity = $product->quantity - $requestQuantity;
        $product->update(["quantity" => $totalQuantity]);

        $totalPrice = $priceFinish * $requestQuantity;

        $response = $this->updateQuantityCart(session("cart"),$product->code,$requestQuantity);
        $cart = $response["cart"];

        if ($response["validate"] === false){
            $cart[] = [
                "code_product" => $product->code,
                "name_product" => $product->name,
                "quantity" => $requestQuantity,
                "price" => $priceFinish,
                "tax" => $product->tax,
                "totalPrice" => $totalPrice,
            ];
        }

        session(["total" => array_sum(array_column($cart,'totalPrice'))]);

        session(["cart" => $cart]);

        return [
            "type" => "success",
            "message" => "Producto agregado",
        ];

    }

    /**
     * @param $cart
     * @param $code_product
     * @param $quantity
     * @return array
     */
    public function updateQuantityCart($cart,$code_product,$quantity): array
    {
        $validate = false;
        foreach ($cart as &$item) {
            if ($item["code_product"] === $code_product) {
                $totalQuantity = $quantity + $item["quantity"];
                $totalPrice = $totalQuantity * $item["price"];
                $item["quantity"] = $totalQuantity;
                $item["totalPrice"] = $totalPrice;
                $validate = true;
            }
        }
        return [
            "cart" => $cart,
            "validate" => $validate
        ];
    }

    /**
     * @return void
     */
    public function emptyCart(): void
    {
        try {
            $cart = session("cart");
            if ($cart !== []){
                foreach ($cart as $key => $item){
                    $product = Product::where("code",$item["code_product"])->first();
                    if ($product){
                        $totalQuantity = $product->quantity + $item["quantity"];
                        $product->update(["quantity" => $totalQuantity]);
                    }
                    unset($cart[$key]);
                    session(["cart" => $cart]);
                }
                session(["total" => 0]);
            }
        }catch (Throwable $exception){
            logger("Error al eliminar el carrito ".$exception->getMessage());
            logger(json_encode(session("cart")));
        }

    }


    public function subtractCart($requestCode,$requestQuantity)
    {
        $cart = session("cart");

        if ($cart === []){
            return [
                "type" => "error",
                "message" => "No se puede restar un producto si no existe en el carrito",
            ];
        }

        foreach ($cart as $key => &$item){
            if ($requestCode === $item["code_product"]){
                $totalQuantity = $requestQuantity + $item["quantity"];
                if ($totalQuantity === 0){
                    unset($cart[$key]);
                    $product = Product::where("code",$requestCode)->first();
                    $totalQuantity = $product->quantity - $requestQuantity;
                    $product->update(["quantity" => $totalQuantity]);

                    session(["total" => array_sum(array_column($cart,'totalPrice'))]);
                    session(["cart" => $cart]);
                    return [
                        "type" => "success",
                        "message" => "Articulo eliminado",
                    ];
                }

                if ($totalQuantity < 0)
                    return [
                        "type" => "error",
                        "message" => "Esta eliminando mas productos de los que existen",
                    ];

                if ($totalQuantity > 0){
                    $product = Product::where("code",$requestCode)->first();
                    $sumQuantity = $product->quantity + abs($requestQuantity);
                    $product->update(["quantity" => $sumQuantity]);
                    $item["quantity"] = $totalQuantity;

                    $item["totalPrice"] = $item["price"] * $totalQuantity;

                    session(["total" => array_sum(array_column($cart,'totalPrice'))]);

                    session(["cart" => $cart]);
                    return [
                        "type" => "success",
                        "message" => "Se modifico la cantidad de articulos",
                    ];
                }
            }
        }
    }
}
