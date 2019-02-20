<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Redis;
use App\Contracts\PostContract as PostContract;

class BlogController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(PostContract $post)
	{
		$this->post = $post;
		$this->middleware('guest');
	}

	/**
	 * Show main blog with posts
	 * 
	 * @return Response
	 */
	public function showBlog()
	{
		$posts = $this->post->fetchAll();

		$tags = Redis::sRandMember('article:tags', 4);

		return view('home')->with([ 'posts' => $posts, 'tags' => $tags ]);
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function showArticle( $id )
	{
		// Fetch post
		$article = $this->post->fetch($id);

		if ( $article )
		{

			// Increment article views
			$views = Redis::pipeline(function ($pipe) use ($id)
			{
				$pipe->zIncrBy('articleViews', 1, 'article:' . $id);
				$pipe->incr('article:' . $id . ':views');
			});

			// Get number of views from resulting array of Redis::pipeline
			$views = $views['1'];

			// Get article's tags
			$tags = Redis::sMembers('article:' . $id . ':tags');

			return view('blog.article')->with([ 'article' => $article, 'views' => $views, 'tags' => $tags ]);

		}

		return view('errors.404');

	}

	/**
	 * Show posts by requested filter
	 * 
	 * @param  String $tag 
	 * @return Response     
	 */
	public function showFilteredArticles( $tag )
	{
		// Array of post IDs matching the tag filter
		$postIDs = Redis::zRange('article:tag:' . $tag, 0, -1);

		// Fetch posts
		$posts = $this->post->filterFetch($postIDs);

		// Return more random tags
		// We can ensure we don't repeat the same tag by fetching +1 tag
		// and checking if it matches $tag 
		$tags = Redis::sRandMember('article:tags', 4);

		return view('home')->with([ 'posts' => $posts, 'tags' => $tags ]);
	}

}
