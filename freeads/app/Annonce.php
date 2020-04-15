<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    //

   public  $fillable = ['user_id','titre', 'description', 'prix', 'photo','couleur','ville','gouts'];
}
