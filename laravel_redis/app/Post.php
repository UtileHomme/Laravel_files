<?php namespace App;

use Cache;
use Redis;
use App\Contracts\PostContract as PostContract;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements PostContract {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blog_posts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'title', 'author', 'content'];

	/**
	 * Return all posts
	 * 
	 * @return Object 
	 */
	public function fetchAll()
	{
		$result = Cache::remember('blog_posts_cache', 1, function()
		{
			return $this->get();
		});

		return $result;
	}

	/**
	 * Return a specific post
	 * 
	 * @param  int $id post ID
	 * @return Object     
	 */
	public function fetch( $id )
	{
		return $this->where('id', $id)->first();
	}

	/**
	 * Get specific articles
	 * 
	 * @param  array $id post IDs
	 * @return object    posts
	 */
	public function filterFetch($id)
	{
		return $this->whereIn('id', $id)
		// ->orderBy('created_at', 'desc')
		->get();
	}

}
