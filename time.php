<?php
include("../connection.php");
include("session_hospital.php");

// Delete Qurey

if(isset($_REQUEST['delete']))
{
  $hos=$_REQUEST['delete'];
  $id=$_REQUEST['time'];
$delete= "delete from dr_time where t_id='$hos'";

mysqli_query($conn,$delete);
header("location:time.php?time=$id");

}
?>


<!-- insert  -->
<?php

if(isset($_REQUEST['btn_submit']))
{

  $week=$_REQUEST['week'];
  $mtime=$_REQUEST['mtime'];
  $etime=$_REQUEST['etime'];
  $id=$_REQUEST['time'];
  $insert="insert into dr_time values (null,'$id','$week','$mtime','$etime')";
  mysqli_query($conn,$insert);
}
// <!-- Update Qurey -->
if(isset($_REQUEST['edit']))
{
  $c=$_REQUEST['edit'];
  $select1="select * from dr_time where t_id='$c'";
    $res1=mysqli_query($conn,$select1);
    $row1=mysqli_fetch_array($res1);


}
if(isset($_REQUEST['btn_update']))
{

  $week=$_REQUEST['week'];
  $mtime=$_REQUEST['mtime'];
  $etime=$_REQUEST['etime'];
  $c=$_REQUEST['edit'];
  $id=$_REQUEST['time'];

  $update="update dr_time set week='$week',mtime='$mtime',etime='$etime' where t_id='$c'";
  mysqli_query($conn,$update);
  header("location:time.php?time=$id");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("headcss.php"); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include("header.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include("menu.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Time</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

<!-- Update Form -->
<form method="post">
                <?php
                if(isset($_REQUEST['edit']))
                {
                  ?>
                     <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Week day</label>
                    <select name="week" class="form-control">
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday" >Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Morning Time</label>
                    <input type="time" name="mtime" class="form-control" value="<?php echo $row1['mtime'];?>" id="mrng">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Evening Time</label>
                    <input type="time" name="etime" class="form-control"value="<?php echo $row1['etime'];?>" id="even">
                  </div>
                  <div class="card-footer">

<div id="sid">
  <button type="submit" class="btn btn-primary" name="btn_update">Update</button></div>
</div>
                </div>

              <?php
                }
                else
                {
                  ?>
  <!-- New time  -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Week day</label>
                    <select name="week" class="form-control">
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday" >Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Morning Time</label>
                    <input type="time" name="mtime" class="form-control" id="mrng">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Evening Time</label>
                    <input type="time" name="etime" class="form-control" id="even">
                  </div>
                
                </div>

                <!-- /.card-body -->
                <div class="card-footer">

                <div id="sid">
                  <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button></div>
                </div>
                
              </form>
              <?php
                }
              ?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
		 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Time Details</h3>
              </div> 
              <!-- /.card-header -->
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Doctor</th>
                    <th>Day</th>
                    <th>Mtime</th>
                    <th>Etime</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $select="select * from dr_time join doctor_reg on doctor_reg.dr_id = dr_time.tdr_id  where tdr_id='".$_REQUEST['time']."'";
                  $res=mysqli_query($conn,$select);
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                    <tr>
                      <td><?php echo $row['t_id']; ?></td>
                      <td><?php echo $row['dr_fname'].' '.$row['dr_lname']; ?></td>
                      <td><?php echo $row['week']; ?></td>
                      <td><?php echo $row['mtime']; ?></td>
                      <td><?php echo $row['etime']; ?></td>

                      <td><button class="btn btn-danger"><a href="time.php?delete=<?php echo $row['t_id']; ?>&time=<?php echo $row['dr_id']; ?>" style= "text-decoration:none; color:white;"
                      onclick="return confirm('Are You sure Delete?')">Delete</a></button>
                      &nbsp;<a href="time.php?edit=<?php echo $row['t_id']; ?>&time=<?php echo $row['dr_id']; ?>" class="btn btn-success">Update</a>
                    </td>

                  </tr>
                  <?php
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Doctor</th>
                    <th>Day</th>
                    <th>Mtime</th>
                    <th>Etime</th>
                    <th>Action</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div> 
               <!-- /.card-body -->
            </div>
      </div>
       <!-- /.container-fluid  -->
    </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <?php include("footer.php"); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(document).ready(function(){
  $('#category').keyup(function(){
  var sid = $('#category').val();
  if(sid != '')
  {
  $.ajax({
      url:"categoryvalidation.php",
      method:"GET",
      data:{value:sid,id:'sid'},
      success:function(data)
      {
      $('#sid').html(data);
      }
  });
  }
  });
      });
</script>
</body>
</html>
