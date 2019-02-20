<?php

namespace Bdgt\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{

	public function index()
	{
		return view( 'import.index' );
	}

	public function upload(Request $request)
	{
		//$request->validate([

		//]);
		return back()->with('message', 'File uploaded successfully!');
	}
}
