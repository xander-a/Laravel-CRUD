<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public $primaryKey = 'id';  
    public $timestamps = true;
    protected $fillable = ['title', 'slug', 'short_description', 'full_content', 'author', 'category', 'created_at', 'updated_at'];

    protected $guarded= array();
}
