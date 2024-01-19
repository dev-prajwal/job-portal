<!-- NewsLetter -->
<!-- <div class="newsletter-bg padding-top-90 padding-bottom-90">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-6">
            <div class="newsletter-wrap">
              <h3>Newsletter</h3>
              <p>Get e-mail updates about our latest news and Special offers. We don’t send spam so don’t worry.</p>
              <form action="#" class="newsletter-form form-inline">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email address...">
                </div>
                <button class="btn button">Submit<i class="fas fa-caret-right"></i></button>
                <p class="newsletter-error">0 - Please enter a value</p>
                <p class="newsletter-success">Thank you for subscribing!</p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- NewsLetter End -->


    <!-- Footer -->
    <footer class="footer-bg">
      <div class="footer-top border-bottom section-padding-top padding-bottom-40">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="footer-logo">
                <a href="<?php echo $this->config->item('base_url');?>/">
                  <img src="<?php echo $this->config->item('base_url');?>/assets/images/footer-logo.png" class="img-fluid" alt="">
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="footer-social">
                <ul class="social-icons">
                  <li><a href="https://facebook.com/recruitergoa"><i data-feather="facebook"></i></a></li>
                  <li><a href="https://twitter.com/recruitergoa"><i data-feather="twitter"></i></a></li>
                  <li><a href="https://linkedin.com/company/recruitergoa"><i data-feather="linkedin"></i></a></li>
                  <!-- <li><a href="#"><i data-feather="instagram"></i></a></li>
                  <li><a href="#"><i data-feather="youtube"></i></a></li> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-widget-wrapper padding-bottom-60 padding-top-80">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 col-sm-6">
              <div class="footer-widget widget-about">
                <h4>About Us</h4>
                <div class="widget-inner">
                  <!-- <p class="description">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                  <span class="about-contact"><i data-feather="phone-forwarded"></i>+8 246-345-0698</span>
                  <span class="about-contact"><i data-feather="mail"></i>supportmail@gmail.com</span> -->
                  <p class="description">Recruiter Goa is the first website dedicated to helping companies in Goa find their ideal candidates with the right set of skills and experience. It will now become easy for jobseekers to find a suitable job. As a free service provider we aim to help communities grow Goan economy.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-sm-6">
              <div class="footer-widget footer-shortcut-link">
                <h4>Information</h4>
                <div class="widget-inner">
                  <ul>
                    <li><a href="<?php echo $this->config->item('base_url');?>/about">About Us</a></li>
                    <li><a href="<?php echo $this->config->item('base_url');?>/contact-us">Contact Us</a></li>
                    <li><a href="#">Career Counseling</a></li>
                    <li><a href="<?php echo $this->config->item('base_url');?>/terms-and-condition">Terms &amp; Conditions</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-2 col-sm-6">
              <div class="footer-widget footer-shortcut-link">
                <h4>News and Blogs</h4>
                <div class="widget-inner">
                  <ul>
                    <li><a href="<?php //echo $this->config->item('base_url');?>/Blogs/blogView">Blog title 1</a></li>
                    <li><a href="#">Blog title 2</a></li>
                    <li><a href="#">Blog title 3</a></li>
                    <li><a href="#">Blog title 4</a></li>
                    <li><a href="#">Video Guides</a></li> 
                  </ul>
                </div>
              </div>
            </div> -->
            <div class="col-lg-2 col-sm-6">
              <div class="footer-widget footer-shortcut-link">
                <h4>Recruiters</h4>
                <div class="widget-inner">
                  <ul>
                    <li><a href="<?php echo $this->config->item('base_url');?>/post-job">Post a Job</a></li>
                    <li><a href="<?php echo $this->config->item('base_url');?>/employer">Recruiter Login</a></li>
                    <li><a href="<?= site_url('get-job-widget') ?>">Get a Job Widget</a></li>
                    <li><a href="<?php echo $this->config->item('base_url');?>/blogs?sort=Recruiters">Recruiter Blogs</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom-area">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="footer-bottom border-top">
                <div class="row">
                  <div class="col-xl-4 col-lg-5 order-lg-2">
                    <div class="footer-app-download">
                      <a target="_blank" href="http://britsol.in" class="apple-app">Powered by:</a>
                      <a target="_blank" href="http://britsol.in" class="android-app">BritSol</a>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 order-lg-1">
                    <p class="copyright-text">Copyright <a href="#">Recruitergoa</a> 2019, All right reserved</p>
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



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/jquery.min.js"></script>
     -->
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/popper.min.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/feather.min.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/bootstrap-select.min.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/jquery.nstSlider.min.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/owl.carousel.min.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/visible.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/jquery.countTo.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/chart.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/plyr.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/tinymce.min.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/slick.min.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/jquery.ajaxchimp.min.js"></script>

    <script src="<?php echo $this->config->item('base_url');?>/assets/js/custom.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/js/map.js"></script>
  </body>


</html>