@extends('layouts.admin')

@section('title', 'All Forms')

@section('content')
    <script>
        //script to change active class in submenus
        $(document).ready(function(){
            $('#sub_quiz').addClass('active');
        });
    </script>
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left"> <a href="{{route('admin.forms.index')}} ">Forms</a></h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Forms</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row" id="tableFormsShowed">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-table"></i> All Forms</h3>
                    All forms are shown here, if you want to go for a specific type of form, you should look for it as a position;
                </div>
                <div class="card-body">
                    <div>
                        Remember that you can <a href="javascript:showCreate()" ><b>Add a new form</b></a>:
                    </div>
                    <div class="table-responsive">
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                        @endif
                        <table id="FormsTable" class="table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($forms as $form)
                                <tr>
                                    <td>{{$form->id}}</td>
                                    <td>{{$form->form_name}}</td>
                                    <td>{{$form->user_id}}</td>
                                    <td>{{$form->created_at}}</td>
                                    <td>{{$form->updated_at}}</td>
                                    {{-- <td><a href="javascript:showEdit({{$form->id}})" class="btn btn-success">Edit</a></td> --}}
                                    <td>
                                        {{-- <a href="{{ route('admin.forms.show', $form->id) }}" class="btn btn-primary">View</a> --}}
                                        <a href="#" class="btn btn-primary">View</a>
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('admin.forms.edit', $form->id) }}" class="btn btn-success">Edit</a> --}}
                                        <a href="#" class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        
                                        <form action="{{ route('admin.forms.destroy', $form->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <td>{{$forms->links()}}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="createForm" style="display: none;">
        @include('admin.registerForm')
    </div>
    {{-- <div id="editForm" style="display: none;">
        @include('admin.editForm')
    </div> --}}
@endsection
<script>
    function showCreate() {
        console.log('showCreate');
        $("#tableFormsShowed").hide();
        // $("#editForm").hide();
        $("#createForm").show();
    }

    function hideForm() {
        console.log('hideForm');
        $("#tableFormsShowed").show();
        // $("#editForm").hide();
        $("#createForm").hide();
    }

    // function showEdit(id) {
    //     console.log("ID showEdit: ",id)
    //     $("#tableFormsShowed").hide();
    //     $("#createForm").hide();
    //     $.get("forms/"+id+"/edit", function(data, status){
    //         console.log("data showEdit: ",data);
    //         var datos = data.split(",");
    //         $("#form_name").val(datos[1]);
    //         $("#formEdit").attr("action","http://tracking.szertegia.dc/admin/forms/"+id);
    //     });
    //     $("#editForm").show();
    // }
    
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>