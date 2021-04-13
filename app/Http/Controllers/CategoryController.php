<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        return view('categories.index')->withCategories($categories);
    }

    public function show(Category $category)
    {
        $articles = $category->articles()->paginate(15);
        return view('categories.show')
            ->withCategory($category)
            ->withArticles($articles);
    }
}
