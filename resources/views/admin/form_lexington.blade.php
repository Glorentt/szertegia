@extends('layouts.admin')

@section('title', 'QA Lexington')
@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function () {
        $('#sub_evaluate').addClass('active');
    });

</script>
<div class="row">
    <div class="col-xl-12">
        <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Lexington Quality</h1>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Lexington</li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>


    <div class="card col-md-12 col-lg-12 col-xl-12">
        <div class="card-header">
            <h3><i class="fa fa-check-square-o"></i>Lexington evaluation</h3>
            The evaluation of the Lexington must be visualized by the evaluated agent
        </div>

        <div class="card-body ">
            <form class="was-validated row" method="POST" action="{{route('admin.lexington.store')}} ">
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="">Agent to evaluate</label>

                        <input type="text" class="form-control" list="names" name="nameAgent" id="nameAgent"
                            onkeyup="liveSearch(this.value)" autocomplete="off">
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
                        <label for="Q1">1.- Agent used effective questioning/probing skills/questions
                        </label>
                        <select class="custom-select" name="Q1" id="Q1" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" name="C1" id="C1" value="{{ old('C1') }}"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q2">2.- Did the agent mention the company name,his/ her name ?
                        </label>
                        <select class="custom-select" name="Q2" id="Q2" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" name="C2" id="C2" value="{{ old('C2') }}"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q3">3.-Building credibility and rapport.. Showing empathy (not script reading all
                            the time)
                        </label>
                        <select class="custom-select" name="Q3" id="Q3" required onchange="score()">
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" name="C3" value="{{ old('C3') }}" id="C3"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q4">4.- Did the agent answer quickly and correctly?(less than 2 seconds)
                        </label>
                        <select class="custom-select" name="Q4" id="Q4" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>
                        <input type="hidden" name="QA_id" value="{{Session('id')}} ">


                        <input type="text" class="form-control" name="C4" value="{{ old('C4') }}" id="C4"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q5">5.- REBUTTALS: never take no for an answer(MIN 2 rebuttals depending on
                            situation more rebuttals should be used)
                        </label>
                        <select class="custom-select" name="Q5" id="Q5" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" name="C5" value="{{ old('C5') }}" id="C5"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q6">6.- Did the agent ask for / confirm the caller's informatio(qulifying
                            questions)?
                        </label>
                        <select class="custom-select" name="Q6" id="Q6" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" value="{{ old('C6') }}" name="C6" id="C6"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q7">7.- TONE AND INFLECTION:The agent sound confident /focused?ex:it's not what you
                            say it's how you say it.
                        </label>
                        <select class="custom-select" name="Q7" id="Q7" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" value="{{ old('C7') }}" name="C7" id="C7"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>

                    <div class="form-group">
                        <label for="Q8">8.- CONTROL OF CALL: The agent took ownership of the call ex: is the customer
                            getting off subject- bring it back
                        </label>
                        <select class="custom-select" name="Q8" id="Q8" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" value="{{ old('C8') }}" name="C8" id="C8"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>

                    


                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="Q9">9.- Disposition Correctly:Did the agent disposition correctly?
                        </label>
                        <select class="custom-select" name="Q9" id="Q9" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>


                        <input type="text" class="form-control" value="{{ old('C9') }}" name="C9" id="C9"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q10">10.-Correct Handoff/no dead air during warm transfer (small talk)
                        </label>
                        <select class="custom-select" name="Q10" id="Q10" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>
                        <input type="text" class="form-control" value="{{ old('C10') }}" name="C10" id="C10"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q11">11.- ACTIVE LISTENING:Agent demonstrated active listening ( listen to cx WINs/can paraphrase)
                        </label>
                        <select class="custom-select" name="Q11" id="Q11" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>
                        <input type="text" class="form-control" value="{{ old('C11') }}" name="C11" id="C11"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q12">12.- Agent displayed a professional,friendly,welcoming manner throughout the call (word choice)
                        </label>
                        <select class="custom-select" name="Q12" id="Q12" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>
                        <input type="text" class="form-control" value="{{ old('C12') }}" name="C12" id="C12"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q13">13.- PITCHING: make sure pitch correctly/cross-pitch (verticals)
                        </label>
                        <select class="custom-select" name="Q13" id="Q13" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>
                        <input type="text" class="form-control" value="{{ old('C13') }}" name="C13" id="C13"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q14">14.- KNOWLEDGEABLE: demonstrated  knowledge, avoided silences,quickly answer:know what we offer and how to offer them to the customers
                        </label>
                        <select class="custom-select" name="Q14" id="Q14" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>
                        <input type="text" class="form-control" value="{{ old('C14') }}" name="C14" id="C14"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q15">15.- DNC: process was done correctly (1 rebuttal )
                        </label>
                        <select class="custom-select" name="Q15" id="Q15" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>
                        <input type="text" class="form-control" value="{{ old('C15') }}" name="C15" id="C15"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="Q16">16.- TRANSFER PROCESS:  tarnsferred correctly with all information required
                        </label>
                        <select class="custom-select" name="Q16" id="Q16" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="6.25">pass</option>
                            <option value="0">fail</option>
                        </select>
                        <input type="text" class="form-control" value="{{ old('C16') }}" name="C16" id="C16"
                            aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>

                    </div>
                    <div class="form-group">
                        <label for="">Score</label>
                        <input type="text" class="form-control" name="finalScore" id="finalScore">
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="finalComment">Final Comment</label>
                        <textarea class="form-control" id="finalComment" name="finalComment"
                            value="{{ old('finalComment') }}" rows="3"></textarea>
                    </div>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>

    </div><!-- end card-->
</div><!-- end row-->
<script src="{{asset('/assets/js/afthaProgram/liveSearchNames.js') }} "></script>
<script src="{{asset('/assets/js/lexington/scoresQA.js') }}"></script>
@endsection