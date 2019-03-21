@extends('layouts.admin')

@section('title', 'All Forms')

@section('content')
    <script>
        //script to change active class in submenus
        $(document).ready(function(){
            $('#sub_quiz').addClass('active');
        });
    </script>
    <div class="card" id="formulario">
        <h5 class="card-header">View Form</h5>
        <div class="card-body">
            <h5 class="card-title">Form to view an existent form.</h5>
            <form class="was-validated">
                <div class="container">
                    @csrf
                    <div class="row" >
                        <div class="col-md-6" >
                            <div id="FormsTable" class="form-group">
                                <input type="hidden" name="_token" id="token" value="{{ Session::token() }}" />                            
                            </div>
                            <div id="FormsTable" class="form-group">
                                <label for="">Form Name</label>
                                <input type="text" name="form_name" id="form_name" class="form-control" 
                                    autocomplete="off" placeholder="" value="{{$form->form_name}}" disabled="disabled">
                            </div>
                        </div>
                        <div class="col-md-6" >                            
                            <div id="FormsTable" class="form-group">
                                <input type="hidden"name="user_id" id="user_id" value="{{ Session('id') }}">
                            </div>
                            <div id="FormsTable" class="form-group">
                                <input type="hidden" name="updated_at" id="updated_at" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-primary" onclick="window.location.href='{{ route('admin.forms.index' )}}'">Regresar</a></button>
                    </div>
                </div>
            </form>
            {{-- {!! Form::close() !!} --}}
        </div>
    </div>
@endsection