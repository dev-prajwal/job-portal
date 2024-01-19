

    <!-- Banner -->
    <div class="banner banner-3 banner-3-bg">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="banner-content">
              <h1><?= $total_jobs[0]['jobs_cnt'] ?> Jobs Listed</h1>
              <p>Find the job you love only on Recruiter Goa!</p>
              <a href="<?= site_url("jobs") ?>" class="button">Apply for your dream job</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner End -->

    <!-- Search and Filter -->
    <div class="searchAndFilter-wrapper">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="searchAndFilter-block-3">
              <div class="searchAndFilter-3">
                <form action="<?= site_url("jobs") ?>" method="POST" class="search-form">
                  
                  <div class="location-input">
                    <label>Where? </label>
                    <select class="selectpicker" id="search-location" name="searchLoc" >
                      <option value="%" selected >All Locations</option>
                      <?php for($i=0;$i<count($job_location);$i++): ?>
                        <option value="<?= $job_location[$i]['taluka_id'] ?>"><?= $job_location[$i]['taluka_name'] ?></option>
                      <?php endfor; ?>
                      
                    </select>
                  </div>
                  
                  
                  <div class="category-input">
                    <label>What? </label>
                    <select class="selectpicker" id="searchCat" name="searchCat" onchange="SubCat()">
                      <option value="%" selected >All Categories</option>
                      <?php for($i=0;$i<count($job_category);$i++): ?>
                        <option value="<?= $job_category[$i]['id'] ?>"><?= $job_category[$i]['name'] ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <!-- <div class="keyword">
                    <label>What? </label>
                    <select class="selectpicker" id="schKey" name="schKey" >
                      <option value="%" selected >Sub Category</option>
                      
                    </select>
                  </div> -->
                  <button class="button primary-bg"><i class="fas fa-search"></i></button>
                </form>
                <center><button class="btn btn-outline-primary" style="font-size: 18px" id="btnFil" onclick="myShowBtn()">View More Filters</button></center>
                <br>
                <div class="filter-categories" id="filter-categories" style="display: none">
                  <h4 ><i data-feather="align-left"></i>Job Category</h4>
                  <ul>
                    <?php for($i=0;$i<count($job_category);$i++):
                          if($cnt_cmp_cat[$i][0]['cat_cnt'] == 0): ?>
                            <li><?= $job_category[$i]['name'] ?> <span>(<?= $cnt_cmp_cat[$i][0]['cat_cnt'] ?>)</span></li>

                          <?php else: ?>
                      <li><a href="<?= site_url("jobs?catgory_key=".$job_category[$i]['id']) ?>"><?= $job_category[$i]['name'] ?> <span>(<?= $cnt_cmp_cat[$i][0]['cat_cnt'] ?>)</span></a></li>
                    <?php endif; endfor; ?>
                  </ul>
                </div>
                <div class="filter-location" id="filter-location" style="display: none">
                  <h4><i data-feather="map-pin"></i>Location Filter</h4>
                  <ul>
                    <?php for($i=0;$i<count($job_location);$i++):
                          if($cnt_cmp_loc[$i][0]['loc_cnt'] == 0): ?>
                            <li><?= $job_location[$i]['taluka_name'] ?> <span>(<?= $cnt_cmp_loc[$i][0]['loc_cnt'] ?>)</span></li>
                          <?php else: ?>
                      <li><a href="<?= site_url("jobs?location_key=".$job_location[$i]['taluka_id']) ?>"><?= $job_location[$i]['taluka_name'] ?> <span>(<?= $cnt_cmp_loc[$i][0]['loc_cnt'] ?>)</span></a></li>
                    <?php endif; endfor; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Search and Filter End -->

    <!-- Jobs -->
    <div class="section-padding-bottom alice-bg">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section-header section-header-2 section-header-with-right-content">
              <h2>Recent Jobs</h2>
              <a href="<?= site_url("jobs") ?>" class="header-right">+ Browse All Jobs</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <?php for($i=0;$i<5;$i++): ?>
              <div class="job-list">
                <div class="thumb">
                  <a href="<?= site_url("company-section?key=".$job_recent[$i]['company_id']."&company=".$job_recent[$i]['company_name']) ?>">
                    <?php if($job_recent[$i]['logo_path'] == ""): ?>
                      <img src="<?php echo $this->config->item('base_url');?>/assets/images/font/company.png" class="img-fluid" alt="">
                    <?php else: ?>
                      <img src="<?= site_url($job_recent[$i]['logo_path']) ?>" class="img-fluid" alt="">
                    <?php endif; ?>
                  </a>
                </div>
                <div class="body">
                  <div class="content">
                    <h4><a href="<?= site_url("dream-job?id=".$job_recent[$i]['job_id']."&name=".$job_recent[$i]['job_title']) ?>"><?= $job_recent[$i]['job_title']." - ".$job_recent[$i]['company_name']  ?></a></h4>
                    <div class="info">
                      <?php if($job_recent[$i]['job_sub_category_name']!="Other"): ?>
                        <span class="company"><img src="<?= site_url('assets/images/font/suitcase.png') ?>"  height="15px" width="15px" > <?= $job_recent[$i]['job_sub_category_name'] ?></span>
                      <?php else: ?>
                        <span class="company"><img src="<?= site_url('assets/images/font/suitcase.png') ?>"  height="15px" width="15px" > <?= $job_recent[$i]['job_cat']." - ".$job_recent[$i]['job_sub_category_name'] ?></span>
                      <?php endif; ?>
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

    <!-- Top Companies -->
    <div class="section-padding-top padding-bottom-90">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section-header">
              <h2>Top Companies</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="company-carousel owl-carousel">
              <?php for($i=0;$i<count($company_featured);$i++): ?>
                <div class="company-wrap">
                  <div class="thumb">
                    <a href="<?= site_url("company-section?key=".$company_featured[$i]['company_id']."&company=".$company_featured[$i]['company_name']) ?>">
                      <?php if($company_featured[$i]['logo_path'] == ""): ?>
                        <img src="<?php echo $this->config->item('base_url');?>/assets/images/font/company.png" class="img-fluid" alt="">
                      <?php else: ?>
                        <img src="<?= site_url($company_featured[$i]['logo_path']) ?>" class="img-fluid" alt="">
                      <?php endif; ?>
                    </a>
                  </div>
                  <div class="body">
                    <h4><a href="<?= site_url("company-section?key=".$company_featured[$i]['company_id']."&company=".$company_featured[$i]['company_name']) ?>"><?= $company_featured[$i]['company_name'] ?></a></h4>
                    <span><?= $company_featured[$i]['taluka_name'] ?>, <?= $company_featured[$i]['state_name'] ?></span>
                    <a href="<?= site_url("company-section?key=".$company_featured[$i]['company_id']."&company=".$company_featured[$i]['company_name']) ?>" class="button"><?= $cnt_cmp_featured[$i][0]['open'] ?> Open Positions</a>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Top Companies End -->

    <!-- Registration Box -->
    <div class="section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="call-to-action-box candidate-box">
              <div class="icon">
                <img src="<?php echo $this->config->item('base_url');?>/assets/images/register-box/1.png" alt="">
              </div>
              <span>Are You</span>
              <h3>Candidate?</h3>
              <a href="<?= site_url("jobs") ?>">Find your dream job here!<i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="call-to-action-box employer-register">
              <div class="icon">
                <img src="<?php echo $this->config->item('base_url');?>/assets/images/register-box/2.png" alt="">
              </div>
              <span>Are You</span>
              <h3>Recruiter?</h3>
              <a href="<?= site_url("post-job") ?>">Post a Job <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Registration Box End -->

    

    <!-- Career Advice -->
    <div class="section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section-header">
              <h2>Career Advice</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php for($i=0; $i<$can_blogs_cnt[0]['blogs_can_count']; $i++ ): ?>
          <div class="col-md-6 col-lg-4">
            <article class="blog-grid">
              <div class="body">
                <span class="date"><?= date('d', strtotime($can_blogs[$i]['date_posted'])) ?> <span><?= date('M', strtotime($can_blogs[$i]['date_posted'])) ?></span></span>
                <h3><a href="<?= site_url("blog-post?key=".$can_blogs[$i]['blog_id']."&blog=".$can_blogs[$i]['blog_title']) ?>"><?= $can_blogs[$i]['blog_title'] ?></a></h3>
                <?= substr(strip_tags($can_blogs[$i]['blog_body']),0,85)." ..."; ?>
              </div>
              <div class="info">

                <span class="author"><a href="#"><i data-feather="user"></i><?= $can_blogs[$i]['blog_category_name'] ?></a></span>

              </div>
            </article>
          </div>
          <?php endfor; ?>
          
        </div>
      </div>
    </div>
    <!-- Career Advice End -->


