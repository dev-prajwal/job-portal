<div class="dashboard-sidebar">
                <div class="company-info">
                  <div class="thumb">
                    <img src="<?php echo $this->config->item('base_url');?>/assets/images/font/company.png" class="img-fluid" alt="">
                  </div>
                  <div class="company-body">
                    <h5><?php echo $this->session->username; ?></h5>
                    <span><?php echo $this->session->email_id; ?></span>
                  </div>
                </div>
                <div class="profile-progress">
                  <div class="progress-item">
                    <div class="progress-head">
                      <p class="progress-on">Profile</p>
                    </div>
                    <div class="progress-body">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0;"></div>
                      </div>
                      <p class="progress-to">70%</p>
                    </div>
                  </div>
                </div>
                <div class="dashboard-menu">
                  <ul>
                    <?php if($slctd == "Dashboard"): ?>
                      <li class="active">
                    <?php else: ?>
                      <li>
                    <?php endif; ?>
                      <i class="fas fa-home"></i><a href="<?php echo $this->config->item('base_url');?>/employer">Dashboard</a></li>
                      <?php if($slctd == "Edit"): ?>
                      <li class="active">
                    <?php else: ?>
                      <li>
                    <?php endif; ?>
                    <i class="fas fa-user"></i><a href="<?php echo $this->config->item('base_url');?>/employer-edit-profle">Edit Profile</a></li>
                    <?php if($slctd == "Job"): ?>
                      <li class="active">
                    <?php else: ?>
                      <li>
                    <?php endif; ?>
                    <i class="fas fa-briefcase"></i><a href="<?php echo $this->config->item('base_url');?>/employer-manage-jobs">Manage Jobs</a></li>
                    <?php if($slctd == "Can"): ?>
                      <li class="active">
                    <?php else: ?>
                      <li>
                    <?php endif; ?>
                    <i class="fas fa-users"></i><a href="<?php echo $this->config->item('base_url');?>/employer-manage-candidate">Manage Candidates</a></li>
                    <?php if($slctd == "Settings"): ?>
                      <li class="active">
                    <?php else: ?>
                      <li>
                    <?php endif; ?>
                    <i class="fa fa-wrench"></i><a href="<?php echo $this->config->item('base_url');?>/employer-account-settings">Account Settings</a></li>
                    <!-- <li><i class="fa fa-archive"></i><a href="#">Jobs Posted</a></li> -->
                    <!-- <li ><i class="fa fa-archive"></i>
                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Jobs Posted</a>
                      
                      <ul  class="dropdown-menu">
                        <li class="menu-item"><a href="#">Active</a></li>
                        <li class="menu-item"><a href="#">Paused</a></li>
                        <li class="menu-item"><a href="#">Closed</a></li>
                      </ul>
                    </li> -->
                    <li><i class="fas fa-plus-square"></i><a href="<?= site_url("post-job") ?>">Post New Job</a></li>
                    <li><i class="fa fa-eye"></i><a href="<?= site_url("company-section?user=".$this->session->user_id."&company=".$this->session->username) ?>">View Profile</a></li>
                    <!-- <li><i class="fas fa-comment"></i><a href="employer-dashboard-message.html">Message</a></li>
                    <li><i class="fas fa-calculator"></i><a href="employer-dashboard-pricing.html">Pricing Plans</a></li> -->
                  </ul>
                  <ul class="delete">
                    <li><i class="fas fa-power-off"></i><a href="<?php echo site_url('Auth/logout');?>">Logout</a></li>
                    <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Delete Account</a></li>
                  </ul>
                  <!-- Modal -->
                  <div class="modal fade modal-delete" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <h4><i data-feather="trash-2"></i>Delete Account</h4>
                          <p>Are you sure! You want to delete your profile. This can't be undone!</p>
                          <form action="#">
                            <div class="form-group">
                              <input type="password" class="form-control" placeholder="Enter password">
                            </div>
                            <div class="buttons">
                              <button class="delete-button">Save Update</button>
                              <button class="">Cancel</button>
                            </div>
                            <div class="form-group form-check">
                              <input type="checkbox" class="form-check-input" checked="">
                              <label class="form-check-label">You accepts our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></label>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>