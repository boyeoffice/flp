<?php
namespace Boye\Repositories;
use Boye\Visitor;

class VisitorRepository
{
	use BaseRepository;
	protected $model;

	public function __construct(Visitor $visitor)
	{
		$this->model = $visitor->with('post');
	}
}