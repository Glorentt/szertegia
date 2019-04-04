<div class="card" id="formulario">
    <h5 class="card-header">Edit Score</h5>
    <div class="card-body">
        <h5 class="card-title">Score to edit an existent form.</h5>
        <form class="was-validated" id="scoreEdit" method="PUT" action="{{route('admin.scores.update',15)}}">
            @method('PUT')
            @csrf
            <div class="container">
                @csrf
                <div class="row" >
                    <div class="col-md-6" >
                        <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                        <input type="hidden" name="updated_at" id="updated_at" class="form-control">
                        <div id="ScoreTable" class="form-group">
                            <label for="">Score Name</label>
                            <input required type="text" name="form_id" id="form_id" class="form-control" 
                                autocomplete="off" placeholder="" value="{{$score->form_id}}">
                        </div>
                        <div id="ScoreTable" class="form-group">
                            <label for="">Score Name</label>
                            <input required type="text" name="question_id" id="question_id" class="form-control" 
                                autocomplete="off" placeholder="" value="{{$score->question_id}}">
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        <div id="ScoreTable" class="form-group">
                            <label for="">Score Name</label>
                            <input required type="text" name="score" id="score" class="form-control" 
                                autocomplete="off" placeholder="" value="{{$score->score}}">
                        </div>
                        <input type="hidden" name="user_id" id="user_id" value="{{Session('id')}}">
                        <div id="ScoreTable" class="form-group">
                            <label for="">Score Name</label>
                            <input required type="text" name="acknowledge" id="acknowledge" class="form-control" 
                                autocomplete="off" placeholder="" value="{{$score->acknowledge}}">
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