<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('home/index', [
            'isEndPromotion' => false,
            'isEndContest' => false,
            'isEndResult' => false,
            'products' => Product::getAllCached()
        ]);
    }
}
