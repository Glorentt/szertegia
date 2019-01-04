@extends('layouts.qa')

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
                    <h1 class="main-title float-left"> <a href="{{route('qa.aftha.score')}} "> Scores</a></h1>
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
                <h3><i class="fa fa-table"></i> All Campaigns</h3>
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
        
        


<script>
$(document).ready(function() {
console.log('olis');

var table = $('#scoreTable').DataTable( {
    
    
        dom: 'Bfrtip',
        "processing": true,
        "columns": [
            { "data": "name" },
            { "data": "score" },
           
            { "data": "audio" },
            { "data": "date" }
          
        ],

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

//     table.ajax.url( 'qa/getAllUsers').load();
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