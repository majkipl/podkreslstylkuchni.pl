<?php

namespace App\Http\Controllers\Panel;

use App\Models\Product;
use App\Models\Url;
use App\Http\Controllers\Controller;

class UrlController extends Controller
{
    public function index()
    {
        return view('panel/url/index');
    }

    public function create()
    {
        $products = Product::all();

        return view('panel/url/form', [
            'products' => $products
        ]);
    }

    public function show(int $id)
    {
        $url = Url::where('id','=',$id)->first();

        return view('panel/url/show', [
            'url' => $url
        ]);
    }

    public function edit(Url $url)
    {
        $products = Product::all();

        return view('panel/url/form', [
            'url' => $url,
            'products' => $products
        ]);
    }
}
