<?php

class ImagesController extends BaseController {

	public $restful = true;

	public function getIndex() {
		return View::make('images.index')
			->with('title', 'Images')
			->with('images', \App\Models\Image::orderBy('created_at')->get());
	}

	public function getView($id) {
		return View::make('images.view')
			->with('title', 'Image View Page')
			->with('image', Image::find($id));
	}

	public function getNew() {
		return View::make('images.new')
			->with('title', 'Add New Image');
	}

	public function postCreate() {
		$validation = \App\Models\Image::validate(Input::all());
		
		if ($validation->fails()) {
			return Redirect::route('new_image')->withErrors($validation)->withInput();
		} else {
		
		$url = Input::file('url'); // your file upload input field in the form should be named 'file'

		$destinationPath = 'uploads/'.str_random(8);
		$filename = $url->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
		$uploadSuccess = Input::file('url')->move($destinationPath, $filename);
 
		if( $uploadSuccess ) {

			$image = \App\Models\Image::create( array(
				'title'=>Input::get('title'),
				'url'=>$destinationPath."/".$filename,
				'description'=>Input::get('description')
			));

   			//return Response::json('success', 200); // or do a redirect with some message that file was uploaded
   			return Redirect::route('images')
				->with('message', 'Image was created successfully!');
		} else {
   			//return Response::json('error', 400);
		}

		

		// return Redirect::route('images')
		// 	->with('message', 'Image was created successfully!');
		}
	}

}