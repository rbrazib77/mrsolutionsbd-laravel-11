<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingVideo extends Model
{
     protected $fillable = ['title','youtube_url','thumbnail','status','sort_order'];
}
