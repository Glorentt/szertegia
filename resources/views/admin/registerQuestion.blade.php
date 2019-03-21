<body>
    <!-- <div class="card" id="formulario"> -->
    <div class="container">
        <h5 class="card-header">Create Question</h5><br>
        <!-- <div class="card-body"> -->
            <form class="form-group" method="POST" action="{{route('admin.questions.store') }}" enctype="multipart/form-data">
                <!-- <div class="container"> -->
                    @csrf
                    <div class="row" >
                        <div class="col-md-6" >
                            <input type="hidden" name="_token" id="token" value="{{ Session::token() }}" />
                            <div class="form-group">
                                <label for="">Question Name</label>
                                <input required type="text" name="question_name" class="form-control" placeholder="">
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