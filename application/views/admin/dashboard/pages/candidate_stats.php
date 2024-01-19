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
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span><?php print_r($page_name)?></h4>
                </div>
                <!-- /Title -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h6 class="hk-sec-title">Candidate Registered</h6>
                            <div class="row">
                                <div class="col-sm col-md-6" height="294">
                                    <div class="chart-container">
                                        <canvas id="barChart"></canvas>
                                    </div>                                
                                </div>
                                <div class="col-sm col-md-6" height="294">
                                    <div class="chart-container">
                                        <canvas id="canvas"></canvas>
                                    </div>                                
                                </div>
                            </div>
                        </section>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>
	<script>
    var canvas = document.getElementById("barChart");
    var ctx = canvas.getContext('2d');

    // Global Options:
    Chart.defaults.global.defaultFontColor = 'black';
    Chart.defaults.global.defaultFontSize = 16;

    var data = {
        labels: ["Called ", "Not Called"],
        datasets: [
            {
                fill: true,
                backgroundColor: [ 'green','yellow'],
                data: [<?php   echo $interview_calls['called'];   echo ",";  echo $interview_calls['not_called'];  ?> ],        
            }
        ]
    };

    var options = {
            title: {
                    display: true,
                    text: 'Candidates called for Interview',
                    position: 'top'
                },
            rotation: -0.7 * Math.PI
    };

    var myBarChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: options
    });
    </script>
    <script>

	var config = {
		type: 'line',
		data: {
			labels: [
                <?php $row = 0; foreach($number_of_jobs_posted as $key => $value ){ 
            if($row==0){
                $row=$row+1;
                echo "'".$key."'"; 
            }else{
                echo ",'".$key."'"; 
            }
            } ?>
            ],
			datasets: [{
				label: 'Jobs Posted',
				backgroundColor: "#FF0000",
				borderColor: "#FF0000",
				fill: false,
				data: [
                <?php $row = 0; foreach($number_of_jobs_posted as $key => $value ){ 
            if($row==0){
                echo $value;
                $row=$row+1;
                 }else{
                echo ",".$value; 
            }
            } ?>
            ],
			}, {
				label: 'Jobs Applied',
				backgroundColor: "#0000FF",
				borderColor: "#0000FF",
				fill: false,
				data: [<?php $row = 0; foreach($number_of_jobs_applied as $key => $value ){ 
            if($row==0){
                echo $value;
                $row=$row+1;
                 }else{
                echo ",".$value; 
            }
            } ?>],
			}]
		},
		options: {
			responsive: true,
			title: {
				display: true,
				text: 'Jobs Applied v/s Jobs Posted'
			},
			scales: {
				xAxes: [{
					display: true,
				}],
				yAxes: [{
					display: true,
					
				}]
			}
		}
	};

	window.onload = function() {
		var ctx = document.getElementById('canvas').getContext('2d');
		window.myLine = new Chart(ctx, config);
	};
	</script>
</body>