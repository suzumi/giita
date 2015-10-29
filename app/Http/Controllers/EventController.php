<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EventController extends Controller {


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
        $events = [
            ['id' => 'dkaokdsfam3230dk2d2', 'title' => 'Haskell勉強会', 'event_date' => '2015-10-25'],
            ['id' => 'dkaokdsfam3230dk2d2', 'title' => 'Scala勉強会', 'event_date' => '2015-10-25'],
            ['id' => 'dkaokdsfam3230dk2d2', 'title' => 'PHP勉強会', 'event_date' => '2015-10-25'],
            ['id' => 'dkaokdsfam3230dk2d2', 'title' => 'Ruby勉強会', 'event_date' => '2015-10-25'],
            ['id' => 'dkaokdsfam3230dk2d2', 'title' => 'Haskell勉強会', 'event_date' => '2015-10-25'],
            ['id' => 'dkaokdsfam3230dk2d2', 'title' => 'Scala勉強会', 'event_date' => '2015-10-25'],
            ['id' => 'dkaokdsfam3230dk2d2', 'title' => 'PHP勉強会', 'event_date' => '2015-10-25'],
            ['id' => 'dkaokdsfam3230dk2d2', 'title' => 'Ruby勉強会', 'event_date' => '2015-10-25'],
        ];
        return view('event.index')->with(compact('events'));
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
	public function store()
	{
		//
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
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
