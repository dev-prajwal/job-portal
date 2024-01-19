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
              
			  
				<div class="hk-pg-header align-items-top">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10">Job Views</h2>
					</div>
					<form method="POST" action="<?= base_url('/admin/job_views'); ?>">

					<div class="d-flex w-700p">
						<select name="company_type" class="form-control custom-select custom-select-sm mr-15">
							<option value="-1">Choose Industry</option>
								<?php foreach ($company_types as $company) {
									echo "<option value='".$company['company_type_id']."'>".$company['company_type']."</option>";
								} ?> 
						</select>
						<select name="job_category" class="form-control custom-select custom-select-sm mr-15">
						<option value="-1">Choose Job Category</option>
								<?php foreach ($job_categories as $job_category) {
									echo "<option value='".$job_category['id']."'>".$job_category['name']."</option>";
								} ?> 
						</select>
						<select name="taluka_id" class="form-control custom-select custom-select-sm mr-15">
						<option value="-1">Choose Location</option>
								<?php foreach ($location_talukas as $location_taluka) {
									echo "<option value='".$location_taluka['taluka_id']."'>".$location_taluka['taluka_name']."</option>";
								} ?> 
						</select>	
						<select name="job_post_type" class="form-control custom-select custom-select-sm mr-15">
						<option value="-1">Choose Job Post Type</option>
								<?php foreach ($job_types as $job_type) {
									echo "<option value='".$job_type['job_post_type_id']."'>".$job_type['job_post_type']."</option>";
								} ?> 
						</select>
						<button type="submit" class="btn btn-primary" >Filter</button>							
					</div>
					</form>			  
                </div>			  

				<div class="col-xl-12">
					<section class="hk-sec-wrapper">
						<h6 class="hk-sec-title">Industry | Category | Location | Type</h6>
						<div class="row">
							<div class="col-sm">
								<div id="e_chart_1" class="echart" style="height: 294px; -moz-user-select: none; position: relative;" _echarts_instance_="ec_1549196383965"><div style="position: relative; overflow: hidden; width: 1037px; height: 294px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas style="position: absolute; left: 0px; top: 0px; width: 1037px; height: 294px; -moz-user-select: none; padding: 0px; margin: 0px; border-width: 0px;" data-zr-dom-id="zr_0" width="1037" height="294"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgb(255, 255, 255); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 6px; color: rgb(50, 65, 72); font: 12px/18px &quot;Roboto&quot;, sans-serif; padding: 6px; left: 104px; top: 173px; pointer-events: none;">Mon<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:10px;height:10px;background-color:#7a5449;"></span>120</div></div>
							</div>
						</div>
					</section>
				</div>
            </div>
            <!-- /Container -->

		<?php include_once 'sections/footer.php' ;?>

        </div>
        <!-- /Main Content -->
	
	
	
	
</div>
    <!-- /HK Wrapper -->
	<?php include_once 'sections/include-jquery.php' ;?>
	<script src="<?= base_url('/assets/admin/vendors/echarts/dist/echarts-en.min.js');?>"></script>   
	
	<script>
	var echartsConfig = function() { 
	if( $('#e_chart_1').length > 0 ){
		var eChart_1 = echarts.init(document.getElementById('e_chart_1'));
		var option = {
			color: ['#7a5449'],
			tooltip: {
				show: true,
				trigger: 'axis',
				backgroundColor: '#fff',
				borderRadius:6,
				padding:6,
				axisPointer:{
					lineStyle:{
						width:0,
					}
				},
				textStyle: {
					color: '#324148',
					fontFamily: '"Roboto", sans-serif',
					fontSize: 12
				}
			},
			
			xAxis: [{
				type: 'category',
				data: ['Last year', 'Last 9 Months', 'Last 6 Months', 'Last 3 Months', 'Last Month', 'Last 15 Days', 'Last Week'],
				axisLine: {
					show:false
				},
				axisTick: {
					show:false
				},
				axisLabel: {
					textStyle: {
						color: '#5e7d8a'
					}
				}
			}],
			yAxis: {
				type: 'value',
				axisLine: {
					show:false
				},
				axisTick: {
					show:false
				},
				axisLabel: {
					textStyle: {
						color: '#5e7d8a'
					}
				},
				splitLine: {
					lineStyle: {
						color: '#eaecec',
					}
				}
			},
			grid: {
				top: '3%',
				left: '3%',
				right: '3%',
				bottom: '3%',
				containLabel: true
			},
			series: [{
				data: [<?php echo $last_year.",".$last_9_months.",".$last_6_months.",".$last_3_months.",".$last_month.",".$last_15_days.",".$last_week;?>],
				type: 'bar',
				barMaxWidth: 30,
				itemStyle: {
					normal: {
						barBorderRadius: [6, 6, 0, 0] ,
					}
				},
			}]
		};
		eChart_1.setOption(option);
		eChart_1.resize();
	}
}
	
	echartsConfig();
	
	</script>
	
	
	
	
</body>