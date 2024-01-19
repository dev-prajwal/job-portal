var show = false;
var url = "http://localhost/recruitergoa/api/getjobs/1";
var jobs = [];
var current_job = 0;

function update(current_job){
  $("#pl-title").text(jobs[current_job].job_title);
  $("#pl-place").text(jobs[current_job].job_location);
  $("#pl-salary").text(jobs[current_job].job_type);
}

function reply_click(clicked_id){
  if(clicked_id=='-1'){
    current_job = current_job - 1;
    if(current_job < 0){
      current_job = 0
    }
    update(current_job)
  }
  else if(clicked_id=='+1'){
    if(clicked_id=='+1'){
    current_job = current_job + 1;
    if(current_job > jobs.length-1){
      current_job = jobs.length - 1; 
    }
    update(current_job)
  }
  }
  else{
    current_job = clicked_id - 1;
    update(current_job)
  }  
}

$(document).ready(function(){
  addPopup();
    $.get(url, function(data, status){
      jobs = data.jobs;
      $(".pagination").append("<a id='-1' onClick='reply_click(this.id)' href='#'>&laquo;</a>");
      $.each(data.jobs, function (index, value) {
        c = parseInt(index, 10) + 1;
        if(index == current_job){ 
          $(".pagination").append("<a id='"+c+"' onClick='reply_click(this.id)' class='active'  href='#'>"+ c +"</a>");
        }
        else{
          $(".pagination").append("<a id='"+c+"' onClick='reply_click(this.id)' href='#'>"+ c +"</a>");
        }
      });
      $(".pagination").append("<a id='+1' onClick='reply_click(this.id)' href='#'>&raquo;</a>");
      update(current_job);
    });

});

function addPopup(){
  var body = document.getElementsByTagName('body');
  document.body.innerHTML +=`
  <button class="open-button" onclick="openForm()">Open Form</button>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h3>Login</h3>    
    <div class="card">
      <div class="card-container">
        <h4 id="pl-title"><b>Title</b></h4> 
        <p id="pl-place">Place</p> 
        <p id="pl-salary">Salary</p> 
        <a href="default.asp" target="_blank">This is a link</a>
      </div>
    </div>       
    <div class="pagination">
    </div>
  </form>
</div>
  
  `;
  }

function openForm() {
  if(!show){
  document.getElementById("myForm").style.display = "block";
  show = true;
  }
  else{
  document.getElementById("myForm").style.display = "none";
  show = false;
  } 
}