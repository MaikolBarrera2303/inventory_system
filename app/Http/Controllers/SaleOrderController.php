<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SaleOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cart = session("cart");
        return view("saleOrder.create",[
            "cart" => $cart
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestQuantity = $request->quantity;

        $product = Product::where("code",$request->code_product)->first();

        if (!$product) dd("no hay nada");
        if ($product->quantity < $requestQuantity) dd("no hay productos suficientes");

//        $totalQuantity = $product->quantity - $requestQuantity;

//        $product->update([
//            "quantity" => $totalQuantity
//        ]);
//        $product->save();

        $cart = session("cart");
        $response = $this->updateQuantityCart($cart,$product->code,$requestQuantity);
        $cart = $response["cart"];

        if ($response["validate"] === false){
            $cart[] = [
                "code_product" => $product->code,
                "name_product" => $product->name,
                "quantity" => $requestQuantity,
            ];
        }

        session(["cart" => $cart]);

        return redirect(route("sale-orders.create"))->with("success","Producto agregado");
    }

    public function updateQuantityCart($cart,$code_product,$quantity)
    {
        $validate = false;
        foreach ($cart as &$item) {
            if ($item["code_product"] === $code_product) {
                $totalQuantity = $quantity + $item["quantity"];
                $item["quantity"] = $totalQuantity;
                $validate = true;
            }
        }
        return [
            "cart" => $cart,
            "validate" => $validate
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
