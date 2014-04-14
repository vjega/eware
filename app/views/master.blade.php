<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WMS</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
         {{ HTML::style('static/css/bootstrap.min.css') }}
        <!-- font Awesome -->
         {{ HTML::style('static/css/font-awesome.min.css') }}
        <!-- Ionicons -->
        {{ HTML::style('static/css/ionicons.min.css') }}
        <!-- DATA TABLES -->
        {{ HTML::style('static/css/datatables/dataTables.bootstrap.css') }}   

        <!-- Jqgrid -->
        {{ HTML::style('plugins/jquery-ui-1.10.4.custom/css/smoothness/jquery-ui-1.10.4.custom.css') }}
    
        {{ HTML::style('plugins/jquery.jqGrid-4.6.0/css/ui.jqgrid.css') }}
        <!-- {{ HTML::style('plugins/jquery.jqGrid-4.6.0/css/bootstrap.jqgrid.css') }} -->

        <!-- Theme style -->
        {{ HTML::style('static/css/AdminLTE.css') }}
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    
    <style>
.modal-lg{
    width:90%  !important;
}
    </style>


    </head>

<body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../../index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                e-galaxy WMS
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>                
            </nav>
        </header>

  <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <!-- div class="pull-left image">
                            <img src="https://lh5.googleusercontent.com/-goWTAkCe2Z8/AAAAAAAAAAI/AAAAAAAAAAA/ObSsWA6eTmA/s32-c/photo.jpg" class="img-circle" alt="User Image" />
                        </div -->
                        <div class="pull-left info">
                            <p>Hello, User</p>

                            <!-- a href="#"><i class="fa fa-circle text-success"></i> Online</a -->
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">

                        <li class="active">
                            <a href="{{ url('/', 'companies') }}" ><i class="fa fa-building-o"></i> Companies </a>
                        </li>

                        <li>
                            <a href="{{ url('/', 'sites')}}">
                                <i class="fa fa-th"></i> <span>Sites</span> 
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-tasks"></i>
                                <span>Masters</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">

                            <li>
                                 <a href="{{ url('/', 'clients')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Client Master</span> 
                            </a>
                                             
                            </li>
                            <li>
                                 <a href="{{ url('/', 'skuproducts')}}">
                                <i class="fa fa-angle-double-right"></i> <span>SKU Product Master</span> 
                                </a>
                                                     
                            </li>
                            <li>

                                <a href="{{ url('/', 'locations')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Location Master</span> 
                                </a>
                                                       
                            </li>
                            <li>

                                 <a href="{{ url('/', 'uoms')}}">
                                <i class="fa fa-angle-double-right"></i> <span>UOM Master</span> 
                                </a>
                                                     
                            </li>
                            <li>

                                <a href="{{ url('/', 'uomconversion')}}">
                                <i class="fa fa-angle-double-right"></i> <span>UOM Conversion Master</span> 
                                </a>
                                                             
                            </li>
                            <li>
                                 <a href="{{ url('/', 'reasoncodes')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Reason Code Master</span> 
                                </a>
                                                       
                            </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-retweet"></i>
                                <span>Transactions</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">

                            <li>
                                 <a href="{{ url('/', 'adjustments')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Adjustment</span> 
                                </a>
                                                     
                            </li>
                            <li>
                                <a href="{{ url('/', 'loctransfers')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Location Transfer</span> 
                                </a>
                                                              
                            </li>
                            <!-- li>

                                <a href="{{ url('/', 'locations')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Location Details</span> 
                                </a>
                                                      
                            </li -->
                            <li>
                                 <a href="{{ url('/', 'stocktakes')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Stock Take</span> 
                                </a>
                                                      
                            </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-sign-in"></i> <span>Inbound</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                 <li>

                                <a href="{{ url('/', 'inboundreceipts')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Receipt</span> 
                                </a>
                                                            
                            </li>
                            <li>
                                <a href="{{ url('/', 'confirmsrvs')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Confirm SRV Putaway</span> 
                                </a>                           
                            </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-sign-out"></i> <span>Outbound</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                 <li>

                                    <a href="{{ url('/', 'outboundissues')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Issue</span> 
                                </a>
                                                    
                                </li>
                                <li>
                                       <a href="{{ url('/', 'outboundenquires')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Enquiry</span> 
                                </a>
                                    
                                </li>

                               
                            </ul>
                        </li>
                       
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>

                                    <a href="{{ url('/')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Report 1</span> 
                                </a>
                                                    
                                </li>
                                <li>
                                       <a href="{{ url('/')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Report 2</span> 
                                </a>
                                    
                                </li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i> <span>System</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>

                                    <a href="{{ url('/')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Users</span> 
                                </a>
                                                    
                                </li>
                                <li>
                                       <a href="{{ url('/')}}">
                                <i class="fa fa-angle-double-right"></i> <span>Roles</span> 
                                </a>
                                    
                                </li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">    

                @yield('content')            
                
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
    @yield('popups')   

    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Dropzone -->
    {{ HTML::script('plugins/dropzone/dropzone.js') }}
    <!-- Bootstrap -->
    {{ HTML::script('static/js/bootstrap.min.js') }}


    <!-- DATA TABES SCRIPT -->
    {{ HTML::script('static/js/plugins/datatables/jquery.dataTables.js') }}
    {{ HTML::script('static/js/plugins/datatables/dataTables.bootstrap.js') }}
        
    <!-- Date Picker -->
    {{ HTML::script('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
    <!-- Jqgrid -->
    {{ HTML::script('plugins/jquery.jqGrid-4.6.0/js/i18n/grid.locale-en.js') }}
    {{ HTML::script('plugins/jquery.jqGrid-4.6.0/js/jquery.jqGrid.min.js') }}
    {{ HTML::script('plugins/jQueryValidationEngine/js/languages/jquery.validationEngine-en.js') }}
    {{ HTML::script('plugins/jQueryValidationEngine/js/jquery.validationEngine.js') }}


    <!-- AdminLTE App -->
    {{ HTML::script('static/js/AdminLTE/app.js') }}

    @yield('script')

    </body>
</html>
