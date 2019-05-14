<!-- ========= EDIT SCHOOLYEAR =========== -->
<?php
	if(isset($_POST['btn_save']))
	{
	    $txt_id = $_POST['hidden_id'];
	    $txt_edit_fname = $_POST['txt_edit_fname'];
	    $txt_edit_mname = $_POST['txt_edit_mname'];
	    $txt_edit_lname = $_POST['txt_edit_lname'];
	    $txt_edit_contact = $_POST['txt_edit_contact'];
	    $txt_edit_addr = $_POST['txt_edit_addr'];
	    $txt_edit_date = $_POST['txt_edit_date'];
	    $txt_edit_fathername = $_POST['txt_edit_fathername'];
	    $txt_edit_fathercontact = $_POST['txt_edit_fathercontact'];
	    $txt_edit_mothername = $_POST['txt_edit_mothername'];
	    $txt_edit_mothercontact = $_POST['txt_edit_mothercontact'];
	    $txt_edit_emergencyname = $_POST['txt_edit_emergencyname'];
	    $txt_edit_emergencycontact = $_POST['txt_edit_emergencycontact'];



	    $query = mysqli_query($con,"UPDATE tblstudent SET fname = '".$txt_edit_fname."', mname = '".$txt_edit_mname."', lname = '".$txt_edit_lname."', contact = '".$txt_edit_contact."', address = '".$txt_edit_addr."', dateofbirth = '".$txt_edit_date."', fathername = '".$txt_edit_fathername."', fathercontact = '".$txt_edit_fathercontact."', mothername = '".$txt_edit_mothername."', mothercontact = '".$txt_edit_mothercontact."', emergencyname = '".$txt_edit_emergencyname."', emergencycontact = '".$txt_edit_emergencycontact."'  where id = '".$txt_id."' ");

	    if($query == true){
	        $_SESSION['edit'] = 1;
	        header("location: ".$_SERVER['REQUEST_URI']);
	    }

		if(mysqli_error($con)){
			$_SESSION['duplicate'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
		}
	}
?>
