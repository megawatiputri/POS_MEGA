<?php

namespace App\Http\Controllers;

use App\Models\CustomCake;

class CustomCakeAdminController extends Controller
{
    public function index()
    {
        $customCakes = CustomCake::latest()->get();

        return view('custom_cake.index', compact('customCakes'));
    }
}
