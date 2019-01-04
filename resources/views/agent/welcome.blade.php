@extends('layouts.agent')

@section('title', 'Dashboard')



@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function(){
        $('#sub_dashboard').addClass('active');
    });
    
</script>
<div class="row">
    <div class="col-xl-12">
            <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Dashboard {{ Session('rol') }}</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="clearfix"></div>
            </div>
    </div>
</div>
                        <!-- end row -->
<div class="row">
        
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-default">
                        <i class="fa fa-file-text-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Orders</h6>
                        <h1 class="m-b-20 text-white counter">1,587</h1>
                        <span class="text-white">15 New Orders</span>
                </div>
        </div>

   
</div>

<!-- end row -->



@endsection