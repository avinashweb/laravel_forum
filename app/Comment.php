<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'answer_id', 'question_id', 'comment'];

    public function answer(){
    	return $this->belongsTo(Answer::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
