@extends('layouts.admin')

@section('title', 'All Questions')

@section('content')
    <script>
        //script to change active class in submenus
        $(document).ready(function(){
            $('#sub_quiz').addClass('active');
        });
    </script>
    <div class="card" id="formulario">
        <h5 class="card-header">View Question</h5>
        <div class="card-body">
            <h5 class="card-title">Form to view an existent question.</h5>
            <form class="was-validated">
                <div class="container">
                    @csrf
                    <div class="row" >
                        <div class="col-md-6" >
                            <div id="QuestionsTable" class="form-group">
                                <input type="hidden" name="_token" id="token" value="{{ Session::token() }}" />                            
                            </div>
                            <div id="QuestionsTable" class="form-group">
                                <label for="">Question Name</label>
                                <input type="text" name="question_name" id="question_name" class="form-control" 
                                    autocomplete="off" placeholder="" value="{{$question->question_name}}" disabled="disabled">
                                    
                            </div>
                            <div id="QuestionsTable" class="form-group">
                                <label for="">Type Question ID</label>
                                <input type="text" name="type_question_id" id="type_question_id" class="form-control" 
                                    autocomplete="off" placeholder="" value="{{$question->type_question_id}}" disabled="disabled">
                            </div>
                        </div>
                        <div class="col-md-6" >                            
                            <div id="QuestionsTable" class="form-group">
                                <input type="hidden"name="user_id" id="user_id" value="{{ Session('id') }}">
                            </div>
                            <div id="QuestionsTable" class="form-group">
                                <input type="hidden" name="exam_id" id="exam_id" class="form-control" autocomplete="off" placeholder="" value="0">
                            </div>
                            <div id="QuestionsTable" class="form-group">
                                <input type="hidden" name="updated_at" id="updated_at" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-primary" onclick="window.location.href='{{ route('admin.questions.index' )}}'">Regresar</a></button>
                        {{-- <button type="submit" class="btn btn-success" onclick="window.location.href='{{ route('admin.questions.edit', $question->id) }}'">Actualizar</button> --}}
                    </div>
                </div>
            </form>
            {{-- {!! Form::close() !!} --}}
        </div>
    </div>
@endsection