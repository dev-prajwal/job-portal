<link rel="stylesheet" href="<?= base_url('/assets/admin/vendors/trumbowyg/dist/ui/trumbowyg.min.css');?>" type="text/css">

<style>

.filter-option-inner-inner {
    font-size: 14px !important;
    content: "Keywords" !important;
}

.bootstrap-select .dropdown-menu li a {
   
    font-size: 14px;
}

</style>
<script>

$("div.filter-option-inner-inner").replaceWith("Keywords *");

</script>

    
    <!-- Breadcrumb -->
    <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Post A Job</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Job Post</li>
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
            <div class="post-container">
              <div class="post-content-wrapper">

                <form action="<?php echo site_url('Jobs/updateJobPost');?>"  class="job-post-form" method="POST" >
                
                  <div class="basic-info-input">
                    <h4><i data-feather="plus-circle"></i>Edit Job Post</h4>
                    <div id="job-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Job Title</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Your job title here" value="<?= $job_post[0]['job_title'] ?>" name="j_title" required>
                      </div>
                    </div>
                    <div id="job-summery" class="row">
                      <label class="col-md-3 col-form-label">Job Summery</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                            <select class="form-control" id='category' name="category" required>
                              <?php if(isset($job_category)): ?>
                                  <!-- <option value="" disabled selected>Select Job Category </option> -->
                                  <?php for($i = 0; $i < count($job_category); $i++): 
                                          if($job_category[$i]['name'] == $job_post[0]['job_category']):  ?>
                                          <option value="<?= $job_category[$i]['id'] ?>" selected><?= $job_category[$i]['name'] ?></option>
                                  <?php else: ?>
                                  <option value="<?= $job_category[$i]['id'] ?>"><?= $job_category[$i]['name'] ?></option>
                                <?php endif; endfor; endif; ?>
                            </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <select class="form-control" id='sub_category' name="sub_category" required>
                              <?php if(isset($job_sub_category)): ?>
                                  <!-- <option value="" disabled selected>Select Job Category </option> -->
                                  <?php for($i = 0; $i < count($job_sub_category); $i++): 
                                          if($job_sub_category[$i]['job_sub_category_id'] == $job_post[0]['job_sub_category_id']):  ?>
                                          <option value="<?= $job_sub_category[$i]['job_sub_category_id'] ?>" selected><?= $job_sub_category[$i]['job_sub_category_name'] ?></option>
                                  <?php else: ?>
                                  <option value="<?= $job_sub_category[$i]['job_sub_category_id'] ?>"><?= $job_sub_category[$i]['job_sub_category_name'] ?></option>
                                <?php endif; endfor; endif; ?>
                            </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" id='j_location' name="j_location" required>
                                <?php if(isset($company_location)): ?>
                                    <option value="" disabled selected>Job Location </option>
                                    <?php for($i = 0; $i < count($company_location); $i++):
                                            if($company_location[$i]['taluka_id'] == $job_post[0]['job_location']):  ?>
                                    <option value="<?= $company_location[$i]['taluka_id'] ?>" selected><?= $company_location[$i]['taluka_name'] ?></option>
                                    <?php else: ?>
                                    <option value="<?= $company_location[$i]['taluka_id'] ?>"><?= $company_location[$i]['taluka_name'] ?></option>
                                    <?php endif; endfor; endif; ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" id='job_type' name="job_type" required>
                              <?php if(isset($job_type)): ?>
                                  <option value="" disabled selected>Select Job Type * </option>
                                  <?php for($i = 0; $i < count($job_type); $i++): 
                                          if($job_type[$i]['job_post_type_id'] == $job_post[0]['job_type']):  ?>
                                  <option value="<?= $job_type[$i]['job_post_type_id'] ?>" selected><?= $job_type[$i]['job_post_type'] ?></option>
                                  <?php else: ?>
                                  <option value="<?= $job_type[$i]['job_post_type_id'] ?>" ><?= $job_type[$i]['job_post_type'] ?></option>
                              <?php endif; endfor; endif; ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <select class="form-control" id='job_experience' name="job_experience" >
                              <?php if(isset($job_experience)): ?>
                                  <option value="" disabled selected>Experience (Optional) </option>
                                  <?php for($i = 0; $i < count($job_experience); $i++):
                                          if($job_experience[$i]['id'] == $job_post[0]['job_experience']): ?>
                                          <option value="<?= $job_experience[$i]['id'] ?>" selected><?= $job_experience[$i]['name'] ?></option>
                                  <?php else: ?>
                                  <option value="<?= $job_experience[$i]['id'] ?>"><?= $job_experience[$i]['name'] ?></option>
                              <?php endif; endfor; endif; ?>
                            </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" id='job_qualification' name="job_qualification" >
                                <?php if(isset($job_qualification)): ?>
                                    <option value="" disabled selected>Qualification (Optional) </option>
                                    <?php for($i = 0; $i < count($job_qualification); $i++):
                                            if($job_qualification[$i]['id'] == $job_post[0]['job_qualification']): ?>
                                    <option value="<?= $job_qualification[$i]['id'] ?>" selected><?= $job_qualification[$i]['name'] ?></option>
                                    <?php else: ?>
                                    <option value="<?= $job_qualification[$i]['id'] ?>"><?= $job_qualification[$i]['name'] ?></option>
                                <?php endif; endfor; endif; ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          
                          <!-- <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" class="form-control">
                            </div>
                          </div> -->
                          <!-- <div class="col-md-6">
                            <div class="form-group datepicker">
                              <input type="date" class="form-control" >
                            </div>
                          </div> -->
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="number" class="form-control" placeholder="No. of vacancy (Optional)" name="no_vacancy" value="<?= $job_post[0]['no_of_vacancy'] ?>" >
                            </div> 
                          </div>
                          
                          <div class="col-md-6">
                          
                          <div class="form-group">
                              <select class="form-control" id='job_salary_range' name="job_salary_range" >
                                <?php if(isset($salary_range)):
                                        if($job_post[0]['salary_range'] == ""): ?>
                                    <option value="" disabled selected>Salary Range (Optional) </option>
                                <?php endif; for($i = 0; $i < count($salary_range); $i++):
                                        if($job_post[0]['salary_range'] == $salary_range[$i]['id']): ?>
                                    <option value="<?= $salary_range[$i]['id'] ?>" selected><?= $salary_range[$i]['salary_range'] ?></option>
                                <?php else: ?>
                                <option value="<?= $salary_range[$i]['id'] ?>" ><?= $salary_range[$i]['salary_range'] ?></option>
                                <?php endif; endfor; endif; ?>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <div id="job-keywords" class="form-group row">
                      <label class="col-md-3 col-form-label">Keywords *</label>
                      <div class="col-md-9">
                      <div class="form-group">
                              <select id="multipleSelect1" class="selectpicker show-menu-arrow form-control" name="keywords[]" multiple >
                                <?php if(isset($job_keywords)): ?>
                                      <!-- <option value="" disabled selected>Select Location </option> -->
                                      <?php for($i = 0; $i < count($job_keywords); $i++): ?>
                                      <!-- <option value="<?= $job_keywords[$i]['name'] ?>"><?= $job_keywords[$i]['name'] ?></option> -->
                                <?php endfor; endif; ?>
                              <!--</select> 
                              
                            </div>
                      </div>
                    </div> -->
                    <div id="job-description" class="row">
                      <label class="col-md-3 col-form-label">Job Description</label>
                      <div class="col-md-9">
                        <!-- <textarea rows="3" id="mytextarea" class="tinymce-editor tinymce-editor-1" placeholder="Description text here"></textarea> -->
                        <div class="form-group">
                              <textarea class="editor hk-sec-title" id="noise" name="noise" value="<?= $job_post[0]['job_description'] ?>"></textarea>
                        </div>
                      </div>
                    </div>
                    
                    
                    <div id="post-location" class="form-group row">
                      <label class="col-md-3 col-form-label">Terms & Conditions</label>
                      

                      <input type="hidden" name="h_keywords" value="<?= $job_post[0]['keywords'] ?>" >
                      <input type="hidden" name="job_id" value="<?= $job_post[0]['job_id'] ?>" >
                    </div>
                    
                    <div class="row">
                      <div class="col-md-9 offset-md-3">
                        <div class="form-group terms">
                          <input class="custom-radio" type="checkbox" id="radio-4" name="termsandcondition" required>
                          <label for="radio-4">
                            <span class="dot"></span> I accepts <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"></label>
                      <div class="col-md-9">
                        <button class="button">Post Your Job</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="post-sidebar">
                <h5><i data-feather="arrow-down-circle"></i>Navigation</h5>
                <ul class="sidebar-menu">
                  <li><a href="#job-title">Job Title</a></li>
                  <li><a href="#job-summery">Job Summary</a></li>
                  <li><a href="#job-keywords">Keywords</a></li>
                  <li><a href="#job-description">Job Description</a></li>
                  <!-- <li><a href="#app-deadline">Application Deadline</a></li> -->
                  <!-- <li><a href="#response">Responsibilities</a></li>
                  <li><a href="#education">Education</a></li> -->
                  <li><a href="#others">Terms & Conditions</a></li>
                  <!-- <li><a href="#post-location">About Company</a></li> -->
                  <!-- <li><a href="#package">Select Package</a></li> -->
                </ul>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<script>
