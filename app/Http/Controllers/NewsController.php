<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;

use Illuminate\Http\Request;

class NewsController extends Controller
{

    private $news;

    public function __construct(News $news)
    {
        $this->news = $news;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $infoList = $this->news->orderBy('created_at', 'desc')->paginate(15);
        return view('info.index')->with(compact('infoList'));
    }


}
