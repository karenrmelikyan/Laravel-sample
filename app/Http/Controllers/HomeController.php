<?php

namespace App\Http\Controllers;

use App\Models\URL;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'urls' => URL::all(),
        ]);
    }
}
