<!-- =========  ADD SCHOOLYEAR  ============== -->
<?php
	if(isset($_POST['btn_add_sy'])){
		$txt_sy = $_POST['txt_sy'];

		$query = mysqli_query($con,"INSERT INTO tblschoolyear (schoolyear) values ('".$txt_sy."')"); 
		if($query == true){
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
		if(mysqli_error($con)){
			$_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
	}
?>


<!-- =========  ADD YEARLEVEL  ============== -->
<?php
	if(isset($_POST['btn_add_yl'])){
		$ddl_yl = $_POST['ddl_yl'];
		$txt_desc = $_POST['txt_desc'];

		$chk = mysqli_query($con,"SELECT * from tblyearlevel where yearlevel = '$ddl_yl' and description = '$txt_desc' ");
		$ct = mysqli_num_rows($chk);

		if($ct == 0){
			$query = mysqli_query($con,"INSERT INTO tblyearlevel (yearlevel,description) values ('".$ddl_yl."','".$txt_desc."')"); 
			if($query == true){
	            $_SESSION['added'] = 1;
	            header ("location: ".$_SERVER['REQUEST_URI']);
			}
		}
		else{
			$_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
	}
?>


<!-- =========  ADD SUBJECT  ============== -->
<?php
	if(isset($_POST['btn_add_subj'])){
		$txt_sname = $_POST['txt_sname'];
		$txt_desc = $_POST['txt_desc'];
		$ddl_yl = $_POST['ddl_yl'];

		$chk = mysqli_query($con,"SELECT * from tblsubjects where subjectname = '".$txt_sname."' and description = '".$txt_desc."' and yearlevelid = '$ddl_yl' ");
		$ct = mysqli_num_rows($chk);

		if($ct == 0){
			$query = mysqli_query($con,"INSERT INTO tblsubjects (subjectname,description,yearlevelid) values ('".$txt_sname."','".$txt_desc."','".$ddl_yl."')"); 
			if($query == true){
	            $_SESSION['added'] = 1;
	            header ("location: ".$_SERVER['REQUEST_URI']);
			}
		}
		else{
			$_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
	}
?>


<!-- =========  ADD STUDENT  ============== -->
<?php
	if(isset($_POST['btn_add_stud'])){
		$txt_fname = $_POST['txt_fname'];
		$txt_mname = $_POST['txt_mname'];
		$txt_lname = $_POST['txt_lname'];
		$txt_contact = $_POST['txt_contact'];
		$txt_addr = $_POST['txt_addr'];
		$txt_date = $_POST['txt_date'];
		$txt_fathername = $_POST['txt_fathername'];
		$txt_fathercontact = $_POST['txt_fathercontact'];
		$txt_mothername = $_POST['txt_mothername'];
		$txt_mothercontact = $_POST['txt_mothercontact'];
		$txt_emergencyname = $_POST['txt_emergencyname'];
		$txt_emergencycontact = $_POST['txt_emergencycontact'];

		$chk = mysqli_query($con,"SELECT * from tblstudent where lname = '".$txt_lname."' and fname = '".$txt_fname."' and mname = '".$txt_mname."' ");
		$ct = mysqli_num_rows($chk);

		if($ct == 0){
			$query = mysqli_query($con,"INSERT INTO tblstudent (lname,fname,mname,contact,address,dateofbirth,fathername,fathercontact,mothername,mothercontact,emergencyname,emergencycontact) values ('".$txt_lname."','".$txt_fname."','".$txt_mname."','".$txt_contact."','".$txt_addr."','".$txt_date."', '".$txt_fathername."', '".$txt_fathercontact."', '".$txt_mothername."', '".$txt_mothercontact."', '".$txt_emergencyname."', '".$txt_emergencycontact."')"); 
			if($query == true){
	            $_SESSION['added'] = 1;
	            header ("location: ".$_SERVER['REQUEST_URI']);
			}
		}
		else{
			$_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
	}
?>


<!-- =========  ADD CLASS  ============== -->
<?php
	if(isset($_POST['btn_add_class'])){
		$txt_class = $_POST['txt_class'];
		$ddl_sy = $_POST['ddl_sy'];
		$ddl_yl = $_POST['ddl_yl'];

		$chk = mysqli_query($con,"SELECT * from tblclass where classname = '".$txt_class."' and schoolyearid = '$ddl_sy' and yearlevelid = '$ddl_yl' ");
		$ct = mysqli_num_rows($chk);

		if($ct == 0){
			$query = mysqli_query($con,"INSERT INTO tblclass (classname,schoolyearid,yearlevelid) values ('".$txt_class."','".$ddl_sy."','".$ddl_yl."')"); 
			if($query == true){
	            $_SESSION['added'] = 1;
	            header ("location: ".$_SERVER['REQUEST_URI']);
			}
		}
		else{
			$_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
	}
?>


<!-- =========  ADD STUDENT CLASS  ============== -->
<?php
	if(isset($_POST['btn_add_studclass'])){
		$ddl_class = $_POST['ddl_class'];
		$ddl_stud = $_POST['ddl_stud'];
		$ddl_subj = $_POST['ddl_subj'];

		//loop through all selected students by subject
		foreach($ddl_stud as $student) {
			foreach ($ddl_subj as $subj) {
				//if combination of class, student, subject doesnt exist, add
				if(mysqli_num_rows(mysqli_query($con,"SELECT * from tblstudentclass where classid = '$ddl_class' and studentid = '$student' and subjectid = '$subj'")) ==0) {
					$query = mysqli_query($con,"INSERT INTO tblstudentclass (classid,studentid,subjectid) values ('".$ddl_class."','".$student."','".$subj."')");	
				}
			}
		}
		$_SESSION['added'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
		// } else {
		// 	$_SESSION['duplicate'] = 1;
  //           header ("location: ".$_SERVER['REQUEST_URI']);
		// }

		// $chk = mysqli_query($con,"SELECT * from tblstudentclass where classid = '$ddl_class' and studentid = '$ddl_stud' and subjectid = '$ddl_subj' ");
		// $ct = mysqli_num_rows($chk);

		// if($ct == 0){
			// $query = mysqli_query($con,"INSERT INTO tblstudentclass (classid,studentid,subjectid) values ('".$ddl_class."','".$ddl_stud."','".$ddl_subj."')");  
		// }
		// else{
		// 	$_SESSION['duplicate'] = 1;
  //           header ("location: ".$_SERVER['REQUEST_URI']);
		// }
	}
?>


<!-- =========  ADD STUDENT ADVISORY  ============== -->
<?php
	if(isset($_POST['btn_add_studadvisory'])){
		$ddl_stud = $_POST['ddl_stud'];
		$ddl_classid = $_POST['ddl_classid'];

		$chk = mysqli_query($con,"SELECT studentid from tblstudentadvisory where classid = '".$ddl_classid);
		
		$students_already_in_advisory = array();
		while($row=mysqli_fetch_array($chk)){
            $students_already_in_advisory[] = $row['studentid'];
        }


        $students_for_adding = array_diff($ddl_stud, $students_already_in_advisory);

		foreach($students_for_adding as $student) {
			$query = mysqli_query($con,"INSERT INTO tblstudentadvisory (classid,studentid) values ('".$ddl_classid."','".$student."')");	
		}
		$_SESSION['added'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
	}
?>


<!-- =========  ADD TEACHER  ============== -->
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
		}
	}
?>




<!-- =========  ADD TEACHER ADVISORY  ============== -->
<?php
	if(isset($_POST['btn_add_adv'])){
		$ddl_teacher = $_POST['ddl_teacher'];
		$ddl_class = $_POST['ddl_class'];
		// $ddl_subj = $_POST['ddl_subj'];

		$chk = mysqli_query($con,"SELECT * from tblteacheradvisory where teacherid = '$ddl_teacher' and classid = '$ddl_class' ");
		$ct = mysqli_num_rows($chk);

		if($ct == 0){
			//CHECK IF TEACHER ALREADY HAS AN ADVISORY CLASS FOR THE SCHOOL YEAR
			//get all class IDs of those with the schoolyear of the selected class

			$chk = mysqli_query($con,"SELECT * from tblteacheradvisory where teacherid = '$ddl_teacher' and classid in (SELECT id from tblclass where schoolyearid in (SELECT schoolyearid from tblclass where tblclass.id = '$ddl_class'))");
			$ct = mysqli_num_rows($chk);

			if($ct > 0){
				$_SESSION['duplicate_advisory'] = 1;
	            header ("location: ".$_SERVER['REQUEST_URI']);
			} else {
				$query = mysqli_query($con,"INSERT INTO tblteacheradvisory (teacherid,classid,subjectid) values ('".$ddl_teacher."','".$ddl_class."','".$ddl_subj."')"); 
				if($query == true){
		            $_SESSION['added'] = 1;
		            header ("location: ".$_SERVER['REQUEST_URI']);
				}
			}
		}
		else{
			$_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
	}
?>




<!-- =========  ADD STUDENT GRADE  ============== -->
<?php
	if(isset($_POST['btn_add_studgrade'])){
		// $ddl_sy = $_POST['ddl_sy'];
		// $ddl_class = $_POST['ddl_class'];
		// $ddl_stud = $_POST['ddl_stud'];
		// $ddl_subj = $_POST['ddl_subj'];
		// $txt_1stgrading = $_POST['txt_1stgrading'];

		// $chk = mysqli_query($con,"SELECT * from tblstudentgrade where studentid = '$ddl_stud' and classid = '$ddl_class' and schoolyearid = '$ddl_sy' and subjectid = '$ddl_subj' ");
		// $ct = mysqli_num_rows($chk);

		// if($ct == 0)
		// {
		// $query = mysqli_query($con,"INSERT INTO tblstudentgrade (studentid,schoolyearid,subjectid,classid,adviserid,1stgrading) values ('".$ddl_stud."','".$ddl_sy."','".$ddl_subj."','".$ddl_class."','".$_SESSION['userid']."','".$txt_1stgrading."')") or die(mysqli_error($con)); 
		// 	if($query == true){
	 //            $_SESSION['added'] = 1;
	 //            header ("location: ".$_SERVER['REQUEST_URI']);
		// 	}
		// }
		// else{
		// 	$_SESSION['duplicate'] = 1;
  //           header ("location: ".$_SERVER['REQUEST_URI']);
		// }
		$schoolyearid = $_POST['schoolyearid'];
		$subjectid = $_POST['subjectid'];
		$classid = $_POST['classid'];
		$adviserid = $_POST['adviserid'];

		foreach($_POST['grades'] as $key => $studentrow) {
			$studentid = $key;
			$chk = mysqli_query($con,"SELECT * from tblstudentgrade where studentid = '$studentid' and classid = '$classid' and schoolyearid = '$schoolyearid' and subjectid = '$subjectid' ");
			if(mysqli_num_rows($chk)>0) {
				// grade record exists
				$query = mysqli_query($con,"UPDATE tblstudentgrade SET 1stgrading = ".$studentrow['1stgrading'].", 2ndgrading =".$studentrow['2ndgrading'].",3rdgrading=".$studentrow['3rdgrading'].",4thgrading=".$studentrow['4thgrading']." WHERE studentid = '$studentid' and classid = '$classid' and schoolyearid = '$schoolyearid' and subjectid = '$subjectid' ") or die(mysqli_error($con));
			} else {
				// grade record does not exist
				$query = mysqli_query($con,"INSERT INTO tblstudentgrade (studentid,schoolyearid,subjectid,classid,adviserid,1stgrading,2ndgrading,3rdgrading,4thgrading) values ('".$studentid."','".$schoolyearid."','".$subjectid."','".$classid."','".$adviserid."','".$studentrow["1stgrading"]."','".$studentrow["2ndgrading"]."','".$studentrow["3rdgrading"]."','".$studentrow["4thgrading"]."')") or die(mysqli_error($con));
			}

		}
        $_SESSION['added'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);

	}
?>