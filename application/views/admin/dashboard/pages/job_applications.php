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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span><?php print_r($page_name)?></h4>
                    <h4 class="hk-pg-title">Totel <?php print_r($total_job_applied)?> <?php print_r($page_name)?></h4>

                </div>
                <!-- /Title -->

                <table id="job_applications">
                    <thead>
                    <tr role="row">
                        <th >Sr.No</th>
                        <th >Title</th>
                        <th >Candidate Name</th>
                        <th >Category</th>
                        <th >Location</th>
                        <th >Date Posted</th>
                    </thead>
				<tbody>				  				
                  
                <?php $row = 1;  foreach ($job_applications as $job_application) { ?>
                    <tr>
                        <td><?php echo $row;?></td>
                        <td><?php echo $job_application['job_title'];?></td>
                        <td><?php echo $job_application['applied_by_name'];?></td>
                        <td><?php echo $job_application['name'];?></td>
                        <td><?php echo $job_application['taluka_name'];?></td> 
                        <td><?php echo $job_application['date_posted'];?></td>
                    </tr>
                <?php $row = $row + 1; } ?>                    
                </tbody>
			  </table>


            </div>
            <!-- /Container -->

		<?php include_once 'sections/footer.php' ;?>

        </div>
        <!-- /Main Content -->
	
	
</div>
    <!-- /HK Wrapper -->
	<?php include_once 'sections/include-jquery.php' ;?>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    
    <script>
    $(document).ready(function() {
        $('#job_applications').DataTable();
    } );
    </script>

</body>