<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlogs()
    {
        $blogs = Blog::orderby('created_at', 'DESC')
                ->where('deleted_at', null)
                ->with('tags', 'category')->get();
        return response()->json(
        [
            'error' => false, 
            'blogs' => $blogs
        ]);
    }
    
    public function show($slug)
    {
        // blogs according to your slug and its related tables
        $blogs = Blog::where('slug', $slug)
                ->where('deleted_at', null)
                ->with('category', 'tags')
                ->first();
        
        //related blogs
        $relatedblogs = Blog::where('slug', $slug)->pluck('category_id');
        $relatedblogs = Blog::where('category_id', $relatedblogs)
                        ->where('deleted_at', null)
                        ->orderby('created_at', 'DESC')
                        ->with('category', 'tags')->get();

        return response()->json(
        [
            'error'         => false,
            'blogs'         => $blogs,
            'relatedblogs'  => $relatedblogs
        ]);
    }
}
