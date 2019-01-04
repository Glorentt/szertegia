@extends('layouts.agent')

@section('title', 'ShowSlinger')

@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function(){
        $('#sub_campaigns').addClass('active');
    });
    
</script>
<div class="row">
    <div class="col-xl-12">
            <div class="breadcrumb-holder">
                    <h1 class="main-title float-left"> <a href="{{route('agent.showslingers.index')}} "> ShowSlinger Script</a></h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Showslinger</li>
                    </ol>
                    <div class="clearfix"></div>
            </div>
    </div>
</div>

<div class="row" >
				
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-table"></i> Script</h3>
               <strong class="text-danger"> *Note: do not leave your name or number and do not leave voicemails. 
                   It is a complete waste of time because the GM’s will never call you back. 
                   They will use that info to screen your call if you leave it with them, 
                   so don’t do it!!</strong>
 
            </div>
            1010
                
            <div class="card-body">
                <div>
                    <div class="form-group col-md-6">
                      <label for=""><strong> Hi, can I speak to the GM please?</strong></label>
                      <select class="form-control" name="speaktogm" id="speaktogm">
                        <option value="1">yes</option>
                        <option value="0">no</option>
                      </select>
                      <br>
                      <p class="text-danger"> [**(Gatekeeper) What’s this about? Who can I ask is calling?]</p>
                       <strong class="text-secondary"> This is ________, I’m just calling him back. Can you grab him for me please?</strong>
                    </div>
                    <div class="offset-md-2">

                        <div class="form-group col-md-6">
                            <p class="text-danger"> [If not available]</p>
                            <label for="">  Ok, do you know when the GM will be back in ?</label>
                            <input type="datetime-local"
                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Date</small>
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">  What is their name again? </label>
                            <input type="text"
                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> And what’s his / her email please? I’ll send the email they were requesting. </label>
                            <p class="text-danger">This is IMPORTANT, you must gather as many emails as possible. 
                                We will send out weekly blasts using this info. 
                                You will still get the commission if a sale happens as a result of an email you collect. </p>
                            <input type="text"
                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">email</small>
                            <br>
                            <p><strong> Ok, thanks, I will call back then. </strong></p>
                        </div>

                    </div> 
                    <div>
                        <strong>GM:</strong>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text|password|email|number|submit|date|datetime|datetime-local|month|color|range|search|tel|time|url|week"
                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>  
                    </div> 
                                    
                    
                    <!-- Remember that you can <a href="javascript:showCreate()" >
                        <b>Add a new user</b></a>:  -->
                </div>
                
                
            </div>														
        </div><!-- end card-->					
    </div>
</div>
        
 <!-- Button trigger modal -->
<div id="div1"></div>
 
 <!-- Modal -->
 <div class="modal fade" id="modelComments" tabindex="-1" role="dialog" aria-labelledby="modelComments" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
             <h4 class="modal-title" id="modelTitleId">Comments</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
                 
             </div>
             <div class="modal-body">
                 <div class='row'>
                    
               
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 
             </div>
         </div>
     </div>
 </div>       



<script>

</script>

<!-- <script src="{{asset('assets/js/afthaProgram/tableAftha.js') }} "></script> -->

@endsection