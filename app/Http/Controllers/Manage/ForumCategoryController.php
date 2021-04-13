<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

use App\ForumCategory;

class ForumCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ForumCategory::orderBy('id', 'desc')->paginate(10);
        return view('manage.forums.categories.index')->withCategories($categories);
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
            'name' => 'required|max:20|unique:forums_categories',
        ]);

        $category = new ForumCategory;
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Успешно добавихте нова категория!');

        return redirect()->route('manage.forums.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumCategory $category)
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
    public function update(Request $request, ForumCategory $category)
    {
        $this->validate($request, [
            'name' => 'required|max:30|unique:forums_categories,name,' . $category->id,
        ]);

        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Успешно променихте категорията!');
        return redirect()->route('manage.categories.index');
    }

}
