<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\File;

class DashboardController extends Controller
{
    public function index(Products $product, File $file){
        $product = $product->count();
        $file = $file->count();
        return view('index', compact('product','file'));
    }
}
