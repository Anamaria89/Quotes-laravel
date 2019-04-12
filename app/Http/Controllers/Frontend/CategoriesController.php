<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
         //$categories = Category::where('status', 1)->get();
                
        return view('frontend.categories.index', compact('categories'));
    }
}
