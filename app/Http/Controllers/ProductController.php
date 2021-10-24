<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
                'currency' =>  Rule::in(['USD', 'RUB', 'GPB', 'EUR']),
            ]);
        return Product::all();
    }
}
