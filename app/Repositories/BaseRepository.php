<?php
namespace Boye\Repositories;

trait BaseRepository
{
	public function getNumber()
	{
		return $this->model->count();
	}
}