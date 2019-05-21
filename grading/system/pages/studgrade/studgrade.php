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
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Classes
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        <?php
                                        $squery = mysqli_query($con, "SELECT *,DATEDIFF(deadline, CURDATE()) as diff, DATE_FORMAT(deadline, '%W, %M %d, %Y') as date_formatted FROM tblnotifications where is_enabled=1 order by quarter");
                                        while($row = mysqli_fetch_array($squery))
                                        {
                                            switch($row['diff']) {
                                                case 0:
                                                    echo '<div class="alert alert-danger" role="alert">'.$row['quarter'].' Deadline: <b>TODAY</b> ('.$row['date_formatted'].')</div>';
                                                    break;
                                                case in_array($row['diff'], range(1,3)):
                                                    echo '<div class="alert alert-warning" role="alert">'.$row['quarter'].' Deadline: <b>'.$row['diff'].'</b> day/s from now ('.$row['date_formatted'].')</div>';
                                                    break;
                                                case $row['diff']>3:
                                                    echo '<div class="alert alert-success" role="alert">'.$row['quarter'].' Deadline: <b>'.$row['diff'].'</b> day/s from now ('.$row['date_formatted'].')</div>';
                                                    break;
                                                
                                                case $row['diff']<0:
                                                    echo '<div class="alert alert-danger" role="alert">'.$row['quarter'].' Deadline: <b>OVERDUE ('.abs($row['diff']).' day/s late; '.$row['date_formatted'].')</b></div>';
                                                    break;
                                            }
                                        }
                                        ?>
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>School Year</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $squery = mysqli_query($con, "SELECT tblschoolyear.schoolyear as schoolyear, tblsubjects.subjectname as subjectname, tblclass.classname as classname, tblsubjectteacher.id as id, tblyearlevel.yearlevel as yearlevel
                                                from tblsubjectteacher 
                                                left join tblsubjects on tblsubjectteacher.subjectid = tblsubjects.id 
                                                left join tblclass on tblclass.id = tblsubjectteacher.classid 
                                                left join tblschoolyear on tblschoolyear.id = tblclass.schoolyearid
                                                left join tblyearlevel on tblyearlevel.id = tblclass.yearlevelid
                                                where tblsubjectteacher.teacherid = ".$_SESSION['userid']."
                                                order by schoolyear desc, yearlevel, classname, subjectname
                                                ");
                                                while($row = mysqli_fetch_array($squery)) {
                                                    echo '
                                                    <tr>
                                                        <td>'.$row['schoolyear'].'</td>
                                                        <td>'.$row['yearlevel']." - ".$row['classname'].'</td>
                                                        <td>'.$row['subjectname'].'</td>
                                                        <td style="white-space: nowrap"><a href="../studgrade/studgrademanage.php?subjectteacherid='.$row['id'].'" class="btn btn-primary btn-sm" style ="background-color: #285C2D; color: white;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Manage Grades</a></td>
                                                    </tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

            <?php include "../notification.php"; ?>

            <?php include "addmodal.php"; ?>
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
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,11 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>