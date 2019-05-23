<div class="card" id="formulario">
    <h5 class="card-header">Register User</h5>
    <div class="card-body">
        <h5 class="card-title">Form to create a new user</h5>
        <p class="card-text">Remember to fill all the inputs.</p>
        <form class="was-validated" method="POST" action="{{route('admin.users.store') }} ">
            <div class="row" >
                <div class="col-md-6" >
                        <input type="hidden" name="_token" id="token" value="{{ Session::token() }}" /> 
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text"
                        class="form-control" name="name" id="name" aria-describedby="name" 
                        required placeholder="" autocomplete = "false">
                        <small id="name" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password"
                            class="form-control" name="password" id="password" aria-describedby="password"
                            required placeholder="********">
                        <small id="name" class="form-text text-muted">minimum 8 characters, at least 1 uppercase and 1 lowercase and 1 number</small>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email"
                            class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">User role</label>
                        <select class="form-control" name="role_id" id="role_id">
                            <option value="4">Agent</option>
                            <option value="3">Supervisor</option>
                            <option value="2">QA</option>
                            <option value="1">Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Campaign</label>
                        <select class="form-control" name="campaign" id="campaign">
                            <option value="qualifier">qualifier</option>
                            <option value="casemanager">casemanager</option>
                            <option value="gateway">gateway</option>
                            <option value="casemanageronline">casemanageronline</option>
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group">
                        <label for="">Last name</label>
                        <input type="text"
                        class="form-control" name="lastName" id="lastName" aria-describedby="lastName"
                        required placeholder="">
                        <small id="name" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm password</label>
                        <input type="password"
                            class="form-control" name="password_confirmation" id="password_confirmation" aria-describedby="name"
                            required placeholder="********">
                        <small id="name" class="form-text text-muted">minimum 8 characters, at least 1 uppercase and 1 lowercase and 1 number</small>
                    </div>
                    <div class="form-group">
                        <label for="">Supervisor</label>
                        <input type="text"
                            class="form-control" name="superName" list="supervisorsNames" id="superName" aria-describedby="superName" 
                            required placeholder="" onkeyup="liveSearchSupervisor(this.value)" autocomplete="off">
                            <datalist id="supervisorsNames"></datalist>
                        <small id="name" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text"
                        class="form-control" name="phone" pattern="\d*" maxlength="10" id="phone" aria-describedby="name" 
                        required placeholder="">
                        <small id="name" class="form-text text-muted">Help text</small>
                    </div>
                    <input type="hidden" name="supID" id="supID">
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

$("#superName").on('input', function () {
    if(checkExists( $('#superName').val() ) === true){
        var arrayname = $('#superName').val().split(',');
        var name = arrayname[0];
        var id = arrayname[1];
        $('#superName').val(name);
        $('#supID').val(id)
    
 
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

