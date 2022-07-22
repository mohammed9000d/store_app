<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getDeletedAtAttribute($value) {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getImageUrlAttribute() {
        if(!$this->image) {
            return asset('images/placeholder.png');
        }

        if(stripos($this->image, 'http') === 0) {
            return $this->image;
        }

        return asset('uploads/' . $this->image);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value ? 'Active' : 'Inactive';
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = Str::title($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setImageAttribute($value)
    {
        if ($value == null) {
            $this->attributes['image'] = null;
            return;
        }
        $name = time(). '.' . $value->getClientOriginalExtension();
        $this->attributes['image'] = $value->storeAs('/', $name, ['disk' => 'uploads']);
    }

    public function scopeActive($query) {
        return $query->where('status', '=', 'Active');
    }
}
