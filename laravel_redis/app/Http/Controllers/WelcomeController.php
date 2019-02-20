<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;

class WelcomeController extends Controller {

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
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $storage = Redis::Connection();

		// $popular = $storage->zRevRange('articleViews', 0, -1);

		// foreach ($popular as $value) {
			// $id = str_replace('article:', '', $value);
			// echo "Article " . $id . " is popular" . "<br>";
		// }
		return view('home');
	}

}
