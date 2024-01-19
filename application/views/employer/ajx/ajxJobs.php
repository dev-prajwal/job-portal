

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
            <a href="#" class="remove" title="Resume" onclick="myResum(<?= $job_posted[$i]['job_id'] ?>,<?= $job_posted[$i]['status'] ?>)" ><img src="<?= site_url('assets/images/font/play-button.png') ?>"  height="15px" width="15px" ></a>
            <?php else: ?>
            <a href="#" class="preview" title="Pause" onclick="myPause(<?= $job_posted[$i]['job_id'] ?>,<?= $job_posted[$i]['status'] ?>)" ><img src="<?= site_url('assets/images/font/rounded-pause-button.png') ?>"  height="15px" width="15px" ></a>
            <?php endif; ?>
            <a href="<?= site_url("Jobs/editJobPost?val=".$job_posted[$i]['job_id']) ?>" class="edit" title="Edit"><img src="<?= site_url('assets/images/font/edit.png') ?>"  height="15px" width="15px" ></a>
            <a href="#" class="remove" title="Delete" onclick="myDelete(<?= $job_posted[$i]['job_id'] ?>,<?= $job_posted[$i]['status'] ?>)" ><img src="<?= site_url('assets/images/font/bin.png') ?>"  height="15px" width="15px" ></a>
        </td>
    </tr>

<?php endfor; ?>

