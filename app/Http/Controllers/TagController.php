<?php

namespace App\Http\Controllers;

use App\Category;
use App\Blog;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getTags()
    {
        $tags = Tag::orderby('created_at', 'DESC')
                    ->where('deleted_at', null)->get();
        return $tags;
    }

    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->where('deleted_at', null)->first();

        $blogs = Blog::whereHas('tags', function($query) use($slug){
            $query->where('slug', $slug);
        })->orderBy('id','DESC')
        ->with('category', 'tags')->get();

        return [
            'tag'       => $tag,
            'blogs'     => $blogs,
        ];
    }
}
