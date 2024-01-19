<div id="divReplace".<?= $pg1 ?>."">
<?php for($i=0;$i<count($company_job);$i++): ?>
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
<?php endfor; if(count($company_job) <= 10):
                else: ?>
    <div id="divReplace".<?= $pg2 ?>."" >
        <div class="pagination-list text-center"></br></br>
            <button class="btn btn-primary btn-block"  style="height: 30px;font-size: 14px;" onclick="loadJobs(<?= $limit ?>,<?= $start; ?>)">Load More</button>             
        </div>
    </div>
<?php endif; ?>

</div>