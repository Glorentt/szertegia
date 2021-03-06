@extends('layouts.admin')

@section('title', 'QA Afta')
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
      <h1 class="main-title float-left">Aftha qualifiers form</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Aftha</li>
      </ol>
      <div class="clearfix"></div>
    </div>
  </div>
      <div class="card col-md-12 col-lg-12 col-xl-12">
        <div class="card-header">
          <h3><i class="fa fa-check-square-o"></i> Afta Quality evaluation</h3>
          The evaluation of the aftha program must be visualized by the evaluated agent
        </div>
        <div class="card-body ">
          <form class="was-validated row" method="POST" action="{{route('aftha.form.store')}} ">
            <div class="col-md-6 col-lg-6 col-xl-6">
              <div class="row">
                <div class="col-10">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <label for="">Agent to evaluate</label>
                  <input type="text" class="form-control" list="names" name="nameAgent" id="nameAgent" onkeyup="liveSearch(this.value)"  autocomplete="off" >
                  <input type="hidden" class="form-control"  name="agentID" id="agentID" autocomplete="false" >
                  <datalist id="names"></datalist>
                </div>
              </div>
              <div class="form-group">
                <label for="">Record to evaluate</label>
                <input type="text" class="form-control" name="audio" id="audio" aria-describedby="helpId" 
                placeholder="">
                <small id="helpId" class="form-text text-muted">Url of audio</small>
              </div>
              <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" class="form-control" pattern="\d*" maxlength="10" name="phone" id="phone" 
                aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">type a phone number</small>
              </div>
              <div class="form-group">
                <label for="Q1">1.- The call is being recorded in troduction (if Applicable)
                </label>
                <select class="custom-select" name="Q1" id="Q1" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="3">pass</option>
                  <option value="0">fail</option>
                </select>
                <input type="text" class="form-control" name="C1" id="C1" value="{{ old('C1') }}" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>
              </div>
              <div class="form-group">
                <label for="Q2">2.- Did the agent mention his/ her name and company name ?
                </label>
                <select class="custom-select" name="Q2" id="Q2" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="3">pass</option>
                  <option value="0">fail</option>
                </select>
                <input type="text" class="form-control" name="C2" id="C2" value="{{ old('C2') }}" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>
              </div>
              <div class="form-group">
                <label for="Q3">3.-Agent pro-actively added value throughout call
                </label>
                <select class="custom-select" name="Q3" id="Q3" required onchange="score()">
                  <option value="">Choose one option</option>
                  <option value="3">pass</option>
                  <option value="0">fail</option>
                </select>


                <input type="text" class="form-control" name="C3" value="{{ old('C3') }}" id="C3" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q4">4.- Did the agent answer quickly and correctly?(less than 2 seconds)
                </label>
                <select class="custom-select" name="Q4" id="Q4" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="3">pass</option>
                  <option value="0">fail</option>
                </select>
                <input type="hidden" name="QA_id" value="{{Session('id')}} ">


                <input type="text" class="form-control" name="C4" value="{{ old('C4') }}" id="C4" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q5">5.- The agent took ownership/ control of the call?
                </label>
                <select class="custom-select" name="Q5" id="Q5" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="3">pass</option>
                  <option value="0">fail</option>
                </select>


                <input type="text" class="form-control" name="C5" value="{{ old('C5') }}" id="C5" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q6">6.- Did the agent pitch credit repair correctly/completely before transferring?
                </label>
                <select class="custom-select" name="Q6" id="Q6" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="3">pass</option>
                  <option value="0">fail</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C6') }}" name="C6" id="C6" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q7">7.- The agent asked all appropriate questions
                </label>
                <select class="custom-select" name="Q7" id="Q7" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="3">pass</option>
                  <option value="0">fail</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C7') }}" name="C7" id="C7" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>

              <div class="form-group">
                <label for="Q8">8.- Did the agent disposition correctly?
                </label>
                <select class="custom-select" name="Q8" id="Q8" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="3">pass</option>
                  <option value="0">fail</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C8') }}" name="C8" id="C8" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q9">9.- Agent avoided long silences during the call/ transfers?
                </label>
                <select class="custom-select" name="Q9" id="Q9" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="3">pass</option>
                  <option value="0">fail</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C9') }}" name="C9" id="C9" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q10">10.- Agent sounded clear, confident ,upbeat and enthusiastic  not distracted throughout the call
                </label>
                <select class="custom-select" name="Q10" id="Q10" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="3">pass</option>
                  <option value="0">fail</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C10') }}" name="C10" id="C10" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>


            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                <label for="Q11">11.- The agent offered an appropriate  solution/address cx questions
                </label>
                <select class="custom-select" name="Q11" id="Q11" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="0">0</option>
                  <option value="0.6">1</option>
                  <option value="1.2">2</option>
                  <option value="1.8">3</option>
                  <option value="2.4">4</option>
                  <option value="3">5</option>
                  <option value="3.6">6</option>
                  <option value="4.2">7</option>
                  <option value="4.8">8</option>
                  <option value="5.4">9</option>
                  <option value="6">10</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C11') }}" name="C11" id="C11" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q12">12.- Did the agent sound knowledgeable / correct word choice
                </label>
                <select class="custom-select" name="Q12" id="Q12" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="0">0</option>
                  <option value="0.6">1</option>
                  <option value="1.2">2</option>
                  <option value="1.8">3</option>
                  <option value="2.4">4</option>
                  <option value="3">5</option>
                  <option value="3.6">6</option>
                  <option value="4.2">7</option>
                  <option value="4.8">8</option>
                  <option value="5.4">9</option>
                  <option value="6">10</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C12') }}" name="C12" id="C12" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q13">13.-  Empathy/rapport was attempted to be built
                </label>
                <select class="custom-select" name="Q13" id="Q13" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="0">0</option>
                  <option value="0.8">1</option>
                  <option value="1.6">2</option>
                  <option value="2.4">3</option>
                  <option value="3.2">4</option>
                  <option value="4">5</option>
                  <option value="4.8">6</option>
                  <option value="5.6">7</option>
                  <option value="6.4">8</option>
                  <option value="7.2">9</option>
                  <option value="8">10</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C13') }}" name="C13" id="C13" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q14">14.- Agent qualified or disqualified the prospect properly
                </label>
                <select class="custom-select" name="Q14" id="Q14" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="0">0</option>
                  <option value="0.8">1</option>
                  <option value="1.6">2</option>
                  <option value="2.4">3</option>
                  <option value="3.2">4</option>
                  <option value="4">5</option>
                  <option value="4.8">6</option>
                  <option value="5.6">7</option>
                  <option value="6.4">8</option>
                  <option value="7.2">9</option>
                  <option value="8">10</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C14') }}" name="C14" id="C14" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>

              <div class="form-group">
                <label for="Q15">15.- Agent did not interrupt or talk over the customer/was not patronizing or sarcastic
                </label>
                <select class="custom-select" name="Q15" id="Q15" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="0">0</option>
                  <option value="0.8">1</option>
                  <option value="1.6">2</option>
                  <option value="2.4">3</option>
                  <option value="3.2">4</option>
                  <option value="4">5</option>
                  <option value="4.8">6</option>
                  <option value="5.6">7</option>
                  <option value="6.4">8</option>
                  <option value="7.2">9</option>
                  <option value="8">10</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C15') }}" name="C15" id="C15" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q16">16.- Agent used effective questioning/probing skills
                </label>
                <select class="custom-select" name="Q16" id="Q16" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="0">0</option>
                  <option value="0.6">1</option>
                  <option value="1.2">2</option>
                  <option value="1.8">3</option>
                  <option value="2.4">4</option>
                  <option value="3">5</option>
                  <option value="3.6">6</option>
                  <option value="4.2">7</option>
                  <option value="4.8">8</option>
                  <option value="5.4">9</option>
                  <option value="6">10</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C16') }}" name="C16" id="C16" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q17">17.- Agent demonstrated active listening
                </label>
                <select class="custom-select" name="Q17" id="Q17" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="0">0</option>
                  <option value="0.8">1</option>
                  <option value="1.6">2</option>
                  <option value="2.4">3</option>
                  <option value="3.2">4</option>
                  <option value="4">5</option>
                  <option value="4.8">6</option>
                  <option value="5.6">7</option>
                  <option value="6.4">8</option>
                  <option value="7.2">9</option>
                  <option value="8">10</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C17') }}" name="C17" id="C17" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q18">18.- Agent displayed a professional,friendly,welcoming manner throughout the call
                </label>
                <select class="custom-select" name="Q18" id="Q18" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="0">0</option>
                  <option value="0.6">1</option>
                  <option value="1.2">2</option>
                  <option value="1.8">3</option>
                  <option value="2.4">4</option>
                  <option value="3">5</option>
                  <option value="3.6">6</option>
                  <option value="4.2">7</option>
                  <option value="4.8">8</option>
                  <option value="5.4">9</option>
                  <option value="6">10</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C18') }}" name="C18" id="C18" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q19">19.-  Correct   transfer and hand off procedure was followed.
                </label>
                <select class="custom-select" name="Q19" id="Q19" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="0">0</option>
                  <option value="0.8">1</option>
                  <option value="1.6">2</option>
                  <option value="2.4">3</option>
                  <option value="3.2">4</option>
                  <option value="4">5</option>
                  <option value="4.8">6</option>
                  <option value="5.6">7</option>
                  <option value="6.4">8</option>
                  <option value="7.2">9</option>
                  <option value="8">10</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C19') }}" name="C19" id="C19" aria-describedby="helpId" placeholder="Some comment about this question?">
                <small id="helpId" class="form-text text-muted">write a short comment about it</small>

              </div>
              <div class="form-group">
                <label for="Q20">20.- Agent rebuttaled during call and continued with the script// scheduled call back  correctly
                </label>
                <select class="custom-select" name="Q20" id="Q20" onchange="score()" required>
                  <option value="">Choose one option</option>
                  <option value="0">0</option>
                  <option value="0.6">1</option>
                  <option value="1.2">2</option>
                  <option value="1.8">3</option>
                  <option value="2.4">4</option>
                  <option value="3">5</option>
                  <option value="3.6">6</option>
                  <option value="4.2">7</option>
                  <option value="4.8">8</option>
                  <option value="5.4">9</option>
                  <option value="6">10</option>
                </select>


                <input type="text" class="form-control" value="{{ old('C20') }}" name="C20" id="C20" aria-describedby="helpId" placeholder="Some comment about this question?">
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
<script src="{{asset('/assets/js/caseManagers/scoresQA.js') }}"></script>
@endsection
