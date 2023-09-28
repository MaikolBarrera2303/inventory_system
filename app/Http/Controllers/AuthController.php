<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("auth.login");
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        $user = User::where("document",$request->document)->first();

        if ($user && Hash::check($request->password,$user->password)){
            Auth::login($user);
            session(["cart" => []]);
            return redirect(route("users.index"));
        }

        return redirect(route("login"))->with("message","Credenciales Incorrectas");

    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(): Redirector|RedirectResponse|Application
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerate();
        return redirect(route("login"));
    }
}
