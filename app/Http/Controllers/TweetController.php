<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Alert;
use Illuminate\Support\Facades\Session;
use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tweets = Tweet::orderBy('id', 'desc')->paginate(10);

		return view('tweets.index', compact('tweets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tweets.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$tweet = new Tweet();

		$tweet->title = $request->input("title");
        $tweet->body = $request->input("body");

		$tweet->save();

		// flash()->success('Your tweet has been created!');
		flash()->overlay('Your tweet has been successfully created!','info', 'Good Job!');
		return redirect()->route('tweets.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tweet = Tweet::findOrFail($id);

		return view('tweets.show', compact('tweet'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tweet = Tweet::findOrFail($id);

		return view('tweets.edit', compact('tweet'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$tweet = Tweet::findOrFail($id);

		$tweet->title = $request->input("title");
        $tweet->body = $request->input("body");

		$tweet->save();

		return redirect()->route('tweets.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		

		$tweet = Tweet::findOrFail($id);

		

		$tweet->delete();

		alert()->warning('Warning Message', 'You are sure, You wnna delete this?')->persistent("OK");;
		// alert()->warning('Warning Message', 'You are sure, You wnna delete this?')->autoclose(3000);
		// alert()->warning(trans('surveys.noresponses'), $results['status'])->persistent("OK");
		// Session::flash('delete','The user has been deleted!');
		// flash()->overlay('You have just deleted the data!','DELETE');
		// flash('Attention! You have deleted the row.', 'danger')->important();
		
		return redirect()->route('tweets.index')->with('message', 'Item deleted successfully.');
	}

	
}

