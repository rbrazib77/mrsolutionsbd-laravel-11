<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityForCustomer extends Model
{
    protected $fillable = ['status','title','description','sort_order'];
}
