@csrf
<div class="row" >
    <div class="col-md-6" >
        <input type="hidden" name="_token" id="token" value="{{ Session::token() }}" />
        <div class="form-group">
            <label for="">Question Name</label>
            <input required type="text" name="question_name" class="form-control">
        </div>
    </div>
</div>