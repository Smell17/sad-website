
<!-- ========= CLASS MODAL ======== -->
<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Assign '.$row['subjectname'].' Teacher</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['subjectid'].'" name="subjectid" />
                <input type="hidden" value="'.$yearlevelid.'" name="yearlevelid" />
                <input type="hidden" value="'.$classid.'" name="classid" />
                <div class="form-group">
                    <label>Teacher:</label>
                    <select name="ddl_edit_teacher" id="ddl_edit_teacher" data-style="btn-primary" class="form-control input-sm">';
                        if ($row['tname'] == "No teacher set") {
                            echo '<option value="" selected disabled>-- Select teacher --</option>';
                        }
                        $q = mysqli_query($con,"SELECT *, CONCAT(tblteacher.lname, ', ', tblteacher.fname, ' ',tblteacher.mname) as tname from tblteacher where id not in (select teacherid from tblsubjectteacher where subjectid<>".$row['subjectid'].") order by lname, fname, mname");
                        while($row1=mysqli_fetch_array($q)){
                            if($row['subjectteacherid'] == $row1['id']) {
                                echo '<option value="'.$row1['id'].'" selected>'.$row1['tname'].'</option>';
                            } else {
                                echo '<option value="'.$row1['id'].'">'.$row1['tname'].'</option>';
                                echo $row['subjectteacherid'];
                            }
                        }
                echo '</select>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_saveteacher" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>