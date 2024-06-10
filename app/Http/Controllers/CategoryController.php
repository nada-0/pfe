<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $mainCategories = $categories->take(4);
        $moreCategories = $categories->slice(4);

        return view('home')->with(compact('mainCategories', 'moreCategories'));
    }
}
