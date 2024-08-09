<?php
	include("../connection.php");
	include("session.php");
	$page_heading = 'Add New Case Form';
	
	if(isset($_SESSION['hospital']))
	{
	   	
		$usersel1="select * from hospital_case_fees where h_id='$userid'";
		$result1=mysqli_query($conn,$usersel1);
		$userraw1=mysqli_fetch_array($result1);
		$usercid=$userraw1['hc_new_case_fee'];
	}
	
	if(isset($_SESSION['hospital']))
	{
	   	
		$usersel12="select * from hospital_case_fees where h_id='$userid'";
		$result12=mysqli_query($conn,$usersel12);
		$userraw12=mysqli_fetch_array($result12);
		$usercid2=$userraw12['hc_old_case_fee'];
	}
	
	if(isset($_REQUEST['txt_submit']))
	{
	    $rdo_case = $_REQUEST['rdo_case'];
		$caseno = $_REQUEST['txt_caseno'];
		$date = date('Y-m-d');
		$pid = $_REQUEST['txt_patient'];
	   
	   if($rdo_case == 'new')
		{
			
			 if($_REQUEST['txt_patient'] == 'add_new')
			{
				$name=$_REQUEST['txt_pname'];
				$ct=$_REQUEST['txt_ct'];
				$mobile=$_REQUEST['txt_mnumber'];
			  	$email=$_REQUEST['txt_email'];
			 	$pwd=rand(100000,999999);
			  	//$ds_id=$_REQUEST['txt_ds'];
				$dat=date("Y-m-d");
				$bg=$_REQUEST['txt_bg'];
				
				$insert="insert into patient_reg(pr_fname,ct_id,pr_mobile,pr_email,pr_password,pr_status,pr_regdate,bloodgrpid) values('$name','$ct','$mobile','$email','123','Active','$dat','$bg')";
				
				mysqli_query($conn,$insert);
			    $pid = mysqli_insert_id($conn);
			 } 
			$doctor = $_REQUEST['txt_doctor'];
			$fees = $usercid;     
			$insert = "insert into add_case values('','$userid','$caseno','$pid','$doctor','$date','$fees')";
			mysqli_query($conn,$insert);	
		}
		
		if($rdo_case == 'old')
		{
			$acsel = "select * from add_case where case_no = '$caseno'";
			$acres = mysqli_query($conn,$acsel);
			$acrow = mysqli_fetch_array($acres);
			
			$case_id = $acrow['case_no'];
			$fees1 = $usercid2;
			
			
			$ins = "insert into old_case values('','$case_id','$date','$fees1','$userid')";
			mysqli_query($conn,$ins);	
		}
	   
	   header("location:add_case.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include("link_css.php");
	?>
	<script type="text/javascript">
function showfield(name){
  if(name=='add_new')document.getElementById('div1').innerHTML='<div class="form-group-inner"><div class="row"><div class="col-lg-3"><label class="login2 pull-right pull-right-pro">Patient Name</label></div><div class="col-lg-9"><input type="text" name="txt_pname" placeholder="Enter Patient Name" class="form-control" /></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-3"><label class="login2 pull-right pull-right-pro">Email</label></div><div class="col-lg-9"><input type="email" name="txt_email" placeholder="Enter Patient Email" class="form-control" /></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-3"><label class="login2 pull-right pull-right-pro">Mobile Number</label></div><div class="col-lg-9"><input type="text" name="txt_mnumber" placeholder="Enter Patient Mobile Number" class="form-control" /></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-3"><label class="login2 pull-right pull-right-pro">City</label></div><div class="col-lg-9"> <select name="txt_ct" id="select" class="form-control custom-select-value"><option value=""  style="color:#000000;">--Select City--</option><?php $sel3 = "select * from city order by ct_name ASC";$res3= mysqli_query($conn,$sel3);while($row3 = mysqli_fetch_array($res3)){?><option value="<?php echo $row3['ct_id'] ?>"><?php echo $row3['ct_name'] ?></option><?php }?></select></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-3"><label class="login2 pull-right pull-right-pro">Bloodgroup</label></div><div class="col-lg-9"> <select name="txt_bg" id="select" class="form-control custom-select-value"><option value=""  style="color:#000000;">--Select Bloodgroup--</option><?php $sel4 = "select * from bloodgrptb order by bloodgrpname ASC";$res4 = mysqli_query($conn,$sel4);while($row4 = mysqli_fetch_array($res4)){?><option value="<?php echo $row4['bloodgrpid'] ?>"><?php echo $row4['bloodgrpname'] ?></option><?php }?></select></div></div></div>  ';
  
  else document.getElementById('div1').innerHTML='';
}

function validate(field, query) 
{
	var xmlhttp;
	if (window.XMLHttpRequest) 
	{ 
		// for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} 
	else 	
	{ 
		// for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState != 4 && xmlhttp.status == 200) 
		{
			document.getElementById(field).innerHTML = "Validating..";
		} 
		else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
		{
			document.getElementById(field).innerHTML = xmlhttp.responseText;
		} 
		else 
		{
			document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
		}
	}
	xmlhttp.open("GET", "ajax.php?field=" + field + "&query=" + query, false);
	xmlhttp.send();
}
</script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
	<?php
		include("header.php");
	?>
	
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
	<?php
		include("menu.php");
	?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php
		include("page_heading.php");
	?>
    <!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card card-info">
					  <div class="card-header">
						<h3 class="card-title">ADD CASE </h3>
					  </div>
					  <!-- /.card-header -->
					  <!-- form start -->
					  <form role="form" method="post">
						<div class="card-body">
						  <div class="form-group">
							<label for="exampleInputEmail1">Case: </label>
							
							<input type="radio" value="new" checked="checked" id="optionsRadios1" name="rdo_case" onClick="validate('form_id',this.value)"> New Case
							
							<input type="radio" value="old" id="optionsRadios2" name="rdo_case" onClick="validate('form_id',this.value)"> Old Case
						  
						  </div>
						  
						  <div id="form_id">
						  <div class="form-group">
							<label for="exampleInputPassword1">Patient Name</label>
							
							 <select name="txt_patient" class="form-control custom-select-value" id="travel_arriveVia" onChange="showfield(this.options[this.selectedIndex].value)" >
							
								<option value="" >-- Select Patient Name --</option>
							
								<?php
							
								$sel = "select * from patient_reg order by pr_fname ASC";
								$res = mysqli_query($conn,$sel);
								while($row = mysqli_fetch_array($res))
								{
								?>
							
								<option value="<?php echo $row['pr_id'] ?>"><?php echo $row['pr_fname'] ?></option>
								<?php
								}
								?>
							
								<option value="add_new">Add New Patient</option>
							
							</select>
						  </div>
				           
						   <div id="div1"></div>
						   	<?php
					 	$i = 1;
						$sel = "select * from add_case where add_case.h_id='$userid'";
						$res = mysqli_query($conn,$sel);
						while($row = mysqli_fetch_array($res))
						{
							$i = $row['case_no'] + 1;
						}
					 ?>	  
						  <div class="form-group">
							<label for="exampleInputEmail1">Case No.</label>
							
							<input type="text" name="txt_caseno" class="form-control" value="<?php echo $i ?>" readonly="">
						  
						  </div>
						  
						  <div class="form-group">
							<label for="exampleInputPassword1">Doctor Specialist</label>
							
							<select name="txt_doctor" id="select" class="form-control custom-select-value">
							
								<option value="">-- Select Specialist Doctor --</option>
						<?php 
						//$i = 1;
						
						$sel1 = "select * from doctor_reg where doctor_reg.h_id = '$userid'";
					     $res1 = mysqli_query($conn,$sel1);
						
						while($row1 = mysqli_fetch_array($res1))
						{
							$drid = $row1['dr_id'];
						    $sel12 = "select * from doctor_specialist join category on category.categoryid = doctor_specialist.cat_id  where doctor_specialist.dr_id = '$drid'";
							$res12 = mysqli_query($conn,$sel12);
						
						while($row12 = mysqli_fetch_array($res12))
						{	
							?>
					  
					  <option value="<?php echo $row12['ds_id'] ?>" style="color:#000000;"><?php echo $row12['categoryname']." - ".$row1['dr_fname']." ".$row1['dr_lname'] ?></option>
						
						
						
						<?php 
						}
					}
					  ?>
								
						</select>
						  </div>
						  
						  </div><!--- /*id = form_id --->
						  
						<!-- /.card-body -->
		
						<div class="card-footer">
						  <button type="submit" name="txt_submit" class="btn btn-info">Submit</button>
						</div>
						</div>
					  </form>
					</div>
					<!-- /.card -->
					
					
					</div>
					<!-- /.card -->
					
					
					
				</div>
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  	include("footer.php");
  ?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php
	include("js.php");
?>
</body>
</html>
