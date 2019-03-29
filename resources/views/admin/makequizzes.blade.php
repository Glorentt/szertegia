@extends('layouts.admin')

@section('title', 'All Quizzes')

@section('content')
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        //script to change active class in submenus
        $(document).ready(function(){
            $('#sub_quiz').addClass('active');
        });
    </script>
     <div class="container">
        <!-- Nav tabs -->
        <ul id="mytabs" class="nav nav-tabs" role="tablist">
            <li class="active">
            <a href="#first" role="tab" data-toggle="tab">
                <i class="fa fa-home"></i> Question
            </a>
            </li>
            <li><a href="#second" role="tab" data-toggle="tab">
            <i class="fa fa-user"></i> Type Question
            </a>
            </li>
            <li>
            <a href="#third" role="tab" data-toggle="tab">
                <i class="fa fa-envelope"></i> Answer
            </a>
            </li>
            <li>
            <a href="#fourth" role="tab" data-toggle="tab">
                <i class="fa fa-envelope"></i> Scores
            </a>
            </li>
            <li>
            <a href="#five" role="tab" data-toggle="tab">
                <i class="fa fa-envelope"></i> Position
            </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade active in cont" id="first">
                <h2>Questions</h2>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="row">
                        <div class="col-10">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="">Select question:</label>
                        <input type="text" class="form-control" list="names" name="nameAgent" id="nameAgent" onkeyup="liveSearch(this.value)"  autocomplete="off" >
                        <input type="hidden" class="form-control"  name="agentID" id="agentID" autocomplete="false" >
                        <datalist id="names"></datalist>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade cont" id="second">
                <h2>Type Question</h2>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="row">
                        <div class="col-10">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="">Select type answer:</label>
                        <input type="text" class="form-control" list="names" name="nameAgent" id="nameAgent" onkeyup="liveSearch(this.value)"  autocomplete="off" >
                        <input type="hidden" class="form-control"  name="agentID" id="agentID" autocomplete="false" >
                        <datalist id="names"></datalist>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade cont" id="third">
                <h2>Answrer</h2>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="row">
                        <div class="col-10">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="">Select answer:</label>
                        <input type="text" class="form-control" list="names" name="nameAgent" id="nameAgent" onkeyup="liveSearch(this.value)"  autocomplete="off" >
                        <input type="hidden" class="form-control"  name="agentID" id="agentID" autocomplete="false" >
                        <datalist id="names"></datalist>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade cont" id="fourth">
                <h2>Score</h2>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="row">
                        <div class="col-10">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="">Select score:</label>
                        <input type="text" class="form-control" list="names" name="nameAgent" id="nameAgent" onkeyup="liveSearch(this.value)"  autocomplete="off" >
                        <input type="hidden" class="form-control"  name="agentID" id="agentID" autocomplete="false" >
                        <datalist id="names"></datalist>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade cont" id="five">
                <h2>Number Position</h2>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="row">
                        <div class="col-10">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="">Select number position:</label>
                        <input type="text" class="form-control" list="names" name="nameAgent" id="nameAgent" onkeyup="liveSearch(this.value)"  autocomplete="off" >
                        <input type="hidden" class="form-control"  name="agentID" id="agentID" autocomplete="false" >
                        <datalist id="names"></datalist>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="changetabbutton" class="btn btn-primary ">Set next tab</button>
    </div>
    <script>
        $(function(){
            $('#changetabbutton').click(function(e){
                e.preventDefault();
                var next_tab = $('.nav-tabs > .active').next('li').find('a');
                if(next_tab.length>0){
                    next_tab.trigger('click');
                }else{
                    $('.nav-tabs li:eq(0) a').trigger('click');
                }
            });
        });
    </script>
    <script src="{{asset('/assets/js/afthaProgram/liveSearchNames.js') }} "></script>
@endsection