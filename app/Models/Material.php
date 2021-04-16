<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Material extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'transmission',
        'absorption',
        'reflection',
        'image',
        'imageAlt',
        'color_id',
        'collection_id'
    ];

    /**
     * Get the color that owns the material.
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Get the collection that owns the material.
     */
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    /**
     * Accessor for product images
     *
     * @return Storage instance
     */
    public function getImgAttribute()
    {
        return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
    }
}
