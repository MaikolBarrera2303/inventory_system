<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view("products.index",[
            "products" => Product::paginate(10),
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "unique:products",
            "code" => "unique:products"
        ],[
            "name.unique" => "El producto ya existe",
            "code.unique" => "El codigo ya existe",
        ]);
        try {
            Product::create([
                "code" => $request->code,
                "name" => $request->name,
                "size" => $request->size,
                "quantity" => $request->quantity,
                "price" => $request->price,
                "specification" => $request->specification,
            ]);
            return redirect(route("products.index"))
                ->with("success","El producto ".$request->name." fue registrado");

        }catch (Throwable $exception){
            logger(json_encode($exception->getMessage()));
            return redirect(route("products.index"))
                ->with("error","Error al crear el producto");
        }
    }

    /**
     * @param string $id
     * @return void
     */
    public function show(string $id)
    {
        $user = User::find($id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
