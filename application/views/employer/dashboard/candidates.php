
<link rel="stylesheet" href="<?= base_url('/assets/admin/vendors/trumbowyg/dist/ui/trumbowyg.min.css');?>" type="text/css">

<!-- post a job pop up -->
<div class="modal fade" id="sEmail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>Call for an interview</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form method="POST" action="<?= site_url("Employer/canEmail") ?>" >
                
                <div class="form-group">
                  <input type="text" class="form-control" value="<?= $comp_email ?>" name="s_email" id="s_email" disabled>
                </div>

                <div class="form-group">
                  <input type="email" placeholder="Add CC (Optional)" class="form-control" name="s_email_cc" id="s_email_cc" >
                </div>

                <div class="form-group">
                  <input type="email" placeholder="Add BCC (Optional)" class="form-control" name="s_email_bcc" id="s_email_bcc" >
                </div>

                <!-- <div class="form-group"> -->
                  <textarea class="editor hk-sec-title"  name="s_email_body" id="s_email_body" rows="8" style="width: 478px" required></textarea>
                <!-- </div> -->

                <input type="hidden" name="c_appl_id" id="c_appl_id" >

                
                
                
                <button class="button primary-bg btn-block" >SEND</button>
                <!-- <a class="button primary-bg btn-block" onclick="myAbout()">Submit</a> -->
              </form>
              
            </div>
          </div>
        </div>
      </div>
      <!-- job post pop up -->

<div class="modal" tabindex="-1" role="dialog" id="canDelete" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="<?= site_url("Employer/canDel") ?>" >
        <div class="modal-header">
          <h5 class="modal-title">Do you really want to Delete this Applicant's details?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Applicants detals will be permenantly deleted from this job application on recruitergoa.com</p>
        </div>
       
        <input type="hidden" name="j_d_id" id="j_d_id" >
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Yes">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modStatus" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="<?= site_url("Employer/canStatus") ?>" >
        <div class="modal-header">
          <h5 class="modal-title">Do you really want to change this Applicant's status?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <select class="form-control" id='chStatus' name="chStatus" required  >
                <option value="" disabled selected>Select Status </option>
                <option value="Shortlisted">Reviewed</option>
                <option value="Interviewed">Interviewed</option>
                <option value="On Hold">Hired</option>
                <option value="Rejected">Rejected</option>
            </select>
          </div>
        </div>
       
        <input type="hidden" name="ap_status" id="ap_status" >
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Update">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <?php if($this->input->get('del') == "1"): ?>
          <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><i class="fas fa-check-circle"></i></strong> Application has been deleted.
          </div>
        <?php elseif($this->input->get('send') == "1"): ?>
          <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><i class="fas fa-check-circle"></i></strong> Email has been sent to the applicant.
          </div>
        <?php elseif($this->input->get('updation') == "1"): ?>
          <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><i class="fas fa-check-circle"></i></strong> Email has been sent to the applicant.
          </div>
        <?php elseif($this->input->get('updation') == "0"): ?>
          <div class="alert alert-error">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><i class="fas fa-check-circle"></i></strong> Something went wrong, Falied to update.
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
                <div class="manage-candidate-container">

                <?php if($appl_cnt == 0): ?>
                  <h2>Sorry no candidates to display!</h2>
                <?php else: ?>
                  <table class="table" id="tblCan" >
                    <thead>
                      <tr>
                        <th>Job Title</th>
                        <th>Status</th>
                        <th class="action">Action</th>
                      </tr>
                    </thead>
                    <tbody id="tblBody">

                    <?php for($i = 0; $i < count($applicant); $i++): ?>
                      <tr class="candidates-list">
                        <td class="title">
                          <div class="thumb">
                            <img src="<?php echo $this->config->item('base_url');?>/assets/images/font/user.png" class="img-fluid" alt="">
                          </div>
                          <div class="body">
                            <h5><?= $applicant[$i]['applied_by_name'] ?></h5>
                            <div class="info">
                              <span class="designation"><a href="#"><img src="<?= site_url('assets/images/font/suitcase.png') ?>"  height="15px" width="15px" >  <?= $applicant[$i]['job_title'] ?></a></span>
                              <!-- <span class="location"><a href="#"><i data-feather="map-pin"></i>New Orleans</a></span> -->
                            </div>
                          </div>
                        </td>
                        <td class="status"><img src="<?= site_url('assets/images/font/check.png') ?>"  height="15px" width="15px" > <a target="Click to change status" onclick="myStatus(<?= $applicant[$i]['apply_id'] ?>)"> <?= $applicant[$i]['status'] ?></td>
                        <td class="action">
                        <?php $date1 = strtotime($applicant[$i]['applied_on']); $date2= strtotime(date("M, d, Y h:i:s"));
                            $secs = $date2 - $date1; $days = $secs/86400;
                            if($days > 10): ?>
                              <a target="_blank" href="" title="Resume uploaded is only available for 10 days from date of application and is auto deleted after 10 days." class="download"><img src="<?= site_url('assets/images/font/download.png') ?>"  height="15px" width="15px" ></a>
                            
                            <?php else: ?>
                              <a target="_blank" href="" class="download" title="Resume is only available for 10 days from date of application." ><img src="<?= site_url('assets/images/font/download.png') ?>"  height="15px" width="15px" ></a>
                            <?php endif; ?>
                          <a href="#" class="inbox" onclick="cmEmail(<?= $applicant[$i]['apply_id'] ?>)" ><img src="<?= site_url('assets/images/font/message-closed-envelope.png') ?>"  height="15px" width="15px" ></a>
                          <a href="#" class="remove" onclick="cDelete(<?= $applicant[$i]['apply_id'] ?>)"><img src="<?= site_url('assets/images/font/bin.png') ?>"  height="15px" width="15px" ></a>
                        </td>
                      </tr>

                      
                    <?php endfor; ?>
                      
                    </tbody>
                  </table>

                  <input type="hidden" value="<?= $appl_cnt ?>" id="can_total" >
                  
                 
                <?php endif; if(($appl_cnt != 0) && ($appl_cnt > 10)): ?>

                <div class="pagination-list text-center" id="pagination" ></br></br>
                    <button class="btn btn-primary btn-block"  style="height: 30px;font-size: 14px;" onclick="loadCan(<?= $limit ?>,<?= $start ?>)">Load More</button>             
                  </div>
                  <?php endif; ?>
                </div>

                

              </div>

