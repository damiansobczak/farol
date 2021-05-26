<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'show',
    ];

    /**
     * Get the materials for the collection.
     */
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
    /**
     * Get the products of the collection.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
