<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Attribute extends Model
{
    use HasFactory;

    public $fillable = [
        "name",
        "description",
        "image",
    ];

    /**
     * The materials that belong to the attribute.
     */
    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }

    /**
     * Mutator for proparty made of name column
     *
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['property'] = Str::slug($value);
    }

    public function getPhotoAttribute()
    {
        if ($this->image) {
            return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
        }
        return null;
    }
}