<script src="<?= base_url('/assets/js/jquery-3.3.1.js') ?>"></script>
    <!-- Import Trumbowyg -->
    <script src="<?= base_url('/assets/admin/vendors/trumbowyg/dist/trumbowyg.min.js');?>"></script>
    <script>
        $('.editor').trumbowyg();
    </script>

<script>

function loadCan(lim, strt)
{
  var total = $("#can_total").val;

  var limit = lim;
  var start = strt;

  start = limit;
  limit = start+limit;

   var pg = strt/10;

   var tot = total-start;

  $.ajax({
    url: "<?= site_url("Employer/loadCandidates") ?>",
    type: "POST",
    date: {start: start, limit: limit},
    beforeSend : function()
    {
      $('#err').css('display','block');
    },
    success: function(data)
    {
      $("#tblCan > tbody:last").append(data);

      $.ajax({
          url: "<?= site_url("Employer/loadCanBtn") ?>",
          type: "POST", 
          date: {limit: limit, start: start, total: total},
          success: function(res)
          {
            $("#pagination").html(res);
          }
        });
    },
    complete: function()
    {
      $('#err').css('display','none');
    }
  });

}

function cDelete(id)
{
  $("#j_d_id").val(id);

  $("#canDelete").modal('show');
}

function cmEmail(id)
{
  $("#c_appl_id").val(id);

  $("#sEmail").modal('show');
}

function myStatus(id)
{
  $("#ap_status").val(id);

  $("#modStatus").modal('show');
}

</script>

