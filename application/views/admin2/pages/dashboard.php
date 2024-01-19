<!doctype html>
<html lang="en">
  
<!-- Mirrored from themerail.com/html/oficiona/employer-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Feb 2019 08:03:24 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Oficiona</title>
	<?php include dirname(__DIR__).'/sections/include_css.php';?>
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icon-114x114.png">
  </head>
  <body>

  <?php include dirname(__DIR__).'/sections/navbar.php';?>

    <!-- Breadcrumb -->
    <div class="alice-bg padding-top-40 padding-bottom-30">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Employer Dashboard</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-form">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End -->





	<div class="container padding-bottom-10 padding-top-10">
        <div class="row">
          	<div class="col">
				<div class="dashboard-section user-statistic-block">
					<div class="user-statistic">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
						<h3>132</h3>
						<span>Companies Viewed</span>
					</div>
					<div class="user-statistic">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
						<h3>12</h3>
						<span>Applied Jobs</span>
					</div>
					<div class="user-statistic">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
						<h3>32</h3>
						<span>Favourite Jobs</span>
					</div>
				</div>
		    </div>	
		</div>
	</div>		
<br>
	<div class="container padding-bottom-20 padding-top-20">
        <div class="row">
          	<div class="col">
			  <div class="dashboard-section dashboard-view-chart">
					<iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
                  <canvas id="view-chart" width="773" height="386" style="display: block; width: 773px; height: 386px;"></canvas>
                </div>
		    </div>	
		</div>
	</div>


    <!-- Footer -->
    <footer class="footer-bg">
      <div class="footer-bottom-area">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="footer-bottom border-top">
                <div class="row">
                  <div class="col-xl-4 col-lg-5 order-lg-2">
                  </div>
                  <div class="col-xl-4 col-lg-4 order-lg-1">
                    <p class="copyright-text">Copyright <a href="#">Oficiona</a> 2018, All right reserved</p>
                  </div>
                  <div class="col-xl-4 col-lg-3 order-lg-3">
                    <div class="back-to-top">
                      <a href="#">Back to top<i class="fas fa-angle-up"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
	<!-- Footer End -->
	

	<?php include dirname(__DIR__).'/sections/include_js.php';?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
	<script src="js/map.js"></script>
	<script>
	
	$(document).ready(function() {
		if ($("#view-chart").length > 0) {
		var ctx = document.getElementById("view-chart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
			datasets: [{
				label: '# of Votes',
				data: [12, 19, 3, 5, 2, 3],
				backgroundColor: [
				'rgba(36, 109, 248, .2)'
				],
				borderColor: [
				'rgba(36, 109, 248, 1 )'
				],
				borderWidth: 1
			}]
			},
			options: {
			title: {
				display: false
			},
			gridLines: {
				display: false
			},
			legend: {
				display: false
			},
			tooltips: {
				mode: 'index',
				intersect: true
			},
			responsive: true,
			scales: {
				xAxes: [{
				stacked: true,
				}],
				yAxes: [{
				stacked: true,
				}]
			}
			}
		});
		}
	});

	</script>

  </body>

<!-- Mirrored from themerail.com/html/oficiona/employer-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Feb 2019 08:03:24 GMT -->
</html>