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
                
				  
				<section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <button class="btn btn-primary btn-sm" id="button">Approve Selected Companies</button>
										<button class="btn btn-primary btn-sm" id="button2">Block Selected Companies</button>
                                        <div id="datable_5_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
										<table id="datable_5" class="table w-100 display dataTable no-footer dtr-inline" role="grid" style="width: 1039px;">
                                            <thead>
                                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datable_5" rowspan="1" colspan="1" style="width: 197px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Name</th><th class="sorting" tabindex="0" aria-controls="datable_5" rowspan="1" colspan="1" style="width: 196px;" aria-label="Position: activate to sort column ascending">Position</th><th class="sorting" tabindex="0" aria-controls="datable_5" rowspan="1" colspan="1" style="width: 115px;" aria-label="Office: activate to sort column ascending">Office</th><th class="sorting" tabindex="0" aria-controls="datable_5" rowspan="1" colspan="1" style="width: 50px;" aria-label="Age: activate to sort column ascending">Age</th><th class="sorting" tabindex="0" aria-controls="datable_5" rowspan="1" colspan="1" style="width: 134px;" aria-label="Start date: activate to sort column ascending">Start date</th><th class="sorting" tabindex="0" aria-controls="datable_5" rowspan="1" colspan="1" style="width: 107px;" aria-label="Salary: activate to sort column ascending">Salary</th></tr>
                                            </thead>
                                            <tbody>
                                                
                                                
                                                
                                                
                                                
                                            <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Bruno Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2011/05/03</td>
                                                    <td>$163,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">ett Win</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
												<tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011/02/03</td>
                                                    <td>$234,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009/08/19</td>
                                                    <td>$139,575</td>
                                                </tr>
                                            <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Bruno Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2011/05/03</td>
                                                    <td>$163,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">ett Win</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
												<tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011/02/03</td>
                                                    <td>$234,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009/08/19</td>
                                                    <td>$139,575</td>
                                                </tr>
                                            <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Bruno Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2011/05/03</td>
                                                    <td>$163,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">ett Win</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
												<tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011/02/03</td>
                                                    <td>$234,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009/08/19</td>
                                                    <td>$139,575</td>
                                                </tr>
                                            <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Bruno Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2011/05/03</td>
                                                    <td>$163,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">ett Win</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
												<tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011/02/03</td>
                                                    <td>$234,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009/08/19</td>
                                                    <td>$139,575</td>
                                                </tr>
                                            <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Bruno Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2011/05/03</td>
                                                    <td>$163,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">ett Win</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
												<tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011/02/03</td>
                                                    <td>$234,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009/08/19</td>
                                                    <td>$139,575</td>
                                                </tr>
                                            <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Bruno Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2011/05/03</td>
                                                    <td>$163,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">ett Win</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
												<tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011/02/03</td>
                                                    <td>$234,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009/08/19</td>
                                                    <td>$139,575</td>
                                                </tr>
                                            <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Bruno Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2011/05/03</td>
                                                    <td>$163,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">ett Win</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
												<tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011/02/03</td>
                                                    <td>$234,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009/08/19</td>
                                                    <td>$139,575</td>
                                                </tr>
                                            <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Bruno Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2011/05/03</td>
                                                    <td>$163,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">ett Win</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
												<tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011/02/03</td>
                                                    <td>$234,500</td>
                                                </tr>
												<tr role="row" class="even">
                                                    <td tabindex="0" class="sorting_1">Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009/08/19</td>
                                                    <td>$139,575</td>
                                                </tr>												
											</tbody>
                                        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div><div class="col-sm-12 col-md-7"></div></div></div>
                                    </div>
                                </div>
                            </div>
                        </section>


            </div>
            <!-- /Container -->

		<?php include_once 'sections/footer.php' ;?>

        </div>
        <!-- /Main Content -->
	
	
</div>
    <!-- /HK Wrapper -->
	<?php include_once 'sections/include-jquery.php' ;?>

    <!-- Data Table JavaScript -->
    <script src="<?= base_url('/assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?= base_url('/assets/admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
    <script src="<?= base_url('/assets/admin/dist/vendors/datatables.net-dt/js/dataTables.dataTables.min.js');?>"></script>
    <script src="<?= base_url('/assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?= base_url('/assets/admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js');?>"></script>
    <script src="<?= base_url('/assets/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
    <script src="<?= base_url('/assets/admin/vendors/pdfmake/build/vfs_fonts.js');?>"></script>
    <script src="<?= base_url('/assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
    <script src="<?= base_url('/assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
    
	<script>
	$(document).ready(function(){
	
var table = $('#datable_5').DataTable({
		select: {
            style: 'multi'
        },
		responsive: true,
		language: { 
		search: "" ,
		sLengthMenu: "_MENU_Items",
		},
		"bPaginate": true,
		"info":     false,
		"bFilter":     true,
		});
	

	    $('#datable_5 tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
		} );

 
		$('#button').click( function () {
			table.rows('.selected').remove().draw( false );
		} );	
	
		});
	</script>
	
	
</body>