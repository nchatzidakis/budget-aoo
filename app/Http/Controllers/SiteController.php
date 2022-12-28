<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            return redirect()->route('tenant.index');
        }

        return view('welcome');
    }
}
