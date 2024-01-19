<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin | <?php print_r($page_name)?></title>
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
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#"><?php print_r($section)?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php print_r($page_name)?></li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">

                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span><?php  print_r($page_name)?></h4>
                </div>
                <!-- /Title -->
				
				<div class="hk-row">
							<div class="col-md-4">
								<div class="card card-sm">
									<div class="card-body">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Total Job Posts</span>
												<span class="d-block display-6 font-weight-400 text-dark"><?php echo number_format($total_job_posted, 0, ".", ",");?></span>
											</div>
											<div>
												<div id="sparkline_4"><canvas style="display: inline-block; width: 50px; height: 50px; vertical-align: top;" width="50" height="50"></canvas></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-sm">
									<div class="card-body">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Total Job Views</span>
												<span class="d-block display-6 font-weight-400 text-dark"><?php echo number_format($total_job_views, 0, ".", ",");?></span>
											</div>
											<div>
												<div id="sparkline_5"><canvas style="display: inline-block; width: 50px; height: 50px; vertical-align: top;" width="50" height="50"></canvas></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-sm">
									<div class="card-body">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Total Job Applications</span>
												<span class="d-block display-6 font-weight-400 text-dark"><?php echo number_format($total_job_applied, 0, ".", ",");?></span>
											</div>
										</div>
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
												<td><?php echo $job['name'];?></td>
												<td><?php echo $job['taluka_name'];?></td>
												<td><span class="d-flex align-items-center"><i class="zmdi zmdi-time-restore font-25 mr-10 text-light-40"></i><span>
													<?php echo $job['applied'];?></span></span>
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
												<td><?php echo $job['name'];?></td>
												<td><?php echo $job['taluka_name'];?></td>
												<td><span class="d-flex align-items-center"><i class="zmdi zmdi-time-restore font-25 mr-10 text-light-40"></i><span>
													<?php echo $job['applied'];?></span></span>
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
            <!-- /Container -->

		<?php include_once 'sections/footer.php' ;?>

        </div>
        <!-- /Main Content -->
	
	
</div>
    <!-- /HK Wrapper -->
	<?php include_once 'sections/include-jquery.php' ;?>
	
</body>