<script>

// var coll = document.getElementById("btnFil");

// coll.addEventListener("click",function(){

function myShowBtn()
{
  
  if(document.getElementById("filter-categories").style.display === "block")
  {
    $("#btnFil").text("View More Filters");
    document.getElementById("filter-categories").style.display = "none";
    document.getElementById("filter-location").style.display = "none";
  }
  else
  {
    $("#btnFil").text("Hide Filters");
    document.getElementById("filter-categories").style.display = "block";
    document.getElementById("filter-location").style.display = "block";
  }
}
//});

function SubCat()
{
  var category  = $("#searchCat").val();
 // alert(category);

  $.ajax({
    url: "<?= site_url("Jobs/getSubCat") ?>",
    type: "POST",
    data: {category: category},
    dataType: "json",
    beforeSend : function()
    {
      $("#err").css("display","block");
    },
    success: function(data)
    {
      // console.log(data);
      // console.log(data["sub_cat"].length);
      //alert(data);
      //var select = document.getElementById("schKey");

      // $("#schKey").empty();
      // $("#schKey").before("<option value='%' disabled selected>Select Sub Category</option>");

      var id, name;

      for(var i = 0; i< data["sub_cat"].length; i++)
      {
        console.log(data["sub_cat"][i]["job_sub_category_name"]);

        name = data["sub_cat"][i]["job_sub_category_name"];
        id = data["sub_cat"][i]["job_sub_category_id"];
        console.log(id);

        //$("#schKey").append("<option value='"+id+"' >"+name+"</option>");
         $("#schKey").append("<option value='1' >test</option>");
      }
    },
    complete : function()
    {
      $("#err").css("display","none");
    }
  });
}


</script>