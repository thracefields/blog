<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use CyrildeWit\EloquentViewable\Support\Period;

use App\Article;
use App\Category;
use App\Tag;
use App\User;

use Carbon\Carbon;

class PagesController extends Controller
{
    public function getWelcome()
    {
        $dates = Article::published()->latest('published_at')
            ->take(8)
            ->get()
            ->groupBy(function($item) {
                return $item->published_at->translatedFormat('j F');
            });

        $categories = Category::withCount('articles')->latest('articles_count')->take(10)->get();
        $tags = Tag::withCount('articles')->latest('articles_count')->take(10)->get();
        $featuredArticles = Article::published()->orderByViews('desc', Period::pastDays(3))->take(6)->get();
        $latestArticles = Article::published()->latest('created_at')->take(12)->get();
        return view('welcome')
            ->withDates($dates)
            ->withFeaturedArticles($featuredArticles)
            ->withLatestArticles($latestArticles)
            ->withCategories($categories)
            ->withTags($tags);
    }

    public function getSearch(Request $request)
    {
        $this->validate($request, [
            'q' => 'required|min:3'
        ]);

        $q = $request->q;
        $articles = Article::published()->where('title', 'LIKE', '%' . $q . '%')->paginate(10);
        return view('search')->withArticles($articles);
    }

}
