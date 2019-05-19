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

            <?php $squery = mysqli_query($con, "SELECT tblschoolyear.schoolyear as schoolyear,tblschoolyear.id as schoolyearid, tblsubjects.subjectname as subjectname,tblclass.classname as classname,tblsubjects.id as subjectid, tblsubjectteacher.id as id, tblyearlevel.yearlevel as yearlevel, tblsubjectteacher.classid as classid, tblteacheradvisory.teacherid as adviserid
                from tblsubjectteacher 
                left join tblsubjects on tblsubjectteacher.subjectid = tblsubjects.id 
                left join tblclass on tblclass.id = tblsubjectteacher.classid 
                left join tblschoolyear on tblschoolyear.id = tblclass.schoolyearid
                left join tblyearlevel on tblyearlevel.id = tblclass.yearlevelid
                left join tblteacheradvisory on tblteacheradvisory.classid = tblsubjectteacher.classid
                where tblsubjectteacher.teacherid = ".$_SESSION['userid']."
                and tblsubjectteacher.id = ".$_GET["subjectteacherid"]."
                order by schoolyear desc, yearlevel, classname, subjectname
                ");

                while($row = mysqli_fetch_array($squery)) {
                    $subject = $row['subjectname'];
                    $subjectid = $row['subjectid'];
                    $schoolyear = $row['schoolyear'];
                    $schoolyearid = $row['schoolyearid'];
                    $classname = $row['classname'];
                    $yearlevel = $row['yearlevel'];
                    $classid = $row['classid'];
                    $adviserid = $row['adviserid'];
                }
            ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <a href="../studgrade/studgrade.php">< Back to classes</a><br><br>
                    <h1>
                        Manage Grades: <?php echo $subject . " - " . $yearlevel . " " .$classname . " (" . $schoolyear.")";?>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                        <button class="btn btn-primary btn-sm" onclick="disableInputs();"><i class="fa fa-plus" aria-hidden="true"></i> Edit </button>  
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Student</th>
                                                <th style="width:10px;">1st</th>
                                                <th style="width:10px;">2nd</th>
                                                <th style="width:10px;">3rd</th>
                                                <th style="width:10px;">4th</th>
                                                <th>Average</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <input type="hidden" name="schoolyearid" value="<?php echo $schoolyearid;?>">
                                            <input type="hidden" name="subjectid" value="<?php echo $subjectid;?>">
                                            <input type="hidden" name="classid" value="<?php echo $classid;?>">
                                            <input type="hidden" name="adviserid" value="<?php echo $adviserid;?>">
                                            <?php
                                            $squery = mysqli_query($con, "
                                                SELECT *, CONCAT(tblstudent.lname, ', ', tblstudent.fname, ', ', tblstudent.mname) as sname, tblstudent.id as studentid,round(COALESCE((1stgrading+2ndgrading+3rdgrading+4thgrading)/((1stgrading!=0) + (2ndgrading!=0) + (3rdgrading!=0) + (4thgrading!=0)),0),0) avg from tblstudent
                                                left join tblstudentadvisory on tblstudentadvisory.studentid = tblstudent.id
                                                left join tblstudentgrade on tblstudentgrade.studentid = tblstudent.id and tblstudentgrade.classid = tblstudentadvisory.classid
                                                where tblstudentadvisory.classid = ".$classid. "
                                                order by sname");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                switch($row['avg']) {
                                                    case 0:
                                                        $remarks = "";
                                                        break;
                                                    case in_array($row['avg'], range(0,78)):
                                                        $remarks = "NI - Needs Improvement";
                                                        break;
                                                    case in_array($row['avg'], range(79,82)):
                                                        $remarks = "MS - Moderately Satisfactory";
                                                        break;
                                                    case in_array($row['avg'], range(83,87)):
                                                        $remarks = "S - Satisfactory";
                                                        break;
                                                    case in_array($row['avg'], range(88,92)):
                                                        $remarks = "HS - Highly Satisfactory";
                                                        break;
                                                    case ($row['avg']>=93):
                                                        $remarks = "O - Outstanding";
                                                        break;
                                                }
                                                echo '
                                                <tr>
                                                    <td>'.$row['sname'].'</td>
                                                    <td><input type="number" class="grade-input" style="width:40px;" name="grades['.$row["studentid"].'][1stgrading]" disabled value="'.$row['1stgrading'].'" min="0" max="100"></td>
                                                    <td><input type="number" class="grade-input" style="width:40px;" name="grades['.$row["studentid"].'][2ndgrading]" disabled value="'.$row['2ndgrading'].'" min="0" max="100"></td>
                                                    <td><input type="number" class="grade-input" style="width:40px;" name="grades['.$row["studentid"].'][3rdgrading]" disabled value="'.$row['3rdgrading'].'" min="0" max="100"></td>
                                                    <td><input type="number" class="grade-input" style="width:40px;" name="grades['.$row["studentid"].'][4thgrading]" disabled value="'.$row['4thgrading'].'" min="0" max="100"></td>
                                                    <td><b>'.$row['avg'].'</b></td>
                                                    <td>'.$remarks.'</td>
                                                </tr>
                                                ';
                                                // include "editModal.php"; 
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <input type="submit" class="btn btn-primary btn-sm" name="btn_add_studgrade" value="Save"/>

                                    </form>
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