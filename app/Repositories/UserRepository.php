<?php
namespace Boye\Repositories;
use Auth;
use Boye\User;
class UserRepository 
{
	use BaseRepository;
	protected $model;

	public function __construct(User $user)
	{
		$this->model = $user;
	}
}