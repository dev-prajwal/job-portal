
<div class="modal" tabindex="-1" role="dialog" id="Delete" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="<?= site_url("Employer/jobDel") ?>" >
        <div class="modal-header">
          <h5 class="modal-title">Do you really want to Delete this Job Post?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Your Job Post will be permenantly deleted from the recruitergoa.com</p>
        </div>
        <input type="hidden" name="j_d_status" id="j_d_status" >
        <input type="hidden" name="j_d_id" id="j_d_id" >
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Yes">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="Pause" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="<?= site_url("Employer/JobPause") ?>" >
        <div class="modal-header">
          <h5 class="modal-title">Do you really want to Pause this Job Post?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>When a Job Post is set to Pause, your Job Post won't be visible<br> on the Job Board and you wont receive any application for this Job Post.</p>
        </div>
        <input type="hidden" name="j_status" id="j_status" >
        <input type="hidden" name="j_s_id" id="j_s_id" >
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Yes">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="Resume" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="<?= site_url("Employer/JobPause") ?>" >
        <div class="modal-header">
          <h5 class="modal-title">Do you really want to Activate this Job Post?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>When a Job Post is set to Active, your Job Post will be visible<br> on the Job Board and you will start receiving application for this Job Post.</p>
        </div>
        <input type="hidden" name="j_r_status" id="j_r_status" >
        <input type="hidden" name="j_r_id" id="j_r_id" >
        <input type="hidden" name="del" value="1" >
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Yes">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">

      <?php if($this->input->get('status') == "1"): ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong><i class="fas fa-check-circle"></i></strong> Your Job Post status has been updated.
        </div>
      <?php elseif($this->input->get('del') == "1"): ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong><i class="fas fa-check-circle"></i></strong> Your Job Post has been deleted.
        </div>
      <?php endif; ?>
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
                <div class="manage-job-container">
                  <table class="table" id="tblJobs" >

                    <?php if($job_posted_cnt[0]['emp_job_cnt'] == 0): ?>

                      <h1> No Job Posted </h1>

                    <?php else: ?>

                    <thead>
                      <tr>
                        <th>Job Title</th>
                        <th>Applications</th>
                        <th>Date Posted</th>
                        <th>Status</th>
                        <th class="action">Action</th>
                      </tr>
                    </thead>
                    <tbody id="tblBdyJobs" >

                      <?php for($i = 0; $i < count($job_posted); $i++): ?>
                      <tr class="job-items">
                        <td class="title">
                          <h5><a href="<?= site_url('/dream-job?id='.$job_posted[$i]['job_id'].'&name='.$job_posted[$i]['job_title']) ?>"><?= $job_posted[$i]['job_title'] ?></a></h5>
                          <div class="info">
                            <span class="office-location"><img src="<?= site_url('assets/images/font/placeholder.png') ?>"  height="15px" width="15px" >  <?= $job_posted[$i]['job_location'] ?></span>
                            <span class="job-type full-time"><img src="<?= site_url('assets/images/font/clock.png') ?>"  height="15px" width="15px" >  <?= $job_posted[$i]['job_type'] ?></span>
                          </div>
                        </td>
                        <td class="application"><a href="#"><?= $applied_count[$i][0]['apply_cnt'] ?> Application(s)</a></td>
                        <td class="deadline"><?= date("M d, Y", strtotime($job_posted[$i]['date_posted'])); ?></td>

                        <?php if($job_posted[$i]['status'] == 3): ?>
                          <td class="status pending" title="Your job post is live. Status will be set to Active once approved by Admin" ><?= $job_posted[$i]['job_post_status'] ?></td>
                        <?php elseif(($job_posted[$i]['status'] == 1) || ($job_posted[$i]['status'] == 6)): ?>
                          <td class="status active"><?= $job_posted[$i]['job_post_status'] ?></td>
                        <?php else: ?>  
                          <td class="status expired"><?= $job_posted[$i]['job_post_status'] ?></td>
                        <?php endif; ?>
                        <td class="action">
                          <?php if(($job_posted[$i]['status'] == 4)): ?>
                            <a href="#" class="remove" title="Resume" onclick="myResum(<?= $job_posted[$i]['job_id'] ?>,<?= $job_posted[$i]['status'] ?>)"><img src="<?= site_url('assets/images/font/play-button.png') ?>"  height="15px" width="15px" ></a>
                          <?php else: ?>
                            <a href="#" class="preview" title="Pause" onclick="myPause(<?= $job_posted[$i]['job_id'] ?>,<?= $job_posted[$i]['status'] ?>)" ><img src="<?= site_url('assets/images/font/rounded-pause-button.png') ?>"  height="15px" width="15px" ></a>
                          <?php endif; ?>
                          <!-- <a href="#" class="preview" title="Preview"><i data-feather="eye"></i></a> -->
                          <a href="<?= site_url("Jobs/editJobPost?val=".$job_posted[$i]['job_id']) ?>" class="edit" title="Edit"><img src="<?= site_url('assets/images/font/edit.png') ?>"  height="15px" width="15px" ></a>
                          <a href="#" class="remove" title="Delete" onclick="myDelete(<?= $job_posted[$i]['job_id'] ?>,<?= $job_posted[$i]['status'] ?>)" ><img src="<?= site_url('assets/images/font/bin.png') ?>"  height="15px" width="15px" ></a>
                        </td>
                      </tr>
                      
                      <?php endfor; ?>
                      
                      
                      
                    </tbody>
                    <?php endif; ?>
                  </table>
                  
                  <input type="hidden" id="jobs_count" value="<?= $job_posted_cnt[0]['emp_job_cnt'] ?>" >
                  <?php if(($job_posted_cnt[0]['emp_job_cnt'] != 0) && ($job_posted_cnt[0]['emp_job_cnt'] < 5 )): else: ?>

                  <div class="pagination-list text-center" id="pagination" ></br></br>
                    <button class="btn btn-primary btn-block"  style="height: 30px;font-size: 14px;" onclick="loadJobs(<?= $limit ?>,<?= $start ?>)">Load More</button>             
                  </div>
                  <?php endif; ?>
                </div>
              </div>



