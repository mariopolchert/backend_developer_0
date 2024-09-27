<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        //varati formu za login
    }

    public function store()
    {
        //validate

        // create session
        Auth::attempt([
            // 'email' =>
            // 'password' =>
        ]);

        //rediect
    }

    public function destroy()
    {
        // create session
        Auth::logout();

        //rediect
    }
}
