<div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="blog-post-details-container">
              <div class="blog-details-wrapper">
                <div class="info">
                  <span class="date"><?= date("jS M, Y", strtotime($blog[0]['date_posted'])); ?></span>
                  <span class="author"><i data-feather="user"></i><?= $blog[0]['blog_by'] ?></span>
                  <!-- <span class="comments"><i data-feather="message-circle"></i>42</span> -->
                </div>
                <div class="post-content">
                  <h2><?= $blog[0]['blog_title'] ?></h2>
                  <div class="images">
                    <div class="image">
                      <?php if($blog[0]['featured_image'] == ""): ?>
                        <img src="<?php echo $this->config->item('base_url');?>/assets/images/blog/post-thumb-2.jpg" class="img-fluid" alt="">
                      <?php else: ?>
                        <img src="<?= site_url("upload/featured_images/".$blog[0]['featured_image']) ?>" class="img-fluid" alt="">
                      <?php endif; ?>
                    </div>
                  </div>
                  <?= $blog[0]['blog_body'] ?>
                </div>
              </div>
              <div class="post-meta">
                <div class="post-author">
                
                  <div class="avatar">
                    <img src="<?php echo $this->config->item('base_url');?>/assets/images/blog/user.png" class="img-fluid" alt="">
                  </div>
                  <div class="name">
                    <p>Post By</p>
                    <h5><?= $blog[0]['blog_by'] ?></h5>
                  </div>
                </div>
                <div class="post-tag">
                  <h6>Post Tag</h6>
                  <div class="tags">
                    <a href="#"><?= $blog[0]['blog_category_name'] ?></a>
                  </div>
                </div>
                <div class="post-share">
                  <h6>Post Share</h6>
                  <div class="social-buttons">
                    <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                      <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                      <a class="a2a_button_linkedin"></a>
                      <a class="a2a_button_facebook"></a>
                      <a class="a2a_button_twitter"></a>
                      <a class="a2a_button_whatsapp"></a>
                      <a class="a2a_button_email"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->
                  </div>
                </div>
              </div>
              <!-- comment block -->
            </div>
          </div>
        </div>
      </div>
    </div>