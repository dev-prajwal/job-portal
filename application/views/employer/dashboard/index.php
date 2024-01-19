<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Employer Dashboard</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Employer Dashboard</li>
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

    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
              <div class="dashboard-content-wrapper">
                <div class="dashboard-section user-statistic-block">
                  <div class="user-statistic">
                    <i data-feather="command"></i>
                    <h3><?= $total_job_posted[0]['total_job_posted'] ?></h3>
                    <span>Total Job Posted</span>
                  </div>
                  <div class="user-statistic">
                    <i data-feather="file-text"></i>
                    <h3><?= $total_appl_submit[0]['total_appl_sbmt'] ?></h3>
                    <span>Application Submit</span>
                  </div>
                  <div class="user-statistic">
                    <i data-feather="users"></i>
                    <h3><?= $total_call_intrv[0]['total_call_intrv'] ?></h3>
                    <span>Call for interview</span>
                  </div>
                </div>
                <div class="dashboard-section dashboard-view-chart">
                <h4 style="text-align: center">Top 5 Best Performing Jobs</h4><br>
                  <table class="table" id="tblJobs" >

                  <?php if(count($jobs_5) == 0): ?>

                    <h4 style="text-align: center"> No Job Posted </h4>

                  <?php else: ?>

                  <thead>
                    <tr>
                      <th>Job Title</th>
                      <th>Applications</th>
                      <th>Date Posted</th>
                      <th>Status</th>
                      <th class="action">No. of views</th>
                    </tr>
                  </thead>
                  <tbody id="tblBdyJobs" >

                    <?php for($i = 0; $i < count($jobs_5); $i++): ?>
                    <tr class="job-items">
                      <td class="title">
                        <h5><a href="<?= site_url('/dream-job?id='.$jobs_5[$i]['job_id'].'&name='.$jobs_5[$i]['job_title']) ?>"><?= $jobs_5[$i]['job_title'] ?></a></h5>
                        <div class="info">
                          <span class="office-location"><img src="<?= site_url('assets/images/font/placeholder.png') ?>"  height="15px" width="15px" >  <?= $jobs_5[$i]['taluka_name'] ?></span>
                          <span class="job-type full-time"><img src="<?= site_url('assets/images/font/clock.png') ?>"  height="15px" width="15px" >  <?= $jobs_5[$i]['job_post_type'] ?></span>
                        </div>
                      </td>
                      <td class="application"><?= $applied_count[$i][0]['apply_cnt'] ?> Application(s)</td>
                      <td class="deadline"><?= date("M d, Y", strtotime($jobs_5[$i]['date_posted'])); ?></td>

                      <?php if($jobs_5[$i]['status'] == 3): ?>
                        <td class="status pending" title="Your job post is live. Status will be set to Active once approved by Admin" ><?= $jobs_5[$i]['job_post_status'] ?></td>
                      <?php elseif(($jobs_5[$i]['status'] == 1) || ($jobs_5[$i]['status'] == 6)): ?>
                        <td class="status active"><?= $jobs_5[$i]['job_post_status'] ?></td>
                      <?php else: ?>  
                        <td class="status expired"><?= $jobs_5[$i]['job_post_status'] ?></td>
                      <?php endif; ?>
                      <td class="action">
                        <?= $job_view_cnt[$i][0] ?>
                      </td>
                    </tr>
                    
                    <?php endfor; ?>
                    
                    
                    
                  </tbody>
                  <?php endif; ?>
                  </table>
                </div>
                
              </div>