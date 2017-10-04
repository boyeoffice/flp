<?php

namespace Boye;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['post_id', 'country', 'ip'];
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
}
