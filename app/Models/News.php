<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'main_image',
        'image_2',
        'image_3',
        'image_4',
        'status',
        'published_at',
        'read_time'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getPublishedStatusAttribute()
    {
        return $this->status === 'published' && $this->published_at && $this->published_at->isPast();
    }

    public function getAllImagesAttribute()
    {
        $images = [];
        if ($this->main_image) $images[] = $this->main_image;
        if ($this->image_2) $images[] = $this->image_2;
        if ($this->image_3) $images[] = $this->image_3;
        if ($this->image_4) $images[] = $this->image_4;
        return $images;
    }

    public function getAdditionalImagesAttribute()
    {
        $images = [];
        if ($this->image_2) $images[] = $this->image_2;
        if ($this->image_3) $images[] = $this->image_3;
        if ($this->image_4) $images[] = $this->image_4;
        return $images;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
