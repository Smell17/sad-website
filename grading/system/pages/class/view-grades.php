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
                $studentid = $_GET['studentid'];
                $squery = mysqli_query($con, "SELECT *,CONCAT(t.lname, ', ', t.fname, ' ',t.mname) as tname, tblclass.id as classid FROM tblclass left join tblschoolyear on tblschoolyear.id = tblclass.schoolyearid left join tblteacheradvisory on tblteacheradvisory.classid = tblclass.id left join tblteacher t on t.id = tblteacheradvisory.teacherid left join tblyearlevel on tblclass.yearlevelid = tblyearlevel.id WHERE tblclass.id = ".$val." LIMIT 1");
                $studquery = mysqli_query($con, "SELECT CONCAT(lname, ', ', fname, ' ', mname) as name from tblstudent where id =".$studentid.' limit 1');
                while($row = mysqli_fetch_array($squery))
                {
                    $classname = $row['classname'];
                    $classid = $row['classid'];
                    $schoolyear = $row['schoolyear'];
                    $adviser = $row['tname'];
                    $yearlevel = $row['yearlevel'];
                    $yearlevelid = $row['yearlevelid'];
                }
                while($row = mysqli_fetch_array($studquery)){
                    $name = $row['name'];
                }

            ?>
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <a href="../class/class-manage.php?classid=<?php echo $classid; ?>">< Back to class management</a><br><br>
                    <a title="print screen" alt="print screen" onclick="window.print();"target="_blank" style="cursor:pointer;">Print this Page</a>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <center><img src = "ttai.png" height="100" width="100"></center>
                                    <div style="padding:10px;">
                                        <h1><?php echo $name; ?></h1>
                                        <h4>
                                            <?php echo $yearlevel . ' - ' . $classname . " (School year " . $schoolyear . ")"; ?>
                                        </h4>
                                        <h4>Class adviser: <?php echo $adviser; ?></h4>                             
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th>Q1</th>
                                                <th>Q2</th>
                                                <th>Q3</th>
                                                <th>Q4</th>
                                                <th>Average</th>
                                                <th>Remarks</th>
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
                                                    $gquery = mysqli_query($con, "
                                                    SELECT 1stgrading, 2ndgrading, 3rdgrading, 4thgrading, round(COALESCE((1stgrading+2ndgrading+3rdgrading+4thgrading)/((1stgrading!=0) + (2ndgrading!=0) + (3rdgrading!=0) + (4thgrading!=0)),0),0) avg from tblstudentgrade                                                left join tblstudent on tblstudentgrade.studentid = tblstudent.id 
                                                    where tblstudentgrade.subjectid = ".$row['subjectid']." and tblstudentgrade.studentid=".$studentid);
                                                    echo '
                                                    <tr>
                                                        <td>'.$row['subjectname'].'</td>';
                                                        $present = false;
                                                        while ($r = mysqli_fetch_array($gquery)) {
                                                            $present=true;

                                                            switch($r['avg']) {
                                                                case 0:
                                                                    $remarks = "";
                                                                    break;
                                                                case in_array($r['avg'], range(0,78)):
                                                                    $remarks = "NI - Needs Improvement";
                                                                    break;
                                                                case in_array($r['avg'], range(79,82)):
                                                                    $remarks = "MS - Moderately Satisfactory";
                                                                    break;
                                                                case in_array($r['avg'], range(83,87)):
                                                                    $remarks = "S - Satisfactory";
                                                                    break;
                                                                case in_array($r['avg'], range(88,92)):
                                                                    $remarks = "HS - Highly Satisfactory";
                                                                    break;
                                                                case ($row['avg']>=93):
                                                                    $remarks = "O - Outstanding";
                                                                    break;
                                                            }
                                                            echo '<td>'.$r['1stgrading'].'</td><td>'.$r['2ndgrading'].'</td><td>'.$r['3rdgrading'].'</td><td>'.$r['4thgrading'].'</td><td>'.$r['avg'].'</td><td>'.$remarks.'</td>';
                                                        } 

                                                        if(!($present)) {
                                                            echo '<td></td><td></td><td></td><td></td><td></td><td></td>';
                                                        }
                                                    echo '</tr>
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