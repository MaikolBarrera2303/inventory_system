<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

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
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $cart = session("cart");
        $total = session("total");
        return view("saleOrder.create",[
            "cart" => $cart,
            "total" => $total,
        ]);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function addCart(Request $request): Redirector|RedirectResponse|Application
    {
        $response = (new Cart())->addCart($request->quantity,$request->code_product);

        return redirect(route("saleOrders.create"))
            ->with($response["type"],$response["message"]);
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function emptyCart(): Redirector|RedirectResponse|Application
    {
        (new Cart())->emptyCart();
        sleep(2);
        return redirect(route("saleOrders.create"))
            ->with("success","Venta Cancelada");
    }
}
