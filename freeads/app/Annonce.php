<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    //

   public  $fillable = ['id_user','titre', 'description','required', 'prix', 'photo'];
}
