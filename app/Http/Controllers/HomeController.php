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
        $judul = "Saga App";
        $categories = Category::all();
        if (!$slug_category) {
            $articles = Article::with('category', 'author')->orderByDesc('created_at')->limit(5)->get();
        } else {
            $category = Category::where('slug', $slug_category)->first();
            if (!$category) {
                abort(404);
            }
            $judul = "Showing " . $category->name . " articles";
            $articles = Article::with('category', 'author')->whereRelation('category', 'slug', $slug_category)->get();
        }
        return view('category', compact('articles', 'categories', 'judul'));
    }

    public function detail_article($slug_category, $slug_article)
    {
        $categories = Category::all();
        $article = Article::with('category', 'author')->whereRelation('category', 'slug', $slug_category)->where('slug', $slug_article)->first();
        if (!$article) {
            abort(404);
        }
        $judul = $article->title;
        return view('detail_article', compact('article', 'judul', 'categories'));
    }

}
