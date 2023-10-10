<?php

namespace App\Http\Controllers;

use App\Models\DeletedProduct;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        if ($request->exists("browser"))
            $products = Product::where($request->typeSearch, "like" ,"%".$request->search."%")
                ->paginate(10);

        else $products = Product::paginate(10);

        return view("products.index", [
            "products" => $products,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function deleted(): View|Factory|Application
    {
        return view("products.deleted",[
            "products" => DeletedProduct::paginate(10),
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
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        $request->validate([
            "name" => "unique:products",
            "code" => "unique:products",
            "tax" => ["numeric","min:0"]
        ], [
            "name.unique" => "El producto ya existe",
            "code.unique" => "El codigo ya existe",
            "tax.numeric" => "El campo debe ser numerico",
            "tax.min" => "Debe ser un numero positivo",
        ]);
        try {
            Product::create([
                "code" => $request->code,
                "name" => $request->name,
                "size" => $request->size,
                "quantity" => $request->quantity,
                "price" => $request->price,
                "tax" => $request->tax,
                "specification" => $request->specification,
            ]);
            return redirect(route("products.index"))
                ->with("success", "El producto " . $request->name . " fue registrado");

        } catch (Throwable $exception) {
            logger(json_encode($exception->getMessage()));
            return redirect(route("products.index"))
                ->with("error", "Error al crear el producto");
        }
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Product $product): Redirector|RedirectResponse|Application
    {
        try {
            $product->update(["price" => $request->price]);

            return redirect(route("products.index"))
                ->with("success", "El Producto " . $product->name . " Fue actualizado");

        } catch (Throwable $exception) {
            logger(json_encode($exception->getMessage()));
            return redirect(route("products.index"))
                ->with("error", "Error al editar el producto");
        }
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return Application|RedirectResponse|Redirector
     */
    public function quantity(Request $request , Product $product): Redirector|RedirectResponse|Application
    {
        $request->validate(
            ["quantity" => ["numeric","min:0"]],
            ["quantity.min" => "Ingresar un numero positivo"]
        );

        try {
            $product->update([ "quantity" => $product->quantity + $request->quantity ]);

            return redirect(route("products.index"))
                ->with("success","Fue actualizada la cantidad del producto ". $product->name);

        }catch (Throwable $exception){
            logger(json_encode($exception->getMessage()));
            return redirect(route("products.index"))
                ->with("error","Error al ingresar la nueva cantidad del producto");
        }
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Request $request,Product $product): Redirector|RedirectResponse|Application
    {
        $request->validate([
            "current_password" => "current_password"
        ],[
            "current_password" => "Contraseña incorrecta"
        ]);

        try {
            DeletedProduct::create([
                "name_responsible" => Auth::user()->name,
                "document_responsible" => Auth::user()->document,
                "code_product" => $product->code,
                "name_product" => $product->name,
                "id_product" => $product->id,
            ]);

            $product->delete();

            return redirect(route("products.index"))
                ->with("success","Se elimino el producto ". $product->name);

        }catch (Throwable $exception){
            logger($exception->getMessage());
            return redirect(route("products.index"))
                ->with("error","Error al eliminar el producto");
        }
    }

    /**
     * @param $code
     * @return Application|RedirectResponse|Redirector
     */
    public function restore($code): Redirector|RedirectResponse|Application
    {
        try {
            $deletedProduct = DeletedProduct::where("code_product",$code)->first();
            $product = Product::onlyTrashed()->find($deletedProduct->id_product);
            $product->restore();
            $deletedProduct->delete();

            return redirect(route("products.index"))
                ->with("success","Se restauro el producto ". $product->name);

        }catch (Throwable $exception){
            logger($exception->getMessage());
            return redirect(route("products.index"))
                ->with("error","Error al restaurar el producto");
        }
    }

}
