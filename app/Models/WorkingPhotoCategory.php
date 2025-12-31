<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingPhotoCategory extends Model
{
     protected $fillable = ['name', 'slug', 'sort_order', 'status'];
}
