<?php
include("../connection.php");
include("session_hospital.php");

// Delete Qurey

if(isset($_REQUEST['delete']))
{
  $hos=$_REQUEST['delete'];
$delete= "delete from category where cid='$hos'";

mysqli_query($conn,$delete);
header("location:category.php");

}
?>

<!-- Update Qurey -->

<?php

if(isset($_REQUEST['btn_update']))
{

  $nf=$_REQUEST['newcasefees'];
  $of=$_REQUEST['oldcasefees'];
  $update="update hospital_registration set h_newcasefees='$nf',h_oldcasefees='$of' where hid='$hid'";
  mysqli_query($conn,$update);
  header("location:fees.php");

}

if(isset($_REQUEST['edit']))
{
  $c=$_REQUEST['edit'];
  $select1="select * from hospital_registration where hid='$c'";
    $res1=mysqli_query($conn,$select1);
    $row1=mysqli_fetch_array($res1);


}
if(isset($_REQUEST['btn_submit']))
{

  $nf=$_REQUEST['newcasefees'];
  $of=$_REQUEST['oldcasefees'];
  $update="update hospital_registration set h_newcasefees='$nf',h_oldcasefees='$of' where hid='$hid'";
  mysqli_query($conn,$update);
  header("location:fees.php");

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
            <!-- <h1 class="m-0">  Fees</h1> -->
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

              <form method="post">

<div class="card-body">

<div class="form-group">
      <label for="">Case No</label>
      <?php
      $i=1;
      $sel = "Select * from add_case";
      $res=mysqli_query($conn,$sel);
      while($r=mysqli_fetch_array($res)){
          $i=$r['case_id']+1;
      }
      ?>
      <input type="text" name="case_no" class="form-control" id="certi" value="<?php echo $i;?>" readonly >
    </div>
<div class="form-group">
<label >Patient</label>
<select id="patient" name="pr_id" class="form-control">
<option value="">Select Patient</option>
<?php 
$d=date('Y-m-d');
$sel="select * from p_appointment join patient on patient.pid = p_appointment.ap_pid where ap_hid=$hid and ap_date ='$d' and appstatus = 'approved' order by firstname ASC";
$res=mysqli_query($conn,$sel);
while($row=mysqli_fetch_array($res))
    {
?>
<option value="<?php echo $row['pid'];?>"><?php echo $row['firstname'].' '.$row['lastname'];?></option>

<?php }?>
<option value="new">Add new Patient</option>

</select>
</div>
<div id="reg" style="display:none">
<div class="form-group">
      <label for="">first name</label>
      <input type="text" id="fullname" required placeholder="Enter your first name"  class="form-control" name="fname" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{3,}" title="Minimum 3 Character Required">
    </div>
 
    <div class="form-group">
  <label for="">Middle name</label>
  <input type="text" id="fullname" required placeholder="Enter your middle name" class="form-control" name="mname"onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{3,}" title="Minimum 3 Character Required">
    </div>

  <div class="form-group">
  <label for="">Last name</label>
  <input type="text" id="fullname"required  placeholder="Enter your last name" class="form-control" name="lname" onKeyPress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" pattern="[A-Z a-z  ]{3,}" title="Minimum 3 Character Required">
    </div>
  
  <div class="form-group">
  <label for="">Email</label>
      <input type="text" name="email" class="form-control" id="certi" >
    </div>
  

  <div class="form-group">
  <label for="">Last name</label>
      <input type="text" name="lname" class="form-control" id="certi" >
    </div>
  
  <div class="form-group ">
<label for="bg">Blood Group</label>
<select required id="bg" name="bg" class="form-control">
<option value="" selected disabled >Select your blood group</option>
<option value="A">A</option>
<option value="A-">A-</option>
<option value="B">B</option>
<option value="B-">B-</option>
<option value="AB">AB</option>
<option value="AB-">AB-</option>
<option value="O">O</option>
<option value="O-">O-</option>

</select>
</div>

<div class="form-group ">
<b> <label for="date">Birth Date</label></b>
<input type="date" id="date" placeholder="Select your date" name="dob" required class="form-control">
</div>
<div class="form-group ">
<b><label for="gender">Gender</label></b>
<select id="gender" name="gender" class="form-control">
<option value="" selected disabled>Select your gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>
</div>
<div class="form-group ">
<label for="bg">Doctor - Specialist </label>
<select class="form-control" name="ds_id" >
                          <option selected>Select Doctor</option>
          <?php
                  $sel3 = "select * from doctor_reg  join specialist on specialist.sdr_id = doctor_reg.dr_id 
                  join category on category.cid = specialist.c_id where h_id ='$hid'";
                  $res3 = mysqli_query($conn,$sel3);
          while($row3 = mysqli_fetch_array($res3))
          {
          ?>
          <option value="<?php echo $row3['dr_id'] ?>"><?php echo $row3['dr_fname'].' '.$row3['dr_lname'].' - '.$row3['categoryname']; ?></option>
          <?php
          }
          ?>
      </select>
</div></div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
  </div>
</div>
</form>


              
            
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
		 <!-- <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fees Details</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Hospital Name</th>
                    <th>Newcasefees</th>
                    <th>oldcasefees</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody> -->
                  <?php
                //   $select="select * from hospital_registration where hid='$hid'";
                //   $res=mysqli_query($conn,$select);
                //   while($row=mysqli_fetch_array($res))
                  //{
                    ?>
                    <!-- <tr>
                      <td><?php echo $row['hid']; ?></td>
                      <td><?php echo $row['hospital_name']; ?></td>
                      <td><?php echo $row['h_newcasefees']; ?></td>
                      <td><?php echo $row['h_oldcasefees']; ?></td>
                      <td>
                      &nbsp;<a href="fees.php?edit=<?php echo $row['hid']; ?>" class="btn btn-success">Update</a>
                    </td>

                  </tr> -->
                  <?php
                //   }
                  ?>
                  <!-- </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Hospital Name</th>
                    <th>Newcasefees</th>
                    <th>oldcasefees</th>
                    <th>Action</th>

                  </tr>
                  </tfoot>
                </table>
              </div> -->
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
<!-- <script>
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
</script> -->
</body>
</html>
