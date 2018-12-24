<!DOCTYPE html>
<!-- 
Version: 1.0.0
Author: Nitish Dolakasharia
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Tezpur University Society : Employee</title>
    <!-- Bootstrap Styles-->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{ asset('assets/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{ asset('assets/css/custom-styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('assets/css/checkbox3.min.css') }}" rel="stylesheet">
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('assets/js/Lightweight-Chart/cssCharts.css') }}"> 
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            @include('layout.employee.common.header_nav')

            <ul class="nav navbar-top-links navbar-right">
                @include('layout.employee.common.navbar_right')
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side flexcroll" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    @include('layout.employee.common.navbar_side')
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
            <div class="header">  
                <h1 class="page-header">{{ $l4 }}</h1>
            	<ol class="breadcrumb">
                    <li><a href="#">{{ $l1 }}</a></li>
                   @if($l2 !="")
                    <li><a href="#">{{ $l2 }}</a></li>
                    @endif
                    @if($l3 !="")
                    <li><a href="#">{{ $l3 }}</a></li>
                    @endif
                    @if($l4 !="")
                    <li class="active">{{ $l4 }}</li>
                    @endif
                </ol> 	 				
            </div>
            <div id="page-inner">

                @if(Session::has('message'))
                <div class="row">
                    <div class="col-lg-12">
                       <div class="alert {{ Session::get('alert') }}">
                             <button type="button" class="close" data-dismiss="alert">×</button>
                             <b>{!! Session::get('type') !!}</b> {!! Session::get('message') !!}
                       </div>
                    </div>
                </div>
                @endif
            
                @yield('main_content')
				<footer  class="sticky-footer">
                    <p>All right reserved.</p>
				</footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	 
    <!-- Metis Menu Js -->
    <script src="{{ asset('assets/js/jquery.metisMenu.js') }}"></script>
    <!-- Morris Chart Js -->
    <script src="{{ asset('assets/js/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/morris/morris.js') }}"></script>
	
	
	<script src="{{ asset('assets/js/easypiechart.js') }}"></script>
	<script src="{{ asset('assets/js/easypiechart-data.js') }}"></script>
	
	 <script src="{{ asset('assets/js/Lightweight-Chart/jquery.chart.js') }}"></script>
	
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/custom-scripts.js') }}"></script>

      
    <!-- Chart Js -->
    <script type="text/javascript" src="{{ asset('assets/js/Chart.min.js') }}"></script>  
    <script type="text/javascript" src="{{ asset('assets/js/chartjs.js') }}"></script> 
    

</body>

</html>