<?php

namespace Bdgt\Http\Controllers;

use Bdgt\Reports\ReportFactory;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
{
    /**
     * Show the default report to the user.
     *
     * @return Response
     */
    public function index()
    {
        return $this->show('spending');
    }

    /**
     * Show an individual report to the user.
     *
     * @param $type
     * @return Response
     */
    public function show($type)
    {

    	if ( 'categorial' === $type ) {
    		$results = ReportFactory::generate($type)
				->forDateRange(Input::get('startDate'), Input::get('endDate'));
			$report = (object)[
				'name' => ReportFactory::generate($type)->name(),
				'url' => 'ffff',
				'data' => $results,
			];
    		return view ('report.show', compact( 'report' ) );
		}
        $report = (object)[
            'name' => ReportFactory::generate($type)->name(),
            'url' => '/reports/ajax/' . $type,
        ];

        return view('report.show', compact('report'));
    }

    /**wdss
     * Retrieve report data based on type
     * @param  string $type
     * @return Response
     */
    public function ajax_report($type)
    {
        return response()->json(
            ReportFactory::generate($type)
                           ->forDateRange(Input::get('startDate'), Input::get('endDate'))
        );
    }
}
