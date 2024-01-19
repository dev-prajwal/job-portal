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
    
    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>/assets/css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo $this->config->item('base_url');?>/assets/images/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo $this->config->item('base_url');?>/assets/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->config->item('base_url');?>/assets/images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->config->item('base_url');?>/assets/images/icon-114x114.png">

    <script src="<?php echo $this->config->item('base_url');?>/assets/js/jquery-1.9.1.min.js"></script>

    <link href="<?php echo $this->config->item('base_url');?>/assets/css/widgEditor.css" rel="stylesheet"/>

<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>/assets/js/widgEditor.js"></script>


    <!--[if lt IE 9]>
    <script src="<?php //echo $this->config->item('base_url');?>assets/users/js/html5shiv.min.js"></script>
    <script src="<?php //echo $this->config->item('base_url');?>assets/users/js/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo $this->config->item('base_url');?>/assets/css/bootstrap-select.css" rel="stylesheet"/>
	  <!-- <script src="<?php //echo $this->config->item('base_url');?>/assets/js/bootstrap-select.js"></script> -->




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
      background-image: url('http://britsolapps.in/recruitergoa/assets/images/loader.gif');
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
                    <button title="Login only for recruiters / company" type="button" data-toggle="modal" data-target="#exampleModalLong" class="btn btn-outline-primary">Recruiter Login</button>
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
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="user"></i>Login (Only for Recruiters / Companies)</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo site_url('Auth/signin');?>" method="POST">
                <div class="form-group">
                  <input type="email" placeholder="Email Address" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" class="form-control" name="password" required>
                </div>
                <div class="more-option">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Remember Me
                    </label>
                  </div>
                  <a href="#">Forget Password?</a>
                </div>
                <button class="button primary-bg btn-block">Login</button>
              </form>
              <div class="shortcut-login">
                <!-- <span>Or connect with</span>
                <div class="buttons">
                  <a href="#" class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
                  <a href="#" class="google"><i class="fab fa-google"></i>Google</a>
                </div> -->
                <p>Don't have an account? <a href="<?= site_url("register") ?>">Register</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>Registration (Only for Recruiters / Companies)</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- <div class="account-type">
                <a href="#" class="candidate-acc active"><i data-feather="user"></i>Candidate</a> 
                <a href="#" class="employer-acc"><i data-feather="briefcase"></i>Employer</a>
              </div> -->
              <form name="myForm" action="<?php echo $this->config->item('base_url');?>/Auth/signup" method="POST" onsubmit="return validateLogin()" >
                <div class="form-group">
                  <input type="text" placeholder="Company Name" class="form-control" name="company_name" required>
                </div>
                <div class="form-group">
                  <input type="email" placeholder="Email Address (username for login)" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" class="form-control" name="password" required>
                </div>
                <div class="more-option terms">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" required>
                    <label class="form-check-label" for="defaultCheck2">
                      I accept the <a href="#">terms & conditions</a>
                    </label>
                  </div>
                </div>
                <!-- <button class="button primary-bg btn-block">Register</button> -->
                <input type="submit" value="Register" class="button primary-bg btn-block">
              </form>
              <div class="shortcut-login">
                <!-- <span>Or connect with</span>
                <div class="buttons">
                  <a href="#" class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
                  <a href="#" class="google"><i class="fab fa-google"></i>Google</a>
                </div> -->
                <p>Already have an account? <a href="#">Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- post a job pop up -->
      <div class="modal fade" id="About2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>Enter Company Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form id="ajxForm" onsubmit="return myAbout5()" >
                <div class="form-group">
                  <textarea class="form-control" placeholder="Min 25 characters" id="c_about2" required></textarea>
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Company Website" class="form-control" name="c_website2" id="c_website2" required>
                </div>

                <div class="form-group">
                  <input type="text" placeholder="Company Email" class="form-control" name="cm_email" id="cm_email" required>
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Company Address" class="form-control" name="c_address5" id="c_address5" required>
                </div>
                
                <button class="button primary-bg btn-block" >Update</button>
                <!-- <a class="button primary-bg btn-block" onclick="myAbout()">Submit</a> -->
              </form>
              
            </div>
          </div>
        </div>
      </div>
      <!-- job post pop up -->

      <!--  job application pop up -->
      <div class="modal fade" id="ResumeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i data-feather="edit"></i>Your Application</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form  enctype="multipart/form-data" action="<?= site_url("Jobs/applyResume") ?>" method="POST" >
                <div class="form-group">
                  <input type="text" placeholder="Fist Name Last Name" class="form-control" id="appl_name" name="appl_name" required>
                  <input type="hidden" name="appl_job_id" id="appl_job_id" >
                  <input type="hidden" name="job_name" id="job_name" >
                </div>
                
                <div class="form-group">
                  <input type="email" placeholder="you@domain.com" class="form-control" name="appl_email" id="appl_email" required>
                </div>
                <div class="form-group">
                  <input type="number" placeholder="Contact Number" class="form-control" name="appl_co_no" id="appl_co_no" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" placeholder="Cover Letter" style="height: 200px;" id="appl_cvr_ltr" name="appl_cvr_ltr" required></textarea>
                </div>
                
                <div class="form-group">
                  <input type="file" class="form-control" name="appl_resume" id="appl_resume" accept=".pdf, .doc, .docx" required>
                  <label> *File must be less then 10 mb. Upload .pdf/.doc/.docx file only.</label>
                </div>
                
                <button class="button primary-bg btn-block">Apply Now</button>
                <!-- <a class="button primary-bg btn-block" onclick="myAbout()">Submit</a> -->
              </form>

             
              
            </div>
          </div>
        </div>
      </div>
      <!-- job application pop up -->

    </div>
      



