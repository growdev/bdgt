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
		$fileName = "fileName".time().'.'.request()->myfile->getClientOriginalExtension();

		$request->myfile->storeAs('csv',$fileName);

		\Log::error( '====>HELLO WORLD' );
		$file = $request->allFiles();

		\Log::error( print_r( $file, true ) );
		return back()->with('message', 'File uploaded successfully!');
	}
}
