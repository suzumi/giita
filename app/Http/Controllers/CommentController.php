<?php namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentController extends Controller {

    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
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
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
        $input['user_id'] = \Auth::user()->id;
        $this->comment->fill($input);
        $this->comment->save();

        return redirect()->to("/snippet/{$input['snippet_id']}");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $input = $request->all();
        $this->comment->where('id', $id)->update(['comment' => $input['comment']]);

        return redirect()->to("/snippet/{$input['snippet_id']}");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
        $input = $request->all();
        $data = $this->comment->find($input['comment_id']);
        $data->delete();

        return redirect()->to("/snippet/{$input['snippet_id']}");
	}

}
