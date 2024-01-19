<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Job Listing</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Job Listing</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-form">
              <form action="#" onsubmit="return mySearch()" >
                <input type="text" id="searchKey" placeholder="Enter Keywords">
                <button><i data-feather="search"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End -->


    <input type="hidden" id="job_tot" value="<?= $jobs_count[0]['jobs_total']  ?>" >

    <!-- Job Listing -->
    <div class="alice-bg section-padding-bottom">
      <div class="container">
        <div class="row no-gutters">
          <div class="col">
            <div class="job-listing-container">
              <div class="filtered-job-listing-wrapper"  >
                <div class="job-view-controller-wrapper">
                  <div class="job-view-controller">
                    <div class="controller list active">
                      <i data-feather="menu"></i>
                    </div>
                    <div class="controller grid">
                      <i data-feather="grid"></i>
                    </div>
                    <div class="job-view-filter">
                      <select class="selectpicker" id="sortJob" onchange="mySort()" >
                        <option value="recent" selected disabled>Most Recent</option>
                        <!-- <option value="california">Top Rated</option> -->
                        <!-- <option value="popular">Most Popular</option> -->
                      </select>
                    </div>
                  </div>
                  <div id="showing-number"  class="showing-number">
                    <span>Showing <?= $start+1 ?>–<?= $limit ?> of <?= $jobs_count[0]['jobs_total'] ?> Jobs</span>
                  </div>
                </div>
                
                <div id="divContainer">
                <div class="job-filter-result" >
                <?php for($i = 0; $i < (count($jobs)); $i++): ?>
                  <div class="job-list">
                    <div class="thumb">
                      <a href="#">
                        <?php if($jobs[$i]['logo_path'] == ""): ?>
                            <img src="<?php echo $this->config->item('base_url');?>/assets/images/font/company.png" class="img-fluid" alt="">
                        <?php else: ?>
                            <img src="<?= site_url($jobs[$i]['logo_path']) ?>" class="img-fluid" alt="">
                        <?php endif; ?>
                      </a>
                    </div>
                    <div class="body">
                      <div class="content">
                        <h4><a href="<?= site_url('/dream-job?id='.$jobs[$i]['job_id'].'&name='.$jobs[$i]['job_title']) ?>"><?php echo $jobs[$i]['job_title']." - ".$jobs[$i]['company_name']; ?> </a></h4>
                        <div class="info">
                          <?php if($jobs[$i]['job_sub_category_name']!="Other"): ?>
                            <span class="company"><img src="<?= site_url('assets/images/font/suitcase.png') ?>"  height="15px" width="15px" > <?= $jobs[$i]['job_sub_category_name'] ?></span>
                        <?php else: ?>
                          <span class="company"><img src="<?= site_url('assets/images/font/suitcase.png') ?>"  height="15px" width="15px" > <?= $jobs[$i]['job_category']." - ".$jobs[$i]['job_sub_category_name'] ?></span>
                        <?php endif; ?>
                          <span class="office-location"><img src="<?= site_url('assets/images/font/placeholder.png') ?>"  height="15px" width="15px" >  <?= $jobs[$i]['job_location'] ?></span>
                          
                              <span class="job-type full-time"><img src="<?= site_url('assets/images/font/clock.png') ?>"  height="15px" width="15px" >  <?= $jobs[$i]['job_type'] ?></span>
                          
                        </div>
                      </div>
                      <div class="more">
                        <div class="buttons">
                          <a href="<?= site_url('/dream-job?id='.$jobs[$i]['job_id'].'&name='.$jobs[$i]['job_title'].'&apply=true') ?>" class="button">Apply Now</a>
                        </div>
                        <p class="deadline">Date Posted: <?= date("M d, Y", strtotime($jobs[$i]['date_posted'])); ?></p>
                      </div>
                    </div>
                  </div>
                <?php endfor; ?>
                </div>
                <div id="divReplace0" >
                  <input type="hidden" id="limit" value="<?= $limit ?>" >
                  <input type="hidden" id="start" value="<?= $start ?>" >
                  <?php if($jobs_count[0]['jobs_total'] > 5): ?>
                  <div class="pagination-list text-center"></br></br>
                    <button class="btn btn-primary btn-block"  style="height: 30px;font-size: 14px;" onclick="loadMore(<?= $limit ?>,<?= $start ?>)">Load More</button>             
                  </div>
                  <?php endif; ?>
                </div>
                </div>
              </div>
              <div class="job-filter-wrapper">
                <!-- <form> -->
                  <div class="selected-options same-pad">
                    <div class="selection-title">
                      <h4>You Selected</h4>
                      <a href="#">Clear All</a>
                    </div>
                    <ul id="filtered-results" class="filtered-options">
                    </ul>
                  </div>
                  <div class="job-filter-dropdown same-pad category">
                    <select id="filterCat" name="filterCat" class="selectpicker">
                      <option value="" selected disabled>Category</option>
                      <?php for($i = 0;$i < count($category);$i++): ?>
                        <option value="<?= $category[$i]['name'] ?>"><?= $category[$i]['name'] ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="job-filter-dropdown same-pad location">
                    <select id="filterLoc" name="filterLoc" class="selectpicker">
                      <option value="" selected disabled>Location</option>
                      <?php for($i = 0;$i < count($location);$i++): ?>
                        <option value="<?= $location[$i]['taluka_name'] ?>"><?= $location[$i]['taluka_name'] ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div data-id="job-type" class="job-filter job-type same-pad">
                    <h4 class="option-title compress">Job Type</h4>
                    <ul style="display: none">
                    <?php for($i = 0; $i < count($job_type); $i++): 
                          if($job_type[$i]['job_post_type'] == "Full Time"):  ?>
                            <li class="full-time">
                          <?php elseif($job_type[$i]['job_post_type'] == "Part Time"): ?>
                            <li class="part-time">
                          <?php elseif($job_type[$i]['job_post_type'] == "Freelance"): ?>
                            <li class="freelance">
                          <?php else: ?>
                            <li class="temporary">
                          <?php endif; ?>
                      <i data-feather="clock"></i><a href="#" data-attr="<?= $job_type[$i]['job_post_type'] ?>"><?= $job_type[$i]['job_post_type'] ?></a></li>
                    <?php endfor; ?>
                      
                    </ul>
                  </div>
                  <div data-id="experience" class="job-filter experience same-pad">
                    <h4 class="option-title compress">Experience</h4>
                    <ul style="display: none" >
                    <?php for($i = 0; $i < count($experience); $i++): ?>
                      <li><a href="#" data-attr="<?= $experience[$i]['name'] ?>"><?= $experience[$i]['name'] ?></a></li>
                    <?php endfor; ?>
                    </ul>
                  </div>
                  <div data-id="salary_range" class="job-filter experience same-pad">
                    <h4 class="option-title compress">Salary Range</h4>
                    <ul style="display: none" >
                    <?php for($i = 0; $i < count($salary_range); $i++): ?>
                      <li><a href="#" data-attr="<?= $salary_range[$i]['salary_range'] ?>"><?= $salary_range[$i]['salary_range'] ?></a></li>
                    <?php endfor; ?>
                    </ul>
                  </div>
                  <div data-id="post" class="job-filter post same-pad">
                    <h4 class="option-title compress">Date Posted</h4>
                    <ul style="display: none">
                      
                      <li><a href="#" data-attr="24-hour">Last 24 hour</a></li>
                      <li><a href="#" data-attr="7-days">Last 7 days</a></li>
                      <li><a href="#" data-attr="30-days">Last 30 days</a></li>
                      <li><a href="#" data-attr="90-days">Last 90 days</a></li>
                    </ul>
                  </div>
                  
                  <div data-id="qualification" class="job-filter qualification same-pad">
                    <h4 class="option-title compress">Qualification</h4>
                    <ul style="display: none">
                    <?php for($i = 0; $i < count($qualification); $i++): ?>
                      <li><a href="#" data-attr="<?= $qualification[$i]['name'] ?>"><?= $qualification[$i]['name'] ?></a></li>
                    <?php endfor; ?>
                    </ul>
                  </div>
                  <div data-id="submit" class="job-filter qualification same-pad">
                    <input type="submit" value="Filter Jobs" class="btn btn-outline-primary btn-lg btn-block" onclick="myFilter()">
                    <input type="submit" value="Clear Filter" class="btn btn-outline-primary btn-lg btn-block">
                  </div>
                <!-- </form> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Job Listing End -->
    <?php if(isset($cat)): ?>
      <input type="hidden" id="cat" value="<?= $cat ?>" >
    <?php else: ?>
      <input type="hidden" id="cat" value="0" >
    <?php endif; if(isset($key)): ?>
      <input type="hidden" id="key" value="<?= $key ?>" >
    <?php else: ?>
      <input type="hidden" id="key" value="0" >
    <?php endif; if(isset($loc)): ?>
      <input type="hidden" id="loc" value="<?= $loc ?>" >
    <?php else: ?>
      <input type="hidden" id="loc" value="0" >
    <?php endif; ?>

