<div class="card" id="formulario">
    <h5 class="card-header">Edit User</h5>
    <div class="card-body">
        <h5 class="card-title">Form to edit an existent user</h5>
        <p class="card-text">You dont need to fill all the labels, only what you need to change.</p>
        <form class="was-validated" id="formEdit" method="PUT" action="{{route('admin.users.update',15)}}">
            <div class="row" >
                <div class="offset-md-3 col-md-6">
                    <div class="form-group">
                        <input type="text"
                            class="form-control" name="idUser" id="idUser" aria-describedby="name" 
                            required>
                    </div>
                </div>
                <div class="col-md-6" >
                        <input type="hidden" name="_token" id="token" value="{{ Session::token() }}" /> 
                    <div class="form-group">
                        <label for="">Name</label>
                        
                        <input type="text"
                        class="form-control" name="editname" id="editname" aria-describedby="name" 
                        required placeholder="">
                        <small id="name" class="form-text text-muted">name</small>
                    </div>

                    
                    
                    <div class="form-group">
                        <label for="">User role</label>
                        <select class="form-control" name="editrole_id" id="editrole_id">
                            <option value="4">Agent</option>
                            <option value="3">Supervisor</option>
                            <option value="2">QA</option>
                            <option value="1">Administrator</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6" >
                    
                    <div class="form-group">
                        <label for="">Supervisor</label>
                        <input type="text"
                            class="form-control" name="editsuperName" list="supervisorsNames" id="editsuperName" aria-describedby="editsuperName" 
                            required placeholder="" onkeyup="liveSearchSupervisor(this.value)" autocomplete="off">
                            <datalist id="supervisorsNames"></datalist>
                        <small id="name" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Campaign</label>
                        <select class="form-control" name="editcampaign" id="editcampaign">
                            <option value="qualifier">qualifier</option>
                            <option value="casemanager">casemanager</option>
                            <option value="gateway">gateway</option>
                            <option value="casemanageronline">casemanageronline</option>
                            <option value="casemanageronline">mls</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text"
                        class="form-control" name="editphone" pattern="\d*" maxlength="10" id="editphone" aria-describedby="name" 
                        required placeholder="">
                        <small id="name" class="form-text text-muted">Help text</small>
                    </div>
                    <input type="text" name="editsupid" id="editsupid" >
                </div>
                <div class="form-group">
                    <button type="reset" class="btn btn-danger" onclick="hideForm()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>
  </div>
</div>

<script>
function liveSearchSupervisor(val){
    if (val.length >2) {
        
        $.ajax({url: "liveSearchSupervisors/"+val, success: function(result){
            var txtReturned = null;
            if(result.length > 1){
                var data = result.split(",");
                for (i = 0; i < data.length; i++) {
                      var tmpData = data[i].split("=>");
                      if(tmpData.length > 1){
                          txtReturned += "<option value='"+tmpData[1]+","+ tmpData[0] +"'>"+ tmpData[1] + "</option>";
                          $("#supervisorsNames").html(txtReturned);
                      } 
                 }
              }
        }});
        
    }
}

$("#editsuperName").on('input', function () {
    if(checkExists( $('#editsuperName').val() ) === true){
        var arrayname = $('#editsuperName').val().split(',');
        var name = arrayname[0];
        var id = arrayname[1];
        $('#editsuperName').val(name);
        $('#editsupid').val(id)
    
 
    }

    function checkExists(inputValue) {
    // console.log(inputValue);

        var x = document.getElementById("supervisorsNames");
     
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

</script>
<script src="{{asset('assets/js/createUser.js') }} "></script>