<script>
function validateLogin()
{
  var email = document.forms["myForm"]["email2"].value;

  var set = true;
  $.ajax({
    url: "<?php echo $this->config->item('base_url');?>/Auth/checkEmail",
          type: "POST",
          data: {email: email},
          success: function(data)
          {
            if(data == 0)
            {
              alert("email id already exist");
              set = false;
              return false;
            }
            else
            {
              return true;
            }
          }
  });
  return set;
}
</script>

<script>
function Login()
{
  //alert("hello");
  var email = $("#username1").val();
  var password = $("#password1").val();

  $.ajax({
          url: "<?php echo $this->config->item('base_url');?>/Auth/signin",
          type: "POST",
          data: {
            email: email,
            password: password
          },
          success: function(data)
          {
            if(data == "0")
            {
              alert('login failed');
            }
          }
      });
}


function myAbout5()
{
  var about = $("#c_about2").val();

  var site = $("#c_website2").val();

  var addr = $("#c_address5").val();

  var c_email = $("#cm_email").val();

  var set = false;

  alert("Loading response...");

  $.ajax({
        type: "POST",
        url: "<?php echo $this->config->item("base_url");?>/Jobs/insertAbout",
        data: {about: about, site:site, addr: addr,c_email: c_email},
        success: function(data)
        {
          $("#About2").modal("hide");
        }
      });

      return false;

}


function myResume()
{
  // alert($("#appl_job_id").val());
  // alert($("#appl_resume").val());

  var j_id = $("#appl_job_id").val();

  var appl_name = $("#appl_name").val();

  var appl_email = $("#appl_email").val();

  var appl_co_no = $("#appl_co_no").val();

  var appl_cvr_ltr = $("#appl_cvr_ltr").val();

  var appl_resume = $("#appl_resume").val();

  //const form2 = document.querySelector("#ajxFormAppl");

  // var files = document.querySelector('[type=file]').files;
  // var formData = new FormData();

  // formData.append('file2',files);

  $.ajax({
    url: "<?= site_url("Jobs/applyResume") ?>",
    type: "POST",
    data: {j_id: j_id,appl_name: appl_name,appl_email: appl_email,appl_co_no: appl_co_no,appl_cvr_ltr: appl_cvr_ltr,appl_resume: appl_resume, formData: formData},
   // data: new FormData(this),
    // processData: false,
    // contenType: false,
    // cache: false,
    // async: false,
    
   beforeSend : function()
   {
    
    //$("#err").show();
   },
   success: function(data)
   {
     if(data == "0")
     {
       alert("thank your for your application");
     }
     else if(data == "1")
     {
       alert("You have already applied for this job post");

     }
     else
     {
       alert(data);
     }
   },
   error: function(e) 
    {
      alert("Something, went wrong");
      //$("#err").hide();
    }, 
    complete: function()
    {
      //$("#err").hide();
      $("#ResumeModal").modal('hide');
    }
  });

  return false;
}

function setJob(val)
{
  //alert(val);
  $("#appl_job_id").val(val);
}

$(document).ready(function(){
  $("#ajxFormAppl").on("submit",function(e){
    e.preventDefault();
    //alert('hi');

    //var form2 = document.getElementById("ajxFormAppl"),
    var myData = {
      test: this.files[5]
    };


    if($("#appl_resume").val() == '')
    {
      alert('Please select a file to upload');
    }
    else
    {

      //var appl_resume = $("#appl_resume").file();

      $.ajax({
        url: "<?= site_url("Jobs/applyResume") ?>",
        type: "POST",
        data: myData,
          processData: false,
          contenType: false,
          cache: false,
          async: false,
        
      beforeSend : function()
      {
        console.log(myData);
        //$("#err").show();
      },
      success: function(data)
      {
        if(data == "0")
        {
          alert("thank your for your application");
        }
        else if(data == "1")
        {
          alert("You have already applied for this job post");

        }
        else
        {
          alert(data);
        }
      },
      error: function(e) 
        {
          alert("Something, went wrong");
          //$("#err").hide();
        }, 
        complete: function()
        {
          //$("#err").hide();
          $("#ResumeModal").modal('hide');
        }
      });
    }
  });
});


</script>