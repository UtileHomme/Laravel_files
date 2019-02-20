<?php namespace App\Http\Controllers;

use Request;
use Redis;
use App\Contracts\PostContract as PostContract;
use App\Services\PostRegistrar as PostRegistrar;

class AdminController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(PostContract $post, PostRegistrar $postRegistrar)
	{
		$this->post = $post;
		$this->postRegistrar = $postRegistrar;
		// $this->middleware('guest');
	}

	/**
	 * Give admin ability to add a post
	 *
	 * @return Response
	 */
	public function showAddPost()
	{

		return view('admin.articles');
	}

	/**
	 * Create the post from user inputs
	 * 
	 * @return Response
	 */
	public function doAddPost()
	{
		$userInput = array(
			'title' 	=> Request::input('title'), 
			'author' 	=> Request::input('author'),
			'tags' 		=> Request::input('tagging'),
			'content' 	=> Request::input('inputContent')
		);

		$validation = $this->postRegistrar->validator($userInput);

		if ( $validation )
		{
			$result = $this->postRegistrar->create($userInput);

			if ( $result )
			{
				// Do we have any tags to add?
				if ( $userInput['tags'] != '' )
				{

					// Strip commas and spaces in tags input
					$filteredTags = explode(', ', trim($userInput['tags']));

					foreach( $filteredTags as $tag )
					{
						// Add a sorted set to maintain article order
						// This could also be a regular set, with DB sort used instead
						Redis::zadd('article:tag:' . $tag, $result['id'], $result['id'] );
						// Create set of tags for sepcific article so we can retrieve them later
						Redis::sadd('article:' . $result['id'] . ':tags', $tag);
						// Add tag to master list of tags
						Redis::sadd('article:tags', $tag);
					}

				}

				return view('admin.articles')->with('message', 'Post successfully created');
			}

			return view('admin.articles')->with('message', 'Error. Validation did not pass');

		}

		return view('admin.articles');
	}
}
