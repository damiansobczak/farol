<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Attributes extends Model
{
	use HasFactory;
	protected $fillable = [
		'attributeType',
		'name',
		'image',
		'imageAlt',
		'minValue',
		'maxValue',
	];
	public function attrType()
	{
		return $this->belongsTo('App\Models\AttributeType', 'attributeType');
	}
	public function getImgAttribute()
	{
		return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
	}
}
