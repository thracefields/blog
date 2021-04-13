<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('manage.categories.index')->withCategories($categories);
    }

    public function create()
    {
        return view('manage.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20|unique:categories',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Успешно добавихте нова категория!');

        return redirect()->route('manage.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('manage.categories.edit')->withCategory($category);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|max:30|unique:categories,name,'.$category->id,
        ]);

        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Успешно променихте категорията!');
        return redirect()->route('manage.categories.index');
    }

}