<script>

function loadJobs(lim,strt)
{
  var limit = lim;
  var start = strt;

  start = limit;
  limit = start+limit;

   var pg = strt/5;

  var job_total = $("#jobs_count").val();

  var tot = job_total-start;

  $.ajax({
    url: "<?= site_url("Employer/loadEmpJobs") ?>",
    type: "POST",
    data: {start: start, limit: limit},
    beforeSend : function()
    {
      $('#err').css('display','block');
    },
    success: function(data)
    {
      //alert(data);
      // for(var i=0;((i < tot) && (i < 5)); i++)
      // {
      //   console.log(data['jobs'][i]['job_id']);
      //   $("#tblBdyJobs > tbody:last").append("<tr class='job-items'><td class='title'><h5><a href='http://localhost/recruitergoa/dream-job>id="+data['jobs'][i]['job_id']+"&name="+data['jobs'][i]['job_title']+"' >"+data['jobs'][i]['job_title']+"</a></h5><div class='info' ><span class='office-location'><i data-feather='map-pin'></i>"+data['jobs'][i]['job_location']+"</span><span class='job-type full-time'><i data-feather='clock'></i>"+data['jobs'][i]['job_type']+"</span></div></td></tr>")
      // }

        $("#tblJobs > tbody:last").append(data);

        $.ajax({
          url: "<?= site_url("Employer/loadJobsBtn") ?>",
          type: "POST", 
          date: {limit: limit, start: start, job_total: job_total},
          success: function(res)
          {
            $("#pagination").html(res);
          }
        });

    },
    complete : function()
    {
      $('#err').css('display','none');
      
      // $("#limit").val(limit);
      // $("#start").val(start);
    }
  });

}

function myPause(id, status)
{
  $("#j_status").val(status);

  $("#j_s_id").val(id);

  $("#Pause").modal('show');
}

function myResum(id, status)
{
  $("#j_r_status").val(status);

  $("#j_r_id").val(id);

  $("#Resume").modal('show');
}

function myDelete(id, status)
{
  $("#j_d_status").val(status);

  $("#j_d_id").val(id);

  $("#Delete").modal('show');
}

</script>