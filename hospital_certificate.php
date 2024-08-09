<?php
include("../connection.php");
include("session_hospital.php");

// Delete Qurey

if(isset($_REQUEST['delete']))
{
  $hos=$_REQUEST['delete'];
  $id=$_REQUEST['certi'];

$delete= "delete from hospital_certificate where hc_id='$hos'";

mysqli_query($conn,$delete);
header("location:hospital_certificate.php?certi=$id");

}
?>

<!-- Update Qurey -->

<?php

if(isset($_REQUEST['btn_submit']))
{

  $name=$_REQUEST['certiname'];
  $name1=$_FILES['image']['name'];
  $type=$_FILES['image']['type'];
  $temp_name=$_FILES['image']['tmp_name'];
  $size=$_FILES['image']['size'];
  $path="certi/".$name1;
  move_uploaded_file($temp_name,$path);


  $insert="insert into hospital_certificate values (null,'$hid','$name','$name1')";
  mysqli_query($conn,$insert);
}

if(isset($_REQUEST['edit']))
{
  $c=$_REQUEST['edit'];
  $select1="select * from hospital_certificate where hc_id='$c'";
    $res1=mysqli_query($conn,$select1);
    $row1=mysqli_fetch_array($res1);


}
if(isset($_REQUEST['btn_update']))
{

  $name=$_REQUEST['certiname'];

  $c=$_REQUEST['edit'];
  $id=$_REQUEST['certi'];

  $name1=$_FILES['image']['name'];
  $type=$_FILES['image']['type'];
  $temp_name=$_FILES['image']['tmp_name'];
  $size=$_FILES['image']['size'];
  $path="certi/".$name1;
  move_uploaded_file($temp_name,$path);
  $update="update hospital_certificate set hc_name='$name',hc_img='$name1' where hc_id='$c'";
  mysqli_query($conn,$update);
  header("location:hospital_certificate.php?certi=$id");

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
            <h1 class="m-0">Hospital Certificate</h1>
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


<form method="post" enctype="multipart/form-data">

<?php
                if(isset($_REQUEST['edit']))
                {
                  ?>
                     <div class="card-body">
                     <div class="form-group">
                    <label for="exampleInputEmail1">Certificate Name</label>
                    <input type="text" name="certiname" value="<?php echo $row1['hc_name']?>" class="form-control" id="certi"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Certificate</label>
                    <input type="file" name="image"  class="form-control" required>
                    <img src="certi/<?php echo $row1['hc_img']; ?>" height="100px"width="100px"></td>

                  </div>
                
                </div>

                <!-- /.card-body -->
                <div class="card-footer">

                <div id="sid">
                  <button type="submit" class="btn btn-primary" name="btn_update">Update</button></div>
                </div>
              <?php
                }
                else
                {
                  ?>
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Certificate Name</label>
                    <input type="text" name="certiname" class="form-control" required id="certi" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Certificate</label>
                    <input type="file" name="image" required class="form-control" >
                  </div>
                
                </div>

                <!-- /.card-body -->
                <div class="card-footer">

                <div id="sid">
                  <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button></div>
                </div>
                <?php } ?>
              </form>
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
                <h3 class="card-title">Certificate Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Certificate Name</th>
                    <th>Image</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $select="select * from hospital_certificate where h_id = $hid";
                  $res=mysqli_query($conn,$select);
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                    <tr>
                      <td><?php echo $row['hc_id']; ?></td>
                      <td><?php echo $row['hc_name']; ?></td>
                      <td><img src="certi/<?php echo $row['hc_img']; ?>" height="100px"width="100px"></td>

                      <td><button class="btn btn-danger"><a href="hospital_certificate.php?delete=<?php echo $row['hc_id']; ?>&certi=<?php echo $row['h_id']; ?>" style= "text-decoration:none; color:white;"
                      onclick="return confirm('Are You sure Delete?')">Delete</a></button>
                      &nbsp;<a href="hospital_certificate.php?edit=<?php echo $row['hc_id']; ?>&certi=<?php echo $row['h_id']; ?>" class="btn btn-success">Update</a>
                    </td>

                  </tr>
                  <?php
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Certificate Name</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div> 
              <!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->
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
