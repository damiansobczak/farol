<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisationSEO extends Model
{
	use HasFactory;
	protected $fillable = [
		'title',
		'description',
		'ogTitle',
		'ogDesc',
		'ogImage',
		'realisationId',
	];
}
