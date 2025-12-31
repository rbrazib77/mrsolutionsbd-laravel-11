<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingPhoto extends Model
{
    protected $fillable = ['title', 'image', 'category_id', 'sort_order', 'status'];

    public function category()
    {
        return $this->belongsTo(WorkingPhotoCategory::class, 'category_id');
    }
}
