<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category extends Model
{
	use HasFactory;
	protected $fillable = [
		'image',
		'imageAlt',
		'name',
		'productId',
	];
	public function getImgAttribute()
	{
		return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
	}
}
