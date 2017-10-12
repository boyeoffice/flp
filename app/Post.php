<?php

namespace Boye;
use Boye\Support\FilterPaginateOrder;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use FilterPaginateOrder;

	protected $filter = ['id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function visits()
    {
    	return $this->hasMany(Visitor::class);
    }
}
