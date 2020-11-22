<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisationGallery extends Model
{
	use HasFactory;
	protected $fillable = [
		'image',
		'imageAlt',
		'video',
		'realisationId',
	];
}
