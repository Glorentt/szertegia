<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Szertegia - @yield('title')</title>
		<meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
		
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('assets/images/miniatura-png.png')}} ">

		<!-- Bootstrap CSS -->
		<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

		<!-- Font Awesome CSS -->
		<link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}} " rel="stylesheet" type="text/css" />

		<!-- Custom CSS -->
		<link href="{{ asset('assets/css/style.css')}} " rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">

		<!-- BEGIN CSS for this page -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<!-- END CSS for this page -->
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
</head>

<body class="adminbody"  >

<div id="main">
	<!-- top bar navigation -->
	<div class="headerbar">
		<!-- LOGO -->
        <div class="headerbar-left">
			<a href="{{route('inicio')}} " class="logo"><img alt="Logo" src="{{asset('assets/images/logo.png')}}" /> <span>AGENT</span></a>
        </div>
        <nav class="navbar-custom">
			<ul class="list-inline float-right mb-0">
				<li class="list-inline-item dropdown notif">
					<a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<i class="fa fa-fw fa-question-circle"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
						<!-- item-->
						<div class="dropdown-item noti-title">
							<h5><small>Help</small></h5>
						</div>
	                    <!-- item-->
						<a target="_blank" href="/time" class="dropdown-item notify-item">
							<p class="notify-details ml-0">
								<b>time connection aftha</b>
								<span>(it's reloaded every 30 min)</span>
							</p>
						</a>
                        <!-- item-->
                        
						<!-- All-->
						<a  class="dropdown-item notify-item notify-all">
							<i class=""></i>
						</a>
					</div>
				</li>
				<li class="list-inline-item dropdown notif">
					<a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						{{Session('email')}}
					</a>
					<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
						<!-- item-->
						<div class="dropdown-item noti-title">
							<h5 class="text-overflow"><small>Hello, {{Session('name')}} </small> </h5>
						</div>
                              
						<!-- item-->
						<!-- <a href="pro-profile.html" class="dropdown-item notify-item">
							<i class="fa fa-user"></i> <span>Profile</span>
						</a> -->

						<!-- item-->
						<a href="{{route('logout')}} " class="dropdown-item notify-item">
							<i class="fa fa-power-off"></i> <span>Logout</span>
						</a>

						<!-- item-->
					</div>
				</li>
			</ul>
			<ul class="list-inline menu-left mb-0">
				<li class="float-left">
					<button class="button-menu-mobile open-left">
						<i class="fa fa-fw fa-bars"></i>
					</button>
				</li>
			</ul>
        </nav>

	</div>
	<!-- End Navigation -->

	<!-- Left Sidebar -->
	<div class="left main-sidebar">
		<div class="sidebar-inner leftscroll">
			<div id="sidebar-menu">
				<ul>
					<li class="submenu">
						<a id="sub_dashboard" href="{{route('inicio')}} "><i class="fa fa-fw fa-bars"></i><span> Dashboard </span></a>
					</li>
					<!-- </ul> -->
					<!-- <ion-icon name="contacts"></ion-icon> -->
					<li class="submenu">
						<a href="#" id="sub_scores" >
							<i class="fa fa-fw fa-calendar-check-o"></i>
							<span> Scores </span> <span class="active menu-arrow"></span>
						</a>
						<ul class="list-unstyled">
							@if (Session('campaign') == "qualifier")
							<li><a href="{{route('agent.aftha.score')}} " id="sub_evaluate_aftha" >Aftha</a></li>
							<li><a href="{{route('agent.aftha.myscore')}} " id="sub_evaluate_aftha" >My Aftha Scores</a></li>
							@endif
							@if (Session('campaign') == "casemanager")
							<li><a href="{{route('agent.case.score')}} " id="sub_evaluate_aftha" >CaseManagers</a></li>
							<li><a href="{{route('agent.case.myscore')}} " id="sub_evaluate_aftha" >My CaseManager Scores</a></li>
							@endif
							


							{{-- <li><a href="{{route('agent.lexington.myscore')}} " id="sub_evaluate_aftha" >My Lexington Scores</a></li>
							<li><a href="{{route('agent.sudzy.score')}} " id="sub_evaluate_aftha" >Sudzy</a></li>
							<li><a href="{{route('agent.bizwell.score')}} " id="sub_evaluate_aftha" >Bizwell</a></li> --}}


							<!-- <li><a >Sudzy</a></li> -->
							<!-- <li><a >Bizwell</a></li> -->
							<!-- <li><a href="{{route('agent.aftha.score')}} "  id="sub_evaluate_aftha" >All Campaigns</a></li> -->
							<!-- <li><a href="{{route('agent.showslingers.index')}} " id="sub_evaluate_aftha" >ShowSlinger</a></li> -->
						</ul>
					</li>
					<li class="submenu">
						<a href="#" id="sub_campaigns" >
							<i class="fa fa-fw fa-money"></i> 
							<span> Sales </span> <span class="active menu-arrow"></span></a>
							<ul class="list-unstyled">
							    @if (Session('campaign') == "qualifier")
								<li><a href="{{route('agent.sales.qualifier')}} "  id="sub_evaluate_aftha" >Qualifiers</a></li>
								@endif
								@if (Session('campaign') == "mls")
								<li><a href="{{route('agent.sales.mls')}} "  id="sub_evaluate_aftha" >MLS</a></li>
								@endif
								 <!-- <li><a href="{{route('agent.showslingers.index')}} " id="sub_evaluate_aftha" >Show Slinger</a></li> -->

							</ul>
					</li>
            	</ul>
            <div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- End Sidebar -->

    <div class="content-page">

		<!-- Start content -->
        <div class="content">

			<div class="container-fluid">
			@foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
			@if (\Session::has('success'))
				<div class="alert alert-success">
					<ul>
						<li>{!! \Session::get('success') !!}</li>
					</ul>
				</div>
			@endif
			@foreach ($errors->all() as $error)
				<div class="alert alert-danger">
					<li>{{ $error }}</li>
				</div>
            @endforeach
						@yield('content')






            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">Szertegia tracking</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="https://www.facebook.com/francisco.nogales.9212"><b>Francisco Nogales</b></a>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="{{asset('assets/js/modernizr.min.js')}}"></script>

<script src="{{asset('assets/js/moment.min.js')}}"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/js/detect.js')}}"></script>
<script src="{{asset('assets/js/fastclick.js')}}"></script>
<script src="{{asset('assets/js/jquery.blockUI.j')}}s"></script>
<script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>

<!-- <script src="{{asset('assets/js/dataTables.buttons.min.js') }} "></script> -->
<!-- App js -->
<script src="{{asset('assets/js/pikeadmin.js')}}"></script>

<!-- BEGIN Java Script for this page -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>

<!-- Counter-Up-->
	<script src="{{asset('assets/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

	@yield('jsUsers')


	<!-- <script>
	// var ctx1 = document.getElementById("lineChart").getContext('2d');
	var lineChart = new Chart(ctx1, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
					label: 'Dataset 1',
					backgroundColor: '#3EB9DC',
					data: [10, 14, 6, 7, 13, 9, 13, 16, 11, 8, 12, 9]
				}, {
					label: 'Dataset 2',
					backgroundColor: '#EBEFF3',
					data: [12, 14, 6, 7, 13, 6, 13, 16, 10, 8, 11, 12]
				}]

		},
		options: {
						tooltips: {
							mode: 'index',
							intersect: false
						},
						responsive: true,
						scales: {
							xAxes: [{
								stacked: true,
							}],
							yAxes: [{
								stacked: true
							}]
						}
					}
	});


	var ctx2 = document.getElementById("pieChart").getContext('2d');
	var pieChart = new Chart(ctx2, {
		type: 'pie',
		data: {
				datasets: [{
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					label: 'Dataset 1'
				}],
				labels: [
					"Red",
					"Orange",
					"Yellow",
					"Green",
					"Blue"
				]
			},
			options: {
				responsive: true
			}

	});


	var ctx3 = document.getElementById("doughnutChart").getContext('2d');
	var doughnutChart = new Chart(ctx3, {
		type: 'doughnut',
		data: {
				datasets: [{
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					label: 'Dataset 1'
				}],
				labels: [
					"Red",
					"Orange",
					"Yellow",
					"Green",
					"Blue"
				]
			},
			options: {
				responsive: true
			}

	});
	</script> -->
<!-- END Java Script for this page -->

</body>
</html>
