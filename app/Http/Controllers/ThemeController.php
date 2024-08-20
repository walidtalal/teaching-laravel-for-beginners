<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(4);
        $sliderBlogs = Blog::latest()->take(5)->get();
        return view('theme.index', compact('blogs', 'sliderBlogs'));
    }

        public function category($id)
    {
        $categoryName = DB::table('categories')->where('id', $id)->first()->name;
        $blogs = Blog::where('category_id', $id)->paginate(8);
//        $categoryName = Category::find($id)->name;

            return view('theme.category', compact('blogs', 'categoryName'));
    }

    public function contact()
    {
        return view('theme.contact');
    }

}
