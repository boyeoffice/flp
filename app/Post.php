<?php

namespace Boye;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
    	return $this->belongTo(User::class);
    }
    public function visits()
    {
    	return $this->hasMany(Visitor::class);
    }
}
