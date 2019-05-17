<!DOCTYPE html>
<html>
<?php
ob_start();
session_start();
?>
    <head>
        <meta charset="UTF-8">
        <title>Twinkle Toes Grading System</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>

    <body class="skin-black">
        <img src='smoothlogo.png'/>
        <div class="container" style="margin-top:30px">
          <div class="col-md-4 col-md-offset-4">
              <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong></strong></h3></div>
            <div class="panel-body">
              <form role="form" method="post">
                <div class="form-group">
                  <label for="txt_username">Username</label>
                  <input type="text" class="form-control" style="border-radius:0px" name="txt_username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <label for="txt_password">Password</label>
                  <input type="password" class="form-control" style="border-radius:0px" name="txt_password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-sm btn-primary" style="text-align: center" name="btn_login">Log in</button>
              </form>
            </div>
          </div>
          </div>
        </div>


<div style="padding:10px;">
                                        
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTeacherModal"><i class="fa fa-plus" aria-hidden="true"></i>Register as Subject Teacher</button>   

<div id="addTeacherModal" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add Teacher</h4>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input required name="txt_fname" id="txt_fname" class="form-control input-sm" type="text" placeholder="First Name" />
                    </div>
                    <div class="form-group">
                        <label>Middle Name:</label>
                        <input required name="txt_mname" id="txt_mname" class="form-control input-sm" type="text" placeholder="Middle Name" />
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input required name="txt_lname" id="txt_lname" class="form-control input-sm" type="text" placeholder="Last Name" />
                    </div>
                    <div class="form-group">
                        <label>Contact:</label>
                        <input required name="txt_contact" id="txt_contact" class="form-control input-sm" type="number" placeholder="Contact" />
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <input required name="txt_addr" id="txt_addr" class="form-control input-sm" type="text" placeholder="Address" />
                    </div>
                    <div class="form-group">
                        <label>Username:</label>
                        <input required name="txt_uname" id="txt_uname" class="form-control input-sm" type="text" placeholder="Username" />
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input required name="txt_pass" id="txt_pass" class="form-control input-sm" type="password" placeholder="Password" />
                    </div>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" id="btn_add_teacher" name="btn_add_teacher" value="Register"/>
        </div>
    </div>
  </div>
  </form>
</div>
</div> 

<div style="padding:10px;">
                                        
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addRealAdmin"><i class="fa fa-plus" aria-hidden="true"></i>Register as Admin</button>   

<div id="addRealAdmin" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add Admin</h4>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input required name="txt_fname" id="txt_fname" class="form-control input-sm" type="text" placeholder="First Name" />
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input required name="txt_lname" id="txt_lname" class="form-control input-sm" type="text" placeholder="Last Name" />
                    </div>
                    <div class="form-group">
                        <label>Username:</label>
                        <input required name="txt_uname" id="txt_uname" class="form-control input-sm" type="text" placeholder="Username" />
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input required name="txt_pass" id="txt_pass" class="form-control input-sm" type="password" placeholder="Password" />
                    </div>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" id="btn_add_realadmin" name="btn_add_realadmin" value="Register"/>
        </div>
    </div>
  </div>
  </form>
</div>
</div> 



      <?php
        include "pages/connection.php"; 
        if(isset($_POST['btn_login']))
        { 
            $username = $_POST['txt_username'];
            $password = $_POST['txt_password'];


            $admin = mysqli_query($con, "SELECT * from tbladmin where username = '$username' and password = '$password' and accounttype = 'Administrator' ");
            $numrow = mysqli_num_rows($admin);

            $teacher = mysqli_query($con, "SELECT * from tblteacher where username = '$username' and password = '$password' ");
            $numrow1 = mysqli_num_rows($teacher);

            $student = mysqli_query($con, "SELECT * from tblrealadmin where username = '$username' and password = '$password' ");
            $numrow2 = mysqli_num_rows($student);

            if($numrow > 0)
            {
                while($row = mysqli_fetch_array($admin)){
                  $_SESSION['role'] = "Administrator";
                  $_SESSION['userid'] = $row['id'];
                }    
                header ('location: pages/dashboard/dashboard.php');
            }
            elseif($numrow1 > 0)
              {
                while($row = mysqli_fetch_array($teacher)){
                  $_SESSION['role'] = "Teacher";
                  $_SESSION['userid'] = $row['id'];
                } 
                header ('location: pages/studgrade/studgrade.php');
              }
            elseif($numrow2 > 0)
                {
                  while($row = mysqli_fetch_array($student)){
                    $_SESSION['role'] = "Student";
                    $_SESSION['userid'] = $row['id'];
                  } 
                  header ('location: pages/student/student.php');
                }
             else
                {
                  $message = "INVALID ACCOUNT";
                  echo "<script type='text/javascript'>alert('$message');</script>";
                }
             
        }

        
      ?>

  <?php
  if(isset($_POST['btn_add_realadmin'])){
    $txt_fname = $_POST['txt_fname'];
    $txt_lname = $_POST['txt_lname'];
    $txt_uname = $_POST['txt_uname'];
    $txt_pass = $_POST['txt_pass'];

    $chk = mysqli_query($con,"SELECT * from tblrealadmin where fname = '".$txt_fname."' and lname = '".$txt_lname."'");
    $ct = mysqli_num_rows($chk);

    if($ct == 0){
      $query = mysqli_query($con,"INSERT INTO tblrealadmin (fname,lname,username,password) values ('".$txt_fname."','".$txt_lname."','".$txt_uname."','".$txt_pass."')"); 
      if($query == true){
              $_SESSION['added'] = 1;
              header ("location: ".$_SERVER['REQUEST_URI']);
      }
    }
    else{
      $_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
            echo 'registration error';
    }
  }
?>


<?php
  if(isset($_POST['btn_add_teacher'])){
    $txt_fname = $_POST['txt_fname'];
    $txt_mname = $_POST['txt_mname'];
    $txt_lname = $_POST['txt_lname'];
    $txt_contact = $_POST['txt_contact'];
    $txt_addr = $_POST['txt_addr'];
    $txt_uname = $_POST['txt_uname'];
    $txt_pass = $_POST['txt_pass'];

    $chk = mysqli_query($con,"SELECT * from tblteacher where lname = '".$txt_lname."' and fname = '".$txt_fname."' and mname = '".$txt_mname."' ");
    $ct = mysqli_num_rows($chk);

    if($ct == 0){
      $query = mysqli_query($con,"INSERT INTO tblteacher (lname,fname,mname,contact,address,username,password) values ('".$txt_lname."','".$txt_fname."','".$txt_mname."','".$txt_contact."','".$txt_addr."','".$txt_uname."','".$txt_pass."')"); 
      if($query == true){
              $_SESSION['added'] = 1;
              header ("location: ".$_SERVER['REQUEST_URI']);
      }
    }
    else{
      $_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
            echo 'registration error';
    }
  }
?>




<?php 
 include "pages/connection.php"; 
 ?>

    </body>
</html>