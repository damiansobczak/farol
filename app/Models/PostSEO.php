<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSEO extends Model
{
	use HasFactory;
	protected $fillable = [
		'seoTitle',
		'seoDescription',
		'ogTitle',
		'ogDescription',
		'postId',
	];

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'postId');
    }
}
