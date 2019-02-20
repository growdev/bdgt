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
		$message = '';
		$date = date('Y-M-d-H:i:s', time());
		$fileName = $date.request()->myfile->getClientOriginalExtension();

		$path = $request->myfile->storeAs('csv',$fileName);
		$fileData = \Storage::disk('local')->get($path);

		// Get rows from the csv file
		$data = explode( PHP_EOL, $fileData );
		$transactions = [];
		foreach( $data as $line ){
			$temp = str_getcsv( $line );
			if ( 'Details' !== $temp[0] && strlen( $temp[0] )){
				$transactions[] = $temp;
			}
		}

		if ( count( $transactions ) ){
			// Add transactions for each row
			foreach( $transactions as $transaction ){

			}
			return back()->with(['message'=>'Transactions imported.','status'=>'success']);
		} else {
			return back()->with(['message'=>'File did not contain transactions.','status'=>'danger'] );
		}
	}
}
