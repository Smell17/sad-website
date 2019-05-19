<!DOCTYPE html>
<html>
    <?php include('../head_css.php'); ?>
    <body class="skin-black">
        
        <!-- header logo: style can be found in header.less -->
        <?php 
        ob_start();
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>
        <?php 
            if(isset($_GET["classid"])) {
                $val = $_GET["classid"];     
            } else {$val = null;}
        
        ?>


        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>
            
            <?php if($val == null) {
                 echo "<h2 style='position:absolute;top:50%;left:50%;'>No advisory class</h2>";
                }
                else {
            ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <?php 
                $squery = mysqli_query($con, "SELECT *,CONCAT(t.lname, ', ', t.fname, ' ',t.mname) as tname, tblclass.id as classid, tblschoolyear.id as schoolyearid FROM tblclass left join tblschoolyear on tblschoolyear.id = tblclass.schoolyearid left join tblteacheradvisory on tblteacheradvisory.classid = tblclass.id left join tblteacher t on t.id = tblteacheradvisory.teacherid left join tblyearlevel on tblclass.yearlevelid = tblyearlevel.id WHERE tblclass.id = ".$val." LIMIT 1");
                while($row = mysqli_fetch_array($squery))
                {
                    $classname = $row['classname'];
                    $classid = $row['classid'];
                    $schoolyear = $row['schoolyear'];
                    $schoolyearid = $row['schoolyearid'];
                    $adviser = $row['tname'];
                    $yearlevel = $row['yearlevel'];
                    $yearlevelid = $row['yearlevelid'];
                }

            ?>
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <a href="../class/class.php">< Back to classes</a><br><br>
                    <h1>
                        <?php echo $yearlevel . ' - ' . $classname . " (School year " . $schoolyear . ")"; ?>
                    </h1>
                    <h4>Class adviser: <?php echo $adviser; ?></h4>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">

                                    <div style="padding:10px;">
                                        <h4>Student List</h4>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStudentAdvisoryModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Students</button>  

                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> 

                                
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                <th>Student Name</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "select *,CONCAT(lname, ', ', fname, ' ',mname) as sname from tblstudent where tblstudent.id in (select studentid from tblstudentadvisory where classid = ".$val.")order by lname, fname, mname");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td>
                                                    <td>'.$row['sname'].'</td>
                                                    <td>'.$row['contact'].'</td>
                                                    <td>'.$row['address'].'</td>
                                                    <td style="white-space: nowrap"><a href="../class/view-grades.php?classid='.$classid.'&schoolyear='.$schoolyearid.'&studentid='.$row['id'].'" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View Grades</a></td>
                                                </tr>
                                                ';
                                                
                                                // include "editModal.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php include "deleteModalClassManage.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <div class="box">
                                <div class="box-header">

                                    <div style="padding:10px;">
                                        <h4>Subject</h4>   
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteSubjectTeacherModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove Teacher</button>                              
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete_subjectteacher[]" class="cbxMain" onchange="checkMainteachers(this)" /></th>
                                                <th>Subject Name</th>
                                                <th>Teacher</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "select *,CONCAT(tblteacher.lname, ', ', tblteacher.fname, ' ',tblteacher.mname) as tname, tblteacher.id as subjectteacherid, tblsubjects.id as subjectid, tblsubjectteacher.classid as classid from tblsubjects left join tblsubjectteacher on tblsubjectteacher.subjectid = tblsubjects.id left join tblteacher on tblteacher.id = tblsubjectteacher.teacherid where tblsubjects.yearlevelid = ".$yearlevelid);
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                if(is_null($row['tname'])){
                                                    $row['tname'] = "No teacher set";
                                                }
                                                if(!isset($row['classid']) or $row['classid'] == $val) {
                                                    echo '
                                                    <tr>
                                                        <td><input type="checkbox" name="chk_delete_subjectteacher[]" class="chk_delete chk_delete_subjectteacher" value="'.$row['subjectteacherid'].'" /></td>
                                                        <td>'.$row['subjectname'].'</td>
                                                        <td>'.$row['tname'].'</td>
                                                        <td style="white-space: nowrap"><button class="btn btn-primary btn-sm" data-target="#editModal'.$row['subjectid'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                                    </tr>
                                                    ';
                                                }
                                                include "editModalClassManage.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php include "deleteModalClassManageTeachers.php"; ?>
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

            <?php include "../notification.php"; ?>

            <?php include "../addModal.php"; ?>

            <?php include "../addfunction.php"; ?>
            <?php include "editfunction.php"; ?>
            <?php include "deletefunction.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            <?php }?>
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,4 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>