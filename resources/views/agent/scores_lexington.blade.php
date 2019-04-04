@extends('layouts.agent')

@section('title', 'All Scores')

@section('content')
<head>
    <meta name="_token" content="{!! csrf_token() !!}"/>
</head>
<script>
    //script to change active class in submenus
    $(document).ready(function(){
        $('#sub_scores').addClass('active');
    });

</script>
<div class="row">
    <div class="col-xl-12">
            <div class="breadcrumb-holder">
                    <h1 class="main-title float-left"> <a href="{{route('agent.case.score')}} "> Scores</a></h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Homes</li>
                        <li class="breadcrumb-item active">Scores</li>
                    </ol>
                    <div class="clearfix"></div>
            </div>
    </div>
</div>

<div class="row" >
            @if (\Session::has('name')== 'Abril')
				<!-- <div class="alert alert-danger">
					<ul>
						<li>Hector</li>
					</ul>
				</div> -->
			@endif
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fa fa-table"></i> All Campaigns</h3>
                All the scores will be displayed bellow,
            </div>

            <div class="card-body">
                <div>
                    <!-- Remember that you can <a href="javascript:showCreate()" >
                        <b>Add a new user</b></a>:  -->
                </div>
                <div class="table-responsive" id="dvData">
                    <table id="scoreTable" class="table table-bordered table-hover display">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Score</th>
                                <th>Audio</th>
                                <th>Phone</th>
                                <th>QA</th>
                                <th>Date</th>
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
                    
                    <div class='form-group col-md-6'>
                        <label for="Q1" class='text-primary'>1.- PROBING QUESTIONS:Agent used effective
                            questioning/probing skills/questions<strong class="text-danger">olsi</strong>
                            <p id="c3" class="text-secondary">No comments</p>
                        </label>

                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q2" class='text-primary'>2.-INTRODUCTION: Did the agent mention the company
                            name,his/ her name ?
                            <p id="c4" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q3" class='text-primary'>3.- Building credibility and rapport.. Showing empathy (not
                            script reading all the time)
                            <p id="c5" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q4" class='text-primary'>4.- Did the agent answer quickly and correctly?(less than 2
                            seconds).<p id="c6" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q5" class='text-primary'>5.-REBUTTALS: never take no for an answer(MIN 2 rebuttals
                            depending on situation more rebuttals should be used)
                            <p id="c7" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q6" class='text-primary'>6.-Did the agent ask for / confirm the caller's
                            informatio(qulifying questions)?
                            <p id="c8" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q7" class='text-primary'>7.-TONE AND INFLECTION:The agent sound confident
                            /focused?ex:it's not what you say it's how you say it.
                            <p id="c9" class="text-secondary">No comments</p></label>

                    </div>

                    <div class='form-group col-md-6'>
                        <label for="Q8" class='text-primary'>8.-CONTROL OF CALL: The agent took ownership of the call
                            ex: is the customer getting off subject- bring it back
                            <p id="c10" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q9" class='text-primary'>9.-Disposition Correctly:Did the agent disposition
                            correctly?
                            including knowing when to rebuttal a callback?
                            <p id="c11" class="text-secondary">No comments</p></label>

                    </div>

                    <div class='form-group col-md-6'>
                        <label for="Q10" class='text-primary'>10.-Correct Handoff/no dead air during warm transfer
                            (small talk)
                            <p id="c12" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q11" class='text-primary'>11.-ACTIVE LISTENING:Agent demonstrated active listening (
                            listen to cx WINs/can paraphrase)
                            <p id="c13" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q12" class='text-primary'>12.-Agent displayed a professional,friendly,welcoming
                            manner throughout the call (word choice)
                            <p id="c14" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q13" class='text-primary'>13.-PITCHING: make sure pitch correctly/cross-pitch
                            (verticals)
                            <p id="c15" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q14" class='text-primary'>14.-KNOWLEDGEABLE: demonstrated knowledge, avoided
                            silences,quickly answer:know what we offer and how to offer them to the customers
                            <p id="c16" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q15" class='text-primary'>15.-DNC: process was done correctly (1 rebuttal )
                            <p id="c17" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6'>
                        <label for="Q16" class='text-primary'>16.-TRANSFER PROCESS: tarnsferred correctly with all
                            information required
                            <p id="c18" class="text-secondary">No comments</p></label>
                    </div>
                </div>
                <div>
                    <div class='form-group col-md-12' >
                        <label for="Qf" class='text-primary'>Final:
                            <p id="c23" class="text-secondary">No Comments</p>
                        </label>
                    </div>
                </div>
             </div>

             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-success" data-dismiss="modal" id="acknowledge" >Aknowledge</button>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
             </div>
         </div>
     </div>
 </div>
 <script>
    function showComments(val) {
        
        $.ajax({url: "getcomments/"+val, success: function(result){
            var arraycomments = result.split('=>');
            
            var length = arraycomments.length-1;

            for (let i = 0; i < arraycomments.length; i++) {
                var j = i+1;
                $('#c'+j).html(arraycomments[i]);
               
                
                
                $('#acknowledge').val(val);
                // $('#acknowledge').val(arraycomments[14]);
            }

            // alert(14);
            $("#modelComments").modal();
        }});
        // $("#modelComments").modal();
        // console.log(val);
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#acknowledge").click(function(e) {
            e.preventDefault();
            
            $.ajax(
                {
                    type: "POST",
                    url: "my",
                    data: {
                        comment: $(this).attr('value') // < note use of 'this' here
                    }, 
                    success: function(result) {
                        console.log("Result success: ",result);
                        alert("Se ha realizado el POST con éxito"+result);
                        location.reload();
                        var table = $('#scoreTable').DataTable( {
                            ajax: "scoreLexington/my/data.json/my"
                        } );
                        
                        setInterval( function () {
                            table.ajax.reload();
                        });
                    },
                    error: function(result) {
                        console.log("Result error: ",result);
                        alert(result);
                    }
                }
            );

        });
    });
