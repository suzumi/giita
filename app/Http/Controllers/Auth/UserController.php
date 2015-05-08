<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Snippet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    const TAKE_SNIPPET_COUNT = 5;
    const TAKE_STOCK_COUNT = 5;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
//	public function create()
//	{
//		//
//	}

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $snippets = User::getSnippets($id, self::TAKE_SNIPPET_COUNT);
        $stocks = User::myStocks($id, self::TAKE_STOCK_COUNT);
//        dd($stocks);
//		$profIcon = \Storage::get('proficons/user1.jpg');

        return view('auth.mypage')->with(compact('user', 'snippets', 'stocks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * ストック一覧
     * @param $id
     * @return $this
     */
    public function stockList($id)
    {
        $user = User::find($id);
        $stocks = User::myStocks($id, null, true);
        return view('auth.stocks')->with(compact('user', 'stocks'));
    }

    /**
     * スニペット一覧
     * @param $id
     * @return $this
     */
    public function mySnippetList($id)
    {
        $user = User::find($id);
        $snippets = User::getSnippets($id, null, true);
        return view('auth.snippets')->with(compact('user', 'snippets'));
    }

}
