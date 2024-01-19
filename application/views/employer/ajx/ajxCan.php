<?php for($i = 0; $i < count($applicant); $i++): ?>
    <tr class="candidates-list">
    <td class="title">
        <div class="thumb">
        <img src="<?php echo $this->config->item('base_url');?>/assets/dashboard/images/user-1.jpg" class="img-fluid" alt="">
        </div>
        <div class="body">
        <h5><?= $applicant[$i]['applied_by_name'] ?></h5>
        <div class="info">
            <span class="designation"><a href="#"><img src="<?= site_url('assets/images/font/suitcase.png') ?>"  height="15px" width="15px" >  <?= $applicant[$i]['job_title'] ?></a></span>
            <!-- <span class="location"><a href="#"><i data-feather="map-pin"></i>New Orleans</a></span> -->
        </div>
        </div>
    </td>
    <td class="status"><img src="<?= site_url('assets/images/font/check.png') ?>"  height="15px" width="15px" >  <?= $applicant[$i]['status'] ?></td>
    <td class="action">
        <a target="_blank" href="<?= site_url($applicant[$i]['applied_by_cv_link']) ?>" class="download"><img src="<?= site_url('assets/images/font/download.png') ?>"  height="15px" width="15px" ></a>
        <a href="#" class="inbox"><img src="<?= site_url('assets/images/font/message-closed-envelope.png') ?>"  height="15px" width="15px" ></a>
        <a href="#" class="remove"><img src="<?= site_url('assets/images/font/bin.png') ?>"  height="15px" width="15px" ></a>
    </td>
    </tr>

    
<?php endfor; ?>