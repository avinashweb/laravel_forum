<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'category_name', 'category_slug'];

    public function ask_question(){
    	return $this->hasMany(AskQuestion::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
