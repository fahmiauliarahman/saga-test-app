<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $judul = 'Dashboard';
        return view('dashboard', compact('judul'));
    }

    public function homepage($slug_category = "")
    {
        $categories = Category::all();
        if (!$slug_category) {
            $articles = Article::with('category', 'author')->orderByDesc('created_at')->limit(5)->get();
        } else {
            $category = Category::where('slug', $slug_category)->first();
            if (!$category) {
                abort(404);
            }
            $articles = Article::with('category', 'author')->whereRelation('category', 'slug', $slug_category)->get();
        }
        return view('category', compact('articles', 'categories'));
    }

    public function detail_article($slug_category, $slug_article)
    {
        $article = Article::with('category', 'author')->whereRelation('category', 'slug', $slug_category)->where('slug', $slug_article)->first();
        if (!$article) {
            abort(404);
        }
        dd($article);
        return view('detail_article', compact('article'));
    }

}
