<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class BrandController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$brands = Brand::orderBy('id', 'desc')->paginate(10);

		return view('admin.brands.index', compact('brands'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return view('admin.brands.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$brand = new Brand();

		$brand->name = $request->input("name");
    $brand->description = $request->input("description");

		$brand->save();

		return redirect()->route('admin.brands.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$brand = Brand::findOrFail($id);

		return view('admin.brands.show', compact('brand'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$brand = Brand::findOrFail($id);

		return view('admin.brands.edit', compact('brand'));
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
		$brand = Brand::findOrFail($id);

		$brand->name = $request->input("name");
    $brand->description = $request->input("description");

		$brand->save();

		return redirect()->route('admin.brands.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$brand = Brand::findOrFail($id);
		$brand->delete();

		return redirect()->route('admin.brands.index')->with('message', 'Item deleted successfully.');
	}

}
