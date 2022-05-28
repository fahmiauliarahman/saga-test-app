<?php

namespace App\Http\Controllers\Setting;

use App\Helpers\Util;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "My Article";
        $articles = Article::with('category')->where('user_id', auth()->user()->id)->get();
        $categories = Category::all();
        return view('settings.article.index', compact('articles', 'judul', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'article_content' => 'required',
            'category_id' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('banner');
        $filename = uniqid("img_") . "_" . time() . '.' . $file->getClientOriginalExtension();
        File::ensureDirectoryExists(public_path('/img/normal/'));
        File::ensureDirectoryExists(public_path('/img/thumbs/'));
        $file->move(public_path('img/normal'), $filename);

        $img = Image::make(public_path('img/normal/' . $filename));
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save('img/thumbs/' . $filename);

        Article::create([
            'title' => $request->title,
            'content' => $request->article_content,
            'category_id' => $request->category_id,
            'banner' => $filename,
            'user_id' => auth()->user()->id,
            'slug' => Util::slugify($request->title, 'article')['data']['slug'],
        ]);

        return redirect()->back()->with('success', 'Article Has Been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'article_content' => 'required',
            'category_id' => 'required',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article = Article::find($id);

        $article->title = $request->title;
        $article->content = $request->article_content;
        $article->category_id = $request->category_id;
        $article->slug = Util::slugify($request->title, 'article')['data']['slug'];

        if ($request->hasFile('banner')) {
            if ($article->banner) {
                if ($article->banner !== 'default.png') {
                    unlink(public_path('/img/normal/' . $article->banner));
                    unlink(public_path('/img/thumbs/' . $article->banner));
                }
            }
            $file = $request->file('banner');
            $filename = uniqid("img_") . "_" . time() . '.' . $file->getClientOriginalExtension();
            File::ensureDirectoryExists(public_path('/img/normal/'));
            File::ensureDirectoryExists(public_path('/img/thumbs/'));
            $file->move(public_path('img/normal'), $filename);
            $article->banner = $filename;

            $img = Image::make(public_path('img/normal/' . $filename));
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save('img/thumbs/' . $filename);
        }

        $article->save();
        return redirect()->back()->with('success', 'Article Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id', $id)->first();
        if ($article->banner !== 'default.png') {
            unlink(public_path('/img/normal/' . $article->banner));
            unlink(public_path('/img/thumbs/' . $article->banner));
        }
        $article->delete();
    }
}
