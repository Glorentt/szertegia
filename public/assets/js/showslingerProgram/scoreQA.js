function score(params) {
    var val1 = $('#Q1').find(":selected").val();
    var val2 = $('#Q2').find(":selected").val();
    var val3 = $('#Q3').find(":selected").val();
    var val4 = $('#Q4').find(":selected").val();
    var val5 = $('#Q5').find(":selected").val();
    var val6 = $('#Q6').find(":selected").val();
    var val7 = $('#Q7').find(":selected").val();
    var val8 = $('#Q8').find(":selected").val();
    var val9 = $('#Q9').find(":selected").val();
    var val10 = $('#Q10').find(":selected").val();
    var val11 = $('#Q11').find(":selected").val();
    var val12 = $('#Q12').find(":selected").val();
    var val13 = $('#Q13').find(":selected").val();
    var val14 = $('#Q14').find(":selected").val();
    var val15 = $('#Q15').find(":selected").val();
    var val16 = $('#Q16').find(":selected").val();
    var val17 = $('#Q17').find(":selected").val();
    var val18 = $('#Q18').find(":selected").val();
    if (val1 =='') {
        val1 = 0;
    }
    if (val2 =='') {
        val2 = 0;
    }
    if (val3 =='') {
        val3 = 0;
    }
    if (val4 =='') {
        val4 = 0;
    }
    if (val5 =='') {
        val5 = 0;
    }
    if (val6 =='') {
        val6 = 0;
    }
    if (val7 =='') {
        val7 = 0;
    }
    if (val8 =='') {
        val8 = 0;
    }
    if (val9 =='') {
        val9 = 0;
    }
    if (val10 =='') {
        val10 = 0;
    }
    if (val11 =='') {
        val11 = 0;
    }
    if (val12 =='') {
        val12 = 0;
    }
    if (val13 =='') {
        val13 = 0;
    }
    if (val14 =='') {
        val14 = 0;
    }


    val1 = parseInt(val1);
    val2 = parseInt(val2);
    val3 = parseInt(val3);
    val4 = parseInt(val4);
    val5 = parseInt(val5);
    val6 = parseInt(val6);
    val7 = parseInt(val7);
    val8 = parseInt(val8);
    val9 = parseInt(val9);
    val10 = parseInt(val10);
    val11 = parseInt(val11);
    val12 = parseInt(val12);
    val13 = parseInt(val13);
    val14 = parseInt(val14);

    var tmpScore = ((val1+val2+val3+val4+val5+val6+val7+val8+val9+val10+val11+val12+val13+val14)/14)*100;
    var score = tmpScore.toFixed(2);
    
    $('#finalScore').val(score);
    
}
