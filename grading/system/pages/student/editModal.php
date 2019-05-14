
<!-- ========= YEARLEVEL MODAL ======== -->
<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Subject</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['id'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>First Name: </label>
                    <input name="txt_edit_fname" id="txt_edit_fname" class="form-control input-sm" type="text" value="'.$row['fname'].'" />
                </div>
                <div class="form-group">
                    <label>Middle Name: </label>
                    <input name="txt_edit_mname" id="txt_edit_mname" class="form-control input-sm" type="text" value="'.$row['mname'].'" />
                </div>
                <div class="form-group">
                    <label>Last Name: </label>
                    <input name="txt_edit_lname" id="txt_edit_lname" class="form-control input-sm" type="text" value="'.$row['lname'].'" />
                </div>
                <div class="form-group">
                    <label>Contact: </label>
                    <input name="txt_edit_contact" id="txt_edit_contact" class="form-control input-sm" type="number" value="'.$row['contact'].'" />
                </div>
                <div class="form-group">
                    <label>Address: </label>
                    <input name="txt_edit_addr" id="txt_edit_addr" class="form-control input-sm" type="text" value="'.$row['address'].'" />
                </div>
                <div class="form-group">
                    <label>Date of Birth: </label>
                    <input name="txt_edit_date" id="txt_edit_date" class="form-control input-sm" type="date" value="'.$row['dateofbirth'].'" />
                </div>
                <div class="form-group">
                    <label>Father Name: </label>
                    <input name="txt_edit_fathername" id="txt_edit_fathername" class="form-control input-sm" type="text" value="'.$row['fathername'].'" />
                </div>
                <div class="form-group">
                    <label>Father Contact Number: </label>
                    <input name="txt_edit_fathercontact" id="txt_edit_fathercontact" class="form-control input-sm" type="number" value="'.$row['fathercontact'].'" />
                </div>
                <div class="form-group">
                    <label>Mother Name: </label>
                    <input name="txt_edit_mothername" id="txt_edit_mothername" class="form-control input-sm" type="text" value="'.$row['mothername'].'" />
                </div>
                <div class="form-group">
                    <label>Mother Contact Number: </label>
                    <input name="txt_edit_mothercontact" id="txt_edit_mothercontact" class="form-control input-sm" type="number" value="'.$row['mothercontact'].'" />
                </div>
                <div class="form-group">
                    <label>Emergency Contact Person Name: </label>
                    <input name="txt_edit_emergencyname" id="txt_edit_emergencyname" class="form-control input-sm" type="text" value="'.$row['emergencyname'].'" />
                </div>
                <div class="form-group">
                    <label>Emergency Contact Person Number: </label>
                    <input name="txt_edit_emergencycontact" id="txt_edit_emergencycontact" class="form-control input-sm" type="number" value="'.$row['emergencycontact'].'" />
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>