<!-- Breadcrumb -->
<div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Latest Article</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Blog List</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-form">
              <!-- <form action="#">
                <input type="text" placeholder="Search blog post">
                <button><i data-feather="search"></i></button>
              </form> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End --> 

    <div class="alice-bg section-padding-bottom">
      <div class="container">
        <div class="row">
        <div class="job-view-controller">
                    
                    <div class="job-view-filter">
                      <select class="selectpicker" id="sortJob" onchange="myBlogSort()" >
                        <option value="recent" selected disabled>All Blogs</option>

                        <?php if($sort == "Job Seekers"): ?>
                          <option value="Job Seekers" selected>Job Seekers</option>
                        <?php else: ?>
                          <option value="Job Seekers">Job Seekers</option>
                        <?php endif; if($sort == "Recruiters"): ?>
                          <option value="Recruiters" selected>Recruiters</option>
                        <?php else: ?>
                          <option value="Recruiters">Recruiters</option>
                        <?php endif; ?>
                      </select>
                    </div>
                  </div>
          <div class="col">
            <div class="blog-post-wrapper">
              <div class="row">
                <?php $temp = $blogs_count[0]['blogs_count'];
                      if($temp > 9)
                      {
                        $temp = 9;
                      }
                  for($i=0;$i<$temp;$i++): ?>
                  <div class="col-md-6 col-lg-4">
                    <article class="blog-grid" >
                    <?php if(!$blogs[$i]['featured_image'] == ""): ?>
                      <div class="thumb">
                        <img src="<?= site_url("upload/featured_images/".$blogs[$i]['featured_image']) ?>" class="img-fluid" alt="">
                      </div>
                    <?php endif; ?>
                      <div class="body">
                        <span class="date"><?= date('d', strtotime($blogs[$i]['date_posted'])) ?> <span><?= date('M', strtotime($blogs[$i]['date_posted'])) ?></span></span>
                        <h3><a href="<?= site_url("blog-post?key=".$blogs[$i]['blog_id']."&blog=".$blogs[$i]['blog_title']) ?>"><?= $blogs[$i]['blog_title'] ?></a></h3>
                        <!-- <p>Combined with a handful of model sentence structures, to generate lorem Ipsum which</p> -->
                        <?= substr(strip_tags($blogs[$i]['blog_body']),0,85)." ..."; ?>
                      </div>
                      <div class="info">
                        <span class="author"><a href="#"><img src="<?= site_url('assets/images/font/tags.png') ?>"  height="15px" width="15px" > <?= $blogs[$i]['blog_category_name'] ?></a></span>
                        <!-- <span class="comments"><a href="#"><i data-feather="message-circle"></i>42</a></span> -->
                      </div>
                    </article>
                  </div>
                <?php endfor; ?>
                
              </div>
              <div class="row">
                <div class="col">
                  <div id="divReplace0" >
                    <input type="hidden" id="limit" value="0" >
                    <input type="hidden" id="start" value="<?= $blogs_count[0]['blogs_count'] ?>" >
                    <?php if($blogs_count[0]['blogs_count'] > 9): ?>
                      <div class="pagination-list text-center"></br></br>
                        <button class="btn btn-primary btn-block"  style="height: 30px;font-size: 14px;" onclick="loadMore(0,<?= $blogs_count[0]['blogs_count'] ?>)">Load More</button>             
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<script>

function myBlogSort()
{
  var sort = $("#sortJob").val();

  //window.location="http://localhost/recruitergoa/blogs?sort="+sort;
  window.location="http://britsolapps.in/recruitergoa/blogs?sort="+sort;

  alert(sort);
}
</script>