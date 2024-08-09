<?php
include("../connection.php");
include("session_hospital.php");
?>


<?php

if(isset($_REQUEST['btn_submit']))
{
$case_no=$_REQUEST['case_no'];
  $d=date('Y-m-d');

    $insert ="insert into old_case values(null,'$case_no','$d','$oldcase','$hid')";
    mysqli_query($conn,$insert);

}

?>
<!-- Update Query -->
<?php

// if(isset($_REQUEST['btn_submit']))
// {

//   $c=$_REQUEST['city'];
//   $insert="insert into city values (null,'$c')";
//   mysqli_query($conn,$insert);
// }

// if(isset($_REQUEST['edit']))
// {
//   $c=$_REQUEST['edit'];
//   $select1="select * from city where cityid='$c'";
//     $res1=mysqli_query($conn,$select1);
//     $row1=mysqli_fetch_array($res1);


// }
// if(isset($_REQUEST['btn_update']))
// {

//   $cat=$_REQUEST['city'];
//   $c=$_REQUEST['edit'];
//   $update="update city set cityname='$cat' where cityid='$c'";
//   mysqli_query($conn,$update);
//   header("location:city.php");

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
            <!-- <h1 class="m-0">City</h1> -->
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
                <h3 class="card-title">Old Case</h3>
              </div>
              <!-- /.card-header -->
              <!-- form Update -->
              <form method="post">

              <div class="card-body">
        
              <div class="form-group">
        <label >Old Case</label>
        <select id="city" name="case_no" class="form-control"  >
          <option value="">Select Case no</option>
          <?php 
          $sel="select * from add_case where h_id = $hid";
          $res=mysqli_query($conn,$sel);
          while($row=mysqli_fetch_array($res))
                  {
          ?>
          <option value="<?php echo $row['case_no'];?>"><?php echo $row['case_no'];?></option>
         
          <?php }?>
        </select>
      </div>
                  </div>
        </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <div id="sid">
                  <!-- <button class="btn btn-primary" type="button"id="btn1"name="btn_submit">Submit</button> -->
                  <input type="submit" class="btn btn-primary" id="btn1"name="btn_submit"></div>
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
  $('#city').keyup(function(){
  var sid = $('#city').val();
  if(sid != '')
  {
  $.ajax({
      url:"cityvalidation.php",
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $('#patient').on('change', function(){
        var pname  = $('#patient').val();
        if(pname=='new'){
            $('#reg').show();
            $('#fname').prop('required',true);
           $('#mname').prop('required',true);
           $('#lname').prop('required',true);
           $('#email').prop('required',true);
           $('#bg').prop('required',true);
           $('#date').prop('required',true);
           $('#gender').prop('required',true);
            //$('#oreg').hide();
         // $('#btn1').show();
            
          // $('#reg').css('display','block');
        }
        else{
          //$('#btn1').show();

           $('#reg').hide(); 
          //  $('#oreg').show();

           $('#fname').prop('required',false);
           $('#mname').prop('required',false);
           $('#lname').prop('required',false);
           $('#email').prop('required',false);
           $('#bg').prop('required',false);
           $('#date').prop('required',false);
           $('#gender').prop('required',false);
          //  $('#btn1').trigger("click");

           //$('#reg').css('display','none');

        }
    })
</script>
<script>
  $(document).ready(function(){
  $('#email').keyup(function(){
  var sid = $('#email').val();
  if(sid != '')
  {
  $.ajax({
      url:"../resemailvalidation.php",
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
