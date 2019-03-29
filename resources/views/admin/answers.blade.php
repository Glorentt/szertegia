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
                        <table id="AnswersTable" class="table table-borderless table-hover display">
                            <thead>
                                <tr>
                                    <th class="center">ID</th>
                                    <th class="center">Name</th>
                                    <!-- <th class="center">Type Answer</th> -->
                                    <!-- <th class="center">Correct Answer</th> -->
                                    <th class="center">Score</th>
                                    <!-- <th class="center">Campaing</th> -->
                                    <!-- <th class="center">Question ID</th> -->
                                    <!-- <th class="center">User ID</th> -->
                                    <!-- <th class="center">Status</th> -->
                                    <!-- <th class="center">Created At</th> -->
                                    <th class="center">Updated At</th>
                                    <th class="center" colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($answers as $answer)
                                <tr>
                                    
                                    <td class="center">{{$answer->id}}</td>
                                    <td class="center">{{$answer->answer_name}}</td>
                                    <!-- <td class="center">{{$answer->type_answer_id}}</td> -->
                                    <!-- <td class="center">{{$answer->correct_answer}}</td> -->
                                    <td class="center">{{$answer->score_answer}}</td>
                                    <!-- <td class="center">{{$answer->campaing_id}}</td> -->
                                    <!-- <td class="center">{{$answer->question_id}}</td> -->
                                    <!-- <td class="center">{ {$answer->user_id}}</td> -->
                                    <!-- <td class="center">{ {$answer->status_id}}</td> -->
                                    <!-- <td class="center">{{$answer->created_at}}</td> -->
                                    <td class="center">{{$answer->updated_at}}</td>
                                    <td class="center">
                                        <a href="{{ route('admin.answers.show', $answer->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye" style="font-size:24px; color: white;"></i>
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href="{{ route('admin.answers.edit', $answer->id) }}" class="btn btn-success">
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
                            <tbody>
                                <td class="center">{{$answers->links()}}</td>
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
                <form action="{{ route('admin.answers.destroy', $answer->id) }}" method="POST" data-toggle="modal" data-target="#centralModalSuccess">
                    @method('DELETE')
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete<i class="far fa-gem ml-1 white-text"></i></button>
                    <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Cancel</a>
                </form>
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