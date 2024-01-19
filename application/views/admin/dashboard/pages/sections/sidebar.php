<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
				                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>Quick Links</span>
                        <span>QL</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#dash_drp">
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Statistics</span>
                            </a>
                            <ul id="dash_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= base_url('/admin/job_views');?>">Job Views</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?= base_url('/admin/job_applications_stats');?>">Job Applications</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/company_stats');?>">Company Stats</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/candidate_stats');?>">Candidate Stats</a>
                                        </li>										
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/blog_stats');?>">Blog Stats</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-with-badge" href="javascript:void(0);" data-toggle="collapse" data-target="#app_drp">
                                <span class="feather-icon"><i data-feather="package"></i></span>
                                <span class="nav-link-text">Approvals</span>
                                <?php 
                                if(($unapproved_companies_count+$unapproved_job_count) != 0){ 
                                    echo'<span class="badge badge-brown badge-pill">'.($unapproved_companies_count+$unapproved_job_count).'</span>';                             
                                }
                                ?>
                                
                            </a>
                            <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/job_post_approvals');?>">                                            
                                            <span class="nav-link-text">Job Post Approvals</span>
                                            
                                            <?php 
                                            if($unapproved_job_count != 0){ 
                                                echo'<span class="badge badge-brown badge-pill ml-4"><span class="badge badge-brown badge-pill">'.$unapproved_job_count.'</span></span>';                             
                                            }
                                            ?>

                                            </span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/company_approvals');?>">
                                            <span class="nav-link-text">Company Approvals </span>                                        
                                            
                                            <?php 
                                                if($unapproved_companies_count != 0){ 
                                                    echo'<span class="badge badge-brown badge-pill ml-4"><span class="badge badge-brown badge-pill">'.$unapproved_companies_count.'</span></span>';                             
                                                }
                                                ?>
                                                </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                    </ul>
                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>Manage Assets</span>
                        <span>MA</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#Components_drp">
                                <span class="feather-icon"><i data-feather="layout"></i></span>
                                <span class="nav-link-text">Companies & Jobs</span>
                            </a>
                            <ul id="Components_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/company_list');?>">Company List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/company_category_list');?>">Categories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/company_request');?>">Company Request</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#content_drp">
                                <span class="feather-icon"><i data-feather="type"></i></span>
                                <span class="nav-link-text">Jobs</span>
                            </a>
                            <ul id="content_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/job_posts');?>">Job Posts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/job_applications');?>">Job Applications</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#utilities_drp">
                                <span class="feather-icon"><i data-feather="anchor"></i></span>
                                <span class="nav-link-text">Blogs</span>
                            </a>
                            <ul id="utilities_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/blog_posts');?>">Blog Posts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/admin/blog_new');?>">New Blog</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


 

                    </ul>
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->