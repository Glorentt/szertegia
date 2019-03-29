@extends('layouts.admin')

@section('title', 'All Answers')

@section('content')
    <script>
        //script to change active class in submenus
        $(document).ready(function(){
            $('#sub_quiz').addClass('active');
        });
    </script>
    <div class="card" id="formulario">
        <h5 class="card-header">Edit Form</h5>
        <div class="card-body">
            <h5 class="card-title">Form to edit an existent form.</h5>
            <form class="was-validated" id="formEdit" method="POST" action="/admin/forms/{{$form->id}}">
                @method('PUT')
                @csrf
                <div class="container">
                    @csrf
                    <div class="row" >
                        <div class="col-md-6" >
                            <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                            <input type="hidden" name="user_id" id="user_id" value="{{Session('id')}}">
                            <input type="hidden" name="updated_at" id="updated_at" class="form-control">
                            <div id="FormsTable" class="form-group">
                                <label for="">Form Name</label>
                                <input required type="text" name="form_name" id="form_name" class="form-control" 
                                    autocomplete="off" placeholder="" value="{{$form->form_name}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger" onclick="window.location.href='{{route('admin.forms.index')}}'">Cancel</a></button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection