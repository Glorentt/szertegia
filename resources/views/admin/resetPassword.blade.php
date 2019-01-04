<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset password of... </h5>
         <div class="">
           <h4 id="namePassword" class="text-info"></h4>
         </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{ route('admin.resetPassword') }}" method="post" id="formpassword" name="formpassword">
        <div class="modal-body">
          <ul class="text-info">
            <li>At least 1 number</li>
            <li>At least 1 uppercase </li>
            <li>At least 1 lowercase</li>
            <li>Non-alphanumeric (For example: !, $, #, or %)</li>
          </ul>
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div class="form-group">

              <input type="hidden" id="userId" name="userId" value="">
              <label for="password">password</label>
              <input type="text" name="password" value=""  class="form-control" autocomplete="off">

            </div>
            <div class="form-group">
              <label for="password">Confirm password</label>
              <input type="text" name="password_confirmation" value=""  class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"  value="Submit">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).on("click", "#buttonModalPassword", function () {
     var id = $(this).data('id');
     var name = $(this).data('name');
     $(".modal-body #userId").val( id );
      $("#namePassword").html( name );
     // As pointed out in comments,
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>
