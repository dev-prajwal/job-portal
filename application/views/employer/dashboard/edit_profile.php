
<link rel="stylesheet" href="<?= base_url('/assets/admin/vendors/trumbowyg/dist/ui/trumbowyg.min.css');?>" type="text/css">

<!-- Breadcrumb -->
    <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <?php if($this->input->get('status') == '1'): ?>
          <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><i class="fas fa-check-circle"></i></strong> Thank You. Your record has been updated.
          </div>
        <?php elseif($this->input->get('status') == '0'): ?>
          <div class="alert alert-warning">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>Warning!</strong> Thank You. Your record has been updated.
          </div>
        <?php elseif($this->input->get('status') == '2'): ?>
          <div class="alert alert-warning">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>Warning!</strong> Thank You. Your record has been updated, but we had error uploading your logo. Please upload .PNG image of > 1mb size.
          </div>
        <?php elseif($this->input->get('status') == '3'): ?>
          <div class="alert alert-success">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong><i class="fas fa-check-circle"></i></strong> Thank You. Your record has been updated.
          </div>
        <?php endif; ?>
        <?php if($this->input->get('status') == '11'): ?>
          <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>Warning!</strong> Your job post isn't live yet! Please update your details to post.
          </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Employer Dashboard</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Employer Dashboard</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-form">
              <!-- <form action="#">
                <input type="text" placeholder="Enter Keywords">
                <button><i data-feather="search"></i></button>
              </form> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End -->

    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
              <div class="dashboard-content-wrapper">
                <form id="cForm" class="dashboard-form" enctype="multipart/form-data" action="<?= site_url("Employer/updateCompany") ?>" method="POST">
                  <div class="dashboard-section upload-profile-photo">
                    <div class="update-photo">
                      <?php if(!empty($company_details)): if($company_details[0]['logo_path'] == ""): ?>
                        <img class="image" src="<?php echo $this->config->item('base_url');?>/assets/images/font/company.png" alt="">
                      <?php else: ?>
                        <img class="image" src="<?= site_url($company_details[0]['logo_path']) ?>" >
                      <?php endif; else: ?>
                        <img class="image" src="<?php echo $this->config->item('base_url');?>/assets/images/font/company.png" alt="">
                      <?php endif; ?>
                    </div>
                    <div class="file-upload">            
                      <input type="file" class="file-input" accept=".png" name="company_logo">Change Avatar (Optional)
                    </div>
                  </div>
                  <div class="dashboard-section basic-info-input">
                    <h4><i data-feather="user-check"></i>Basic Info</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Company Name *</label>
                      <div class="col-sm-9">
                      <?php if(!empty($company_details)): if($company_details[0]['company_name'] == ""): ?>
                        <input type="text" class="form-control" placeholder="Company Name" name="cname" required>
                      <?php else: ?>
                      <input type="text" class="form-control" value="<?php echo $company_details[0]['company_name']; ?>" name="cname" required>
                      <?php endif; else: ?>
                      <input type="text" class="form-control" placeholder="Company Name" name="cname" required>
                      <?php endif; ?>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php //echo $this->session->username; ?>" id="cusername">
                      </div>
                    </div> -->
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email Address *</label>
                      <div class="col-sm-9">
                      <?php if(!empty($company_details)): if($company_details[0]['company_email'] == ""): ?>
                        <input type="text" class="form-control" placeholder="Company Email address" name="cemail">
                        <?php else: ?>
                        <input type="text" class="form-control" value="<?= $company_details[0]['company_email'] ?>" name="cemail">
                        <?php endif; else: ?>
                        <input type="text" class="form-control" placeholder="Company Email address" name="cemail">
                        <?php endif;  ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Website</label>
                      <div class="col-sm-9">
                      <?php if(!empty($company_details)): if($company_details[0]['company_website'] == ""): ?>
                        <input type="text" class="form-control" placeholder="Company Website URL" name="cwebsite">
                      <?php else: ?>
                      <input type="text" class="form-control" value="<?= $company_details[0]['company_website'] ?>" name="cwebsite">
                      <?php endif; else: ?>
                      <input type="text" class="form-control" placeholder="Company Website URL" name="cwebsite">
                      <?php endif;  ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                      <?php if(!empty($company_details)): if($company_details[0]['company_phone'] == ""): ?>
                        <input type="text" class="form-control" placeholder="+55 123 4563 4643" name="cphone">
                        <?php else: ?>
                        <input type="text" class="form-control" value="<?= $company_details[0]['company_phone'] ?>" name="cphone">
                        <?php endif; else: ?>
                        <input type="text" class="form-control" placeholder="+55 123 4563 4643" name="cphone">
                        <?php endif;  ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Company Location *</label>
                      <div class="col-sm-9">
                        <!-- <input type="text" class="form-control" placeholder="Washington D.C" id="caddr" required> -->
                          <select class="form-control" id="exampleFormControlSelect19" name="exampleFormControlSelect19" onchange="myLocation()" required>
                              <?php if(!empty($company_details)): if($company_details[0]['company_location'] == ""): ?>
                                <option value="" disabled selected>Select Category </option>
                                <?php else: endif; ?>
                                <?php for($i = 0; $i < count($company_location); $i++): 
                                  if($company_location[$i]['taluka_name'] == $company_details[0]['company_location']): ?>
                                  <option value="<?= $company_location[$i]['taluka_name'] ?>" selected><?= $company_location[$i]['taluka_name'] ?></option>
                                  <?php else: ?>
                                <option value="<?= $company_location[$i]['taluka_name'] ?>"><?= $company_location[$i]['taluka_name'] ?></option>
                                <?php endif; endfor; else: ?>
                                <option value="" disabled selected>Select Category </option>
                                <?php for($i = 0; $i < count($company_location); $i++): ?>
                                 
                                <option value="<?= $company_location[$i]['taluka_name'] ?>"><?= $company_location[$i]['taluka_name'] ?></option>
                                <?php endfor; ?>

                                <?php endif; ?>
                                <option value="others" >Others *</option>
                          </select>
                          
                      </div>
                    </div>
                    <div class="form-group row" style="visibility: hidden" id="div_hidden">
                      <label class="col-sm-3 col-form-label">Your Location</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="Company location" name="c_location2">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Category *</label>
                      <div class="col-sm-9">
                        <!-- <input type="text" class="form-control" placeholder="UI & UX Designer"> -->
                          <div class="form-group">
                            <!-- <textarea class="form-control" placeholder="Message"></textarea> -->
                              <select class="form-control" id="exampleFormControlSelect11" name="exampleFormControlSelect11" required>
                                <?php if(!empty($company_details)): if($company_details[0]['company_type'] == ""): ?>
                                <option value="" disabled selected>Select Category </option>
                                <?php endif; ?>
                                <?php for($i = 0; $i < count($company_category); $i++): 
                                  if($company_category[$i]['company_type'] == $company_details[0]['company_type']): ?>
                                  <option value="<?= $company_category[$i]['company_type'] ?>" selected><?= $company_category[$i]['company_type'] ?></option>
                                  <?php else: ?>
                                <option value="<?= $company_category[$i]['company_type'] ?>"><?= $company_category[$i]['company_type'] ?></option>
                                <?php endif; endfor; else: ?>
                                <option value="" disabled selected>Select Category </option>
                                <?php for($i = 0; $i < count($company_category); $i++): ?>
                                <option value="<?= $company_category[$i]['company_type'] ?>"><?= $company_category[$i]['company_type'] ?></option>
                                <?php endfor; endif; ?>
                              </select>
                              
                          </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">About Us *</label>
                      <div class="col-sm-9">
                      <?php if(!empty($company_details)): if($company_details[0]['company_about'] == ""): ?>
                        <textarea id="noise" name="noise" class="editor hk-sec-title" required></textarea>
                        <?php else: ?>
                        <textarea id="noise" name="noise" class="editor hk-sec-title" required>
                          <?= $company_details[0]['company_about'] ?>
                        </textarea>
                        <?php endif; else:  ?>
                        <textarea id="noise" name="noise" class="editor hk-sec-title" required></textarea>
                        <?php endif;  ?>
                      </div>
                    </div>
                  </div>
                  
                  <div class="dashboard-section social-inputs">
                    <h4><i data-feather="cast"></i>Social Networks</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Social Links</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-facebook-f"></i></div>
                          </div>
                          <?php if(!empty($company_details)): if($company_details[0]['company_fb'] == ""): ?>
                          <input type="text" class="form-control" placeholder="facebook.com/username - (Optional)" name="cfb">
                          <?php else: ?>
                          <input type="text" class="form-control" value="<?= $company_details[0]['company_fb'] ?>" name="cfb">
                          <?php endif; else: ?>
                          <input type="text" class="form-control" placeholder="facebook.com/username - (Optional)" name="cfb">
                          <?php endif;  ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-twitter"></i></div>
                          </div>
                          <?php if(!empty($company_details)): if($company_details[0]['company_twitter'] == ""): ?>
                          <input type="text" class="form-control" placeholder="twitter.com/username - (Optional)" name="ctwt">
                          <?php else: ?>
                          <input type="text" class="form-control" value="<?= $company_details[0]['company_twitter']; ?>" name="ctwt">
                          <?php endif; else: ?>
                          <input type="text" class="form-control" placeholder="twitter.com/username - (Optional)" name="ctwt">
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-google-plus"></i></div>
                          </div>
                          <?php if(!empty($company_details)): if($company_details[0]['company_linkedin'] == ""): ?>
                          <input type="text" class="form-control" placeholder="linkedin.com/username - (Optional)" name="clnk">
                          <?php else: ?>
                          <input type="text" class="form-control" value="<?= $company_details[0]['company_linkedin'] ?>" name="clnk">
                          <?php endif; else: ?>
                          <input type="text" class="form-control" placeholder="linkedin.com/username - (Optional)" name="clnk">
                          <?php endif;  ?>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <button class="button">Save Change</button>
                        <!-- <input type="submit" value="Save Changes" onclick="cDetails()"> -->
                      </div>
                  </div>
                  </form>
                  <div class="dashboard-section basic-info-input">
                    <h4><i data-feather="lock"></i>Change Password</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Current Password</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Current Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">New Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" placeholder="New Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Retype Password</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Retype Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <button class="button">Save Change</button>
                      </div>
                    </div>
                    <input type="hidden" value="<?php echo $this->session->user_id; ?>" id="id_user">
                  </div>
                <!-- </form> -->
              </div>

