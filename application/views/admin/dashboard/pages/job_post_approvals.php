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
                    <li class="breadcrumb-item"><a href="#">Statistics</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php print_r($page_name)?></li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">

                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span><?php print_r($page_name)?></h4>
                </div>
                
				  
				<div class="card">
							<div class="card-body pa-0">
								<div class="table-wrap">
									<div class="table-responsive">

									<?php if($jobs_posts) { ?>
										<table class="table table-sm table-hover mb-0">
											<thead>
												<tr>
													<th>Sr.No</th>
													<th>Job Title</th>
													<th>Company</th>
													<th>Industry</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php $row = 1;  foreach ($jobs_posts as $jobs_post) { ?>
											<tr>
												<td><?php echo $row;?></td>
												<td><?php echo $jobs_post['job_title'];?></td>
												<td><?php echo $jobs_post['company_name'];?></td>
												<td><?php echo $jobs_post['company_type'];?></td>
												<td>
												<a href="<?= base_url('/admin/job_post_approve/').$jobs_post['job_id'] ;?>" class="btn btn-success" ><i class="fas fa-check"></i></a>
												<a href="<?= base_url('/admin/job_post_approve_disapprove/').$jobs_post['job_id'] ;?>" class="btn btn-danger" ><i class="fas fa-ban"></i></a>
												</td>
											</tr>
											<?php
											$row = $row + 1;
											}
											?>												
											</tbody>
										</table>
									</div>
									<?php } else { echo "<h3>No Approvals</h3>"; } ?>
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