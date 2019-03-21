<div class="card" id="formulario">
    <h5 class="card-header">Edit Question</h5>
    <div class="card-body">
        <h5 class="card-title">Form to edit an existent question.</h5>
        <form class="was-validated" id="formEdit" method="PUT" action="{{route('admin.questions.update',15)}}">
            @method('PUT')
            @csrf
            <div class="container">
                @csrf
                <div class="row" >
                    <div class="col-md-6" >
                        <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                        <input type="hidden" name="user_id" id="user_id" value="{{Session('id')}}">
                        <input type="hidden" name="updated_at" id="updated_at" class="form-control">
                        <input type="hidden" name="exam_id" id="exam_id" class="form-control" value="0">
                        <div id="QuestionsTable" class="form-group">
                            <label for="">Question Name</label>
                            <input required type="text" name="question_name" id="question_name" class="form-control" 
                                autocomplete="off" placeholder="" value="{{$question->question_name}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="reset" class="btn btn-danger" onclick="hideForm()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
        
    </div>
</div>


