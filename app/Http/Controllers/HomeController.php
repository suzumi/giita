<?php namespace App\Http\Controllers;

use App\Snippet;
use App\User;
use App\News;

class HomeController extends Controller {

	private $news;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(News $news)
	{
		$this->news = $news;
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$snippets = Snippet::orderBy('created_at', 'desc')->paginate(15);
		$newsPickup = $this->news->orderBy('created_at', 'desc')->first();
		$redis = \Redis::connection();
		$unsubmittedUsers = $redis->lrange('unsubmittedUsers', 0, -1);
//		$snippet = Snippet::first();
//		dd($snippet->tags->toArray());
//        $snippet = new Snippet();
//        $snippets = $snippet->getTags();
//        dd($snippet);
//        dd($snippet->getTags());
        return view('home')->with(compact('snippets', 'newsPickup', 'unsubmittedUsers'));
	}

}
