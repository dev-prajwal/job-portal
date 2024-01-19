<style>

.share-job-post a {
    margin-right: 5px;
}

</style>


<!-- Company Details -->
    <div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="company-details">
              <div class="title-and-info">
                <div class="title">
                  <div class="thumb">
                    <?php if($get_company[0]['logo_path'] == ""): ?>
                        <img src="<?php echo $this->config->item('base_url');?>/assets/images/font/company.png" class="img-fluid" alt="">
                    <?php else: ?>
                        <img src="<?= site_url($get_company[0]['logo_path']) ?>" class="img-fluid" alt="">
                    <?php endif; ?>
                  </div>
                  <div class="title-body">
                    <h4><?= $get_company[0]['company_name'] ?></h4>
                    <div class="info">
                      <span class="company-type"><img src="<?= site_url('assets/images/font/suitcase.png') ?>"  height="15px" width="15px" >  <?= $get_company[0]['company_type'] ?></span>
                      <span class="office-location"><img src="<?= site_url('assets/images/font/placeholder.png') ?>"  height="15px" width="15px" > <?= $get_company[0]['company_location'] ?></span>
                    </div>
                  </div>
                </div>
                <div class="download-resume">
                  <!-- <a href="#" class="save-btn"><i data-feather="heart"></i>Save</a> -->
                  <a ><?= $company_job_cnt[0]['open'] ?> Open Positions</a>
                </div>
              </div>
              <div class="details-information padding-top-60">
                <div class="row">
                  <div class="col-xl-7 col-lg-8">
                    <div class="about-details details-section">
                      <h4><i data-feather="align-left"></i>About Us</h4>
                        <?= $get_company[0]['company_about'] ?>
                    </div>
                    
                    <div class="open-job details-section">
                      <?php if($company_job_cnt[0]['open'] == 0): ?>
                        <h4><i data-feather="check-circle"></i>No Open Job</h4>
                      <?php else: ?>
                        
                        <h4><i data-feather="check-circle"></i>Open Job</h4>
                        <?php if($company_job_cnt[0]['open'] > 10):
                                  $k = 10;
                              else:
                                $k = $company_job_cnt[0]['open'];
                              endif; 
                              for($i=0;$i<$k;$i++): ?>
                        <div class="job-list">
                            <div class="body">
                            <div class="content">
                                <h4><a href="<?= site_url('/dream-job?id='.$company_job[$i]['job_id'].'&name='.$company_job[$i]['job_title']) ?>"><?= $company_job[$i]['job_title'] ?> </a></h4>
                                <div class="info">
                                <span class="office-location"><img src="<?= site_url('assets/images/font/placeholder.png') ?>"  height="15px" width="15px" >  <?= $company_job[$i]['job_location'] ?></span>
                                <span class="job-type temporary"><img src="<?= site_url('assets/images/font/clock.png') ?>"  height="15px" width="15px" >  <?= $company_job[$i]['job_type'] ?></span>
                                </div>
                            </div>
                            <div class="more">
                                <div class="buttons">
                                <a href="<?= site_url('/dream-job?id='.$company_job[$i]['job_id'].'&name='.$company_job[$i]['job_title'].'&apply=true') ?>" class="button">Apply Now</a>
                                </div>
                                <p class="deadline">Date Posted: <?= date("M d, Y", strtotime($company_job[$i]['date_posted'])); ?></p>
                            </div>
                            </div>
                        </div>
                        <?php endfor; if($company_job_cnt[0]['open'] > 10): ?>
                        <div id="divReplace0" >
                          <div class="pagination-list text-center"></br></br>
                            <button class="btn btn-primary btn-block"  style="height: 30px;font-size: 14px;" onclick="loadJobs(10,0)">Load More</button>             
                          </div>
                        </div>
                        <?php endif; endif; ?>

                        <div class="job-list">
                            <div class="body">
                              <div class="content">
                                  <h4>Advertise your jobs in your Social Media</h4>

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
                                  <br>
                                  <input type="text" value="<?= site_url('company-section?key='.$get_company[0]['company_id'].'&company='.$get_company[0]['company_name']) ?>" name='profile-link' id="profile-link" style="width: 90%;" disabled>
                      
                                  <button title="Click here to Copy Link" style="border-radius: 50px; float: right; width: 10%;" onclick="myCopy3()" id="copy3"><i data-feather="copy"></i></button>
                                  
                              </div>
                            
                            </div>
                        </div>
                      
                    </div>
                  </div>
                  <input type="hidden" id="job_company_id" value="<?= $get_company[0]['company_id'] ?>" >
                  <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="information-and-contact">
                      <div class="information">
                        <h4>Information</h4>
                        <ul>
                          <li><span>Category:</span> <?= $get_company[0]['company_type'] ?></li>
                          <li><span>Location:</span> <?= $get_company[0]['company_location'] ?></li>
                          <li><span>Hotline:</span> <?= $get_company[0]['company_phone'] ?></li>
                          <li><span>Email:</span> <?= $get_company[0]['company_email'] ?></li>
                          <!-- <li><span>Company Size:</span> 20-50</li> -->
                          <li><span>Website:</span> <a href="#"><?= $get_company[0]['company_website'] ?></a></li>
                          <li><span>Facebook:</span> <a href="<?= $get_company[0]['company_fb'] ?>"><?= $get_company[0]['company_name'] ?></a></li>
                          <li><span>LinkedIn:</span> <a href="<?= $get_company[0]['company_linkedin'] ?>"><?= $get_company[0]['company_name'] ?></a></li>
                        </ul>
                      </div>
                      <div class="buttons">
                        <a href="<?= site_url("contact-us") ?>" class="button contact-button">Contact Us</a>
                      </div>
                      <!-- Modal -->
                      
                    </div>
                    <!-- <div class="share-job-post"> -->
                    <!-- AddToAny BEGIN -->
                        <!-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_linkedin"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_email"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script> -->
                    <!-- AddToAny END -->
                    <!-- </div> -->
                    <!-- <div class="share-job-post">
                      <input type="text" value="<?php // site_url('company-section?key='.$get_company[0]['company_id'].'&company='.$get_company[0]['company_name']) ?>" name='profile-link' id="profile-link" disabled>
                      <input type="submit" value="" title="Click here to Copy Link" style="    border-radius: 50px;" onclick="myCopy3()" id="copy3">
                      <button title="Click here to Copy Link" style="border-radius: 50px; float: right;" onclick="myCopy3()" id="copy3"><i data-feather="copy"></i></button>

                    </div> -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Company Details End -->


<script>

function loadJobs(lim,strt)
{
  var limit = lim;
  var start = strt;

  start = limit;
  limit = start+limit;

  var pg = strt/10;

  var company_id = $("#job_company_id").val();

  $.ajax({
    url: "<?= site_url("Blogs/loadJobs") ?>",
    type: "POST",
    data: {company_id: company_id,limit: limit,start: start},
    beforeSend : function()
    {
      $('#err').css('display','block');
    },
    success: function(data)
    {
      $('#divReplace'+pg).replaceWith(data);
    },
    complete : function()
    {
      $('#err').css('display','none');
    }
  })
}

function myCopy3() {
  /* Get the text field */
  var copyText = document.getElementById("profile-link");

  /* Select the text field */
  copyText.select();
  //copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}

</script>