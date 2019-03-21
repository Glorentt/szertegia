{{-- @extends('layouts.admin')

@section('title', 'All Answers')

@section('content') --}}
    <script>
        //script to change active class in submenus
        $(document).ready(function(){
            $('#sub_quiz').addClass('active');
        });
    </script>
    <div class="card" id="formulario">
        <h5 class="card-header">Create Answer</h5>
        <div class="card-body">
            <form class="form-group" method="POST" action="{{route('admin.answers.store') }}" enctype="multipart/form-data">
                <div class="container">
                    @csrf
                    <div class="row" >
                        <div class="col-md-6" >
                            <input type="hidden" name="_token" id="token" value="{{ Session::token() }}" />
                            <div class="form-group">
                                <label for="">Answer Name</label>
                                <input required type="text" name="answer_name" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger" onclick="hideForm()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form> 
        </div>
    </div>
{{-- @endsection --}}