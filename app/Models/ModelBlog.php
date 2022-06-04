<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelBlog extends Model
{
    use SoftDeletes;
    protected $table = 'blog';
    protected $fillable = [
        'name',
        'description',
        'image'
    ];
    protected $hidden;
}
