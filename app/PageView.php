<?php

namespace Boye;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    public function page()
    {
    	return $this->belongTo(Page::class);
    }
}
