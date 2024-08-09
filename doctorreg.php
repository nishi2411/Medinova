<?php
include("../connection.php");
include("session_hospital.php");

// Delete Qurey

// if(isset($_REQUEST['delete']))
// {
//   $hos=$_REQUEST['delete'];
// $delete= "delete from category where cid='$hos'";

// mysqli_query($conn,$delete);
// header("location:category.php");

// }
?>

<!-- Update Qurey -->

<?php

if(isset($_REQUEST['btn_submit']))
{

  $fname=$_REQUEST['fname'];
  $mname=$_REQUEST['mname'];
  $lname=$_REQUEST['lname'];
  $address=$_REQUEST['addr'];
  $city=$_REQUEST['city'];
  $gender=$_REQUEST['gender'];
  $mobile=$_REQUEST['mob'];
  $emailid=$_REQUEST['email'];
  $degree=$_REQUEST['degree'];
  $dob=$_REQUEST['dob'];
  $password=$_REQUEST['pass'];
  $name1=$_FILES['img']['name'];
  $type=$_FILES['img']['type'];
  $temp_name=$_FILES['img']['tmp_name'];
  $size=$_FILES['img']['size'];
  $path="../img/".$name1;
  move_uploaded_file($temp_name,$path);
  $insert="insert into doctor_reg values (null,'$hid','$fname','$mname','$lname','$address','$city','$gender','$mobile','$emailid','$degree','$dob','$password','Active','$name1')";
  mysqli_query($conn,$insert);
}

// if(isset($_REQUEST['edit']))
// {
//   $c=$_REQUEST['edit'];
//   $select1="select * from category where cid='$c'";
//     $res1=mysqli_query($conn,$select1);
//     $row1=mysqli_fetch_array($res1);


// }
// if(isset($_REQUEST['btn_update']))
// {

//   $cat=$_REQUEST['category'];
//   $c=$_REQUEST['edit'];
//   $update="update category set categoryname='$cat' where cid='$c'";
//   mysqli_query($conn,$update);
//   header("location:category.php");

// }
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
            <h1 class="m-0">Doctor</h1>
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
<!-- Form for new category -->
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" name="fname" class="form-control" required id="exampleInputhospital" placeholder="Enter first Name"onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{3,}" title="Minimum 3 Character Required">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input type="text" name="mname" class="form-control" required id="exampleInputhospital" placeholder="Enter last Name"onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{3,}" title="Minimum 3 Character Required">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" name="lname" class="form-control" required id="exampleInputhospital" placeholder="Enter middle Name"onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{3,}" title="Minimum 3 Character Required">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" name="addr" class="form-control" required id="exampleInputadd" placeholder="Enter Address">
                  </div>

                  <div class="form-group">
        <label >City</label>
        <select id="city" name="city" class="form-control"  >
          <option value="">Select city</option>
          <?php 
          $sel="select * from city";
          $res=mysqli_query($conn,$sel);
          while($row=mysqli_fetch_array($res))
                  {
          ?>
          <option value="<?php echo $row['cityid'];?>"><?php echo $row['cityname'];?></option>
         
          <?php }?>
        </select>
      </div>

      <div class="form-group">
        <label >Gender</label>
        <select  name="gender" class="form-control">
       
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        
        </select>
      </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Mobile No</label>
        <input type="text" name="mob" class="form-control"required id="exampleInputmobile" placeholder="Enter Mobile No">
         </div>
        
      <div class="form-group">
                    <label for="exampleInputEmail">Email Id</label>
                    <input type="text" name="email" class="form-control" id="email" required placeholder="Enter emailid">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail">Degree</label>
                    <input type="text" name="degree" class="form-control" id="drgree" required placeholder="Enter drgree">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail">Date of Brith</label>
                    <input type="date" name="dob" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="dob" required >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputpassword">Password</label>
                    <input type="password" name="pass" class="form-control" id="password" required placeholder="Enter Password" pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$"  title="at least length 8,containing at least one lowercase and one uppercase letter , at least one number anchored to the end of the string">
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="img" class="form-control" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                <div id="sid">
                  <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button></div>
                </div>
                
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
