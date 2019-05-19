
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
	    $teacherid = $_POST['ddl_edit_teacher'];

	    $query = mysqli_query($con,"SELECT * from tblsubjectteacher WHERE subjectid = ".$subjectid." AND yearlevelid=".$yearlevelid." AND classid=".$classid);

	    $ct = mysqli_num_rows($query);

	    if($ct == 0) {
	    	$query = mysqli_query($con,"INSERT INTO tblsubjectteacher(teacherid, subjectid, yearlevelid, classid) VALUES (".$teacherid.",".$subjectid.",".$yearlevelid.",".$classid.")");
	    } else {
	    	$query = mysqli_query($con,"UPDATE tblsubjectteacher SET teacherid = ".$teacherid." WHERE subjectid = ".$subjectid." AND yearlevelid=".$yearlevelid." AND classid=".$classid);
	    }

	    

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
