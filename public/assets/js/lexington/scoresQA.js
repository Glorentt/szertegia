function score(params) {


    var sum = 0;
    for (var i = 1; i <= 16; i++) {
      this["val"+i] = $('#Q'+i).find(":selected").val();
      let c = parseFloat(this["val"+i]);
      sum += c;
    }
    if (isNaN(sum)) {
      $('#finalScore').val("you need to answer all the form Case Managers");
    }else{
      var score = sum.toFixed(2);
       $('#finalScore').val(score);
    }
  
  }