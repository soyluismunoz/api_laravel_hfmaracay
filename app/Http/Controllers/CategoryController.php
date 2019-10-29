<?php

namespace App\Http\Controllers;

use App\Category;
use App\Blog;
use App\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::orderby('created_at', 'DESC')
                    ->where('deleted_at', null)->get();
        return $categories;
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->pluck('id')->first();

        return[
            'category' => Category::where('slug', $slug)->first(),
            'blogs'    => Blog::where('category_id', $category)
                        ->orderBy('created_at', 'DESC')
                        ->where('deleted_at', null)
                        ->with('category', 'tags')->get()
        ];
    }
}
