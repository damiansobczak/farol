<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
