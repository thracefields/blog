<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;
use Image;
use Storage;
use Purify;
use Auth;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Support\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('id')->paginate(26);
        $categories = Category::all();

        return view('manage.articles.index')
            ->withArticles($articles)
            ->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::paginate(15);
        $categories = Category::all();
        $tags = Tag::all();
        return view('manage.articles.create')->withArticles($articles)
            ->withCategories($categories)
            ->withTags($tags);
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
            'title' => 'required|max:100',
            'subtitle' => 'required',
            'content' => 'required',
            'featured_image' => 'nullable|mimes:jpeg,bmp,png',
            'publishing_options' => 'required',
            'publishing_date' => 'sometimes',
            'publishing_time' => 'sometimes'
        ]);

        $article = new Article;

        $article->title = $request->title;
        $article->subtitle = $request->subtitle;
        $article->content = Purify::clean($request->content);
        $article->category_id = $request->category;

        if($request->publishing_options === 'immediately') {
            $article->publishNow();
        } elseif($request->publishing_options === 'specific') {
            $dateTime = Carbon::createFromFormat('d/m/Y H:i', $request->publishing_date . $request->publishing_time);
            $article->publish($dateTime);
        }

        if ($request->hasFile('featured_image')) {
            $article->addMediaFromRequest('featured_image')->toMediaCollection('thumbs');
        }
        
        $article->save();

        $article->tags()->sync($request->tags, false);

        Session::flash('success', 'Успешно добавихте нова статия.');

        return redirect()->route('articles.show', $article->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('manage.articles.edit')->withArticle($article)
            ->withCategories($categories)
            ->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'subtitle' => 'required',
            'content' => 'required',
            'featured_image' => 'nullable|image'
        ]);

        $article->title = $request->title;
        $article->subtitle = $request->subtitle;
        $article->content = Purify::clean($request->content);

        $article->category_id = $request->category;

        if ($request->hasFile('featured_image')) {
            $article->addMediaFromRequest('featured_image')->toMediaCollection('thumbs');
        }

        $article->save();

        if (isset($request->tags)) {
            $article->tags()->sync(explode(',', $request->tags));
        } else {
            $article->tags()->sync([]);
        }

        Session::flash('success', 'Промените са запазени.');

        return redirect()->route('articles.show', $article->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        Session::flash('success', 'Успешно изтрихте статията.');
        return redirect()->route('manage.articles.index');
    }
}
