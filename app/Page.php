<?php

namespace Boye;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function pageView()
    {
    	return $this->hasMany(PageView::class);
    }
}
