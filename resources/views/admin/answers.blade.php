@extends('layouts.admin')

@section('title', 'All Answers')

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
                <h1 class="main-title float-left"> <a href="{{route('admin.answers.index')}} ">Answers</a></h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Answers</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row" id="tableAnswersShowed">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-table"></i> All Answers</h3>
                    All answers are shown here, if you want to go for a specific type of answer, you should look for it as a position;
                </div>
                <div class="card-body">
                    <div>
                        Remember that you can <a href="javascript:showCreate()" ><b>Add a new answer</b></a>:
                    </div>
                    <div class="table-responsive">
                        <table id="AnswersTable" class="table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    {{-- <th>Type Answer</th> --}}
                                    {{-- <th>Correct Answer</th> --}}
                                    <th>Score</th>
                                    {{-- <th>Campaing</th> --}}
                                    {{-- <th>Question ID</th> --}}
                                    <!-- <th>User ID</th> -->
                                    <!-- <th>Status</th> -->
                                    {{-- <th>Created At</th> --}}
                                    <th>Updated At</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($answers as $answer)
                                <tr>
                                    
                                    <td>{{$answer->id}}</td>
                                    <td>{{$answer->answer_name}}</td>
                                    {{-- <td>{{$answer->type_answer_id}}</td> --}}
                                    {{-- <td>{{$answer->correct_answer}}</td> --}}
                                    <td>{{$answer->score_answer}}</td>
                                    {{-- <td>{{$answer->campaing_id}}</td> --}}
                                    {{-- <td>{{$answer->question_id}}</td> --}}
                                    <!-- <td>{ {$answer->user_id}}</td> -->
                                    <!-- <td>{ {$answer->status_id}}</td> -->
                                    {{-- <td>{{$answer->created_at}}</td> --}}
                                    <td>{{$answer->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('admin.answers.show', $answer->id) }}" class="btn btn-primary">View</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.answers.edit', $answer->id) }}" class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.answers.destroy', $answer->id) }}" method="POST">
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
                                <td>{{$answers->links()}}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="createAnswer" style="display: none;">
        @include('admin.registerAnswer')
    </div>
@endsection
<script>
    function showCreate() {
        console.log('showCreate');
        $("#tableAnswersShowed").hide();
        $("#createAnswer").show();
    }

    function hideForm() {
        console.log('hideForm');
        $("#tableAnswersShowed").show();
        $("#createAnswer").hide();
    }

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>