// function myLocation()
// {
//   var value = $('#exampleFormControlSelect19 option:selected').text();
//   if(value == 'Others *')
//   {
//     //alert('success');
//     //$("div#div_hidden:visible");
//     document.getElementById("div_hidden").style.visibility = "visible";

//   }
// }


</script>


<script type="text/javascript">
//document.multiselect('#testSelect1');

$(document).ready(function() {
  $('#multiselect').multiselect({
    buttonWidth : '160px',
    includeSelectAllOption : true,
		nonSelectedText: 'Select an Option'
  });
});

function getSelectedValues() {
  var selectedVal = $("#multiselect").val();
	for(var i=0; i<selectedVal.length; i++){
		function innerFunc(i) {
			setTimeout(function() {
				location.href = selectedVal[i];
			}, i*2000);
		}
		innerFunc(i);
	}
}



function SubCat()
{
  var category  = $("#category").val();
  //alert(category);

  $.ajax({
    url: "<?= site_url("Jobs/getSubCat") ?>",
    type: "POST",
    data: {category: category},
    dataType: 'json',
    beforeSend : function()
    {
      $('#err').css('display','block');
    },
    success: function(data)
    {
      // console.log(data);
      // console.log(data['sub_cat'].length);
      $("#sub_category").empty();
      $("#sub_category").append("<option value='' disabled selected>Select Job Sub Category</option>");

      for(var i = 0; i< data['sub_cat'].length; i++)
      {
        //console.log(data['sub_cat'][i]['job_sub_category_id']);
        var id = data['sub_cat'][i]['job_sub_category_id'];
        var name = data['sub_cat'][i]['job_sub_category_name'];

        $("#sub_category").append("<option value='"+id+"' >"+name+"</option>");
      }
    },
    complete : function()
    {
      $('#err').css('display','none');
    }
  });
}

</script>


<!-- Import Trumbowyg -->
<script src="<?= base_url('/assets/js/jquery-3.3.1.js') ?>"></script>

<script src="<?= base_url('/assets/admin/vendors/trumbowyg/dist/trumbowyg.min.js');?>"></script>

<script>
    $('.editor').trumbowyg();
</script>