<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="refresh" content="1800">
  <title>time connection</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body style="height:1500px">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" >Calculate your connection time</a>
          </div>
          
          <div class="navbar-form navbar-left" >
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="00:00" name="wait" id="wait">
                  <div class="input-group-btn">
                    
                  </div>
                </div>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="00:00" name="talk" id="talk">
              <div class="input-group-btn">
                <button class="btn btn-default" onclick="suma();" >
                  <i class="glyphicon glyphicon-play"></i>
                </button>
              </div>
            </div>
          </div>
          <ul class="nav navbar-nav">
              <li class="active"><a id="suma">00:00</a></li>
            
              
              
            </ul>
        </div>
      </nav> 
      <div class="container" style="margin-top:50px">
          <h3>Connection time</h3>
          <div class="row">
            <div class="col-md-12">
                <h2>the sum of your wait connection and your talk connection must be {{$time}} at the end of the day</h2>
            </div>
            
          </div>
        </div>
  <div class="container">
    <div class="row">
      <br>
      <div class="col-md-3">
        <a class='btn btn-success' href="/">go back</a>
      </div>
      <div class=" col-md-6">
        
      </div>
    </div>
  </div>

  {{ include('time.html') }}
</body>
<script>
function suma(){
  
var talk = $('#talk').val();
var wait = $('#wait').val();
var re = new RegExp('^([0-9][0-9]):[0-5][0-9]$');
if(talk != "" || wait != ""){
  if(wait.match(re)){
  if(talk.match(re)){
    var waitTime= wait.split(':');
    var talkTime= talk.split(':');
    var totalMinutes = ((parseInt(waitTime[0])+parseInt(talkTime[0]))*60+parseInt(waitTime[1])+parseInt(talkTime[1]))/60;
    var min = (totalMinutes%1)*60;
    $('#suma').html(Math.floor(totalMinutes)+":"+Math.floor(min));
    // alert( Math.floor(totalMinutes)+":"+Math.floor(min));


  }else{
    alert("Formato incorrecto en el segundo tiempo, debe de ser 00:00");
  }
}else{
  alert("Formato incorrecto en el primer tiempo, debe de ser 00:00");
}
}else{
  alert('campo bacio');
}



}
</script>

</html>