<script>

function loadMore(lim, strt)
{
  //alert("load more");
  

  var limit = lim;
  var start = strt;

  start = limit;
  limit = start+limit;

  var pg = strt/5;

  var loc = $("#loc").val();
  var key = $("#key").val();
  var cat = $("#cat").val();

  if(loc=="0" && key=="0" && cat=="0")
  {
    $.ajax({
    url: "<?= site_url("Jobs/loadMore") ?>",
    type: "POST",
    data: {limit: limit,start: start},
    beforeSend : function()
    {
      $('#err').css('display','block');
    },
    success: function(data)
    {
      $('#divReplace'+pg).replaceWith(data);

      var total = $("#job_tot").val();


      $.ajax({
        url: "<?= site_url("Jobs/pgNumber") ?>",
        type: "POST",
        data: {total: total, limit: limit},
        success: function(res)
        {
          $("#showing-number").replaceWith(res);
        }
      });
    },
    complete : function()
    {
      $('#err').css('display','none');
      
    }
  });
  }
  else if(loc!="0" && key!="0" && cat!="0")
  {
      $.ajax({
      url: "<?= site_url("Jobs/loadMore") ?>",
      type: "POST",
      data: {limit: limit,start: start,loc: loc,key: key,cat: cat},
      beforeSend : function()
      {
        $('#err').css('display','block');
      },
      success: function(data)
      {
        $('#divReplace'+pg).replaceWith(data);

        var total = $("#job_tot").val();


        $.ajax({
          url: "<?= site_url("Jobs/pgNumber") ?>",
          type: "POST",
          data: {total: total, limit: limit},
          success: function(res)
          {
            $("#showing-number").replaceWith(res);
          }
        });
      },
      complete : function()
      {
        $('#err').css('display','none');
        
      }
    });
  }
  else if(cat!="0" && loc=="0")
  {
    $.ajax({
      url: "<?= site_url("Jobs/loadMore") ?>",
      type: "POST",
      data: {limit: limit,start: start,cat: cat},
      beforeSend : function()
      {
        $('#err').css('display','block');
      },
      success: function(data)
      {
        $('#divReplace'+pg).replaceWith(data);

        var total = $("#job_tot").val();


        $.ajax({
          url: "<?= site_url("Jobs/pgNumber") ?>",
          type: "POST",
          data: {total: total, limit: limit},
          success: function(res)
          {
            $("#showing-number").replaceWith(res);
          }
        });
      },
      complete : function()
      {
        $('#err').css('display','none');
        
      }
    });
  }
  else if(cat=="0" && loc!="0")
  {
    $.ajax({
      url: "<?= site_url("Jobs/loadMore") ?>",
      type: "POST",
      data: {limit: limit,start: start,loc: loc},
      beforeSend : function()
      {
        $('#err').css('display','block');
      },
      success: function(data)
      {
        $('#divReplace'+pg).replaceWith(data);

        var total = $("#job_tot").val();


        $.ajax({
          url: "<?= site_url("Jobs/pgNumber") ?>",
          type: "POST",
          data: {total: total, limit: limit},
          success: function(res)
          {
            $("#showing-number").replaceWith(res);
          }
        });
      },
      complete : function()
      {
        $('#err').css('display','none');
        
      }
    });
  }

  

  
}

