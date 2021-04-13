<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderByDesc('id')->paginate(20);
        return view('tags.index')->withTags($tags);
    }

    public function show(Tag $tag)
    {
        $articles = $tag->articles()->paginate(15);
        return view('tags.show')
            ->withTag($tag)
            ->withArticles($articles);
    }
}
