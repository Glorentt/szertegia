function liveSearch(val){
    
    if (val.length >2) {

        $.ajax({url: "liveSearchNames/"+val, success: function(result){
            var mostrarDatos = false;
            var txtReturned= null;
            if(result.length > 1){
                var data = result.split(",");
                for (i = 0; i < data.length; i++) {
                      var tmpData = data[i].split("=>");
                      if(tmpData.length > 1){
                        //   txtReturned += "<option value='"+tmpData[1]+"'>"+ tmpData[1] + "</option>";
                          txtReturned += "<option value='"+tmpData[1]+","+ tmpData[0] +"'>"+ tmpData[1] + "</option>";
                          $("#names").html(txtReturned);
                      } 
                 }
              }
        }});
        
    }
}
$("#nameAgent").on('input', function () {
if(checkExists( $('#nameAgent').val() ) === true){
    var arrayname = $('#nameAgent').val().split(',');
    var name = arrayname[0];
    var id = arrayname[1];
    $('#nameAgent').val(name);
    $('#agentID').val(id)
    console.log(id);
    
    
}
function checkExists(inputValue) {
console.log(inputValue);

var x = document.getElementById("names");
var i;
var flag;
for (i = 0; i < x.options.length; i++) {
    if(inputValue == x.options[i].value){
        flag = true;
    }
}
return flag;
}
});