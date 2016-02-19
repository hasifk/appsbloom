<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     *
    **/ 
      protected $table = 'feedback';
      public function feedback_reply()
    {
        return $this->hasMany('App\Model\FeedbackReply','feedback_id','id');
    }
}