<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Role extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsToMany('App\Models\User');
    }
}
