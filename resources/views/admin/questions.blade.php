@extends('layouts.admin')

@section('title', 'All Questions')

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
                <h1 class="main-title float-left"> <a href="{{route('admin.questions.index')}} ">Questions</a></h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Questions</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row" id="tableQuestionsShowed">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-table"></i> All Questions</h3>
                    All questions are shown here, if you want to go for a specific type of question, you should look for it as a position;
                </div>
                <div class="card-body">
                    <div>
                        Remember that you can <a href="javascript:showCreate()" ><b>Add a new question</b></a>:
                    </div>
                    <div class="table-responsive">
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                        @endif
                        <table id="QuestionsTable" class="table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Name</th>
                                    <!-- <th>User ID</th> -->
                                    <!-- <th>Status</th> -->
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th colspan="4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <!-- <td>{{$question->id}}</td> -->
                                    <td>{{$question->question_name}}</td>
                                    <!-- <td>{{$question->user_id}}</td> -->
                                    <!-- <td>{{$question->exam_id}}</td> -->
                                    <td>{{$question->created_at}}</td>
                                    <td>{{$question->updated_at}}</td>
                                    <td><a href="javascript:showEdit({{$question->id}})" class="btn btn-success">Edit</a></td>
                                    <td>
                                        <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST">
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
                                <td>{{$questions->links()}}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="createQuestion" style="display: none;">
        @include('admin.registerQuestion')
    </div>
    <div id="editQuestion" style="display: none;">
        @include('admin.editQuestion')
    </div>
@endsection
<script>
    function showCreate() {
        console.log('showCreate');
        $("#tableQuestionsShowed").hide();
        $("#editQuestion").hide();
        $("#createQuestion").show();
    }

    function hideForm() {
        console.log('hideForm');
        $("#tableQuestionsShowed").show();
        $("#editQuestion").hide();
        $("#createQuestion").hide();
    }

    function showEdit(id) {
        console.log("ID showEdit: ",id)
        $("#tableQuestionsShowed").hide();
        $("#createQuestion").hide();
        $.get("questions/"+id+"/edit", function(data, status){
            console.log("data showEdit: ",data);
            var datos = data.split(",");
            $("#question_name").val(datos[1]);
            $("#formEdit").attr("action","http://tracking.szertegia.dc/admin/questions/"+id);
        });
        $("#editQuestion").show();
    }
    
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>