<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

use App\Tag;

class TagController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')->paginate(10);
        return view('manage.tags.index')->withTags($tags);
    }

    public function create()
    {
        return view('manage.tags.create');
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
            'name' => 'required|max:30'
        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'Успешно добавихте нов таг!');

        return redirect()->route('manage.tags.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('manage.tags.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name' => 'required|max:30'
        ]);

        $tag->name = $request->name;
        $tag->save();
        Session::flash('success', 'Успешно редактирахте тага!');
        return redirect()->route('manage.tags.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->articles()->detach();
        $tag->delete();
        Session::flash('success', 'Тагът беше изтрит успешно!');
        return redirect()->route('manage.tags.index');
    }
}
