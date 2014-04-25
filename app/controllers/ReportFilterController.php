<?php

class ReportFilterController extends \BaseController {

	public function issues()
	{
		return View::make('reports.issue');
	}
	
	public function issuesxlimport()
	{
		$from_dt = Input::get('from_dt');
		$to_dt  = Input::get('to_dt');
		$rows = [];
		$rows[] = ["Client Code", "Client Name", "Date", 
					"Product Code", "Product Name","QTY issued"
				  ];
		$issuelines =  DB::select('select ob.client_code, ob.order_date,ob.issue_date, ob. product_no, 
									cl.name,ob.order_qty,sk.product_name,sk.product_code,ob.issue_qty from outboundissues ob
									INNER JOIN clients cl ON cl.client_code = ob.client_code
									INNER JOIN skuproducts sk ON sk.client_code = ob.client_code
									WHERE issue_date BETWEEN ? AND ?', array( $from_dt,$to_dt));
		foreach ($issuelines as $issueline ) {
			$rows[] = [$issueline->client_code, 
					   $issueline->name,
					   $issueline->issue_date,
					   $issueline->product_code,
					   $issueline->product_name,
					   $issueline->issue_qty
				  ];
		}

		return Excel::create('IssueReport')
        	->sheet('Issue Report')
            ->with($rows)
        	->export('xlsx');
		
	}
	
	public function clientmaster()
	{
		return View::make('reports.client');
	}
	
	public function clientxlimport()
	{
		
		$rows = [];
		$rows[] = ["Client Code", "Client Name", "Service Provided", 
					"Address", "Contact name","Creidt Limit","Site Id Name"
				  ];
		$issuelines =  DB::select('SELECT  client_code, name, address, 
								contact_name, credit_limit, services_provided, site_id FROM clients ');
		foreach ($issuelines as $issueline ) {
			$rows[] = [$issueline->client_code, 
					   $issueline->name,
					   $issueline->services_provided,
					   $issueline->address,
					   $issueline->contact_name,
					   $issueline->credit_limit,
					   $issueline->site_id,
				  ];
		}

		return Excel::create('IssueReport')
        	->sheet('Issue Report')
            ->with($rows)
        	->export('xlsx');
		
	}
	
	public function skuproductmaster()
	{
		return View::make('reports.skuproduct');
	}
	
	public function skuproductxlimport()
	{
		
		$rows = [];
		$rows[] = ["Client Code", "Client Name", "Location", 
					"Product Code", "Product Name","QTY"
				  ];
		$skulines =  DB::select('SELECT sk.client_code, sk.product_code, sk.location_area,sk.product_name,cl.name, sk.quantity FROM skuproducts sk
									INNER JOIN clients cl ON cl.client_code = sk.client_code');
		foreach ($skulines as $skuline ) {
			$rows[] = [$skuline->client_code, 
					   $skuline->name,
					   $skuline->location_area,
					   $skuline->product_code,
					   $skuline->product_name,
					   $skuline->quantity,
				  ];
		}

		return Excel::create('IssueReport')
        	->sheet('SkuProduct Report')
            ->with($rows)
        	->export('xlsx');
		
	}
}