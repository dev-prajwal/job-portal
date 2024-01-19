var show = false;
var company_website = document.location.host

//var company_website = "britsol.in"

var url = "http://britsolapps.in/recruitergoa/Api/getjobs?+company_website=" + company_website;
//var url = "http://localhost/recruitergoa/Api/getjobs?+company_website=" + company_website;

var jobs = [];
var current_job = 0, current_job1 = 1;

console.log(company_website);

function next() {
    current_job = current_job + 1;
    if (current_job > jobs.length - 1) {
        current_job = jobs.length - 1;
    }
    update(current_job)
}

function prev() {
    current_job = current_job - 1;
    if (current_job < 0) {
        current_job = 0
    }
    update(current_job)
}

function update(current_job) {
    $("#pl-title1").text(jobs[current_job].job_title);
    $("#pl-place1").text(jobs[current_job].job_location+" - "+jobs[current_job].job_type);
    $("#pl-type1").text(jobs[current_job].job_type);
    $("#pl-posted1").text("Posted On: "+jobs[current_job].date_posted);
    
    var link1=document.getElementById("href1");
    link1.innerHTML="More Info";
    link1.setAttribute('href',"http://britsolapps.in/recruitergoa/dream-job?id="+jobs[current_job].job_id+"&name="+jobs[current_job].job_title);

    console.log(jobs[current_job].job_title)
    console.log("http://britsolapps.in/recruitergoa/dream-job?id="+jobs[current_job].job_id+"&name="+jobs[current_job].job_title)

    $("#pl-title2").text(jobs[1].job_title);
    $("#pl-place2").text(jobs[1].job_location+" - "+jobs[1].job_type);
    $("#pl-type2").text(jobs[1].job_type);
    $("#pl-posted2").text("Posted On: "+jobs[1].date_posted);
    var link2=document.getElementById("href2");
    link2.innerHTML="More Info";
    link2.setAttribute('href',"http://britsolapps.in/recruitergoa/dream-job?id="+jobs[1].job_id+"&name="+jobs[1].job_title);

    console.log(jobs[1].job_title)

    var link3=document.getElementById("hrefall");
    link3.innerHTML="Show All";
    link3.setAttribute('href',"http://britsolapps.in/recruitergoa/company-section?key="+jobs[1].company_id+"&company="+jobs[1].company_name);
}

$(document).ready(function() {
    function reply_click(clicked_id) {
        if (clicked_id == '-1') {
            current_job = current_job - 1;
            if (current_job < 0) {
                current_job = 0
            }
            update(current_job)
        } else if (clicked_id == '+1') {
            if (clicked_id == '+1') {
                current_job = current_job + 1;
                if (current_job > jobs.length - 1) {
                    current_job = jobs.length - 1;
                }
                update(current_job)
            }
        } else {
            current_job = clicked_id - 1;
            update(current_job)
        }
    }

    $.get(url, function(data, status) {
        jobs = data.jobs;
        console.log(jobs);
        $(".pagination").append("<button id='-1' onclick='prev()' >&laquo;</button>&nbsp;&nbsp;");
        $(".pagination").append("&nbsp;&nbsp;<button id='+1' onclick='next()' >&raquo;</button>");
        update(0);
    });
    addPopup();


    function addPopup() {
        var body = document.getElementsByTagName('body');
        document.body.innerHTML += `
      
      <div class="job-widget" id="open-button">
        <b>Get job widget for your website</b>
        <p id="info">Post a job on recruiter goa and get it displayed website for FREE</p>
        <p id="see-more">for more details see here</p>
      </div>
      <div class="job-widget-popup" id="job-widget-popup">
        <center><b>Current Openings</b></center>
        <div class="openings">
            <div class="opening">
            <div class="opening-details">
                <div class="title" id="pl-title1">Senior Marketing Required</div><span class="place-type-package" id="pl-place1">Panjim fulltime - Rs 1.90 LPA</span><span class="date-posted" id="pl-posted1">Posted on 01 Jan 2019</span>
            </div>
            <div class="show-more-info"><a id="href1" href="">More Info</a></div>
            </div>
            <div class="opening">
            <div class="opening-details">
                <div class="title" id="pl-title2">Senior Marketing Required</div><span class="place-type-package" id="pl-place2">Panjim fulltime - Rs 1.90 LPA</span><span class="date-posted" id="pl-posted2">Posted on 01 Jan 2019</span>
            </div>
            <div class="show-more-info"><a id="href2" href="#">More Info        </a></div>
            </div>
            <div class="show-all-openings"> <a id="hrefall" href="">Show All</a></div>
            <div class="powered-by"> 
            <p>Powered by Recruiter Goa(Beta)</p>
            </div>
        </div>
     </div>
  `;
    }

    function openForm() {
        if (!show) {
            document.getElementById("job-widget-popup").style.display = "block";
            show = true;
        } else {
            document.getElementById("job-widget-popup").style.display = "none";
            show = false;
        }
    }


    document.getElementById("open-button").addEventListener("click", function() {
        openForm();
    });

});