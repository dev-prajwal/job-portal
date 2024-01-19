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
                            <h6 class="hk-sec-title">Company Registered</h6>
                            <div class="row">
                                <div class="col-sm" height="294">
                                    <div class="chart-container">
                                        <canvas id="chart"></canvas>
                                    </div>                                
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-sm col-md-6" height="294">
                                    <div class="chart-container">
                                        <canvas id="barChart"></canvas>
                                    </div>                                
                                </div>
                                <div class="col-sm col-md-6" height="294">
                                    <div class="chart-container">
                                    <canvas id="barChart2"></canvas>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
    var data = {
  labels: ['1 year', '9 months', '6 Months', '3 Monhs', '1 Month', '15 Days', '1 Week'],
  datasets: [{
    label: "Number of Companies",
    backgroundColor: "rgba(255,99,132,0.2)",
    borderColor: "rgba(255,99,132,1)",
    borderWidth: 2,
    hoverBackgroundColor: "rgba(255,99,132,0.4)",
    hoverBorderColor: "rgba(255,99,132,1)",
    data: [ <?php foreach($number_of_companies as $key => $value ){ echo ",".$value; } ?>],    
  }]
};

var options = {
  maintainAspectRatio: false,
  responsive: true,
  scales: {
    yAxes: [{
      stacked: true,
      gridLines: {
        display: true,
        color: "rgba(255,99,132,0.2)"
      }
    }],
    xAxes: [{
      gridLines: {
        display: false
      }
    }]
  }
};

Chart.Bar('chart', {
  options: options,
  data: data
});
    </script>

	<script>
    var canvas = document.getElementById("barChart");
    var ctx = canvas.getContext('2d');
    ctx.height = 300;
    // Global Options:
    Chart.defaults.global.defaultFontColor = 'black';
    Chart.defaults.global.defaultFontSize = 16;

    var data = {
        labels: [ <?php foreach($company_categories as $key => $value ){ 
            if($key==0){
                echo "'".$value['company_type']."'"; 
            }else{
                echo ",'".$value['company_type']."'"; 
            }
            } ?>],
        datasets: [
            {
                fill: true,
                backgroundColor: ['black','yellow','red','green','blue'],
                data: [ <?php foreach($company_categories as $key => $value ){ 
                    if($key==0){
                        echo $value['total'];
                    }else{
                        echo ",".$value['total'];
                    }
                    
                    } ?> ],

            }
        ]
    };

    var options = {
            title: {
                    display: true,
                    text: 'Different type of Companies Registered',
                    position: 'bottom'
                },
            rotation: -0.7 * Math.PI,
            maintainAspectRatio: false,
            responsive: true,
    };

    var myBarChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: options
    });

    </script>

	<script>
    var canvas2 = document.getElementById("barChart2");
    var ctx2 = canvas2.getContext('2d');
    ctx.height = 300;
    // Global Options:
    Chart.defaults.global.defaultFontColor = 'black';
    Chart.defaults.global.defaultFontSize = 16;

    var data2 = {
        labels: [<?php foreach($company_locations as $key => $value ){ 
            if($key==0){
                echo "'".$value['taluka_name']."'"; 
            }else{
                echo ",'".$value['taluka_name']."'"; 
            }
            } ?>],
        datasets: [
            {
                fill: true,
                backgroundColor: ['black','yellow','red','green','blue'],
                data: [<?php foreach($company_locations as $key => $value ){ 
                    if($key==0){
                        echo $value['total'];
                    }else{
                        echo ",".$value['total'];
                    }
                    
                    } ?> ],
            }
        ]
    };

    var options2 = {
            title: {
                    display: true,
                    text: 'Companies Registered from Different locations',
                    position: 'bottom'
                },
            rotation: -0.7 * Math.PI,
            maintainAspectRatio: false,
            responsive: true,
    };

    var myBarChart = new Chart(ctx2, {
        type: 'pie',
        data: data2,
        options: options2
    });

    </script>
</body>