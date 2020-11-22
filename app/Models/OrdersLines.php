<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersLines extends Model
{
	use HasFactory;
	protected $fillable = [
		'productId',
		'orderId',
		'quantity',
		'singlePrice',
		'promotionPrice',
	];
}
