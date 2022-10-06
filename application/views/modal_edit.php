<!-- MODAL EDIT -->
<?php echo form_open('employee/update', ['class' => 'form_employee']); ?>
<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">NIK</label>
                    <div class="col-md-10">
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" value="<?= $nik ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Name</label>
                    <div class="col-md-10">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?= $name ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Mobile</label>
                    <div class="col-md-10">
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile" value="<?= $mobile ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
</form>
<!--END MODAL EDIT-->