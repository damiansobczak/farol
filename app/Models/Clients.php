<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
	use HasFactory;
	protected $fillable = [
		'firstName',
		'lastName',
		'company',
		'phone',
		'email',
	];
	protected $hidden = [
		'password',
		'remember_token',
	];
	protected $casts = [
		'email_verified_at' => 'datetime',
	];
}
