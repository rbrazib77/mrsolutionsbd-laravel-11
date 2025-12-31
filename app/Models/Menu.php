<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title','url','parent_id','order_by','status'
    ];

     // Parent এর সকল child, status ignore না করে সব দেখাবে
    public function children(){
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order_by');
    }

    // শুধু active child দেখানোর জন্য
    public function childrenActive(){
        return $this->hasMany(Menu::class, 'parent_id')->where('status',1)->orderBy('order_by');
    }
}
