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
	
	public function stockledger()
	{
		return View::make('reports.stockledger');
	}
	
	public function stockledgerxlimport()
	{
		
		$rows = [];
		$rows[] = ["Client Code","Product No", "Product Name","QTY"];
		$stocklines =  DB::select('SELECT il.cust_code, il.item_code,
										  SUM(il.qty) AS qty,sk.product_name,
										  sk.product_code, il.posting_date 
									FROM itemledgers il
									INNER JOIN skuproducts sk ON sk.client_code = il.cust_code
									GROUP BY il.client_code,il.item_code
									');
		foreach ($stocklines as $stockline ) {
			$rows[] = [$stockline->cust_code, 
					   $stockline->product_code,
					   $stockline->product_name,
					   $stockline->qty,
				  ];
		}

		return Excel::create('IssueReport')
        	->sheet('SkuProduct Report')
            ->with($rows)
        	->export('xlsx');
		
	}
	// --------------------------------------------------------------------
	
	public function locationmovementledger()
	{
		return View::make('reports.locationmovementledger');
	}
	
	public function locationledgerxlimport()
	{
		
		$rows = [];
		$rows[] = ["Date","Client Code","From Location", "To Location","Product No","Product Detail","QTY Moved"];
		$stocklines =  DB::select('SELECT li.location_id,li.qty,li.to_location, li.qty_to_move
									FROM loctransferlines li
									
									');
		foreach ($stocklines as $stockline ) {
			$rows[] = [$stockline->location_id,
					   $stockline->location_id,
					   $stockline->location_id,
					   $stockline->to_location,
					   $stockline->qty_to_move,
					   $stockline->qty_to_move,
					   $stockline->qty_to_move,
				  ];
		}

		return Excel::create('IssueReport')
        	->sheet('SkuProduct Report')
            ->with($rows)
        	->export('xlsx');
		
	}
	
	//locationstockledger
	public function locationstockledger()
	{
		return View::make('reports.locationstockledger');
	}
	
	public function locationstockledgerxlimport()
	{
		
		$rows = [];
		$rows[] = ["Date","Location Code","Location Name", "Client Code - Name","Product No","Product Name","QTY"];
		$stocklines =  DB::select('SELECT li.location_id,li.qty,li.to_location, li.qty_to_move
									FROM loctransferlines li
									
									');
		foreach ($stocklines as $stockline ) {
			$rows[] = [$stockline->location_id,
					   $stockline->location_id,
					   $stockline->location_id,
					   $stockline->to_location,
					   $stockline->qty_to_move,
					   $stockline->qty_to_move,
					   $stockline->qty_to_move,
				  ];
		}

		return Excel::create('Locationstock Report')
        	->sheet('Locationstock Report')
            ->with($rows)
        	->export('xlsx');
		
	}
	
	//receipt
	public function receipt()
	{
		return View::make('reports.receipt');
	}
	
	public function receiptxlimport()
	{
		
		$rows = [];
		$from_dt = Input::get('from_dt');
		$to_dt   = Input::get('to_dt');
		$rows[]  = ["Site Name","Client Code","Client Name","Product No","Date","Product Detail","Qty Received"];
		$receipts =  DB::select('SELECT ir.client_code,ir.grn_date, ir.product_no, ir.expiry_date,cl.name,
										  ir.expected_qty, ir.delivery_qty, ir.accepted_qty, ir.rejected_qty
										  FROM inboundreceipts ir
									INNER JOIN clients cl ON cl.client_code = ir.client_code
									WHERE grn_date BETWEEN ? AND ?', array( $from_dt,$to_dt));
		foreach ($receipts as $receipt ) {
			$rows[] = [$receipt->name,
					   $receipt->client_code,
					   $receipt->name,
					   $receipt->product_no,
					   $receipt->grn_date,
					   $receipt->product_no,
					   $receipt->accepted_qty,
					 
				  ];
		}

		return Excel::create('ReceiptReport')
        	->sheet('Receipt Report')
            ->with($rows)
        	->export('xlsx');
		
	}
}