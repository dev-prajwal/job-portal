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
                    <!-- <h4 class="hk-pg-title">Totel <?php print_r($total_companies)?> <?php print_r($page_name)?></h4> -->
                    <h4 class="hk-pg-title"> <button onclick="window.location.href = '<?= base_url('/export/company_list');?>';" type="submit" class="btn btn-primary"> Export <i data-feather="external-link"></i></button>
                </div>
                <!-- /Title -->

                <table id="companies">
				<thead>
				  <tr role="row">
                      <th >Sr.No</th>
                      <th >Company</th>
                      <th >Industry</th>
                      <th >Location</th>
                      <th >Jobs Posted</th>
				</thead>
				<tbody>				  				
                  
                <?php $row = 1;  foreach ($companies as $company) { ?>
                    <tr>
                        <td><?php echo $row;?></td>
                        <td><?php echo $company['company_name'];?></td>
                        <td><?php echo $company['company_type'];?></td>
                        <td><?php echo $company['taluka_name'];?></td>
                        <td><?php echo $company['jobs_posted'];?></td>
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
    $('#companies').DataTable();
} );
    </script>

</body>