<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}

    <!-- Jqgrid -->
	{{ HTML::style('plugins/jquery-ui-1.10.4.custom/css/smoothness/jquery-ui-1.10.4.custom.css') }}
    {{ HTML::style('plugins/jquery.jqGrid-4.6.0/css/ui.jqgrid.css') }}

    {{ HTML::style('css/main.css') }}
    
    <style>
    body {
        padding-top: 70px;
        padding-bottom: 10px;
    }
    </style>
    {{ HTML::script('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}
</head>

<body>
    <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">E-Ware House</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <?php echo link_to_action('CompaniesController@index', 'Company'); ?>                       
                    </li>
                    <li class="">
                        <?php echo link_to_action('SitesController@index', 'Sites'); ?>                       
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Masters <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
		                        <?php echo link_to_action('ClientsController@index', 'Client Master'); ?>                       
                            </li>
                            <li>
		                        <?php echo link_to_action('SKUProductsController@index', 'SKU Product Master'); ?>                       
                            </li>
                            <li>
		                        <?php echo link_to_action('LocationsController@index', 'Location Master'); ?>                       
                            </li>
                            <li>
		                        <?php echo link_to_action('UomController@index', 'UOM Master'); ?>                       
                            </li>
                            <li>
		                        <?php echo link_to_action('UOMConversionController@index', 'UOM Conversion Master'); ?>   							
                            </li>
                            <li>
		                        <?php echo link_to_action('ReasonCodesController@index', 'Reason Code Master'); ?>   							
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Adjustment</a>
                            </li>
                            <li>
                                <a href="#">Location Transfer - Movement</a>
                            </li>
                            <li>
                                <a href="#">Location Details</a>
                            </li>
                            <li>
                                <a href="#">Stock Take -Cycle count</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inbound <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
		                        <?php echo link_to_action('InboundReceiptsController@index', 'Receipt'); ?>   							
                            </li>
                            <li>
		                        <?php echo link_to_action('ConfirmSRVsController@index', 'Confirm SRV Putaway'); ?>   							
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Outbound <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
		                        <?php echo link_to_action('OutboundIssuesController@index', 'Issue'); ?>   							
                            </li>
                            <li>
                                <a href="#">Enquiry</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Report 1</a>
                            </li>
                            <li>
                                <a href="#">Report 2</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Users</a>
                            </li>
                            <li>
                                <a href="#">Roles</a>
                            </li>
                        </ul>
                    </li>
                
                <!-- User Navs -->
            
                <ul class="nav navbar-nav navbar-right ">
                    <li class="active">
                        <a href="./">Hi Hameed</a>
                    </li>
                </ul>

            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>

    <div class="container">        
        @yield('content')
    </div>

    @yield('popups')
    <!-- /container -->

    
    {{ HTML::script('js/vendor/jquery-1.10.1.min.js') }}
    {{ HTML::script('js/vendor/bootstrap.min.js') }}

    <!-- Jqgrid -->
    {{ HTML::script('plugins/jquery.jqGrid-4.6.0/js/i18n/grid.locale-en.js') }}
    {{ HTML::script('plugins/jquery.jqGrid-4.6.0/js/jquery.jqGrid.min.js') }}
    {{ HTML::script('js/main.js') }}

    @yield('script')

</body>

</html>
