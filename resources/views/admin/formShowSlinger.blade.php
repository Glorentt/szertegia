@extends('layouts.admin')

@section('title', 'ShowSlinger')
@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function () {
        $('#sub_evaluate').addClass('active subdrop');
        $('#sub_show').addClass('active');
    });

</script>
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Bizwell quality</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Bizwell</li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>

</div>

<div class=form-control>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Bizwell Quality evaluation</h3>
                The evaluation of the aftha program must be visualized by the evaluated agent
            </div>

            <div class="card-body">

                <form class="was-validated" method="POST" action="{{route('admin.showslingers.store')}}">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="">Agent to evaluate</label>

                        <input type="text" class="form-control" list="names" name="nameAgent" id="nameAgent" onkeyup="liveSearch(this.value)"
                            autocomplete="off">
                        <input type="hidden" class="form-control" name="agentID" id="agentID" autocomplete="false">
                        <datalist id="names"></datalist>
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
                        <label for="Q1">1.- <strong>Did the agent mention the company?</strong>
                        </label>
                        <select class="custom-select" name="Q1" id="Q1" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" name="C1" id="C1" value="{{ old('C1') }}"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q2">2.- <strong>Did the agent mention his/ her name ?</strong>
                        </label>
                        <select class="custom-select" name="Q2" id="Q2" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" name="C2" id="C2" value="{{ old('C2') }}"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q3">3.- <strong>Agent pro-actively added value throughout call</strong>
                        </label>
                        <select class="custom-select" name="Q3" id="Q3" required onchange="score()">
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" name="C3" value="{{ old('C3') }}" id="C3"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q4">4.- <strong>Did the agent answer quickly and correctly?(less than 2 seconds)</strong>
                        </label>
                        <select class="custom-select" name="Q4" id="Q4" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>
                        <input type="hidden" name="QA_id" value="{{Session('id')}} ">


                        <input type="text" class="form-control" name="C4" value="{{ old('C4') }}" id="C4"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q5">5.- <strong>Did the agent ask for/collect information?</strong>
                        </label>
                        <select class="custom-select" name="Q5" id="Q5" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" name="C5" value="{{ old('C5') }}" id="C5"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q6">6.- <strong>The agent sound confident /focused/ownership on call?.</strong>.
                        </label>
                        <select class="custom-select" name="Q6" id="Q6" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" value="{{ old('C6') }}" name="C6" id="C6"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <!-- <div class="form-group">
                        <label for="Q7">7.- <strong>The agent took ownership of the call</strong>.
                        </label>
                        <select class="custom-select" name="Q7" id="Q7" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" value="{{ old('C7') }}" name="C7" id="C7"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div> -->

                    <div class="form-group">
                        <label for="Q7">7.-
                            <strong>Did the agent disposition correctly in vicidia?</strong>
                        </label>
                        <select class="custom-select" name="Q7" id="Q7" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C7') }}" name="C7" id="C7"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q8">8.-
                            <strong>Agent avoided pausing during the call?</strong>
                        </label>
                        <select class="custom-select" name="Q8" id="Q8" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C8') }}" name="C8" id="C8"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q9">9.-
                            <strong>Agent properly documented call notes in Asana?</strong>
                        </label>
                        <select class="custom-select" name="Q9" id="Q9" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C9') }}" name="C9" id="C9"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <!-- <div class="form-group">
                        <label for="Q11">11.-
                            <strong>The agent offered an appropriate timescale for a solution?</strong>
                        </label>
                        <select class="custom-select" name="Q11" id="Q11" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C11') }}" name="C11" id="C11"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div> -->
                    <div class="form-group">
                        <label for="Q10">10.-
                            <strong> Did the agent rebuttal and close? (min 2 times)</strong>
                        </label>
                        <select class="custom-select" name="Q10" id="Q10" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C10') }}" name="C10" id="C10"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q11">11.-
                            <strong> Empathy/rapport was attempted to be built?</strong>
                        </label>
                        <select class="custom-select" name="Q11" id="Q11" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C11') }}" name="C11" id="C11"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <!-- <div class="form-group">
                        <label for="Q14">14.-
                            <strong>Agent qualified or disqualified the prospect properly?</strong>
                        </label>
                        <select class="custom-select" name="Q14" id="Q14" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C14') }}" name="C14" id="C14`"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div> -->
                    <!-- <div class="form-group">
                        <label for="Q15">15.-
                            <strong>Agent did not interrupt or talk over the customer?</strong>
                        </label>
                        <select class="custom-select" name="Q15" id="Q15" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C15') }}" name="C15" id="C15"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div> -->
                    <div class="form-group">
                        <label for="Q12">12.-
                            <strong>Agent used effective questioning/probing skills?</strong>
                        </label>
                        <select class="custom-select" name="Q12" id="Q12" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C12') }}" name="C12" id="C12"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q13">13.-
                            <strong>Agent demonstrated active listening?</strong>
                        </label>
                        <select class="custom-select" name="Q13" id="Q13" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C13') }}" name="C13" id="C13"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q14">14.-
                            <strong> Agent displayed a professional,friendly,welcoming manner throughout the call?</strong>
                        </label>
                        <select class="custom-select" name="Q14" id="Q14" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>

                        <input type="text" class="form-control" value="{{ old('C14') }}" name="C14" id="C14"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">






                    <div class="form-group">
                        <label for="">Score</label>
                        <input type="text" class="form-control" name="finalScore" id="finalScore">
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="finalComment">Final Comment</label>
                        <textarea class="form-control" id="finalComment" name="finalComment" value="{{ old('finalComment') }}"
                            rows="3"></textarea>
                    </div>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>
        </div><!-- end card-->
    </div>
</div>


</div>

<script src="{{asset('/assets/js/afthaProgram/liveSearchNames.js') }} "></script>
<script src="{{asset('/assets/js/showslingerProgram/scoreQA.js') }}"></script>
@endsection
