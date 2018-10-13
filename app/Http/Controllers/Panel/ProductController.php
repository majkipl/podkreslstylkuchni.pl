<?php

namespace App\Http\Controllers\Panel;

use App\Enums\ProductType;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('panel/product/index');
    }

    public function create()
    {
        $types = ProductType::toSelect();

        return view('panel/product/form', [
            'types' => $types
        ]);
    }

    public function show(int $id)
    {
        $product = Product::where('id','=',$id)->first();

        return view('panel/product/show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        $types = ProductType::toSelect();

        return view('panel/product/form', [
            'product' => $product,
            'types' => $types
        ]);
    }
}
