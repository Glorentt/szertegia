<body>
    <!-- <div class="card" id="formulario"> -->
    <div class="container">
        <h5 class="card-header">Create Score</h5><br>
        <!-- <div class="card-body"> -->
            <form class="form-group" method="POST" action="{{route('admin.scores.store') }}" enctype="multipart/form-data">
                <!-- <div class="container"> -->
                    @csrf
                    <div class="row" >
                        <div class="col-md-6" >
                            <input type="hidden" name="_token" id="token" value="{{ Session::token() }}" />
                            <div class="form-group">
                                <label for="">Score Name</label>
                                <input required type="text" name="form_id" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Score Name</label>
                                <input required type="text" name="question_id" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-6" >
                            <div class="form-group">
                                <label for="">Score Name</label>
                                <input required type="text" name="score" class="form-control" placeholder="">
                            </div>
                            <input type="hidden" name="user_id" id="user_id" value="{{Session('id')}}">
                            <div class="form-group">
                                <label for="">Score Name</label>
                                <input required type="text" name="acknowledge" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger" onclick="hideForm()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                <!-- </div> -->
            </form> 
        <!-- </div> -->
    </div>
</body>