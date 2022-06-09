<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelBlog extends Model
{
    use SoftDeletes;
    protected $table = 'blog';
    protected $guarted = [
        'id', 
        'created_at', 
        'update_at'
    ];
    protected $fillable = [
        'name',
        'description',
        'image_id'
    ];
    protected $hidden;

    public function createdImage()
    {
        return $this->belongsTo(Blog::class, 'image_id', 'id');
    }

    public function createdUser()
    {
        return $this->hasOne('Api\Models\User', 'created_user_id', 'id');
    }
}
