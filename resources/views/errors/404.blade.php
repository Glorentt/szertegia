<style>
    .modal{
        text-align:center;
        padding:0!important;         
    }
    .modal:before{
        content:'';
        display:inline-block;
        height:100%;
        vertical-align:middle;
        margin-right: -4px;
    }
    .modal-dialog{
        display:inline-block;
        text-align:left;
        vertical-align:middle;
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
<script>
    $(document).ready(function(){
        $("#PopUpNoAutorizado").modal("show");
    });
</script>
<div class="modal" id="PopUpNoAutorizado" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header Popup">
                <div class="col-xs-12">
                    <h5><strong>AVISO IMPORTANTE</strong></h5>
                </div>                  
            </div>
            <div class="modal-body">                    
              <div class="col-sx-12 centrarTexto">
                  <h1>Acceso no autorizado</h1>
              </div>              
            </div> 
            <div class="modal-footer Popup">
              <div class="col-xs-12 modal-edit">
                    <h5><strong>AVISO IMPORTANTE</strong></h5>
              </div>
          </div>
        </div>
    </div>
</div>