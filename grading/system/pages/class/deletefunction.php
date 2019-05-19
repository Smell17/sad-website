
<?php
	if(isset($_POST['btn_delete']))
	{
	    if(isset($_POST['chk_delete']))
	    {
	        foreach($_POST['chk_delete'] as $value)
	        {
	            $delete_query = mysqli_query($con,"DELETE from tblclass where id = '$value' ") or die('Error: ' . mysqli_error($con));
	                    
	            if($delete_query == true)
	            {
	                $_SESSION['delete'] = 1;
	                header("location: ".$_SERVER['REQUEST_URI']);
	            }
	        }
	    }
	}
	if(isset($_POST['btn_delete_classmanage']))
	{
	    if(isset($_POST['chk_delete']))
	    {
	        foreach($_POST['chk_delete'] as $value)
	        {
	            $delete_query = mysqli_query($con,"DELETE from tblstudentadvisory where studentid = '$value' ") or die('Error: ' . mysqli_error($con));
	                    
	            if($delete_query == true)
	            {
	                $_SESSION['delete'] = 1;
	                header("location: ".$_SERVER['REQUEST_URI']);
	            }
	        }
	    }
	}
	if(isset($_POST['btn_delete_classmanage_subjectteacher']))
	{
		echo implode(" ",$_POST['chk_delete_subjectteacher']);
	    if(isset($_POST['chk_delete_subjectteacher']))
	    {
	        foreach($_POST['chk_delete_subjectteacher'] as $value)
	        {
	        	if(isset($value)) {
		            $delete_query = mysqli_query($con,"DELETE from tblsubjectteacher where classid =".$_POST['classid']." and teacherid = ".$value);
		                    
		            if($delete_query == true)
		            {
		                $_SESSION['delete'] = 1;
		                header("location: ".$_SERVER['REQUEST_URI']);
		            } 
		        }
	        }
	    }
	}
?>