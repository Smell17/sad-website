<!DOCTYPE html>
<html>

    <?php
    include('../head_css.php'); ?>
    <style>
    .info-box {
  display: block;
  min-height: 90px;
  background: #fff;
  width: 100%;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  border-radius: 2px;
  margin-bottom: 15px;
}
.info-box small {
  font-size: 14px;
}
.info-box .progress {
  background: rgba(0, 0, 0, 0.2);
  margin: 5px -10px 5px -10px;
  height: 2px;
}
.info-box .progress,
.info-box .progress .progress-bar {
  border-radius: 0;
}
.info-box .progress .progress-bar {
  background: #fff;
}
.info-box-icon {
  border-top-left-radius: 2px;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 2px;
  display: block;
  float: left;
  height: 90px;
  width: 90px;
  text-align: center;
  font-size: 45px;
  line-height: 90px;
  background: rgba(0, 0, 0, 0.2);
}
.info-box-icon > img {
  max-width: 100%;
}
.info-box-content {
  padding: 5px 10px;
  margin-left: 90px;
}
.info-box-number {
  display: block;
  font-weight: bold;
  font-size: 18px;
}
.progress-description,
.info-box-text {
  display: block;
  font-size: 14px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.info-box-text {
  text-transform: uppercase;
}
.info-box-more {
  display: block;
}
.progress-description {
  margin: 0;
}</style>
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
                        Dashboard
                    </h1>
                    
                </section>




                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                
                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../student/student.php"><span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Total Students</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblstudent");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../teacher/teacher.php"><span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Total Faculty</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblteacher");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../subject/subject.php"><span class="info-box-icon bg-aqua"><i class="fa fa-file"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Total Subjects</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblsubjects");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12"><br>
                                  <div class="info-box">
                                    <a href="../class/class.php"><span class="info-box-icon bg-aqua"><i class="fa fa-file"></i></span></a>

                                    <div class="info-box-content">
                                      <span class="info-box-text">Total Class</span>
                                      <span class="info-box-number">
                                        <?php
                                            $q = mysqli_query($con,"SELECT * from tblclass");
                                            $num_rows = mysqli_num_rows($q);
                                            echo $num_rows;
                                        ?>
                                      </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                                </div>

                                
                            </div><!-- /.box -->
                    </div>   <!-- /.row -->
                    <?php
                      $squery = mysqli_query($con, "select * from tblnotifications;");
                      while($row = mysqli_fetch_array($squery))
                      {
                        switch($row['quarter']) {
                          case "1stquarter":
                            $Q1_deadline = $row['deadline'];
                            $Q1_isenabled = $row['is_enabled'];
                            break;
                          case "2ndquarter":
                            $Q2_deadline = $row['deadline'];
                            $Q2_isenabled = $row['is_enabled'];
                            break;
                          case "3rdquarter":
                            $Q3_deadline = $row['deadline'];
                            $Q3_isenabled = $row['is_enabled'];
                            break;
                          case "4thquarter":
                            $Q4_deadline = $row['deadline'];
                            $Q4_isenabled = $row['is_enabled'];
                            break;
                        }
                      }
                    ?>
                    <div class="row">
                        <div class="col-md-3" >
                          <div class="info-box" style="padding:10px;<?php if ($Q1_isenabled) echo "background:green;color:white;"; ?>">
                            <form method="post">
                              <div class="info-box-text">1st Quarter Deadline</div>
                              <br>
                              <div class="input-group date">
                                <input type="text" class="form-control" name="Q1deadline" value="<?php echo date('m/d/Y',strtotime($Q1_deadline)); ?>" <?php if (!($Q1_isenabled)) echo "required"; ?>><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                              </div>
                              <br>
                              <?php if ($Q1_isenabled) { ?>
                                <input type="submit" name="update_Q1_deadline" class="btn btn-primary btn-sm" value="DISABLE">
                              <?php } else { ?>
                                <input type="submit" name="update_Q1_deadline" class="btn btn-primary btn-sm" value="ENABLE">
                              <?php }?>
                            </form>
                          </div>
                        </div>
                        <div class="col-md-3" >
                          <div class="info-box" style="padding:10px;<?php if ($Q2_isenabled) echo "background:green;color:white;"; ?>">
                            <form method="post">
                              <div class="info-box-text">2nd Quarter Deadline</div>
                              <br>
                              <div class="input-group date">
                                <input type="text" class="form-control" name="Q2deadline" value="<?php echo date('m/d/Y',strtotime($Q2_deadline)); ?>" <?php if (!($Q2_isenabled)) echo "required"; ?>><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                              </div>
                              <br>
                              <?php if ($Q2_isenabled) { ?>
                                <input type="submit" name="update_Q2_deadline" class="btn btn-primary btn-sm" value="DISABLE">
                              <?php } else { ?>
                                <input type="submit" name="update_Q2_deadline" class="btn btn-primary btn-sm" value="ENABLE">
                              <?php }?>
                            </form>
                          </div>
                        </div>

                        <div class="col-md-3" >
                          <div class="info-box" style="padding:10px;<?php if ($Q3_isenabled) echo "background:green;color:white;"; ?>">
                            <form method="post">
                              <div class="info-box-text">3rd Quarter Deadline</div>
                              <br>
                              <div class="input-group date">
                                <input type="text" class="form-control" name="Q3deadline" value="<?php echo date('m/d/Y',strtotime($Q3_deadline)); ?>" <?php if (!($Q3_isenabled)) echo "required"; ?>><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                              </div>
                              <br>
                              <?php if ($Q3_isenabled) { ?>
                                <input type="submit" name="update_Q3_deadline" class="btn btn-primary btn-sm" value="DISABLE">
                              <?php } else { ?>
                                <input type="submit" name="update_Q3_deadline" class="btn btn-primary btn-sm" value="ENABLE">
                              <?php }?>
                            </form>
                          </div>
                        </div>
                          
                        <div class="col-md-3" >
                          <div class="info-box" style="padding:10px;<?php if ($Q4_isenabled) echo "background:green;color:white;"; ?>">
                            <form method="post">
                              <div class="info-box-text">4th Quarter Deadline</div>
                              <br>
                              <div class="input-group date">
                                <input type="text" class="form-control" name="Q4deadline" value="<?php echo date('m/d/Y',strtotime($Q4_deadline)); ?>" <?php if (!($Q4_isenabled)) echo "required"; ?>><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                              </div>
                              <br>
                              <?php if ($Q4_isenabled) { ?>
                                <input type="submit" name="update_Q4_deadline" class="btn btn-primary btn-sm" value="DISABLE">
                              <?php } else { ?>
                                <input type="submit" name="update_Q4_deadline" class="btn btn-primary btn-sm" value="ENABLE">
                              <?php }?>
                            </form>
                          </div>
                        </div>
                        
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->

        <?php 
        include "../footer.php"; 
        include "../addfunction.php";
        ?>
        <script type="text/javascript">
            $(function() {
                $("#table").dataTable({
                   "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,5 ] } ],"aaSorting": []
                });
                $('.input-group.date').datepicker({
                    todayBtn: "linked"
                });
            });
        </script>
        
        


    </body>
</html>