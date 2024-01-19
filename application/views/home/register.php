
<style>
#tooltip1,#tooltip2 {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

#tooltip1,#tooltip2 .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

#tooltip1:hover,#tooltip2:hover .tooltiptext {
  visibility: visible !important;
}
</style>

<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Register</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End -->
 
    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="post-container">
              <div class="post-content-wrapper">
                <form class="job-post-form" name="myReg" action="<?= site_url("Auth/regVerify") ?>" method="POST" onsubmit="return validateLogin()">
                  <div class="basic-info-input">
                    <h4><i data-feather="plus-circle"></i>Register</h4>
                    <div id="job-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Company name</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Company / Organisation name (required)" name="companyname" required>
                      </div>
                    </div>
                    <div id="basic-details" class="row">
                      <label class="col-md-3 col-form-label">Basc Details</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" id="selLocation" name="selLocation" required>
                                    <option value="" disabled selected>Company Location *</option>
                                    <?php for($i = 0; $i < count($company_location); $i++): ?>
                                    
                                        <option value="<?= $company_location[$i]['taluka_id'] ?>"><?= $company_location[$i]['taluka_name'] ?></option>
                                    <?php endfor; ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div id="locHid" style="visibility: hidden" class="col-md-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Company Location *" name="c_loc2">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" id="selCat" name="selCat" required>
                                    <option value="" disabled selected>Company Category *</option>
                                    <?php for($i = 0; $i < count($company_category); $i++): ?>
                                        <option value="<?= $company_category[$i]['company_type'] ?>"><?= $company_category[$i]['company_type'] ?></option>
                                    <?php endfor;  ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Company email *" name="c_email" >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Company Website" name="website">
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div id="comp-profile" class="row">
                      <label class="col-md-3 col-form-label">Company Profile</label>
                      <div class="col-md-9">
                        <textarea id="noise" name="noise" class="editor hk-sec-title"  required><b>Company Profile (required)</b> </textarea>
                      </div>
                    </div>
                    
                    <div id="signup" class="form-group row">
                      <label class="col-md-3 col-form-label">Signup</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <input type="email" class="form-control" placeholder="Email (username for login) *" name="email_reg" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="password" name="password_reg" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="confirm password" name="password_reg2" required>
                            </div>
                            
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    
                    <div id="tnc" class="row">
                      <div class="col-md-9 offset-md-3">
                        <div class="form-group terms">
                          <input class="custom-radio" type="checkbox" id="radio-4" name="termsandcondition" required>
                          <label for="radio-4">
                            <span class="dot"></span> You accepts our <a href="<?= site_url("terms-and-condition?section=tnc") ?>" title="These Terms apply to all visitors, users and others who access or use the Service...">Terms and Conditions</a> and <a href="<?= site_url("terms-and-condition?section=privacy-policy") ?>" title="This page informs you of our policies regarding the collection...">Privacy Policy</a>

                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"></label>
                      <div class="col-md-9">
                        <button class="button">Signup</button> 
                      </div>
                    </div>

                    
                  </div>
                </form>
              </div>
              <div class="post-sidebar">
                <h5><i data-feather="arrow-down-circle"></i>Navigation</h5>
                <ul class="sidebar-menu">
                  <li><a href="#basic-details">Basic Details</a></li>
                  <li><a href="#comp-profile">Company Profile</a></li>
                  <li><a href="#signup">Signup</a></li>
                  <li><a href="#tnc">Terms and Condition</a></li>
                  <li><a href="#tnc">Privacy Policy</a></li>
                </ul>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="regIntro" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          
        </div>
        <div class="modal-body">
          <center><button class="button" data-dismiss="modal" aria-label="Close" style="background-color: #0000ff2e;">Signup</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="<?= site_url("auth/login") ?>" class="button" title="Already have an account?" style="background-color: #0000ff2e;">Login</a></center>

        </div>
        <div class="modal-footer">
          
        </div>
       
        
      
    </div>
  </div>
</div>


<script>
function validateLogin()
{
  var email = document.forms["myReg"]["email_reg"].value;

  var set = true;

    if((document.forms["myReg"]["password_reg"].value) != (document.forms["myReg"]["password_reg2"].value))
    {
        alert("password did not match");
        set = false;
    }

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



<!-- Import Trumbowyg -->
<script src="<?= base_url('/assets/js/jquery-3.3.1.js') ?>"></script>

<script src="<?= base_url('/assets/admin/vendors/trumbowyg/dist/trumbowyg.min.js');?>"></script>

<script>
    $('.editor').trumbowyg();
</script>

<script type="text/javascript">
  
  window.onload = function (){

    $("#regIntro").modal('show');
  };

</script>