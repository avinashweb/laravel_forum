<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	protected $fillable = ['user_id', 'ask_question_id', 'answer', 'vote'];

    public function question(){
    	return $this->belongsTo(AskQuestion::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function comment(){
    	return $this->hasMany(Comment::class);
    }
    
}
