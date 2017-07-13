<?php

namespace Boye;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function user()
    {
    	return $this->belongTo(User::class);
    }
}
