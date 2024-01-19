<div id="divReplace".<?= ($start-5)/5; ?> >

    <div class="job-filter-result">
    <?php for($i = 0; $i < (count($jobs)); $i++): ?>
        <div class="job-list">
        <div class="thumb">
            <a href="#">
            <?php if($jobs[$i]['logo_path'] == ""): ?>
                <img src="<?php echo $this->config->item('base_url');?>/assets/images/job/company-logo-8.png" class="img-fluid" alt="">
            <?php else: ?>
                <img src="<?= site_url("logo_path") ?>" class="img-fluid" alt="">
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

    <div id="divReplace".<?= ($start/5) ?>  >
        <input type="hidden" id="limit" value="<?= $limit ?>" >
        <input type="hidden" id="start" value="<?= $start ?>" >
        <?php if(($job_cnt > $start) && ($job_cnt < $limit)): ?>
            <div class="pagination-list text-center"></br></br>
            <button class="btn btn-primary btn-block"  style="height: 30px;font-size: 14px;" onclick="loadMore(<?= $limit ?>,<?= $start ?>)">Load More</button>             
            </div>
        <?php endif; ?>
    </div>

</div>