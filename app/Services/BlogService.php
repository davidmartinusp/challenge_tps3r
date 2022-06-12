<?php

namespace App\Services;

use App\Models\ModelBlog;

class BlogService
{
    public function getData()
    {
        return ModelBlog::with('createdUser')->get();
    }
    
    public function find($blog_id)
    {
        return ModelBlog::with('createdUser')->find($blog_id);
    }

    public function create($data = [])
    {
        return ModelBlog::create([
            'title' => $data['name'],
            'description' => $data['description'],
            'created_user_id' => $data['created_user_id'],
            'image_id' => $data['image_id']->hashName(),
        ]);
    }

    public function delete($id)
    {
        $blogs = ModelBlog::find($id);
        $blogs->delete();
    }	

}