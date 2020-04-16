<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Conversation extends Model
{
    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
