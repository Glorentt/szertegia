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
                    <h1 class="main-title float-left">Paysheet {{ Session('rol') }}</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Paysheet</li>
                    </ol>
                    <div class="clearfix"></div>
            </div>
    </div>
</div>
                        <!-- end row -->
<div class="row">

        <div class="col-md-12">
            <iframe class="col-md-12 w-100 p-3" style="height: 1000px;"  src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQ3649ANWNmE4M9yFxOm-RD-J3Zl2Iiz3JSr5aK1GtqMytISwDny9An9cljuEUvZCK2Th-CKMs_kIoM/pubhtml?gid=1373563108&amp;single=true&amp;widget=true&amp;headers=false"></iframe>
        </div>


</div>

<!-- end row -->



@endsection
