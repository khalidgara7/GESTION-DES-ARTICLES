<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_comment');
    }
}
