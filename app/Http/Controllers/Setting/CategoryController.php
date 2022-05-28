<?php

namespace App\Http\Controllers\Setting;

use App\Helpers\Util;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $judul = "Categories";
        return view('settings.category.index', compact('categories', 'judul'));
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
            'name' => 'required|string|max:255',
        ]);

        $category = Category::firstOrCreate(['name' => $request->name], [
            'name' => $request->name,
            'slug' => Util::slugify($request->name, 'category')['data']['slug'],
        ]);

        return redirect()->back()->with('success', 'Category created successfully.');
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
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);
        Category::find($id)->update([
            'name' => $request->name,
            'slug' => Util::slugify($request->name, 'category')['data']['slug'],
        ]);

        return redirect()->back()->with('success', 'Category updated successfully.');
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
        Category::destroy($id);
    }
}
