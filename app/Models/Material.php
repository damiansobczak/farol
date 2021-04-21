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
        'collection_id',
        'property_gummed',
        'property_blackout',
        'property_onecolor',
        'property_patterned',
        'property_washing',
        'property_flame_retardant',
        'property_teflon',
        'property_pvc_free',
        'property_office',
        'property_rebound',
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
     * The materials that belong to the attribute.
     */
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function hasAttribute($id)
    {
        return $this->belongsToMany(Attribute::class)->firstWhere('attribute_id', $id) ? true : false;
    }

    /**
     * Accessor for product images
     *
     * @return Storage instance
     */
    public function getImgAttribute()
    {
        if ($this->image) {
            return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
        }
        return null;
    }
}
