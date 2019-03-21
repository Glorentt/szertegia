@extends('layouts.admin')

@section('title', 'QA Forex')
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
      <h1 class="main-title float-left">Forex</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Forex</li>
      </ol>
      <div class="clearfix"></div>
    </div>
  </div>


      <div class="card col-md-12 col-lg-12 col-xl-12">
        <div class="card-header">
          <h3><i class="fa fa-check-square-o"></i> Forex Call Monitoring</h3>
          Evaluation for Forex Call Monitoring
        </div>

        <div class="card-body ">
          <form class="was-validated row" method="POST" action="{{route('admin.forex.store')}} ">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="">Name</label>
                    <input type="hidden" name="user_id" value="{{Session('id')}} ">
                    <input type="hidden" name="QA_id" value="{{Session('id')}} ">
                    <input type="text" class="form-control" list="names" name="nameAgent" id="nameAgent" onkeyup="liveSearch(this.value)"  autocomplete="off" >
                    <input type="hidden" class="form-control"  name="agentID" id="agentID" autocomplete="false" >
                    <datalist id="names"></datalist>
                </div>
                <div class="form-group">
                    <label for="">Supervisor</label>
                    <input type="text" class="form-control" name="nameSupervisor" id="nameSupervisor" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" class="form-control" pattern="\d*" maxlength="10" name="dateToday" id="dateToday" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                  <label for="">Call reference</label>
                  <input type="text" class="form-control" pattern="\d*" maxlength="10" name="audio" id="audio" aria-describedby="helpId" placeholder="">
              </div>
              <div class="form-group">
                  <label for="">Call recording reference</label>
                  <input type="text" class="form-control" pattern="\d*" maxlength="10" name="audioTwo" id="audioTwo" aria-describedby="helpId" placeholder="">
              </div>
              <div class="form-group">
                  <label for="">Customer number</label>
                  <input type="text" class="form-control" pattern="\d*" maxlength="10" name="phone" id="phone" aria-describedby="helpId" placeholder="">
              </div>
            </div>
            <div class="clearfix visible-xs-block"></div>
            <div class="col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                <label for="Q1">1.- Did the agent say mention call is being recorded? (if Applicable)</label>
                <select class="custom-select" name="Q1" id="Q1" onchange="score()" >
                <!-- <select class="custom-select" name="Q1" id="Q1" onchange="score()" required> -->
                  <option value="">Choose one option</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  <option value="1">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Q2">2.- Did the agent mention the company name,his/ her name ?</label>
                <select class="custom-select" name="Q2" id="Q2" onchange="score()" >
                <!-- <select class="custom-select" name="Q2" id="Q2" onchange="score()" required> -->
                  <option value="">Choose one option</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  <option value="1">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Q3">3.- Agent offered further assistance at end of the call</label>
                <select class="custom-select" name="Q3" id="Q3" onchange="score()" >
                <!-- <select class="custom-select" name="Q3" id="Q3" onchange="score()" required> -->
                  <option value="">Choose one option</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  <option value="1">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Q4">4.- Did the agent answer quickly and correctly? (less than 2 seconds)</label>
                <select class="custom-select" name="Q4" id="Q4" onchange="score()" >
                <!-- <select class="custom-select" name="Q4" id="Q4" onchange="score()" required> -->
                  <option value="">Choose one option</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  <option value="1">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Q5">5.- If the call was transferred did the agent adapt the greeting accordingly?</label>
                <select class="custom-select" name="Q5" id="Q5" onchange="score()" >
                <!-- <select class="custom-select" name="Q5" id="Q5" onchange="score()" required> -->
                  <option value="">Choose one option</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  <option value="1">N/A</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                <label for="Q6">6.- Did the agent ask for / confirm the caller's information?</label>
                <select class="custom-select" name="Q6" id="Q6" onchange="score()" >
                <!-- <select class="custom-select" name="Q6" id="Q6" onchange="score()" required> -->
                  <option value="">Choose one option</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  <option value="1">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Q7">7.- The agent sound confident /focused?</label>
                <select class="custom-select" name="Q7" id="Q7" onchange="score()" >
                <!-- <select class="custom-select" name="Q7" id="Q7" onchange="score()" required> -->
                  <option value="">Choose one option</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  <option value="1">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Q8">8.- The agent took ownership of the call</label>
                <select class="custom-select" name="Q8" id="Q8" onchange="score()" >
                <!-- <select class="custom-select" name="Q8" id="Q8" onchange="score()" required> -->
                  <option value="">Choose one option</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  <option value="1">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Q9">9.- Did the agent disposition correctly?</label>
                <select class="custom-select" name="Q9" id="Q9" onchange="score()" >
                <!-- <select class="custom-select" name="Q9" id="Q9" onchange="score()" required> -->
                  <option value="">Choose one option</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  <option value="1">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Q10">10.- Agent avoided long silences during the call?</label>
                <select class="custom-select" name="Q10" id="Q10" onchange="score()" >
                <!-- <select class="custom-select" name="Q10" id="Q10" onchange="score()" required> -->
                  <option value="">Choose one option</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                  <option value="1">N/A</option>
                </select>
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
<script src="{{asset('/assets/js/Forex/liveSearchNames.js') }} "></script>
<script src="{{asset('/assets/js/Forex/scoresQA.js') }}"></script>
@endsection
