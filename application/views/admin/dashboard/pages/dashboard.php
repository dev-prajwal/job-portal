<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Recruiter Goa Statistics Dashboard</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
	<?php include_once 'sections/include-css.php' ;?>

</head>
<?php include_once 'sections/preloader.php' ;?>
<!-- HK Wrapper -->
<div class="hk-wrapper hk-vertical-nav hk-icon-nav">
	<?php include_once 'sections/topnav.php' ;?>


<!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10">Dashboard<?php ?></h2>
					</div>
                </div>
                <!-- /Title -->

				<div class="hk-row">
					<div class="col-xl-12">
						<div class="card-group hk-dash-type-2">
							<div class="card card-sm">
								<div class="card-body">
									<span class="d-block font-14 font-weight-500 text-dark">Total Number of Visitors</span>
									<div class="d-flex align-items-center justify-content-between">
										<div class="display-5 font-weight-400 text-dark"><?php echo number_format($total_visitors, 0, ".", ",");?></div>
										<div class="font-13 font-weight-500">
											<span>-28.12%</span>
											<i class="ion ion-md-arrow-down text-danger ml-5"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card card-sm">
								<div class="card-body">
									<span class="d-block font-14 font-weight-500 text-dark">Total Job Posts</span>
									<div class="d-flex align-items-center justify-content-between">
										<div class="display-5 font-weight-400 text-dark"><?php echo number_format($total_job_posted, 0, ".", ",");?></div>
										<div class="font-13 font-weight-500">
											<span>2.12%</span>
											<i class="ion ion-md-arrow-up text-success ml-5"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card card-sm">
								<div class="card-body">
									<span class="d-block font-14 font-weight-500 text-dark">Total Number of Companies</span>
									<div class="d-flex align-items-center justify-content-between">
										<div class="display-5 font-weight-400 text-dark"><?php echo number_format($total_companies, 0, ".", ",");?></div>
										<div class="font-13 font-weight-500">
											<span>39.15%</span>
											<i class="ion ion-md-arrow-up text-success ml-5"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="card card-sm">
								<div class="card-body">
									<span class="d-block font-14 font-weight-500 text-dark">Total Number of Job Applications</span>
									<div class="d-flex align-items-center justify-content-between">
										<div class="display-5 font-weight-400 text-dark"><?php echo number_format($total_job_applied, 0, ".", ",");?></div>
										<div class="font-13 font-weight-500">
											<span>39.15%</span>
											<i class="ion ion-md-arrow-up text-success ml-5"></i>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>								
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table table-hover mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Chart</th>
													<th>last Year</th>
													<th>9 months</th>
													<th>6 months</th>
													<th>3 months</th>
													<th>1 month</th>
													<th>15 Days</th>
													<th>1 Week</th>
 												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Number of Visitors</td>
													<td><span class="peity-line" 
													data-width="90" 
													data-peity='{ "fill": ["rgba(102,64,178,.05)"], "stroke":["#6640b2"]}' 
													data-height="40">
													<?php echo "0"; foreach($number_of_visitors as $key => $value ){ if($value!=0){	echo ",".(int)(((int)$value/$key)*100); }else{echo "0,";} } ?>
													</span> 
													<?php
													foreach($number_of_visitors as $key => $value ){?>													   
														<td><span class="">
														<!-- <i class="ion ion-md-code" aria-hidden="true"></i> -->
														<?php echo $value; ?> </span> </td>
													<?php } ?>


													</td>
												</tr>
												<tr>
													<td>Companies Registered</td>
													<td><span class="peity-line" 	
													data-width="90" 
													data-peity='{ "fill": ["rgba(102,64,178,.05)"], "stroke":["#6640b2"]}' 
													data-height="40">
													<?php echo "0"; foreach($number_of_companies as $key => $value ){ if($value!=0){	echo ",".(int)(((int)$value/$key)*100); }else{echo "0,";} } ?>
													</span> </td>
													
													<?php foreach($number_of_companies as $key => $value ){?>
														<td><span class="">
														<!-- <i class="ion ion-md-arrow-up" aria-hidden="true"></i> -->
														<?php echo $value; ?> </span> </td>
													<?php } ?>
												</tr>
												<tr>
													<td>Job Posted</td>
													<td><span class="peity-line" data-width="90" 
													data-peity='{ "fill": ["rgba(102,64,178,.05"], "stroke":["#6640b2"]}' 
													data-height="40">
													<?php echo "0"; foreach($number_of_jobs_posted as $key => $value ){ if($value!=0){	echo ",".(int)(((int)$value/$key)*100); }else{echo "0,";} } ?>
													</span> </td>
													<?php foreach($number_of_jobs_posted as $key => $value ){?>
														<td><span class="text-danger">														
														<!-- <i class="ion ion-md-arrow-down" aria-hidden="true"></i> -->
														<?php echo $value; ?> </span> </td>
													<?php } ?>
												</tr>
												<tr>
													<td>Jobs Applied</td>
													<td><span class="peity-line" data-width="90" data-peity='{ "fill": ["rgba(50,65,72,.05"], "stroke":["#6640b2"]}' 
													data-height="40">
													<?php echo "0"; foreach($number_of_jobs_applied as $key => $value ){ if($value!=0){	echo ",".(int)(((int)$value/$key)*100); }else{echo "0,";} } ?>
													</span> </td>
													<?php foreach($number_of_jobs_applied as $key => $value ){?>
														<td><span class="text-success">
														<!-- <i class="ion ion-md-arrow-up" aria-hidden="true"></i> -->
														<?php echo $value; ?> </span> </td>
													<?php } ?>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>	
						<div class="card">
					<div class="card-header card-header-action">
						<h6>Highest Performing Jobs</h6>
					</div>
					<div class="card-body pa-0">
						<div class="table-wrap">
							<div class="table-responsive">
								<table class="table table-sm table-hover mb-0">
									<thead>
										<tr>
											<th>Sr.No</th>
											<th>Job Title</th>
											<th>Company</th>
											<th>Category</th>
											<th>Location</th>
											<th class="w-20">Applied</th>
											<th>Posted On</th>
										</tr>
									</thead>
									<tbody>
									<?php $row = 1;  foreach ($top_5_jobs as $job) { ?>
												<tr>
												<td><?php echo $row;?></td>
												<td><?php echo $job['job_title'];?></td>
												<td><?php echo $job['company_name'];?></td>
												<td><?php echo $job['job_category'];?></td>
												<td><span class="d-flex align-items-center"><i class="zmdi zmdi-time-restore font-25 mr-10 text-light-40"></i><span><?php echo $job['applied'];?></span></span></td>
												<td>
													<?php echo $job['applied'];?>
												</td>
												<td><?php echo $job['date_posted'];?></td>
											</tr>
										<?php $row = $row + 1; } ?>								
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header card-header-action">
						<h6>Lowest Performing Jobs</h6>
					</div>
					<div class="card-body pa-0">
						<div class="table-wrap">
							<div class="table-responsive">
								<table class="table table-sm table-hover mb-0">
									<thead>
										<tr>
										<th>Sr.No</th>
											<th>Job Title</th>
											<th>Company</th>
											<th>Category</th>
											<th>Location</th>
											<th class="w-20">Applied</th>
											<th>Posted On</th>
										</tr>
									</thead>
									<tbody>

										<?php $row = 1;  foreach ($bottom_5_jobs as $job) { ?>
												<tr>
												<td><?php echo $row;?></td>
												<td><?php echo $job['job_title'];?></td>
												<td><?php echo $job['company_name'];?></td>
												<td><?php echo $job['job_category'];?></td>
												<td><span class="d-flex align-items-center"><i class="zmdi zmdi-time-restore font-25 mr-10 text-light-40"></i><span><?php echo $job['applied'];?></span></span></td>
												<td>
													<?php echo $job['applied'];?>
												</td>
												<td><?php echo $job['date_posted'];?></td>
											</tr>
										<?php $row = $row + 1; } ?>

										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>					


				
					</div>
				</div>
				
                <!-- Row -->
    
                </div>
                <!-- /Row -->
			</div>
            <!-- /Container -->
<?php include_once 'sections/include-jquery.php' ;?>
        </div>
<!-- /Main Content -->
</div>
    <!-- /HK Wrapper -->
<?php include_once 'sections/footer_jquery.php' ;?>

</body>