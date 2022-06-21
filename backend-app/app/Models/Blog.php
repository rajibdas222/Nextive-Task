<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
    ];

    public function post_categories(){
        return $this->belongsTo(BlogCategories::class,'blog_categories_id','id');
    }
}
