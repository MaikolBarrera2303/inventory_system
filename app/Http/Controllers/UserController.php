<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UserController extends Controller
{
    /**
     * @return View|Factory|Application
     */
    public function index(): View|Factory|Application
    {
        return view("users.index",[
            "users" => User::with("roles")->paginate(10)
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("users.create")->with([
            "roles" => Role::all(),
        ]);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        $request->validate([
            "email" => "unique:users",
            "document" => "unique:users"
        ],[
            "email.unique" => "El correo electronico ya existe",
            "document.unique" => "El documento ya existe"
        ]);

        try {
            User::create([
                "name" => $request->name,
                "document" => $request->document,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "role_id" => $request->role_id,
            ]);
            return redirect(route("users.index"))
                ->with("success","El usuario ".$request->name." fue creado");

        }catch (Throwable $exception){
            logger(json_encode($exception->getMessage()));
            return redirect(route("users.index"))
                ->with("error","Error al crear el usuario");
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
