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
                </div>
                <!-- /Title -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLarge01">Request Company</button>
                <br><br><br>
                <table  id="companies">
                    <thead>
                    <tr role="row">
                        <th >Sr.No</th>
                        <th >Email</th>
                        <th >Date</th>
                    </thead>
                    <tbody>				  				
                    
                    <?php $row = 1;  foreach ($company_requested as $company) { ?>
                        <tr>
                            <td><?php echo $row;?></td>
                            <td><?php echo $company['company_email'];?></td>
                            <td><?php echo $company['date_requested'];?></td>
                        </tr>
                    <?php $row = $row + 1; } ?>                    
                    </tbody>
			    </table>
                 <!-- Modal -->
                 <div class="modal fade" id="exampleModalLarge01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge01" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Request Company</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="<?= base_url('/admin/company_request'); ?>">
                            <div class="modal-body">

                                
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="emails" class="form-control mt-15" placeholder="Enter Company Email (Comma saperated for multiple emails)">
                                    <textarea class="form-control mt-15" name="body" rows="8" placeholder="Body"></textarea>
                                </div>
                            </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Request</button>
                            </div>
                            </form>
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
    $('#companies').DataTable();
} );
    </script>
</body>