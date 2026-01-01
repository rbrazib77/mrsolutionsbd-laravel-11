<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSectionTitle extends Model
{
  

    protected $fillable = [
        'page_name',
        'section_name',
        'title',
        'status',
    ];
}
