<?php 
namespace Boye\Repositories;
use Boye\Post;

class PostRepository
{
	use BaseRepository;
	protected $model;
	protected $visitor;
	public function __construct(Post $post, VisitorRepository $visitor)
	{
		$this->model = $post;
		$this->visitor = $visitor;
	}
}