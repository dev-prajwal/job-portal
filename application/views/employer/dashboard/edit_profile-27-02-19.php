<!-- Breadcrumb -->
    <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
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
                <form  class="dashboard-form" onsubmit="return cForm()">
                  <div class="dashboard-section upload-profile-photo">
                    <div class="update-photo">
                      <img class="image" src="<?php echo $this->config->item('base_url');?>/assets/dashboard/images/company-logo.png" alt="">
                    </div>
                    <div class="file-upload">            
                      <input type="file" class="file-input">Change Avatar
                    </div>
                  </div>
                  <div class="dashboard-section basic-info-input">
                    <h4><i data-feather="user-check"></i>Basic Info</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Company Name *</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Company Name" id="cname" required>
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
                        <input type="text" class="form-control" placeholder="Company Email address" id="cemail">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Website</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Company Website URL" id="cwebsite">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="+55 123 4563 4643" id="cphone">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Company Location *</label>
                      <div class="col-sm-9">
                        <!-- <input type="text" class="form-control" placeholder="Washington D.C" id="caddr" required> -->
                          <select class="form-control" id="exampleFormControlSelect19" onchange="myLocation()" required>
                                <?php if(isset($company_location)): ?>
                                <option value="" disabled selected>Select Location </option>
                                <?php for($i = 0; $i < count($company_location); $i++): ?>
                                <option value="<?= $company_location[$i]['taluka_name'] ?>"><?= $company_location[$i]['taluka_name'] ?></option>
                                <?php endfor; endif; ?>
                                <option value="<?= count($company_location)+1; ?>" >Others *</option>
                          </select>
                          
                      </div>
                    </div>
                    <div class="form-group row" style="visibility: hidden" id="div_hidden">
                      <label class="col-sm-3 col-form-label">Your Location</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="Company location" id="c_location2">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Category *</label>
                      <div class="col-sm-9">
                        <!-- <input type="text" class="form-control" placeholder="UI & UX Designer"> -->
                          <div class="form-group">
                            <!-- <textarea class="form-control" placeholder="Message"></textarea> -->
                              <select class="form-control" id="exampleFormControlSelect11" required>
                                <?php if(isset($company_category)): ?>
                                <option value="" disabled selected>Select Category </option>
                                <?php for($i = 0; $i < count($company_category); $i++): ?>
                                <option value="<?= $company_category[$i]['company_type'] ?>"><?= $company_category[$i]['company_type'] ?></option>
                                <?php endfor; endif; ?>
                              </select>
                              
                          </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">About Us</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" placeholder="Min 25 characters" id="cabout" required></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="dashboard-section media-inputs">
                    <h4><i data-feather="image"></i>Photo &amp; Video</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Intro Video</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Link</div>
                          </div>
                          <input type="text" class="form-control" placeholder="https://www.youtube.com/watch?v=ZRkdyjJ_489M">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gallery</label>
                      <div class="col-sm-9">
                        <div class="input-group image-upload-input">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Image</div>
                          </div>
                          <div class="active">
                            <div class="upload-images">
                              <div class="pic">
                                <span class="ti-plus"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <div class="dashboard-section social-inputs">
                    <h4><i data-feather="cast"></i>Social Networks</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Social Links</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-facebook-f"></i></div>
                          </div>
                          <input type="text" class="form-control" placeholder="facebook.com/username" id="cfb">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-twitter"></i></div>
                          </div>
                          <input type="text" class="form-control" placeholder="twitter.com/username" id="ctwt">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-google-plus"></i></div>
                          </div>
                          <input type="text" class="form-control" placeholder="linkedin.com/username" id="clnk">
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <div class="input-group add-new">
                          <div class="input-group-prepend">
                            <div class="input-group-text dropdown-label">
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>Select</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select><i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" placeholder="Input Profile Link">
                        </div>
                      </div>
                    </div> -->
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <button class="button" onclick="cDetails()">Save Change</button>
                        <!-- <input type="submit" value="Save Changes" onclick="cDetails()"> -->
                      </div>
                  </div>
                  <!-- </form> -->
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
                </form>
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

  var c_about = $("#cabout").val();

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
              alert('something went wrong');
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