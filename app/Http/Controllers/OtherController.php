<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Other;
use App\Brand;
use Image;
use App\Photo;
use App\Type;

use Illuminate\Http\Request;

class OtherController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$others = Other::orderBy('id', 'desc')->paginate(10);

		return view('admin.others.index', compact('others'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$brands = Brand::lists('name','id')->all();

		return view('admin.others.create', compact('brands'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		
		// dd($input);
		switch ($request->input("type_id")) {
			case '3':
				$input['id'] = uniqid('a', false);
				break;
			case '4':
				$input['id'] = uniqid('s', false);
				break;
			case '5':
				$input['id'] = uniqid('p', false);
				break;
		}
		$other = Other::create($input);
		// dd($request->all());
		 if($files = $request->file('photo_id'))
        {
          foreach($files as $file) {
            $photo = new Photo;
            $extension = $file->getClientOriginalExtension();
             //Creating sha1 version of the filename in case of conflicts
            $sha1 = sha1($file->getClientOriginalName());
            $filename = date('Y-m-d-h-i-s').".".$sha1.".".$extension;
            $path = public_path('images/computers/' . $filename);
            // Using Intervention/image package here to resize the photos
            $img = Image::make($file->getRealPath())->resize(600, 319, 
            		function ($c) {
					    $c->aspectRatio();
					    $c->upsize();
					}
            	)->resizeCanvas(600, 319, 'center', false, array(255, 255, 255, 0))->save($path);
            $img->destroy();	
            $photo->path = $filename;
            $photo->save();
            $other->photos()->attach($photo->id);
            }
        }

		return redirect()->route('admin.others.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$other = Other::findOrFail($id);

		return view('admin.others.show', compact('other'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$other = Other::findOrFail($id);
		$types = Type::lists('name','id')->all();

		return view('admin.others.edit', compact('other', 'types'));
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
		$other = Other::findOrFail($id);

		$other->name = $request->input("name");
        $other->qtyinstock = $request->input("qtyinstock");
        $other->sellprice = $request->input("sellprice");
        $other->type_id = $request->input("type_id");
        $other->category_id = $request->input("category_id");
        $other->brand_id = $request->input("brand_id");
        $other->model_id = $request->input("model_id");

		$other->save();

		return redirect()->route('admin.others.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$other = Other::findOrFail($id);
		$other->delete();

		return redirect()->route('admin.others.index')->with('message', 'Item deleted successfully.');
	}

}
