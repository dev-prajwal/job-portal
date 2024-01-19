<!doctype html>
<html lang="en">
  
<!-- Mirrored from themerail.com/html/oficiona/employer-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Feb 2019 08:03:24 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Oficiona</title>
	<?php include dirname(__DIR__).'/sections/include_css.php';?>
	<link rel="stylesheet" href="<?= base_url('/assets/admin/vendors/trumbowyg/dist/ui/trumbowyg.min.css');?>" type="text/css">
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
        </div>
      </div>
    </div>
		<!-- Breadcrumb End -->

		<div class="container">
        <div class="row">
          <div class="col">
            <div class="company-details">
              <div class="title-and-info">
							<form method="POST" action="<?= base_url('/admin2/save_blog'); ?>">
							<input type="hidden"  type="text" name="blog_id" value="<?php if(isset($blog->blog_id)){ echo $blog->blog_id;}?>">                            
                <div class="title">
                  <div class="thumb">
                    <img src="images/company/company-logo-1.png" class="img-fluid" alt="">
                  </div>
                  <div class="title-body">
                    <h4><input class=""   placeholder="Blog Title" type="text" name="blog_title" value="<?php if(isset($blog->blog_title)){ echo $blog->blog_title;}?>"></h4>
                  </div>
								</div>
								

 								<!-- <button class="button" name="btn"  value="draft" type="submit">Save</button>
 								<button class="button" name="btn"  value="publish" type="submit">Publish</button>
								 <button class="button" name="btn"  value="delete" type="submit">Delete</button>
								 <button class="button" name="btn"  value="preview" type="submit">Preview</button>								  -->
							</div>
              <div class="details-information padding-top-30">
                <div class="row">
                  <div class="col-xl-12 col-lg-12">
									<textarea name="blog_body_draft" class="editor hk-sec-title"><?php if(isset($blog->blog_body_draft)){ echo stripcslashes($blog->blog_body_draft);}?></textarea>
									</div>

                  <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="information-and-contact">
                      <div class="information">
                        <h4>Information</h4>
                        <ul>
												<button class="button primary-bg" name="btn"  value="draft">Draft</button>
												<button class="button primary-bg" name="btn"  value="publish">Publish</button>
												<button class="button primary-bg" name="btn"  value="delete">Apply Now</button>
												<button class="button primary-bg" name="btn"  value="preview">Apply Now</button>

                          <li><span>Category:</span> Design &amp; Creative</li>
                          <li><span>Location:</span> Los Angeles</li>
                          <li><span>Hotline:</span> 0145636941</li>
                          <li><span>Email:</span> theoreodigital@hotmail.com</li>
                          <li><span>Company Size:</span> 20-50</li>
                          <li><span>Website:</span> <a href="#">www.theoreodigital.com</a></li>
                        </ul>
                      </div>  
                    </div>
									</div>
									</form>
									
                </div>
              </div>
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
	<script src="<?= base_url('/assets/admin/vendors/trumbowyg/dist/trumbowyg.min.js');?>"></script>
    <script>
        $('.editor').trumbowyg();
    </script>


  </body>

</html>