@extends('layouts.admin')

@section('title', 'QA Szertexington')

@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function(){
    $('#sub_evaluate').addClass('active');
  });
    
</script>
<div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Work Your Credit</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Szertegia</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  
  
        <div class="card col-md-12 col-lg-12 col-xl-12">
          <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i> Szertegia Quality evaluation</h3>
            The evaluation of the aftha program must be visualized by the evaluated agent
          </div>
  
          <div class="card-body ">
            <form class="was-validated row" method="POST" action="{{route('admin.Szertexington.store')}} ">
              <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <label for="">Agent to evaluate</label>
  
                  <input type="text"
                  class="form-control" list="names" name="nameAgent" id="nameAgent"
                  onkeyup="liveSearch(this.value)"  autocomplete="off" >
                  <input type="hidden"
                  class="form-control"  name="agentID" id="agentID"
                  autocomplete="false" >
                  <datalist id="names"></datalist>
                </div>
                <div class="form-group">
                  <label for="">Record to evaluate</label>
                  <input type="text"
                  class="form-control" name="audio" id="audio" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Url of audio</small>
                </div>
                <div class="form-group">
                  <label for="">Phone Number</label>
                  <input type="text"
                  class="form-control" pattern="\d*" maxlength="10" name="phone" id="phone" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">type a phone number</small>
                </div>
                <div class="form-group">
                  <label for="Q1">1.- Call being recorded
                  </label>
                  <select class="custom-select" name="Q1" id="Q1" onchange="score()" required>
                    <option value="" disabled selected>Choose one option</option>
                    <option value="12.5">pass</option>
                    <option value="0">fail</option>
                  </select>
  
  
                  <input type="text" class="form-control" name="C1" id="C1" value="{{ old('C1') }}" aria-describedby="helpId" placeholder="Some comment about this question?">
                  <small id="helpId" class="form-text text-muted">write a short comment about it</small>
  
                </div>
                <div class="form-group">
                  <label for="Q2">2.- Did agent mention his/her name and company name? 
                  </label>
                  <select class="custom-select" name="Q2" id="Q2" onchange="score()" required>
                    <option value="" disabled selected>Choose one option</option>
                    <option value="12.5">pass</option>
                    <option value="0">fail</option>
                  </select>
  
  
                  <input type="text" class="form-control" name="C2" id="C2" value="{{ old('C2') }}" aria-describedby="helpId" placeholder="Some comment about this question?">
                  <small id="helpId" class="form-text text-muted">write a short comment about it</small>
  
                </div>
                <div class="form-group">
                  <label for="Q3">3.-Agent used probing questions? (2 questions min)
                  </label>
                  <select class="custom-select" name="Q3" id="Q3" required onchange="score()">
                    <option value="" disabled selected>Choose one option</option>
                    <option value="12.5">pass</option>
                    <option value="0">fail</option>
                  </select>
  
  
                  <input type="text" class="form-control" name="C3" value="{{ old('C3') }}" id="C3" aria-describedby="helpId" placeholder="Some comment about this question?">
                  <small id="helpId" class="form-text text-muted">write a short comment about it</small>
  
                </div>
                <div class="form-group">
                  <label for="Q4">4.- Does agent sound engage?
                  </label>
                  <select class="custom-select" name="Q4" id="Q4" onchange="score()" required>
                    <option value="" disabled selected>Choose one option</option>
                    <option value="12.5">pass</option>
                    <option value="0">fail</option>
                  </select>
                  <input type="hidden" name="QA_id" value="{{Session('id')}} ">
  
  
                  <input type="text" class="form-control" name="C4" value="{{ old('C4') }}" id="C4" aria-describedby="helpId" placeholder="Some comment about this question?">
                  <small id="helpId" class="form-text text-muted">write a short comment about it</small>
  
                </div>
                <div class="form-group">
                  <label for="Q5">5.- Did the agent pitch credit repair correctly? (Mentioned lex law)
                  </label>
                  <select class="custom-select" name="Q5" id="Q5" onchange="score()" required>
                    <option value="" disabled selected>Choose one option</option>
                    <option value="12.5">pass</option>
                    <option value="0">fail</option>
                  </select>
  
  
                  <input type="text" class="form-control" name="C5" value="{{ old('C5') }}" id="C5" aria-describedby="helpId" placeholder="Some comment about this question?">
                  <small id="helpId" class="form-text text-muted">write a short comment about it</small>
  
                </div>
                <div class="form-group">
                  <label for="Q6">6.- Correct hand-off procedure
                  </label>
                  <select class="custom-select" name="Q6" id="Q6" onchange="score()" required>
                    <option value="" disabled selected>Choose one option</option>
                    <option value="12.5">pass</option>
                    <option value="0">fail</option>
                  </select>
  
  
                  <input type="text" class="form-control" value="{{ old('C6') }}" name="C6" id="C6" aria-describedby="helpId" placeholder="Some comment about this question?">
                  <small id="helpId" class="form-text text-muted">write a short comment about it</small>
  
                </div>
                <div class="form-group">
                  <label for="Q7">7.- Tone of voice (Don´t sound sleepy,robotic,upset)
                  </label>
                  <select class="custom-select" name="Q7" id="Q7" onchange="score()" required>
                    <option value="" disabled selected>Choose one option</option>
                    <option value="12.5">pass</option>
                    <option value="0">fail</option>
                  </select>
  
  
                  <input type="text" class="form-control" value="{{ old('C7') }}" name="C7" id="C7" aria-describedby="helpId" placeholder="Some comment about this question?">
                  <small id="helpId" class="form-text text-muted">write a short comment about it</small>
  
                </div>
  
                <div class="form-group">
                  <label for="Q8">8.- Correct disposition 
                  </label>
                  <select class="custom-select" name="Q8" id="Q8" onchange="score()" required>
                    <option value="" disabled selected>Choose one option</option>
                    <option value="12.5">pass</option>
                    <option value="0">fail</option>
                  </select>
  
  
                  <input type="text" class="form-control" value="{{ old('C8') }}" name="C8" id="C8" aria-describedby="helpId" placeholder="Some comment about this question?">
                  <small id="helpId" class="form-text text-muted">write a short comment about it</small>
  
                </div>  
  
                  <div class="form-group">
                    <label for="">Score</label>
                    <input type="text"
                    class="form-control" name="finalScore" id="finalScore" >
                    <small id="helpId" class="form-text text-muted">Help text</small>
                  </div>
                  <div class="form-group">
                    <label for="finalComment">Final Comment</label>
                    <textarea class="form-control" id="finalComment" name="finalComment" value="{{ old('finalComment') }}" rows="3"></textarea>
                  </div>
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
  
          </div>
  
        </div><!-- end card-->
  </div><!-- end row-->
  <script src="{{asset('/assets/js/afthaProgram/liveSearchNames.js') }} "></script>
  <script src="{{asset('/assets/js/Szertexington/scoresQA.js') }}"></script>
@endsection