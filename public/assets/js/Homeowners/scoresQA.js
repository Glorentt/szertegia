function score(params) {

  var sum = 0;

  for (var i = 1; i <= 10; i++) {
    this["val"+i] = $('#Q'+i).find(":selected").val();
    let c = parseFloat(this["val"+i]);
    sum += c * 10;
  }

  if (isNaN(sum)) {
    $('#finalScore').val("you need to answer all the form Homeowners");
  } else{
    var score = sum.toFixed(2);
     $('#finalScore').val(score);
  }
}
// $users = auth()->