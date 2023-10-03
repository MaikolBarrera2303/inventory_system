<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SaleOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("saleOrder.index",[
            "sales" => Sale::latest()->take(10)->get(),
        ]);
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

    public function sales(Request $request)
    {
        $cart = session("cart");
        $total = session("total");

        if ($cart === [])
            return redirect(route("saleOrders.create"))
                ->with("error","No hay ningun producto cargado");

        Sale::create([
            "date_sale" => date("Y-m-d"),
            "number_facture" => date("s").Str::random(8).date("im"),
            "products" => json_encode($cart),
            "responsible" => Auth::user()->name,
            "total" => $total,
        ]);

        session([
            "cart" => [],
            "total" => 0,
        ]);

        return redirect(route("saleOrders.create"))
            ->with("success","Venta Procesada");

    }

}