function mySort()
{
  //alert("sort");

  var filter = $("#sortJob :selected").val();

  $.ajax({
    url: "<?= site_url("Jobs/ajxIndex") ?>",
    type: "POST",
    data: {filter: filter},
    beforeSend : function()
    {
      $('#err').css('display','block');
    },
    success: function(data)
    {
      $("#divContainer").replaceWith(data);
    },
    complete : function()
    {
      $('#err').css('display','none');
      
    }
  })
}

function myFilter()
{
  var job_type = $("ul#filtered-results > li.job-type > a").text();
  var experience = $("ul#filtered-results > li.experience > a").text();
  var salary = $("ul#filtered-results > li.salary_range > a").text();
  var date_posted = $("ul#filtered-results > li.post > a").text();
  var qualification = $("ul#filtered-results > li.qualification > a").text();

  var category = $("#filterCat :selected").text();
  var location = $("#filterLoc :selected").text();

  var filter = $("#sortJob :selected").val();

  var limit = $("#limit").val();
  var start = $("#start").val();

  //alert(filter);

  var setFilter = 1;

  $.ajax({
    url: "<?= site_url("Jobs/ajxIndex") ?>",
    type: "POST",
    data: {job_type: job_type, experience: experience, salary: salary, date_posted: date_posted, qualification: qualification, category: category, location: location, filter: filter, setFilter: setFilter, limit: limit, start: start},
    beforeSend : function()
    {
      $('#err').css('display','block');
    },
    success: function(data)
    {
      $("#divContainer").replaceWith(data);

      $.ajax({
        url: "<?= site_url("Jobs/ajxIndexPgNum") ?>",
        type: "POST",
        data: {job_type: job_type, experience: experience, salary: salary, date_posted: date_posted, qualification: qualification, category: category, location: location, filter: filter, setFilter: setFilter, limit: limit, start: start},
        success: function(res)
        {
          $("#showing-number").replaceWith(res);
        }
      });
    },
    complete : function()
    {
      $('#err').css('display','none');
      
    }
  })

  // alert(job_type);
  // console.log(job_type);
}

