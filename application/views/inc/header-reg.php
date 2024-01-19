<!doctype html5>
<html lang="en">
  

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Recruiter Goa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/users/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/users/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/users/css/themify-icons.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/users/css/et-line.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/users/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/users/css/plyr.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/users/css/flag.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/users/css/slick.css" /> 
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/users/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/users/css/jquery.nstSlider.min.css" />
    
    <link rel="stylesheet" href="<?= base_url('/assets/admin/vendors/trumbowyg/dist/ui/trumbowyg.min.css');?>" type="text/css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/assets/css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo $this->config->item('base_url');?>/assets/images/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo $this->config->item('base_url');?>/assets/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->config->item('base_url');?>/assets/images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->config->item('base_url');?>/assets/images/icon-114x114.png">


    <!--[if lt IE 9]>
    <script src="<?php //echo $this->config->item('base_url');?>assets/users/js/html5shiv.min.js"></script>
    <script src="<?php //echo $this->config->item('base_url');?>assets/users/js/respond.min.js"></script>
    <![endif]-->

    


<link rel="stylesheet" type="text/css" href="//wpcc.io/lib/1.0.2/cookieconsent.min.css"/><script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script><script>window.addEventListener("load", function(){window.wpcc.init({"border":"thin","corners":"small","colors":{"popup":{"background":"#f0edff","text":"#000000","border":"#5e65c2"},"button":{"background":"#5e65c2","text":"#ffffff"}},"position":"bottom","content":{"href":"http://britsolapps.in/recruitergoa/terms-and-condition","message":"We want to use cookies to improve your user experience at our site. You can read more about this at any time at "}})});</script>



   
  </head>
  <style>

    .loading-bar {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-image: url('http://localhost/recruitergoa/assets/images/loader.gif');
      background-position: 50% 50%;
      background-repeat: no-repeat;
      background-color: rgba(255,255,255,0.8);
    }

    body.loading {
        overflow: hidden;
    }

    .btn-outline-primary {
    font-size: 14px;
}



  </style>
      
  <body>

      <div id="err" class="loading-bar" >
          
      </div>

    <header class="header-2">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header-top">
              <div class="logo-area">
                <a href="<?php echo $this->config->item('base_url');?>/"><img src="<?php echo $this->config->item('base_url');?>/assets/images/logo-2.png" alt=""></a>
              </div>
              <div class="header-top-toggler">
                <div class="header-top-toggler-button"></div>
              </div>
              <div class="top-nav">
                
                <?php if(isset($this->session->username)): ?>
                <div class="dropdown header-top-account">
                  <a href="#" class="account-button">My Account</a>
                  <div class="account-card">
                    <div class="header-top-account-info">
                      <a href="<?= site_url("employer") ?>" class="account-thumb">
                        <img src="<?php echo $this->config->item('base_url');?>/assets/images/font/user.png" class="img-fluid" alt="">
                      </a>
                      <div class="account-body">
                        <h5><a href="<?= site_url("employer") ?>"><?php echo $this->session->username; ?></a></h5>
                        <span class="mail"><?php echo $this->session->email_id; ?></span>
                      </div>
                    </div>
                    <ul class="account-item-list">
                      <li><a href="<?= site_url("employer") ?>"><span class="ti-user"></span>Account</a></li>
                      <li><a href="#"><span class="ti-settings"></span>Settings</a></li>
                      <li><a href="<?php echo site_url('Auth/logout');?>"><span class="ti-power-off"></span>Log Out</a></li>
                    </ul>
                  </div>
                </div>
                <?php else: ?>
                  <div class="">
                    <button title="Login only for recruiters / company" type="button" data-toggle="modal" data-target="#exampleModalLong" class="btn btn-outline-primary">Login</button>
                    <!-- <button title="Title" type="button" data-toggle="modal" data-target="#exampleModalLong2">Registration</button> -->
                  </div>
                <?php endif; ?>
                <!-- <select class="selectpicker select-language" data-width="fit">
                  <option data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
                   <option  data-content='<span class="flag-icon flag-icon-mx"></span> Español'>Español</option> 
                </select> -->
              </div>
            </div>
            <nav class="navbar navbar-expand-lg cp-nav-2">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="menu-item post-job2"><a title="Home" href="<?php echo $this->config->item('base_url');?>/"><i class="fas fa-power-off"></i> Home</a></li>
                  
                  <li class="menu-item post-job"><a title="Jobs Board" href="<?php echo $this->config->item('base_url');?>/jobs"><i class="fa fa-address-card"></i>Job Board</a></li>
                  <li class="menu-item post-job"><a title="Blogs" href="<?php echo $this->config->item('base_url');?>/blogs"><i class="fas fa-newspaper"></i>Blog</a></li>
                  <!-- <li class="menu-item post-job"><a title="Contact Us" href="<?php //echo $this->config->item('base_url');?>/contact-us"><i class="fa fa-envelope-open"></i>Contact Us</a></li> -->
                  <li class="menu-item post-job"><a href="<?php echo $this->config->item('base_url');?>/post-job"><i class="fas fa-plus"></i>Post a Job</a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- Modal -->
<div class="account-entry">
      
      <!-- job application pop up -->

</div>