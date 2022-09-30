<?php
require_once("config.php");
if(!isset($_SESSION["login_sess"])) 
{
    header("location:login.php"); 
}
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
    $oldusername =$res['username'];     
$username = $res['username']; 
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
$image= $res['image'];
}
$page = $_SERVER['PHP_SELF'];

require_once("process.php"); 


?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Payslips | CBOO</title>

		<!-- Site favicon -->
		<link rel="icon" type="image/x-icon" href="src/images/dash.png">

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css"/>
		<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"/>
		<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css"/>
		<link rel="stylesheet" type="text/css" href="src/styles/style.css" />
		<link rel="stylesheet" type="text/css" href="src/styles/media.css">

		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		
        <div class="header header-dark">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
			</div>
			<div class="header-right">
				<div class="mr-20 user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<!--<img src="" alt="" /> profile image here-->
								<i class="icon-copy bi bi-person-fill"></i>
							</span>
							<span class="user-name">Admin</span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="#"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="#"
								><i class="dw dw-settings2"></i> Account Setting</a
							>
							<a class="dropdown-item" href="login.html"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>

        <div class="left-side-bar">
			<div class="brand-logo">
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
				<ul id="accordion-menu">
						<li>
							<a href="index.php" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-house"></span
								><span class="mtext">Dashboard</span>
							</a>
						</li>
                       
                   

						<li>
							<a href="employees.php" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-people"></span
								><span class="mtext">Employee List</span>
							</a>
						</li>
						<li>
						<a href="#" class="dropdown-toggle">
								<span class="micon bi bi-calculator"></span
								><span class="mtext">Payslips</span>
							</a>
							<ul class="submenu">
							<li><a href="payslips.php">Add New Payslip</a></li>
								<li><a href="payslip_data.php">History</a></li>
								
							</ul>
						</li>
						<li>
							<a href="#">
								<span class="mtext">Maintenance</span>
							</a>
						</li>
						<li>
							<a href="salary_matrix.php" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-grid-3x2"></span
								><span class="mtext">Salary Matrix</span>
							</a>
						</li>
						<li>
							<a href="position.php" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-pin-map"></i></span
								><span class="mtext">Position</span>
							</a>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<span class="micon bi bi-calculator"></span
								><span class="mtext">Calculations</span>
							</a>
							<ul class="submenu">
								<li><a href="incentives.php">Incentives</a></li>
								<li><a href="deductions.php">Mandatory Deductions</a></li>
								<li><a href="other_deductions.php">Other Deductions</a></li>
								<li><a href="#">Add Record</a></li>
							</ul>
						</li>
					
						<li>
							<a href="#;" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-envelope-paper"></i></span
								><span class="mtext">Payroll Report</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					
					<div class="card-box mb-30">
						<div class="pd-20 pb-10 d-flex justify-content-center">
							<h4 class="text h4">Earning Statement</h4>
                        </div>
										<?php
							$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));       
							$result = $mysqli->query("SELECT * FROM data") or die(mysqli->error);
							
							?>
						
					
							<?php 
							function pre_r($array){
							

								echo '<pre>';
								print_r($array);
								echo '</pre>';
							}
							?>
							<?php
            $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));       
            $result = $mysqli->query("SELECT * FROM position") or die(mysqli->error);
             
            ?>
					
						
                        
					</div>
                    
                    <div class="card-box mb-30" style="padding-bottom:1rem;">
                    <div class="pd-20 pb-10 d-flex ">
							<h4 class="text h4">Salary Management</h4>
                        </div><label style="padding-left:2rem;bottom:1rem;" class="col-sm-12 col-md-4 col-form-label">Select Staff Member Name</label><br>
                        <form action="" method="GET">
                            <div style="margin-left:1rem;" class="row">
                                <div class="col-md-4">
                                    
									<select name="id" class="custom-select col-12">
                                                            <option value="">Select</option>
                                                                <?php
                                                            
                                                                $resultss = $mysqli->query("SELECT * FROM data") or die($mysqli->error());
                                                                while ($trow = mysqli_fetch_array($resultss)) {
                                                                    $trows[] = $trow;
                                                                }
                                                                foreach ($trows as $trow) {
                                                                    print "<option value='" . $trow['id'] . "'>" . $trow['name'] . "</option>";
                                                                }
                                                                ?>
															</select>
                                </div>
                                
                            </div>
                        </form>
                        </div>
                        <form action="process.php" method="POST">
                <div class="card-box mb-30" style="padding-bottom:1rem;">
                    <div class="pd-20 pb-10 d-flex ">
							<h4 class="text h4">Employee Details</h4>
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                             
                                <?php 
                                    $con = mysqli_connect("localhost","root","","crud");

                                    if(isset($_GET['id']))
                                    {
                                        $id = $_GET['id'];

                                        $query = "SELECT * FROM data WHERE id='$id' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
												<div style="padding-left:1rem;" class="form-group">
							
												<label style="text-align:right;" class="col-sm-12 col-md-2 col-form-label">Employee Name </label>
												<label class="col-sm-12 col-md-8 col-form-label"><?= $row['name']; ?></label>
												<input type="hidden" name="name" value="<?= $row['name']; ?>">
												
												<label style="text-align:right;" class="col-sm-12 col-md-2 col-form-label">Salary Grade </label>
												<label class="col-sm-12 col-md-8 col-form-label"><?= $row['sg']; ?></label>
												<input type="hidden" name="sg" value="<?= $row['sg']; ?>">
												
												<label style="text-align:right;" class="col-sm-12 col-md-2 col-form-label">Step  </label>
												<label class="col-sm-12 col-md-8 col-form-label"><?= $row['step']; ?></label>
												<input type="hidden" name="step" value="<?= $row['step']; ?>">
												
												<label style="text-align:right;" class="col-sm-12 col-md-2 col-form-label">Position  </label>
												<label class="col-sm-12 col-md-8 col-form-label"><?= $row['position']; ?></label>
												<input type="hidden" name="position" value="<?= $row['position']; ?>">
                                                </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="card-box mb-30" style="padding-bottom:1rem;">
                    <div class="pd-20 pb-10 d-flex ">
							<h4 class="text h4">Pay Period</h4>
                        </div><label style="padding-left:2rem;bottom:1rem;" class="col-sm-12 col-md-2 col-form-label"></label><br>
           
								<div style="padding-left:5rem;"class="form-group">
                                                        
								<label class="col-sm-12 col-md-2 col-form-label">From Date</label>
                                <input name="fromDate" type="date" >
                            
                                <label class="col-sm-12 col-md-2 col-form-label">To Date</label>
                                <input name="toDate" type="date" >
								</div>
                 
													
                                                  

				
                    </div>
                    <div class="card-box mb-30" style="padding-bottom:1rem;">
                    <div class="pd-20 pb-10 d-flex ">
							<h4 class="text h4">Manner of Payment</h4>
                        </div><label style="padding-left:2rem;bottom:1rem;" class="col-sm-12 col-md-2 col-form-label"></label><br>
                  
								<div style="padding-left:5rem;"class="form-group">
                                                        
								<label class="col-sm-12 col-md-2 col-form-label">Pay Package Type</label>
                                <label class="col-sm-12 col-md-2 col-form-label"><b>Monthly Salary</b></label>
                 
													
                                                  

						
                    </div> 
                     
                    </div>
                    <?php
                    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));       
                    $result = $mysqli->query("SELECT * FROM employeedeductions where employeeId=$id") or die(mysqli->error);
                    
                    ?>
                    <div class="card-box mb-30" style="padding-bottom:1rem;">
                    <div class="pd-20 pb-10 d-flex ">
							<h4 class="text h4">Deductions / Contributions</h4>
                        </div><label style="padding-left:2rem;bottom:1rem;" class="col-sm-12 col-md-2 col-form-label"></label><br>
               
								<div style="padding-left:5rem;" class="form-group">
                                <table id="tableid" class="table  table-bordered table-sm" style=" background:white;width: calc(60vw - 320px);">
                                    <legend>Employee Deductions Information</legend>
                                <thead >
                                        <tr style="text-align:center;">
                                            <th>Category</th>
                                            <th >Amount</th>
                                     
                                        </tr>
                                    </thead>
                                <?php
                                    while($row = $result->fetch_assoc()):
                                ?>
                                <tr>
                                    <td><?php echo $row['edName']; ?></td>
                                    <td><?php echo number_format($row['employeeDeductionAmount'],2); ?></td>
                                
                                  
                                </tr>
                                <?php endwhile;  ?>
                            

                                </table>
													
                                                  

					
                    </div> 
                     
                    </div>
                    <?php
            $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));       
            $result = $mysqli->query("SELECT * FROM employeeallowance where employeeId=$id") or die(mysqli->error);
             
            ?>
                     <div class="card-box mb-30" style="padding-bottom:1rem;">
                    <div class="pd-20 pb-10 d-flex ">
							<h4 class="text h4">Taxable Income Received</h4>
                        </div><label style="padding-left:2rem;bottom:1rem;" class="col-sm-12 col-md-2 col-form-label"></label><br>
                       
								<div style="padding-left:5rem;" class="form-group">
                        <table id="tableid" class="table  table-bordered table-sm" style=" background:white;width: calc(60vw - 320px);">
                    <legend>Employee Allowance Information</legend>
                <thead>
                        <tr style="text-align:center;">
                            <th>Category</th>
                            <th >Amount</th>
                      
                        </tr>
                    </thead>
                <?php
                    while($row = $result->fetch_assoc()):
                ?>
                
                <tr>
                    
                    <td><?php echo $row['eaName']; ?></td>
                    <td><?php echo number_format($row['employeeallowanceAmount'],2); ?></td>
                  
                  
                </tr>
                <?php endwhile;  ?>
               
                <tr>
                <td>Basic Salary</td>
                <td><?php 
                $fresh = mysqli_query($mysqli, "SELECT * FROM data WHERE id= '$id'");
                if($res = mysqli_fetch_array($fresh))
                {	
                    echo number_format($res['salary'],2); 
					$salary = $res['salary']; 
                }?></td>
                
               </tr>
                </table>
                 
                    </div>
                    </div> 
                 
                    <div class="card-box mb-30" style="padding-bottom:1rem;">
                    <div class="pd-20 pb-10 d-flex ">
					
							
                                                        
							
                                <label class="col-sm-12 col-md-4 col-form-label"><b>Gross Pay 

                                <?php
                                
                               
                                
                                $allowance_results = $mysqli->query("SELECT employeeId, sum(employeeallowanceAmount) AS value_sum FROM employeeallowance where employeeId=$id") or die(mysqli->error);
                                while($allowance_rows = $allowance_results->fetch_assoc()) {
                                        
                                    $fetched_sum = $allowance_rows['value_sum'];
                                
                                }
                                $current_employee_salary = $mysqli->query("SELECT * FROM data where id=$id") or die(mysqli->error);
                                
                            
                                    $gross_amount= $fetched_sum + $salary;
                                    echo number_format($gross_amount,2);
                                ?>

                                </b></label>
								<input type="hidden" name="gross_amount" value="<?php echo $gross_amount ?>">

                        <label  class="col-sm-12 col-md-4 col-form-label"><b>Total Deductions 
							
                        <?php
         
   
                        
                        $deduction_results = $mysqli->query("SELECT employeeId, sum(employeeDeductionAmount) AS value_difference FROM employeedeductions where employeeId=$id") or die(mysqli->error);
                        while($deduction_rows = $deduction_results->fetch_assoc()) {
                            
                        $fetched_difference = $deduction_rows['value_difference']; 
                        echo number_format($fetched_difference,2);
                        }
                        $net_amount = $gross_amount - $fetched_difference; 
                        ?>
                            </b></label>
                        <label class="col-sm-12 col-md-4 col-form-label"><b>Net Pay <?php echo number_format($net_amount,2); ?><b></label>
						<input type="hidden" name="net_amount" value="<?php echo $net_amount ?>">		
						<input type="hidden" name="fetched_difference" value="<?php echo $fetched_difference ?>">			
                                                  

					
                    </div>
                    <div style="left:55rem;bottom:1rem;"class="col-md-4">
                    <button type="submit" name="savePayslip" class="btn btn-primary">Pay</button>
                </div>
				</div>
               
        </form>  
		<form action=""></form>
                    </div>
					<!-- Export Datatable End -->
				
				<div class="footer-wrap pd-20 mb-20 card-box">
					@ BSU-CMPS
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>

      <script>
		$('select').change(function ()
{
    $(this).closest('form').submit();
});
	  </script>
</body>
</html>
