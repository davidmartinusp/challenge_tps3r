<?php

namespace App\Http\Controllers\Api;

use App\Models\ModelBlog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;

class BlogController extends Controller
{
    public function index()
    {
        //get posts
        //$blog = ModelBlog::latest()->paginate(10);

        //return collection of posts as a resource
        //return new blogResource(true, 'List Data Blog', $blog);
    }
}
