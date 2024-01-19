
<link rel="stylesheet" href="<?= base_url('/assets/admin/vendors/trumbowyg/dist/ui/trumbowyg.min.css');?>" type="text/css">
<style>

    .widgIframe {
    width: 500px !important;
}

</style>

<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                        <h2 class="title" style="text-align: center">Already have an Account? Signin Now!</h2>
                        <div class="p-t-15">
                            <center><a class="btn btn--radius-2 btn--blue" href="<?php echo $this->config->item('base_url');?>/auth/login" >Sign in</a></center>
                        </div><br><br>
                    <h2 class="title" style="text-align: center">Register Now</h2>
                    <form name="myReg" action="<?= site_url("Auth/regVerify") ?>" method="POST" onsubmit="return validateLogin()">
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Company name</label>
                                    <input class="input--style-4" type="text" name="companyname" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Email (username for login)</label>
                                    <input class="input--style-4" type="email" name="email_reg" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <div class="input-group">
                                        <input class="input--style-4" type="password" name="password_reg" required>
                                        <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <div class="input-group">
                                        <input class="input--style-4" type="password" name="password_reg2" required>
                                        <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                <label class="label">Company Location</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select id="selLocation" name="selLocation"  required>
                                        
                                        
                                            <option value="" disabled selected>Select Location </option>
                                            <?php for($i = 0; $i < count($company_location); $i++): ?>
                                            
                                            <option value="<?= $company_location[$i]['taluka_id'] ?>"><?= $company_location[$i]['taluka_name'] ?></option>
                                            <?php endfor; ?>

                                            <!-- <option value="others" >Others *</option> -->
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" id="locHid" style="visibility: hidden" >
                                <div class="input-group">
                                    <label class="label">Location</label>
                                    <input class="input--style-4" type="text" name="c_loc2" >
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                <label class="label">Company Type</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select id="selCat" name="selCat" required>
                                            
                                            
                                            <option value="" disabled selected>Select Category </option>
                                            <?php for($i = 0; $i < count($company_category); $i++): ?>
                                            <option value="<?= $company_category[$i]['company_type'] ?>"><?= $company_category[$i]['company_type'] ?></option>
                                            <?php endfor;  ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <label class="label">Company Email</label>
                                    <input class="input--style-4" type="email" name="c_email" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <label class="label">Company Website</label>
                                <input class="input--style-4" type="text" name="website" required>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    
                                    <textarea id="noise" name="noise" class="editor hk-sec-title" row="4"   style="width: 500px" required><b>Company Profile</b> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Sign up</button>
                            
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
</div>

    <!-- Jquery JS-->
    <script src="<?php echo $this->config->item('base_url');?>/assets/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo $this->config->item('base_url');?>/assets/vendor/select2/select2.min.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>/assets/<?php echo $this->config->item('base_url');?>/assets/vendor/datepicker/moment.min.js"></script>
    

    <!-- Main JS-->
    <script src="<?php echo $this->config->item('base_url');?>/assets/js/global.js"></script>

<script>
// function myLocation()
// {
//   var value = $('#selLocation option:selected').text();
//   //alert(value); 
//   if(value == 'Others *')
//   {
//     //alert('success');
//     //$("div#div_hidden:visible");
//     document.getElementById("locHid").style.visibility = "visible";

//   }
// }
</script>

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