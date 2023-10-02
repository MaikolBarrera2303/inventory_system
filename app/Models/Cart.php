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

        $totalQuantity = $product->quantity - $requestQuantity;
        $product->update(["quantity" => $totalQuantity]);

        $totalPrice = $product->price * $requestQuantity;

        $response = $this->updateQuantityCart(session("cart"),$product->code,$requestQuantity);
        $cart = $response["cart"];

        if ($response["validate"] === false){
            $cart[] = [
                "code_product" => $product->code,
                "name_product" => $product->name,
                "quantity" => $requestQuantity,
                "price" => $product->price,
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

}
