<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

   public  $fillable = ['content','media','sender_id','receiver_id'];


   public function user()
   {
       return $this->belongsTo('App\User');
   }

   public function conversation()
   {
       return $this->belongsTo('App\Conversation');
   }

}
