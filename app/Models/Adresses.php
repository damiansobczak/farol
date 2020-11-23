<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresses extends Model
{
    use HasFactory;
    protected $fillable = [
    	'city',
		'postcode',
		'street',
		'building',
		'appartment',
		'isDefault',
		'clientsId',
    ];
}
