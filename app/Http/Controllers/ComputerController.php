<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ComputerRequest;
use App\Photo;
use App\Computer;
use App\Brand;
use App\Spec;
use Illuminate\Support\Facades\Input;
// use Illuminate\Http\Request;
use Image;

class ComputerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$computers = Computer::orderBy('id', 'desc')->paginate(10);

		// return $computers->all();
		return view('admin.computers.index', compact('computers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    $computers = Computer::orderBy('id', 'desc')->paginate(10);
		$brands = Brand::lists('name','id')->all();
		$specs = Spec::all();

		return view('admin.computers.create', compact('computers','brands', 'specs'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function  store(ComputerRequest $request)
	{
  
		$input = $request->all();
		$input['id'] = uniqid('c', false);
		
		$computer = Computer::create($input);
		// $specs = Spec::all();
		// $arr = [];
		// foreach ($specs as $spec) {
		// 	$arr[] = $spec->name;
		// }
		// $spec_desc = array_combine($arr, $request->input('description'));
		// dd($spec_desc);
		// dd($input);
		// if (is_array($request->input('description'))) {
		// 	foreach ($spec_desc as $key => $desc) {
		// 		if(!empty($desc)){
		// 			$spec = Spec::where('name','=',$key)->first();
		// 			// dd($spec);
		// 			$computer->specs()->save($spec, ['description'=> $desc]); 
		// 		}
		// 	}
		// }
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
            $computer->photos()->attach($photo->id);
            }
        }
        // Computer::create($input);
        // Session::flash('create_user','The user has been created!');
        flash()->overlay('Computer has been created successfully','CREATE USER');

        return redirect()->back();

		// return redirect()->route('computers.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$computer = Computer::findOrFail($id);
    $specs = Spec::lists('name','id')->all();

		return view('admin.computers.show', compact('computer','specs'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$computer = Computer::findOrFail($id);
		$brands = Brand::lists('name','id')->all();

		return view('admin.computers.edit', compact('computer', 'brands'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(ComputerRequest $request, $id)
	{
		$computer = Computer::findOrFail($id);
		$input = $request->except(['photo_id']);
		// dd($input);
        // $computer->photo_id = $request->input("photo_id");
        // if($file = $request->file('photo_id')){
        //     $name = time() . $file->getClientOriginalName();
        //     $file->move('images',$name);
        //     $photo = Photo::create(['path'=>$name]);
        //     $input['photo_id'] = $photo->id;
        // }
        
		$computer->update($input);

		return redirect()->route('admin.computers.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$computer = Computer::findOrFail($id);
		// $computer->delete();
			foreach ($computer->photos as $filename) {
      	unlink(public_path() . $filename->path);
    	  $filename->delete();
			// }
			}
			// dd($arr);
		// );
		$computer->photos()->detach();
		$computer->delete();
		$computer->photos()->sync([]);
		// $relatedIds = $this->photos()->lists('table.id');
		// Related::whereIn($relatedIds)->delete();
		return redirect()->route('admin.computers.index')->with('message', 'Item deleted successfully.');
	}

	
}
