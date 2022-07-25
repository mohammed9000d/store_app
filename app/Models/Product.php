<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description',
        'image',
        'price',
        'quantity',
        'status',
    ];

    protected $appends = ['image_url'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute() {
        if(!$this->image) {
            return asset('images/placeholder.png');
        }

        if(stripos($this->image, 'http') === 0) {
            return $this->image;
        }

        return asset('uploads' . $this->image);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = Str::title($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeActive($query) {
        return $query->where('status', 'Active');
    }
}
