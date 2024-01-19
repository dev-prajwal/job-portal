<!-- Candidates Details -->
<div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="job-listing-details">
              <div class="job-title-and-info">
                <div class="title">
                  <div class="thumb">
                    <img src="<?php echo $this->config->item('base_url');?>/assets/images/job/company-logo-1.png" class="img-fluid" alt="">
                  </div>
                  <div class="title-body">
                    <h4><?= $job_post[0]['job_title'] ?></h4>
                    <div class="info">
                      <span class="company"><a href="#"><i data-feather="briefcase"></i><?= $job_post[0]['job_posted_by'] ?></a></span>
                      <span class="office-location"><a href="#"><i data-feather="map-pin"></i><?= $job_post[0]['job_location'] ?></a></span>
                      <span class="job-type full-time"><a href="#"><i data-feather="clock"></i><?= $job_post[0]['job_type'] ?></a></span>
                    </div>
                  </div>
                </div>
                <div class="buttons">
                    <!-- <a class="save" href="#" title="edit"><i data-feather="edit"></i></a> -->
                  <a class="apply" href="<?= site_url('/employer-manage-jobs') ?>">Continue</a>
                  <a class="save" href="<?= site_url('/edit-job-post?val='.$job_post[0]['job_id']) ?>">Edit</a>
                </div>
              </div>
              <div class="details-information section-padding-60">
                <div class="row">
                  <div class="col-xl-7 col-lg-8">
                    <div class="description details-section">
                      <h4><i data-feather="align-left"></i>Job Description</h4>
                      <?= $job_post[0]['job_description'] ?>
                    </div>
                    <!-- <div class="responsibilities details-section">
                      <h4><i data-feather="zap"></i>Responsibilities</h4>
                      <ul>
                        <li>The applicants should have experience in the following areas</li>
                        <li>Skills on M.S Word, Excel, and Integrated Accounting package i.e. Software</li>
                        <li>Have sound knowledge of commercial activities.</li>
                        <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li>
                        <li>Good verbal and written communication skills.</li>
                        <li>Leadership, analytical, and problem-solving abilities.</li>
                      </ul>
                    </div> -->
                    <div class="edication-and-experience details-section">
                      <h4><i data-feather="book"></i>Education + Experience</h4>
                      <ul>
                        <!-- <li>M.Com (Accounting) / M.B.S / M.B.A under National University with CA course complete.</li>
                        <li>M.S (Statistics) any Public University / National University.</li> -->
                        <li><?= $job_post[0]['job_qualification'] ?></li>
                        <li><?= $job_post[0]['job_experience'] ?></li>
                      </ul>
                    </div>
                    <!-- <div class="other-benifit details-section">
                      <h4><i data-feather="gift"></i>Other Benefits</h4>
                      <ul>
                        <li>Health and life insurance </li>
                        <li>2 days of weekend </li>
                        <li>2 annual performanc Bonuses</li>
                        <li>Lunch &amp; Snacks</li>
                      </ul>
                    </div> -->
                    <div class="job-apply-buttons">
                        <!-- <a class="email" href="#" title="edit"><i data-feather="edit"></i></a> -->
                        <a class="apply" href="<?= site_url('/employer-manage-jobs') ?>">Continue</a>
                        <a class="email" href="<?= site_url('/edit-job-post?val='.$job_post[0]['job_id']) ?>">Edit</a>
                    </div>
                  </div>
                  <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="information-and-share">
                      <div class="job-summary">
                        <h4>Job Summary</h4>
                        <ul>
                          <li><span>Published on:</span> <?= $job_post[0]['date_posted'] ?></li>
                          <li><span>Vacancy:</span> <?= $job_post[0]['no_of_vacancy'] ?></li>
                          <li><span>Employment Status:</span> <?= $job_post[0]['job_type'] ?></li>
                          <li><span>Experience:</span> <?= $job_post[0]['job_experience'] ?>)</li>
                          <li><span>Job Location:</span> <?= $job_post[0]['job_location'] ?></li>
                          <li><span>Date Posted:</span> <?= $job_post[0]['date_posted'] ?></li>
                        </ul>
                      </div>
                      <div class="share-job-post">
                        <span class="share"><i class="fas fa-share-alt"></i>Share:</span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" class="add-more"><span class="ti-plus"></span></a>
                      </div>
                      <div class="buttons">
                        <a href="#" class="button print"><i data-feather="printer"></i>Print Job</a>
                        <a href="#" class="button report"><i data-feather="flag"></i>Report Job</a>
                      </div>
                      <!-- <div class="job-location">
                        <h4>Job Location</h4>
                        <div id="map-area">
                          <div class="cp-map" id="location" data-lat="40.713355" data-lng="-74.005535" data-zoom="10"></div>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-7 col-lg-8">
                  <div class="company-information details-section">
                    <h4><i data-feather="briefcase"></i>About the Company</h4>
                    <ul>
                      <li><span>Company Name:</span> <?= $company_details[0]['company_name'] ?></li>
                      <li><span>Address:</span> <?= $company_details[0]['company_location'] ?></li>
                      <li><span>Website:</span> <a href="#"><?= $company_details[0]['company_website'] ?></a></li>
                      <li><span>Company Profile:</span></li>
                      <li><?= $company_details[0]['company_about'] ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Candidates Details End -->

    <!-- Jobs -->
    <div class="section-padding-bottom alice-bg">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section-header section-header-2 section-header-with-right-content">
              <h2>Simillar Jobs</h2>
              <a href="#" class="header-right">+ Browse All Jobs</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <img src="<?php echo $this->config->item('base_url');?>/assets/images/job/company-logo-1.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="job-details.html">Designer Required</a></h4>
                  <div class="info">
                    <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                    <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                    <a href="#" class="button">Apply Now</a>
                    <a href="#" class="favourite"><i data-feather="heart"></i></a>
                  </div>
                  <p class="deadline">Deadline: Oct 31, 2018</p>
                </div>
              </div>
            </div>
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <img src="<?php echo $this->config->item('base_url');?>/assets/images/job/company-logo-2.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="job-details.html">Project Manager</a></h4>
                  <div class="info">
                    <span class="company"><a href="#"><i data-feather="briefcase"></i>Degoin</a></span>
                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>San Francisco</a></span>
                    <span class="job-type part-time"><a href="#"><i data-feather="clock"></i>Part Time</a></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                      
                    <a href="#" class="button">Apply Now</a>
                    <a href="#" class="favourite"><i data-feather="heart"></i></a>
                  </div>
                  <p class="deadline">Deadline: Oct 31, 2018</p>
                </div>
              </div>
            </div>
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <img src="<?php echo $this->config->item('base_url');?>/assets/images/job/company-logo-8.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="job-details.html">Restaurant Team Member - Crew </a></h4>
                  <div class="info">
                    <span class="company"><a href="#"><i data-feather="briefcase"></i>Geologitic</a></span>
                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New Orleans</a></span>
                    <span class="job-type temporary"><a href="#"><i data-feather="clock"></i>Temporary</a></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                    <a href="#" class="button">Apply Now</a>
                    <a href="#" class="favourite"><i data-feather="heart"></i></a>
                  </div>
                  <p class="deadline">Deadline: Oct 31, 2018</p>
                </div>
              </div>
            </div>
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <img src="<?php echo $this->config->item('base_url');?>/assets/images/job/company-logo-9.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="job-details.html">Nutrition Advisor</a></h4>
                  <div class="info">
                    <span class="company"><a href="#"><i data-feather="briefcase"></i>Theoreo</a></span>
                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>New York City</a></span>
                    <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>Full Time</a></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                    <a href="#" class="button">Apply Now</a>
                    <a href="#" class="favourite"><i data-feather="heart"></i></a>
                  </div>
                  <p class="deadline">Deadline: Oct 31, 2018</p>
                </div>
              </div>
            </div>
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <img src="<?php echo $this->config->item('base_url');?>/assets/images/job/company-logo-3.png" class="img-fluid" alt="">
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="job-details.html">Land Development Marketer</a></h4>
                  <div class="info">
                    <span class="company"><a href="#"><i data-feather="briefcase"></i>Realouse</a></span>
                    <span class="office-location"><a href="#"><i data-feather="map-pin"></i>Washington, D.C.</a></span>
                    <span class="job-type freelance"><a href="#"><i data-feather="clock"></i>Freelance</a></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                    <a href="#" class="button">Apply Now</a>
                    <a href="#" class="favourite"><i data-feather="heart"></i></a>
                  </div>
                  <p class="deadline">Deadline: Oct 31, 2018</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jobs End -->