</script>


<script>
$(document).ready(function() {






var table = $('#scoreTable').DataTable( {
  dom: 'Bfrtip',
  buttons: ['pageLength', {
                text: 'CSV', className: 'btn-info', attr: { id: 'buttonID' },
                action: function ( e, dt, node, config ) {
                  alert("we are working on it");
                }
            }],
  lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all']
    ],
    "ajax": {
    		"url": "scoreLexington/my/data.json/my"
    },
  "processing": true,
  "columns": [
      { "data": "name" },
      { "data": "score" },

      { "data": "audio" },
      { "data": "phone" },
      { "data": "qaname" },
      { "data": "date" }

  ],
  "order": [[ 4, "desc" ]],

  drawCallback: function () {
      $('[data-toggle="popover"]').popover({
          "html": true,
          container: 'body',
          placement: 'bottom'
      }).contextmenu(function(e) {
          e.preventDefault();
          $('[data-toggle="popover"]').popover("hide");
          $('[data-toggle="popover"]').removeClass('success');
          var take = $(this);
          setTimeout(function(){
              take.addClass('success');
              console.log(take.popover("show"));
          }, 300);

      });
      $('.navbar-primary').css("height",$(document).height()+"px");
  },

  rowCallback: function( row, data ) {
      if ( data["acknowledge"] == "0" ) {
        $('td', row).css('background-color', 'Orange');
        console.log(data);
      }
    },
"footerCallback": function ( row, data, start, end, display ) {
var api = this.api(), data;

// Remove the formatting to get integer data for summation
var intVal = function ( i ) {
 return typeof i === 'string' ?
     i.replace(/[\$,]/g, '')*1 :
     typeof i === 'number' ?
         i : 0;
};

// Total over all pages
total = api
 .column( 1 )
 .data()
 .reduce( function (a, b) {
     return intVal(a) + intVal(b);
 }, 0 );

// Total over this page
pageTotal = api
 .column( 1, { page: 'current'} )
 .data()
 .reduce( function (a, b) {
     return intVal(a) + intVal(b);
 }, 0 );

// Update footer
$( api.column( 1 ).footer() ).html(
 '$'+pageTotal +' ( $'+ total +' total)'
);
}

} );
// setInterval( function () {

//     table.ajax.url( 'admin/getAllUsers').load();
// }, 300000 );


$(':not(#sorthis)').click(function() {
$('[data-toggle="popover"]').popover("hide");
$('[data-toggle="popover"]').removeClass('success');
});




} );

</script>
<!-- <script src="{{asset('assets/js/afthaProgram/tableAftha.js') }} "></script> -->

@endsection
