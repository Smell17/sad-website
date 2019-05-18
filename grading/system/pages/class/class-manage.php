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

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <?php $val = $_GET["classid"];
                $squery = mysqli_query($con, "SELECT *,CONCAT(t.lname, ', ', t.fname, ' ',t.mname) as tname FROM tblclass left join tblschoolyear on tblschoolyear.id = tblclass.schoolyearid left join tblteacheradvisory on tblteacheradvisory.classid = tblclass.id left join tblteacher t on t.id = tblteacheradvisory.teacherid left join tblyearlevel on tblclass.yearlevelid = tblyearlevel.id WHERE tblclass.id = ".$val." LIMIT 1");
                while($row = mysqli_fetch_array($squery))
                {
                    $classname = $row['classname'];
                    $schoolyear = $row['schoolyear'];
                    $adviser = $row['tname'];
                    $yearlevel = $row['yearlevel'];
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
                                                    <td><button class="btn btn-primary btn-sm" data-target="#editModal'.$row['id'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
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

            <?php include "../notification.php"; ?>

            <?php include "../addModal.php"; ?>

            <?php include "../addfunction.php"; ?>
            <?php include "editfunction.php"; ?>
            <?php include "deletefunction.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
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