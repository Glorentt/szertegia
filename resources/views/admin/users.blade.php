@extends('layouts.admin')

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
                    <h1 class="main-title float-left"> <a href="{{route('admin.users.index')}} "> Users</a></h1>
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
                    Remember that you can <a href="javascript:showCreate()" >
                        <b>Add a new user</b></a>:
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
<div class="">
  @include('admin.resetPassword')
</div>
        <div id="createUser" style="display: none;">
            @include('admin.registerUser')
        </div>
        <div id="editUser" style="display: none;">
            @include('admin.editUser')
        </div>



@endsection
@section('jsUsers')
<script>
function showCreate() {
    $("#tableUsersShowed").hide();
    $("#editUser").hide();
    $("#createUser").show();

}
function hideForm() {
    $("#tableUsersShowed").show();
    $("#editUser").hide();
    $("#createUser").hide();


    console.log('cambiar stile');
}
function showEdit(id) {
    $("#tableUsersShowed").hide();
    $("#createUser").hide();

    $.get("users/"+id+"/edit", function(data, status){
        var datos = data.split(",");
        $("#idUser").val(id);
        $("#editname").val(datos[1]);
        $("#editemail").val(datos[2]);
        $("#editsupid").val(datos[3]);
        $("#editsuperName").val(datos[4]);
        $("#editphone").val(datos[5]);
        $("#editrole_id").val(datos[6]);
        $("#formEdit").attr("action","http://tracking.szertegia.dc/admin/users/"+id);
        // $("#formEdit").attr("method","put");


    });
    $("#editUser").show();

}

function resetPassword(id){

}


</script>
<script src="{{asset('assets/js/tableUsers.js') }} "></script>

@endsection
