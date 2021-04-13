<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use Auth;
use Illuminate\Support\Facades\Crypt;

class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // $comments = $article->comments()->whereNull('parent_id')->paginate(10);

        $relatedArticles = Article::where('category_id', '=', $article->category->id)
            ->where('id', '!=', $article->id)
            ->take(6)
            ->get();
        $expiresAt = now()->addHours(3);
        views($article)->cooldown($expiresAt)->record();
        return view('articles.show')
            ->withArticle($article)
            ->withRelatedArticles($relatedArticles);
            // ->withComments($comments);
    }

    public function comment(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:255'
        ]);

        $user = Auth::user();
        $body = $request->body;
        $article = Article::find(Crypt::decrypt($request->article_id));

        if ($request->parent_id) {
            $parentComment = $article->comments->find(Crypt::decrypt($request->parent_id));
            $article->comment([
                'title' => '',
                'body' => $body
            ], $user, $parentComment);
        } else {
            $article->comment([
                'title' => '',
                'body' => $body
            ], $user);
        }

        return redirect()->route('articles.show', $article->slug);
    }
}
