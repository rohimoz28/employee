  <!-- MODAL ADD -->
  <?= form_open('employee/save', ['class' => 'form_employee']) ?>
  <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group row">
                      <label class="col-md-2 col-form-label">NIK</label>
                      <div class="col-md-10">
                          <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-2 col-form-label">Name</label>
                      <div class="col-md-10">
                          <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-2 col-form-label">Mobile</label>
                      <div class="col-md-10">
                          <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile">
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" id="btn_save" class="btn btn-primary">Save</button>
              </div>
          </div>
      </div>
  </div>
  <?= form_close() ?>
  <!--END MODAL ADD-->

  <script>
      $(document).ready(function() {
          $('.form_employee').submit(function(event) {
              event.preventDefault()
              $.ajax({
                  type: "POST",
                  url: $(this).attr('action'),
                  dataType: "json",
                  data: $(this).serialize(),
                  success: function(response) {
                      Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: 'New employee has been added!'
                      })
                      $('#Modal_Add').modal('hide')
                      showData()
                  },
                  error: function(xhr, ajaxOptions, thrownError) {
                      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                  }
              })
          })
      })
  </script>