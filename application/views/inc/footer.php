<!-- Call to Action -->
<div class="call-to-action-bg padding-top-90 padding-bottom-90">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="call-to-action-2">
              <div class="call-to-action-content">
                <h2>For Find Your Dream Job or Candidate</h2>
                <p>Add resume or post a job. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.</p>
              </div>
              <div class="call-to-action-button">
                <a href="#" class="button">Apply for Jobs</a>
                <span>Or</span>
                <a href="<?php echo $this->config->item('base_url');?>/post-job" class="button">Post A Job</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Call to Action End -->

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
            <div class="col-lg-2 col-sm-6">
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
            <div class="col-lg-2 col-sm-6">
              <div class="footer-widget footer-shortcut-link">
                <h4>New and Blogs</h4>
                <div class="widget-inner">
                  <ul>
                    <li><a href="#">Blog title 1</a></li>
                    <li><a href="#">Blog title 2</a></li>
                    <li><a href="#">Blog title 3</a></li>
                    <li><a href="#">Blog title 4</a></li>
                    <!-- <li><a href="#">Video Guides</a></li> -->
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-6">
              <div class="footer-widget footer-shortcut-link">
                <h4>Employers</h4>
                <div class="widget-inner">
                  <ul>
                    <li><a href="<?= site_url('register') ?>">Create Account (Employer)</a></li>
                    <li><a href="<?= site_url('get-job-widget') ?>">Get a Job Widget</a></li>
                    <li><a href="<?php echo $this->config->item('base_url');?>/post-job">Post a Job</a></li>
                    <li><a href="<?php echo $this->config->item('base_url');?>/faq">FAQ</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-sm-6">
              <div class="footer-widget footer-newsletter">
                <h4>Newsletter</h4>
                <p>Get e-mail updates about our latest news and Special offers.</p>
                <form action="#" class="newsletter-form form-inline">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email address...">
                  </div>
                  <button class="btn button primary-bg">Submit<i class="fas fa-caret-right"></i></button>
                  <p class="newsletter-error">0 - Please enter a value</p>
                  <p class="newsletter-success">Thank you for subscribing!</p>
                </form>
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
    <script src="<?php echo $this->config->item('base_url');?>/assets/users/js/jquery.min.js"></script>
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