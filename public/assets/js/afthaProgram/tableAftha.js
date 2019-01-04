// $(document).ready(function() {

//     var table = $('#UsersTable').DataTable( {
//             dom: 'Bfrtip',
//             "processing": true,
//             "columns": [
//                 { "data": "name" },
//                 { "data": "email" },
//                 { "data": "role_id" },
//                 { "data": "sup" },
//                 { "data": "phone" },
//                 { "data": "created_at" }
//             ],

//             drawCallback: function () {
//                 $('[data-toggle="popover"]').popover({
//                     "html": true,
//                     container: 'body',
//                     placement: 'bottom'
//                 }).contextmenu(function(e) {
//                     e.preventDefault();
//                     $('[data-toggle="popover"]').popover("hide");
//                     $('[data-toggle="popover"]').removeClass('success');
//                     var take = $(this);
//                     setTimeout(function(){
//                         take.addClass('success');
//                         console.log(take.popover("show"));
//                     }, 300);

//                 });
//                 $('.navbar-primary').css("height",$(document).height()+"px");
//             },
//         buttons: ['pageLength'],
//         lengthMenu: [
//                 [ 10, 25, 50, -1 ],
//                 [ '10 rows', '25 rows', '50 rows', 'Show all' ]
//             ],
//             "ajax": {
//                 "url": "getAllUsers/data.json/all"
//             },
            
//     "footerCallback": function ( row, data, start, end, display ) {
//        var api = this.api(), data;

//        // Remove the formatting to get integer data for summation
//        var intVal = function ( i ) {
//            return typeof i === 'string' ?
//                i.replace(/[\$,]/g, '')*1 :
//                typeof i === 'number' ?
//                    i : 0;
//        };

//        // Total over all pages
//        total = api
//            .column( 4 )
//            .data()
//            .reduce( function (a, b) {
//                return intVal(a) + intVal(b);
//            }, 0 );

//        // Total over this page
//        pageTotal = api
//            .column( 4, { page: 'current'} )
//            .data()
//            .reduce( function (a, b) {
//                return intVal(a) + intVal(b);
//            }, 0 );

//        // Update footer
//        $( api.column( 4 ).footer() ).html(
//            '$'+pageTotal +' ( $'+ total +' total)'
//        );
//    }

//     } );
//     // setInterval( function () {

//     //     table.ajax.url( 'admin/getAllUsers').load();
//     // }, 300000 );


//     $(':not(#sorthis)').click(function() {
//         $('[data-toggle="popover"]').popover("hide");
//         $('[data-toggle="popover"]').removeClass('success');
//     });
//     // Setup - add a text input to each footer cell

//     // Apply the search

//   // $('#sorthis tbody').on( 'click', 'button', function () {
//   //     var data = table.row( $(this).parents('tr') ).data();
//   //     alert( data[0] +"'s salary is: "+ data[ 2 ] );
//   // } );

// } );


// // { "data": "name" },
// //                 { "data": "score" },
// //                 { "data": "audio" },
// //                 { "data": "date" },
// // "ajax": {
// //     "url": "admin/getScores/data.json/all"
// // },