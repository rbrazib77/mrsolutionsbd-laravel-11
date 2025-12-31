<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
     protected $fillable = [
        'heading',
        'content',
        'status',
        'sort_order'
    ];
}
