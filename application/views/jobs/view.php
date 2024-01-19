 <style>
.a2a_default_style a {
    float: left;
    line-height: 16px;
    padding: 0 0px !important; 
}
</style>

<!-- Candidates Details -->
<div class="alice-bg padding-top-60 section-padding-bottom" onload="myAppl()">



      <div class="container">
      <?php if($this->input->get('status') == '1'): ?>

        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Warning!</strong> Sorry, You have alredy applied for this job.
        </div>

      <?php elseif($this->input->get('status') == '2'): ?>

        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Warning!</strong> File exceeded the required limit. Please try again.
        </div>

       <?php elseif($this->input->get('status') == '3'): ?>

        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Warning!</strong> Something went wrong. Please try again.
        </div>

      <?php elseif($this->input->get('status') == '0'): ?>

        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong><i class="fas fa-check-circle"></i></strong> Thank You. Your resume has been submited.
        </div>

      <?php endif; ?>
        <div class="row">
          <div class="col">
            <div class="job-listing-details">
              <div class="job-title-and-info">
                <div class="title">
                  <div class="thumb">
                    <?php if($job[0]['logo_path'] == ""): ?>
                      <img src="<?php echo $this->config->item('base_url');?>/assets/images/font/company.png" class="img-fluid" alt="">
                    <?php else: ?>
                      <img src="<?= site_url($job[0]['logo_path']) ?>" class="img-fluid" alt="">
                    <?php endif; ?>
                  </div>
                  <div class="title-body">
                    <h4><?= $job[0]['job_title'] ?></h4>
                    <div class="info">
                      <span class="company"><i data-feather="briefcase"></i><?= $job[0]['job_category'] ?></span>
                      <span class="office-location"><i data-feather="map-pin"></i><?= $job[0]['job_location'] ?></span>
                      <span class="job-type full-time"><i data-feather="clock"></i><?= $job[0]['job_type'] ?></span>
                    </div>
                  </div>
                </div>
                <div class="buttons">
                  <!-- <a class="save" href="#"><i data-feather="heart"></i>Save Job</a> -->
                  <!-- <a class="apply" href="#ResumeModal">Apply Online</a> -->
                  <button class="apply" type="button" data-toggle="modal" data-target="#ResumeModal" onclick="setJob(<?= $job[0]['job_id'] ?>)" >Apply Online</button>
                </div>
              </div>
              <div class="details-information section-padding-60">
                <div class="row">
                  <div class="col-xl-7 col-lg-8">
                    <div class="description details-section">
                      <h4><i data-feather="align-left"></i>Job Description</h4>
                        <?= $job[0]['job_description'] ?>
                    </div>
                    
                    
                    
                    <div class="job-apply-buttons">
                      <a href="#" class="apply" data-toggle="modal" data-target="#ResumeModal" onclick="setJob(<?= $job[0]['job_id'] ?>)" >Apply Online</a>
                      <!-- <a href="#" class="email"><i data-feather="mail"></i>Email Job</a> -->
                    </div>
                  </div> 
                  <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="information-and-share">
                      <div class="job-summary">
                        <h4>Job Summary</h4>
                        <ul>
                          <li><span>Published on:</span> <?= date("M d, Y", strtotime($job[0]['date_posted'])); ?></li>
                          <li><span>Vacancy:</span> <?php if($job[0]['no_of_vacancy'] == 0){ echo "NA"; }else{ echo $job[0]['no_of_vacancy']; }  ?></li>
                          <li><span>Employment Status:</span> <?= $job[0]['job_type'] ?></li>
                          <?php for($i=0;$i<count($experience);$i++):
                                  if($job[0]['job_experience'] == $experience[$i]['id']): ?>
                          <li><span>Experience:</span> <?= $experience[$i]['name'] ?></li>
                          <?php endif; endfor; ?>
                          <?php for($i=0;$i<count($salary_range);$i++):
                                  if($job[0]['salary_range'] == $salary_range[$i]['id']): ?>
                          <li><span>Salary:</span> <?= $salary_range[$i]['salary_range'] ?></li>
                          <?php endif; endfor; ?>
                          <?php for($i=0;$i<count($qualification);$i++):
                                  if($job[0]['job_qualification'] == $qualification[$i]['id']): ?>
                          <li><span>Qualification:</span> <?= $qualification[$i]['name'] ?></li>
                          <?php endif; endfor; ?>
                          <li><span>Job Location:</span> <?= $job[0]['job_location'] ?></li>
                          
                          <li><span>Date Posted:</span> <?= date("M d, Y", strtotime($job[0]['date_posted'])); ?></li>
                        </ul>
                      </div> 
                      <div class="share-job-post">
                         <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                          <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                          <a class="a2a_button_linkedin"></a>
                          <a class="a2a_button_facebook"></a>
                          <a class="a2a_button_twitter"></a>
                          <a class="a2a_button_whatsapp"></a>
                          <a class="a2a_button_email"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                      </div>
                      <div class="buttons">
                        <a href="#" class="button print" onclick="pgPrint()"><i data-feather="printer"></i>Print Job</a>
                        <a href="<?= site_url("contact-us?report=true") ?>" class="button report"><i data-feather="flag"></i>Report Job</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-7 col-lg-8">
                  <div class="company-information details-section">
                    <h4><i data-feather="briefcase"></i>About the Company</h4>
                    <ul>
                      <li><span>Company Name:</span> <?= $company[0]['company_name'] ?></li>
                      <li><span>Address:</span> <?= $company[0]['company_location'] ?></li>
                      <li><span>Website:</span> <a href="#"><?= $company[0]['company_website'] ?></a></li>
                      <li><span>Company Profile:</span></li>
                      <li><?= $company[0]['company_about'] ?>.</li>
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
              <h2>Recent Jobs</h2>
              <a href="#" class="header-right">+ Browse All Jobs</a>
            </div>
          </div>
        </div>
        <div class="row">
          <?php for($i=0;$i<5;$i++): ?>
            <div class="job-list">
              <div class="thumb">
                <a href="#">
                  <?php if($job_recent[$i]['logo_path'] == ""): ?>
                    <img src="<?php echo $this->config->item('base_url');?>/assets/images/font/company.png" class="img-fluid" alt="">
                  <?php else: ?>
                    <img src="<?= site_url($job_recent[$i]['logo_path']) ?>" class="img-fluid" alt="">
                  <?php endif; ?>
                </a>
              </div>
              <div class="body">
                <div class="content">
                  <h4><a href="<?= site_url("dream-job?id=".$job_recent[$i]['job_id']."&name=".$job_recent[$i]['job_title']) ?>"><?= $job_recent[$i]['job_title']  ?></a></h4>
                  <div class="info">
                    <span class="company"><img src="<?= site_url('assets/images/font/suitcase.png') ?>"  height="15px" width="15px" > <?= $job_recent[$i]['job_cat'] ?></span>
                    <span class="office-location"><img src="<?= site_url('assets/images/font/placeholder.png') ?>"  height="15px" width="15px" > <?= $job_recent[$i]['job_loc'] ?></span>
                    <span class="job-type full-time"><img src="<?= site_url('assets/images/font/clock.png') ?>"  height="15px" width="15px" > <?= $job_recent[$i]['job_post_type'] ?></span>
                  </div>
                </div>
                <div class="more">
                  <div class="buttons">
                    <a href="<?= site_url('/dream-job?id='.$job_recent[$i]['job_id'].'&name='.$job_recent[$i]['job_title'].'&apply=true') ?>" class="button">Apply Now</a>
                    
                  </div>
                  <p class="deadline">Date Posted: <?= date("M d, Y", strtotime($job_recent[$i]['date_posted'])); ?></p>
                </div>
              </div>
            </div>
          <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Jobs End -->


<script>

window.onload = function (){

  var search = window.location.search;

  var jid = search.split("apply=");

  //alert(jid[0]);

  var temp = jid[0].split("id=");
  var tmp = temp[1].split("&");

  var name = tmp[1].split("name=");

  var  res = name[1].replace(/%/g," ");
  //alert(res);
  $("#job_name").val(res);

  //alert(name[1]);

  if(jid[1] == "true")
  {

    

    //alert(tmp[0]);

    $("#appl_job_id").val(tmp[0]);

    $("#ResumeModal").modal('show');

  }

};
  
  //}
  
  function pgPrint()
  {
    window.print();
  }


</script>

