<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurMission extends Model
{
    protected $fillable = ['small_title','title','description','top_left_image','top_right_image','bottom_image','status',
    ];
}
