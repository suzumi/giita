<?php namespace App\Http\Controllers;

use App\Snippet;
use App\User;
use App\News;

class HomeController extends Controller {

	private $news;
    private $sidebar;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(News $news)
	{
		$this->news = $news;
        $this->sidebar = 'feed';
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $sidebar = $this->sidebar;
		$snippets = Snippet::orderBy('created_at', 'desc')->paginate(15);
		$newsPickup = $this->news->orderBy('created_at', 'desc')->first();
//		$redis = \Redis::connection();
//		$unsubmittedUsers = $redis->lrange('unsubmittedUsers', 0, -1);
//        if (isset($snippets) && isset($newsPickup)) {
            return view('home')->with(compact('snippets', 'newsPickup', 'sidebar'));
//        } else {
//            list($snippets, $newsPickup) = array([],[]);
//            return view('home')->with(compact('snippets', 'newsPickup'));
//        }

	}

}
