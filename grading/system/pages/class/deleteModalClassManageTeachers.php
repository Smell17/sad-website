
<div id="deleteSubjectTeacherModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to remove selected subject teacher assignments?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <input type="hidden" name="classid" value="<?php echo $val; ?>">
            <input type="submit" style ="background-color: #285C2D; color: white;" class="btn btn-primary btn-sm" name="btn_delete_classmanage_subjectteacher" id="btn_delete_classmanage" value="Yes"/>
        </div>
    </div>
  </div>
</div>