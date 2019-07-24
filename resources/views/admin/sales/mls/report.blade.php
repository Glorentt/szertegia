@extends('layouts.admin')

@section('title', 'All MLS')

@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function () {
        $('#sub_sales').addClass('active');
    });
</script>
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left"> <a href="{{route('admin.forms.index')}} ">MLS</a></h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Sales</li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row" id="st">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-table"></i> For you bb</h3>

            </div>
            <div class="card-body">

               
            </div>
        </div>
    </div>
</div>



@endsection