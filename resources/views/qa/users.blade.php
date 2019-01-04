@extends('layouts.qa')

@section('title', 'all a users')

@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function(){
        $('#sub_users').addClass('active');
    });
    
</script>
<div class="row">
    <div class="col-xl-12">
            <div class="breadcrumb-holder">
                    <h1 class="main-title float-left"> <a href="{{route('users.index')}} "> Users</a></h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                    <div class="clearfix"></div>
            </div>
    </div>
</div>

<div class="row" id="tableUsersShowed">
				
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-table"></i> All Users</h3>
                All users are shown here, if you want to go for a specific type of user, you should look for it as a position;
            </div>
                
            <div class="card-body">
                <div>
                If you can not find an agent, ask the administrator: 
                </div>
                <div class="table-responsive">
                    <table id="UsersTable" class="table table-bordered table-hover display">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Supervisor</th>
                                <th>Phone Number</th>
                                <th>Start Day</th>
                                
                            </tr>
                        </thead>										
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                
            </div>														
        </div><!-- end card-->					
    </div>
</div>
        
        

@endsection
@section('jsUsers')
<script>


</script>
<script src="{{asset('assets/js/tableUsers.js') }} "></script>

@endsection