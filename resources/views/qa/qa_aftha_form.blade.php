@extends('layouts.qa')

@section('title', 'QA Aftha')
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
                    <h1 class="main-title float-left">Aftha form Quality</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Aftha</li>
                    </ol>
                    <div class="clearfix"></div>
            </div>
    </div>

</div>

<div class=form-control>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">						
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-check-square-o"></i> Afta Quality evaluation</h3>
                The evaluation of the aftha program must be visualized by the evaluated agent 
            </div>
                
            <div class="card-body">
                
                <form class="was-validated" method="POST" action="{{route('qa.form.store')}} ">
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
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="Q1">1.- <strong><i>Greeting:</i></strong>  Must have an immediate, clear greeting with
                            agent name ad business name.
                        </label>
                        <select class="custom-select" name="Q1" id="Q1" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>
                        
                        
                        <input type="text" class="form-control" name="C1" id="C1" value="{{ old('C1') }}" aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>
                    
                    </div>
                    <div class="form-group">
                        <label for="Q2">2.- <strong><i>Company introduction:</i></strong> Fluently explain what the <i>AFTHA program
                            and Credit Specialist </i>are and what they do for our customers.
                        </label>
                        <select class="custom-select" name="Q2" id="Q2" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>
                        
                        
                        <input type="text" class="form-control" name="C2" id="C2" value="{{ old('C2') }}" aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>
                    
                    </div>
                    <div class="form-group">
                        <label for="Q3">3.- Asked all questions.
                        </label>
                        <select class="custom-select" name="Q3" id="Q3" required onchange="score()">
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>
                        
                        
                        <input type="text" class="form-control" name="C3" value="{{ old('C3') }}" id="C3" aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>
                    
                    </div>
                    <div class="form-group">
                        <label for="Q4">4.- <strong><i>Data Capture:</i></strong> Verify that the customer data in the CRM is correct and explain
                            the literature that will be sent to the customer..
                        </label>
                        <select class="custom-select" name="Q4" id="Q4" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>
                        <input type="hidden" name="QA_id" value="{{Session('id')}} ">
                        
                        
                        <input type="text" class="form-control" name="C4" value="{{ old('C4') }}" id="C4" aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>
                    
                    </div>
                    <div class="form-group">
                        <label for="Q5">5.- <strong><i>Control the call: </i></strong>While answering the customer's (relevant)
                            questions thoroughly, keep control of the  conversation and do not ask yes or no questions.
                        </label>
                        <select class="custom-select" name="Q5" id="Q5" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>
                        
                        
                        <input type="text" class="form-control" name="C5" value="{{ old('C5') }}" id="C5" aria-describedby="helpId" placeholder="Some comment about this question?">
                        <small id="helpId" class="form-text text-muted">write a short comment about it</small>
                    
                    </div>
                    <div class="form-group">
                        <label for="Q6">6.- <strong><i>Transfer</i></strong>.
                        </label>
                        <select class="custom-select" name="Q6" id="Q6" onchange="score()" required>
                            <option value="">Choose one option</option>
                            <option value="1">pass</option>
                            <option value="0">fail</option>
                        </select>
                        
                        
                        <input type="text" class="form-control" value="{{ old('C6') }}" name="C6" id="C6" aria-describedby="helpId" placeholder="Some comment about this question?">
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

                </form>
                
            </div>							
            </div><!-- end card-->					
        </div>
    </div>
    

</div>

<script src="{{asset('/assets/js/afthaProgram/liveSearchNames.js') }} "></script>
<script src="{{asset('/assets/js/afthaProgram/scoreQA.js') }}"></script>
@endsection