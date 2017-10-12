<?php

namespace Boye;

use Illuminate\Database\Eloquent\Model;
use Boye\Support\FilterPaginateOrder;

class Page extends Model
{
	use FilterPaginateOrder;
	protected $filter = ['id'];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function pageView()
    {
    	return $this->hasMany(PageView::class);
    }
}
