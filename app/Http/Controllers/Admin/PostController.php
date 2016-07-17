<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Admin/Post;
use Illuminate\Http\Request;

class Admin/PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$admin/_posts = Admin/Post::orderBy('id', 'desc')->paginate(10);

		return view('admin/_posts.index', compact('admin/_posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/_posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$admin/_post = new Admin/Post();

		$admin/_post->user_id = $request->input("user_id");
        $admin/_post->category_id = $request->input("category_id");
        $admin/_post->photo_id = $request->input("photo_id");
        $admin/_post->title = $request->input("title");
        $admin/_post->body = $request->input("body");

		$admin/_post->save();

		return redirect()->route('admin.admin/_posts.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$admin/_post = Admin/Post::findOrFail($id);

		return view('admin/_posts.show', compact('admin/_post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$admin/_post = Admin/Post::findOrFail($id);

		return view('admin/_posts.edit', compact('admin/_post'));
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
		$admin/_post = Admin/Post::findOrFail($id);

		$admin/_post->user_id = $request->input("user_id");
        $admin/_post->category_id = $request->input("category_id");
        $admin/_post->photo_id = $request->input("photo_id");
        $admin/_post->title = $request->input("title");
        $admin/_post->body = $request->input("body");

		$admin/_post->save();

		return redirect()->route('admin.admin/_posts.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$admin/_post = Admin/Post::findOrFail($id);
		$admin/_post->delete();

		return redirect()->route('admin.admin/_posts.index')->with('message', 'Item deleted successfully.');
	}

}