<script>
function cForm()
{
  return false;
}

function cDetails()
{
  alert('123');

  var cname = $("#cname").val();

  var user_id = $("#id_user").val();

  if(cname == "" || cname == undefined)
  {
    alert('insert name');
    return;
  }

  var cemail = $("#cemail").val();
  if(cemail == "" || cemail == undefined)
  {
    alert('insert email');
    return;
  }

  var c_address = $("#exampleFormControlSelect19").val();
  if(c_address == 0)
  {
    alert('select location');
    return;
  }

  //var category = $('#exampleFormControlSelect11').val();
  var e = document.getElementById("exampleFormControlSelect11");
  var cat = e.options[e.selectedIndex].value;
  if(cat == 0)
  {
    alert('select category');
    return;
  }

  var c_about = document.getElementById('noise').value;
  alert(c_about);
  //return;

  var c_phone = $("#cphone").val();

  var c_website = $("#cwebsite").val();
  
  var cfb = $("#cfb").val();

  var ctwt = $("#ctwt").val();

  var clnk = $("#clnk").val();

  $.ajax({
          url: "<?php echo $this->config->item('base_url');?>/Employer/updateCompany",
          type: "POST",
          data: {
            cname: cname,
            cemail: cemail,
            c_phone: c_phone,
            c_website: c_website,
            c_address: c_address,
            cat: cat,
            c_about: c_about,
            cfb: cfb,
            ctwt: ctwt,
            clnk: clnk,
            user_id: user_id
          },
          success: function(data)
          {
            if(data == "0")
            {
              alert('record updated');
            }
            else
            {
              alert('record updated123!!');
            }
          }
  });
}

function myLocation()
{
  var value = $('#exampleFormControlSelect19 option:selected').text();
  if(value == 'Others *')
  {
    //alert('success');
    //$("div#div_hidden:visible");
    document.getElementById("div_hidden").style.visibility = "visible";

  }
}
</script>


<!-- Import Trumbowyg -->
<script src="<?= base_url('/assets/js/jquery-3.3.1.js') ?>"></script>

<script src="<?= base_url('/assets/admin/vendors/trumbowyg/dist/trumbowyg.min.js');?>"></script>


<script>
    $('.editor').trumbowyg();
</script>