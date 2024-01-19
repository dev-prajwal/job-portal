<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>About Us</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-form">
              <!-- <form action="#">
                <input type="text" placeholder="Enter Keywords">
                <button><i data-feather="search"></i></button>
              </form> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Candidates Details -->
    <div class="alice-bg section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="white-bg others-block">
              <div class="about-company">
                <div class="row">
                  <div class="col-lg-6 order-lg-2">
                    <div class="feature-thumb">
                      <img src="<?php echo $this->config->item('base_url');?>/assets/images/feature/thumb-1.png" class="img-fluid" alt="">
                    </div>
                  </div>
                  <div class="col-lg-6 order-lg-1">
                    <div class="feature-content">
                      <h3>About Us</h3>
                      <p>Recruiter Goa is an online job portal that exclusively works with candidates and organisations that are looking to hire employees in or from Goa. </p>
                      <p>Recruiter Goa originally started as the state’s only recruitment newspaper but was discounted for a while due to some unforeseen circumstances. But we didn’t give up and continued helping candidates in sending their resumes to recruitment agencies and companies.  </p>
                      <p>After building a strong base and establishing ourselves as a recognised brand in Goa, we decided to launch Recruiter Goa’s online portal. </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="infobox-wrap">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="info-box">
                      <div class="icon">
                        <i data-feather="cast"></i>
                      </div>
                      <h4>About Recruiter Goa</h4>
                      <p>As a community-based Goan firm, Recruiter Goa offers you an exclusive online portal where you can upload job requirements and find suitable candidates and hire the ones that suit your company’s values and ideals. Our main goal behind this platform is to help local Goan people find employment.</p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="info-box">
                      <div class="icon">
                        <i data-feather="layout"></i>
                      </div>
                      <h4>A dedicated dashboard to review and hire candidates</h4>
                      <p>By signing up on Recruiter Goa, companies get access to a customized dashboard where they can check the activity on their job posting, edit and modify the job description in real-time, and contact candidates. </p>
                      <p>Apart from that, the dashboard comes handy while reviewing a candidate’s qualifications, experience, and suitability for the vacant job role. You can also use it to monitor different job posts and analyse the ones that aren’t performing well to modify them and bring in new applications.</p>

                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="info-box">
                      <div class="icon">
                        <i data-feather="copy"></i>
                      </div>
                      <h4>Embed our free widget on your website’s career page </h4>
                      <p>With just a simple copy and paste process, you can embed our free job widget on your website’s career page. Whenever a candidate comes across your career page, you can redirect them to the job posting on Recruiter Goa to give them access to a more detailed job description. 
                      </p>
                      <p>You can post job ads free of charge for the first 30 days. We will extend the offer for free for another 15 days to support your company in finding the perfect candidates.</p>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="info-box">
                      <div class="icon">
                        <i data-feather="volume-2"></i>
                      </div>
                      <h4>Spread the word across social media platforms </h4>
                      <p>We know how difficult it is to find the right candidate and that’s why our online portal allows you to share your job posting on Recruiter Goa across all social media platforms including Facebook, Twitter, and LinkedIn. You can also send emails to the profiles you come across on our website and connect directly with the candidates.
                      </p>
                      <p>On Recruiter Goa, each company gets its own profile page, where you can add a description of your company and other relevant details. You can email this along with the job description to the candidates you come across on our website. </p>
                      <p>If you are looking to hire a new employee, post a job opening on Recruiter Goa today. </p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Fun Facts -->
              <div class="padding-top-90 padding-bottom-60 fact-bg">
                <div class="container">
                  <div class="row fact-items">
                    <div class="col-md-3 col-sm-6">
                      <div class="fact">
                        <div class="fact-icon">
                          <i data-feather="briefcase"></i>
                        </div>
                        <p class="fact-number"><span class="count" data-form="0" data-to=<?= $cnt_live_jobs[0]['jobs_cnt'] ?> ></p>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                      <div class="fact">
                        <div class="fact-icon">
                          <i data-feather="users"></i>
                        </div>
                        <p class="fact-number"><span class="count" data-form="0" data-to=<?= $cnt_can_apld[0]['jobs_appld'] ?>></span></p>
                        <p class="fact-name">Candidate</p>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                      <div class="fact">
                        <div class="fact-icon">
                          <i data-feather="file-text"></i>
                        </div>
                        <p class="fact-number"><span class="count" data-form="0" data-to=<?= $cnt_can_apld[0]['jobs_appld'] ?>></span></p>
                        <p class="fact-name">Resume</p>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                      <div class="fact">
                        <div class="fact-icon">
                          <i data-feather="award"></i>
                        </div>
                        <p class="fact-number"><span class="count" data-form="0" data-to=<?= $cnt_cmpreg[0]['company_reg'] ?>></span></p>
                        <p class="fact-name">Companies</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Fun Facts End -->
              
              <!-- Modal -->
              <div class="account-entry">
                <div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="account-type">
                          <a href="#" class="candidate-acc active"><i data-feather="user"></i>Candidate</a>
                          <a href="#" class="employer-acc"><i data-feather="briefcase"></i>Employer</a>
                        </div>
                        <form action="#">
                          <div class="form-group">
                            <input type="text" placeholder="Username" class="form-control">
                          </div>
                          <div class="form-group">
                            <input type="email" placeholder="Email Address" class="form-control">
                          </div>
                          <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control">
                          </div>
                          <div class="more-option terms">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                              <label class="form-check-label" for="defaultCheck2">
                                I accept the <a href="#">terms & conditions</a>
                              </label>
                            </div>
                          </div>
                          <button class="button primary-bg btn-block">Register</button>
                        </form>
                        <div class="shortcut-login">
                          <span>Or connect with</span>
                          <div class="buttons">
                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
                            <a href="#" class="google"><i class="fab fa-google"></i>Google</a>
                          </div>
                          <p>Already have an account? <a href="#">Login</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </div>