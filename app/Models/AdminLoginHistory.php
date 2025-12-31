<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminLoginHistory extends Model
{
     protected $fillable = [
        'user_id',       
        'role',    
        'ip_address',
        'user_agent',
        'browser',
        'device',
        'logged_in_at',
        'logged_out_at',
    ];

     public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
