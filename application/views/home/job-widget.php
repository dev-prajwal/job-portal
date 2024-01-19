
<link href="<?php echo $this->config->item('base_url');?>/assets/widget/rg-widget.css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/assets/widget/rg-widget.js"></script>



<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Get Job Widget</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Get Job Widget</li>
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

                      <h3>Recruiter Goa</h3>
                      <p>Are you looking for the perfect candidate for your firm? Recruiter Goa is here to help you out. We work exclusively with candidates and companies based in Goa to help find better employment opportunities.</p>
                      <p>We can help you find employees with the right set of skills and personality that will fit into your company culture and help your company reach new heights. All our services are offered for free and we promise that you won’t ever be charged for uploading your job requirement or finding your ideal candidate. </p>
                      
                      <h6>A powerful candidate engagement tool</h6>
                      <p>Use our job board widget to upload your job listing, find candidates, and interact with them. You can use your dashboard to edit the job description after you post it and the website will immediately record the changes. Recruiter Goa is one of the few recruitment websites that allow you to post your company’s website to build a backlink and assist candidates in getting to know more about your business. </p>

                      <h6>Assisting you in the recruitment process - Every step of the way</h6>
                      <p>Consider Recruiter Goa as your very personal hiring tool, which has a built-in messenger to interact with the candidates to get to know, them more before you start the recruitment process. </p>
                      <p>Interested candidates can use our exclusive online widget to research different jobs available in their industry, check the company details and ratings, and reviews from previous and current employees. Candidates can also customize their profile to highlight their skills and experience and stand out from their competitors. </p>
                      <p>Post your latest job opening on Recruiter Goa today and find the most suitable candidate for your company. </p>

                      <h6>How to get a Job widget?</h6>
                      <p>Place the below text and place it in your header file of your website.
                      Contact your web Development team / Company for this.
                      <br><b>For any issues / help contact us.</b></p>
                      <p><input type='text' name='css-link' value='<link href="http://britsolapps/get-job-widget/widget/rg-widget.css" rel="stylesheet"/>' title='Copy this text' style='width: 600px;' id='widgetCSS' disabled> 
                      <br><br>
                      <input type="submit" value="Copy" title="Click here to Copy Link" style="    border-radius: 50px;" onclick="myCopy1()" id="copy1">
                      <br><br>
                      <input type='text' name='js-link' value=' <script type="text/javascript" src="http://britsolapps/get-job-widget/widget/rg-widget.js"></script>' title='Copy this text' style='width: 600px;' id='widgetJS' disabled>


                      <br><br>
                      <input type="submit" value="Copy" title="Click here to Copy Link" style="    border-radius: 50px;" onclick="myCopy2()" id="copy2">
                     
                      </p>
                      <a href="<?= site_url('contact-us') ?>" class="button">Contact Us</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="infobox-wrap">
                <div class="row">
                  <div class="col-lg-4 col-md-6">
                    <div class="info-box">
                      <div class="icon">
                        <i data-feather="cast"></i>
                      </div>
                      <h4>Advertise A Job</h4>
                      <p>Uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="info-box">
                      <div class="icon">
                        <i data-feather="layout"></i>
                      </div>
                      <h4>Recruiter Profiles</h4>
                      <p>Uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.</p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="info-box">
                      <div class="icon">
                        <i data-feather="compass"></i>
                      </div>
                      <h4>Find Your dream job</h4>
                      <p>Uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.</p>
                    </div>
                  </div>
                </div>
              </div> -->
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
              
              
              </div>
          </div>
        </div>
      </div>
    </div>


<script>

function myCopy1() {
  /* Get the text field */
  var copyText = document.getElementById("widgetCSS");

  /* Select the text field */
  copyText.select();
  //copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}

function myCopy2() {
  /* Get the text field */
  var copyText = document.getElementById("widgetJS");

  /* Select the text field */
  copyText.select();
  //copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}


</script>