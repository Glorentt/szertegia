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
                        <table id="FormsTable" class="table table-borderless table-hover display">
                            <thead class="indigo white-text">
                                <tr>
                                    <th class="center">Name</th>
                                    <th class="center">User ID</th>
                                    <th class="center">Created At</th>
                                    <th class="center">Updated At</th>
                                    <th colspan="4" class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="blue-grey lighten-5">
                            @foreach($forms as $form)
                                <tr>
                                    <td class="center">{{$form->id}}</td>
                                    <td class="center">{{$form->form_name}}</td>
                                    <td class="center">{{$form->user_id}}</td>
                                    <td class="center">{{$form->created_at}}</td>
                                    <td class="center">{{$form->updated_at}}</td>
                                    <td class="center">
                                        <a href="{{ route('admin.forms.show', $form->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye" style="font-size:24px; color: white;"></i>
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href="{{ route('admin.forms.edit', $form->id) }}" class="btn btn-success">
                                            <i class="fa fa-pencil" style="font-size:24px; color: white;"></i>
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a data-toggle="modal" data-target="#centralModalSuccess" class="btn btn-danger">
                                            <i class="fa fa-trash" style="font-size:24px; color: white;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table>
                            <tbody class="center">
                                <td class="center">{{$forms->links()}}</td>
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
    <!-- Central Modal Medium Success -->
    <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Confirm Deletion</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                <!-- <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i> -->
                <p>Are you sure you want to permanently remove this register?</p>
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <form action="{{ route('admin.forms.destroy', $form->id) }}" method="POST" data-toggle="modal" data-target="#centralModalSuccess">
                    @method('DELETE')
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete<i class="far fa-gem ml-1 white-text"></i></button>
                    <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Cancel</a>
                </form>
                <!-- <a type="button" class="btn btn-danger">Delete <i class="far fa-gem ml-1 white-text"></i></a> -->
                <!-- <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Cancel</a> -->
            </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Success-->
@endsection
<script>
    $("#centralModalSuccess").on('show.bs.modal', function(){
    alert("The register removed correctly!");
    });
</script>
<style>
    .center {
        text-align: center;
    }
</style>
<script>
    function showCreate() {
        console.log('showCreate');
        $("#tableFormsShowed").hide();
        $("#createForm").show();
    }

    function hideForm() {
        console.log('hideForm');
        $("#tableFormsShowed").show();
        $("#createForm").hide();
    }
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>