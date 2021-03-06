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
                        Manage Class 
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                        <button class="btn btn-primary btn-sm" style ="background-color: #285C2D; color: white;" data-toggle="modal" data-target="#addClassModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Class</button>  

                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> 

                                
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                <th>Year Level - Section Name</th>
                                                <th>School Year</th>
                                                <th>Adviser</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "select *,CONCAT(t.lname, ', ', t.fname, ' ',t.mname) as tname,c.id as cid,y.id as yid, s.id as sid from tblclass c left join tblschoolyear s on c.schoolyearid = s.id left join tblyearlevel y on c.yearlevelid = y.id left join tblteacheradvisory on tblteacheradvisory.classid = c.id left join tblteacher t on t.id = tblteacheradvisory.teacherid order by schoolyear desc, yearlevel, classname");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['cid'].'" /></td>
                                                    <td>'.$row['yearlevel']." - ".$row['classname'].'</td>
                                                    <td>'.$row['schoolyear'].'</td>
                                                    <td>'.$row['tname'].'</td>
                                                    <td style="white-space: nowrap"><button class="btn btn-primary btn-sm" style ="background-color: #285C2D; color: white;" data-target="#editModal'.$row['cid'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button> <a href="../class/class-manage.php?classid='.$row['cid'].'" class="btn btn-primary btn-sm" style ="background-color: #285C2D; color: white;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Manage</a></td>
                                                </tr>
                                                ';
                                                
                                                include "editModal.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php include "../deleteModal.php"; ?>

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