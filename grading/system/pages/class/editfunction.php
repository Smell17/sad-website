
<?php
	if(isset($_POST['btn_save']))
	{
	    $txt_id = $_POST['hidden_id'];
	    $txt_edit_class = $_POST['txt_edit_class'];
	    $ddl_edit_sy = $_POST['ddl_edit_sy'];
	    $ddl_edit_yl = $_POST['ddl_edit_yl'];

	    $query = mysqli_query($con,"UPDATE tblclass SET classname = '".$txt_edit_class."',schoolyearid = '".$ddl_edit_sy."',yearlevelid = '".$ddl_edit_yl."' where id = '".$txt_id."' ");

	    if($query == true){
	        $_SESSION['edit'] = 1;
	        header("location: ".$_SERVER['REQUEST_URI']);
	    }

		if(mysqli_error($con)){
			$_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
	}
	if(isset($_POST['btn_saveteacher']))
	{
		$subjectid = $_POST['subjectid'];
		$yearlevelid = $_POST['yearlevelid'];
		$classid = $_POST['classid'];
		$schoolyear = $_POST['schoolyear'];
	    $teacherid = $_POST['ddl_edit_teacher'];
	    $method = $_POST['edit_or_new'];

	    //get all yearlevel.id, class.id, subject.id with the same yearlevel
	    $query = mysqli_query($con,"SELECT tblyearlevel.id as tblyearlevelid, tblclass.id as tblclassid, tblsubjects.id as subjectid from tblyearlevel left join tblclass on tblclass.yearlevelid = tblyearlevel.id left join tblschoolyear on tblschoolyear.id = tblclass.schoolyearid left join tblsubjects on tblsubjects.yearlevelid = tblyearlevel.id where yearlevel = (SELECT yearlevel FROM tblyearlevel WHERE id=".$yearlevelid." LIMIT 1) and tblschoolyear.schoolyear = '".$schoolyear."' and tblsubjects.subjectname = (select subjectname from tblsubjects where id = ".$subjectid." limit 1)");

	    if($method == "No teacher set") {
		    while($row = mysqli_fetch_array($query)) {
		    	mysqli_query($con,"INSERT INTO tblsubjectteacher(teacherid, subjectid, yearlevelid, classid) VALUES (".$teacherid.",".$row['subjectid'].",".$row['tblyearlevelid'].",".$row['tblclassid'].")");
		    }
		} else {
			while($row = mysqli_fetch_array($query)) {
				mysqli_query($con,"UPDATE tblsubjectteacher SET teacherid = ".$teacherid." WHERE subjectid = ".$row['subjectid']." AND yearlevelid=".$row['tblyearlevelid']." AND classid=".$row['tblclassid']);
			}
		}

	    // if($ct == 0) {
	    	// $query = mysqli_query($con,"INSERT INTO tblsubjectteacher(teacherid, subjectid, yearlevelid, classid) VALUES (".$teacherid.",".$subjectid.",".$yearlevelid.",".$classid.")");
	    // } else {
	    // 	$query = mysqli_query($con,"UPDATE tblsubjectteacher SET teacherid = ".$teacherid." WHERE subjectid = ".$subjectid." AND yearlevelid=".$yearlevelid." AND classid=".$classid);
	    // }

	    

	    if($query == true){
	        $_SESSION['edit'] = 1;
	        header("location: ".$_SERVER['REQUEST_URI']);
	    }

		if(mysqli_error($con)){
			$_SESSION['duplicate'] = 1;
			$_SESSION['error'] = mysqli_error($con);
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
	}
?>
