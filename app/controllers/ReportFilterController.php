<?php

class ReportFilterController extends \BaseController {

	public function issues()
	{
		return View::make('reports.issue');
	}

	public function issuesxlimport()
	{
		
		$rows = [];
		$rows[] = ["Site Name", "Date", "Client Code", "Client Name", 
					"Product No", "Product Detail","QTY issued"
				  ];
		for ($i = 0; $i<10; $i++ ) {
			$rows[] = ["Site Name", "Date", "Client Code", "Client Name", 
					"Product No", "Product Detail","QTY issued"
				  ];
		}

		return Excel::create('IssueReport')
        	->sheet('Issue Report')
            ->with($rows)
        	->export('xlsx');
		
	}

}