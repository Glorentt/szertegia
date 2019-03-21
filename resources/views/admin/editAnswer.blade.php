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
        <h5 class="card-header">Edit Answer</h5>
        <div class="card-body">
            <h5 class="card-title">Form to edit an existent answer.</h5>
            <form class="was-validated" id="formEdit" method="POST" action="/admin/answers/{{$answer->id}}">
                @method('PUT')
                @csrf
                <div class="container">
                    <div class="row" >
                        <div class="col-md-6" >
                            <div id="AnswersTable" class="form-group">
                                <input type="hidden" name="_token" id="token" value="{{ Session::token() }}" />                            
                            </div>
                            <div id="AnswersTable" class="form-group">
                                <input type="hidden" name="status_id" id="status_id" class="form-control" value="0">
                            </div>
                            <div id="AnswersTable" class="form-group">
                                <label for="">Answer Name</label>
                                <input type="text" name="answer_name" id="answer_name" class="form-control" 
                                    autocomplete="off" placeholder="" value="{{$answer->answer_name}}">
                            </div>
                            <div id="AnswersTable" class="form-group">
                                <label for="">Type Answer ID</label>
                                <input type="text" name="type_answer_id" id="type_answer_id" class="form-control" 
                                    autocomplete="off" placeholder="" value="{{$answer->type_answer_id}}">
                            </div>
                            <div id="AnswersTable" class="form-group">
                                <label for="">Correct Answer</label>
                                <input type="text" name="correct_answer" id="correct_answer" class="form-control" 
                                    autocomplete="off" placeholder="" value="{{$answer->correct_answer}}">
                            </div>
                        </div>
                        <div class="col-md-6" >                            
                            <div id="AnswersTable" class="form-group">
                                <input type="hidden"name="user_id" id="user_id" value="{{ Session('id') }}">
                            </div>
                            <div id="AnswersTable" class="form-group">
                                <input type="hidden" name="status_id" id="status_id" class="form-control" autocomplete="off" placeholder="" value="0">
                            </div>
                            <div id="AnswersTable" class="form-group">
                                <input type="hidden" name="updated_at" id="updated_at" class="form-control">
                            </div>
                            <div id="AnswersTable" class="form-group">
                                <label for="">Score Answer</label>
                                <input type="text" name="score_answer" id="score_answer" class="form-control" 
                                    autocomplete="off" placeholder="" value="{{$answer->score_answer}}">
                            </div>
                            <div id="AnswersTable" class="form-group">
                                <label for="">Campaing ID</label>
                                <input type="text" name="campaing_id" id="campaing_id" class="form-control" 
                                    autocomplete="off" placeholder="" value="{{$answer->campaing_id}}">
                            </div>
                            <div id="AnswersTable" class="form-group">
                                <label for="">Question ID</label>
                                <input type="text" name="question_id" id="question_id" class="form-control" 
                                    autocomplete="off" placeholder="" value="{{$answer->question_id}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger" onclick="window.location.href='{{route('admin.answers.index')}}'">Cancel</a></button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection