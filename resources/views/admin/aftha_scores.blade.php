@extends('layouts.admin')

@section('title', 'All Scores')

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
                <h3><i class="fa fa-table"></i> Aftha Qualifiers</h3>
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
                                <th>QA</th>
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
                    <label for="Q1" class='text-primary' >1.-The call is being recorded in troduction (if Applicable) <strong class="text-danger">olsi</strong>
                    <p id="c3" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q2" class='text-primary'>2.-Did the agent mention his/ her name and company name ?
                    <p id="c4" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q3" class='text-primary'>3.-Agent pro-actively added value throughout call
                    <p id="c5" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q4" class='text-primary'>4.-Did the agent answer quickly and correctly?(less than 2 seconds):<p id="c6" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q5" class='text-primary'>5.-The agent took ownership/ control of the call?:
                    <p id="c7" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q6" class='text-primary'>6.- Did the agent pitch credit repair correctly/completely before transferring?
                    <p id="c8" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6' >
                    <label for="Q7" class='text-primary'>7.-The agent asked all appropriate questions
                    <p id="c9" class="text-secondary">No comments</p></label>

                    </div>

<div class='form-group col-md-6' >
                    <label for="Q8" class='text-primary'>8.-Did the agent disposition correctly?
                    <p id="c10" class="text-secondary">No comments</p></label>

                    </div>
<div class='form-group col-md-6' >
                    <label for="Q9" class='text-primary'>9.-Agent avoided long silences during the call/ transfers?
				including knowing when to rebuttal a callback?
                    <p id="c11" class="text-secondary">No comments</p></label>

                    </div>

                    <div class='form-group col-md-6' >
                    <label for="Q10" class='text-primary'>10.-Agent sounded clear, confident ,upbeat and enthusiastic  not distracted throughout the call
                    <p id="c12" class="text-secondary">No comments</p></label>

                    </div>
                    <div class='form-group col-md-6' >
                        <label for="Q11" class='text-primary'>11.-The agent offered an appropriate  solution/address cx questions
                        <p id="c13" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6' >
                        <label for="Q12" class='text-primary'>12.- Did the agent sound knowledgeable / correct word choice
                        <p id="c14" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6' >
                        <label for="Q13" class='text-primary'>13.- Empathy/rapport was attempted to be built
                        <p id="c15" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6' >
                        <label for="Q14" class='text-primary'>14.- Agent qualified or disqualified the prospect properly
                        <p id="c16" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6' >
                        <label for="Q15" class='text-primary'>15.- Agent did not interrupt or talk over the customer/was not patronizing or sarcastic
                        <p id="c17" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6' >
                        <label for="Q16" class='text-primary'>16.- Agent used effective questioning/probing skills
                        <p id="c18" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6' >
                        <label for="Q17" class='text-primary'>17.- Agent demonstrated active listening
                        <p id="c19" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6' >
                        <label for="Q18" class='text-primary'>18.- Agent displayed a professional,friendly,welcoming manner throughout the call
                        <p id="c20" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6' >
                        <label for="Q19" class='text-primary'>19.-  Correct   transfer and hand off procedure was followed.
                        <p id="c21" class="text-secondary">No comments</p></label>
                    </div>
                    <div class='form-group col-md-6' >
                        <label for="Q20" class='text-primary'>20.- Agent rebuttaled during call and continued with the script// scheduled call back  correctly
                        <p id="c22" class="text-secondary">No comments</p></label>
                    </div>
                    


                 </div>
                 <div><div class='form-group col-md-12' >
                    <label for="Qf" class='text-primary'>Final:
                    <p id="c23" class="text-secondary">No Comments</p></label>
                        
                    </div>
                </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

             </div>
         </div>
     </div>
 </div>


<script>
function showComments(val) {
    $.ajax({url: "getcomments/"+val, success: function(result){
        var arraycomments = result.split('=>');
        console.log(arraycomments);
        var length = arraycomments.length-1;

        for (let i = 0; i < arraycomments.length; i++) {
            var j = i+1;
            $('#c'+j).html(arraycomments[i]);

        }

        $("#modelComments").modal();
    }});
    // $("#modelComments").modal();
    // console.log(val);

}

</script>
<script>
$(document).ready(function() {
var table = $('#scoreTable').DataTable( {


        dom: 'Bfrtip',
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
    buttons: ['pageLength'],
    lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        "ajax": {
            "url": "getScores/data.json/all"
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
// Setup - add a text input to each footer cell

// Apply the search

// $('#sorthis tbody').on( 'click', 'button', function () {
//     var data = table.row( $(this).parents('tr') ).data();
//     alert( data[0] +"'s salary is: "+ data[ 2 ] );
// } );

} );

</script>
<!-- <script src="{{asset('assets/js/afthaProgram/tableAftha.js') }} "></script> -->

@endsection
