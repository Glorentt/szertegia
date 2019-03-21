$(document).ready(function() {

    console.log("GET table Questions");
    var table = $('#QuestionsTable').DataTable( {
            dom: 'Bfrtip',
            "processing": true,
            "columns": [
                { "data": "id" },
                { "data": "question_name" },
                { "data": "user_id" },
                { "data": "exam_id" },
                { "data": "created_at" },
                { "data": "updated_at" }
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
           
            },
        buttons: ['pageLength'],
        lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            "ajax": {
                "url": "getAllQuestions/data.json/all"
                // "url": "getAllUsers/data.json/all"
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
   }

    } );

    $(':not(#sorthis)').click(function() {
        $('[data-toggle="popover"]').popover("hide");
        $('[data-toggle="popover"]').removeClass('success');
    });

} );