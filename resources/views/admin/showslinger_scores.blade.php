@extends('layouts.admin')

@section('title', 'showslinger')

@section('content')
<script>
    //script to change active class in submenus
    $(document).ready(function(){
        $('#sub_scores').addClass('active');
    });
    
</script>
<div class="row">
    <div class="col-xl-12">
            <div class="breadcrumb-holder">
                    <h1 class="main-title float-left"> <a href="{{route('admin.aftha.score')}} "> Scores</a></h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Scores</li>
                    </ol>
                    <div class="clearfix"></div>
            </div>
    </div>
</div>

<div class="row" >
				
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-table"></i> Showslinger scores</h3>
                All the scores will be displayed bellow, 
            </div>
                
            <div class="card-body">
                <div>
                    <!-- Remember that you can <a href="javascript:showCreate()" >
                        <b>Add a new user</b></a>:  -->
                </div>
                <div class="table-responsive">
                    <table id="scoreTable" class="table table-bordered table-hover display">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Score</th>
                                <th>Audio</th>
                                <th>Phone</th>
                                <th>date</th>
                               
                                
                            </tr>
                        </thead>										
                        <tbody>
                            
                        </tbody>
                    </table>
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
                    <div class="col-md-12">
                        <label for="phone">Phone number:
                        <p id="c1"></p></label>
                    </div>
                    <div class="col-md-12">
                        <label for="phone">URL:
                        <p id="c2"></p></label>
                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q1" class='text-primary' >1.-Greeting: Must have an immediate, clear greeting with agent and business name: <strong class="text-danger">olsi</strong>
                    <p id="c3" class="text-secondary">No comments</p></label>
                    
                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q2" class='text-primary'>2.-Fluently explained the AFTHA Program and Credit Specialist. As well as what they can do for the customers.:
                    <p id="c4" class="text-secondary">No comments</p></label>
                    
                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q3" class='text-primary'>3.-Asked all required questions? :
                    <p id="c5" class="text-secondary">No comments</p></label>
                    
                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q4" class='text-primary'>4.-Control the call, while answering the customer's (relevant) questions thoroughly.:<p id="c6" class="text-secondary">No comments</p></label>
                    
                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q5" class='text-primary'>5.-Did the agent Actively Listen to Client?:
                    <p id="c7" class="text-secondary">No comments</p></label>
                    
                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q6" class='text-primary'>6.-Was the call transferred?
                    <p id="c8" class="text-secondary">No comments</p></label>
                    
                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q7" class='text-primary'>7.-Did the Agent give a description of the client's situation and goals to the credit specialist?
                    <p id="c9" class="text-secondary">No comments</p></label>
                    
                    </div>

<div class='form-group col-md-6' >
                    <label for="Q8" class='text-primary'>8.-Did the Agent introduce the company? 
                    <p id="c10" class="text-secondary">No comments</p></label>

                    </div>
<div class='form-group col-md-6' >
                    <label for="Q9" class='text-primary'>9.-Did the Agent Rebuttal the client to overcome objections 
				including knowing when to rebuttal a callback?
                    <p id="c11" class="text-secondary">No comments</p></label>

                    </div>

<div class='form-group col-md-6' >
                    <label for="Q10" class='text-primary'>10.-Was the call properly Dispositioned?
                    <p id="c12" class="text-secondary">No comments</p></label>

                    </div>

                 
                 </div>
                 <div><div class='form-group col-md-12' >
                    <label for="Qf" class='text-primary'>Final:
                    <p id="c13" class="text-secondary">No Comments</p></label>
                    
                    </div>
                </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 
             </div>
         </div>
     </div>
 </div>       



<script src="{{ asset('js/showslinger/showcomments.js')}} ">

</script>
<script>

</script>
<!-- <script src="{{asset('assets/js/afthaProgram/tableAftha.js') }} "></script> -->

@endsection