function mySearch()
{
  var search = $("#searchKey").val();

  //alert(search);

  $.ajax({
    url: "<?= site_url("Jobs/searchIndex") ?>",
    type: "POST",
    data: {search: search},
    beforeSend : function()
    {
      $('#err').css('display','block');
    },
    success: function(data)
    {
      $("#divContainer").replaceWith(data);


      $.ajax({
        url: "<?= site_url("Jobs/pgSearchNum") ?>",
        type: "POST",
        data: {search: search},
        success: function(res)
        {
          //alert(res);
          $("#showing-number").replaceWith(res);
        }
      });
    },
    complete : function()
    {
      $('#err').css('display','none');
    }
  })

  return false;
}

function loadMoreSearch(lim,strt)
{
  var limit = lim;
  var start = strt;

  start = limit;
  limit = start+limit;

  var search = $("#hidSearch").val();

  alert(search);

  $.ajax({
    url: "<?= site_url("Jobs/searchIndex") ?>",
    type: "POST",
    data: {limit: limit,start: start,search: search},
    beforeSend : function()
    {
      $('#err').css('display','block');
    },
    success: function(data)
    {
      $('#divReplace'+pg).replaceWith(data);

      
      $.ajax({
        url: "<?= site_url("Jobs/pgSearchNum") ?>",
        type: "POST",
        data: {search: search, limit: limit},
        success: function(res)
        {
          //alert(res);
          $("#showing-number").replaceWith(res);
        }
      });
    },
    complete : function()
    {
      $('#err').css('display','none');
      
    }
  });
}

</script>
