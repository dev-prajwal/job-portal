<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin | <?php print_r($page_name)?></title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<?php include_once 'sections/include-css.php' ;?>
    <link rel="stylesheet" href="<?= base_url('/assets/admin/vendors/trumbowyg/dist/ui/trumbowyg.min.css');?>" type="text/css">
</head>
<?php include_once 'sections/preloader.php' ;?>
<!-- HK Wrapper -->
<div class="hk-wrapper hk-vertical-nav hk-icon-nav">
	<?php include_once 'sections/topnav.php' ;?>
	
<!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#"><?php print_r($section)?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php print_r($page_name)?></li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span><?php print_r($page_name);?></h4>
                </div>
                <!-- /Title -->
                <div class="row">
                    <div class="col-xl-9 col-lg-9">
                        <section class="hk-sec-wrapper">
                            <form method="POST" action="<?= base_url('/admin/save_blog'); ?>">
                            <input type="hidden"  type="text" name="blog_id" value="<?php if(isset($blog->blog_id)){ echo $blog->blog_id;}?>">                            
                            <input class="form-control hk-sec-title"   placeholder="Blog Title" type="text" name="blog_title" value="<?php if(isset($blog->blog_title)){ echo $blog->blog_title;}?>">
                            <input class="form-control hk-sec-title"   placeholder="Blog Author" type="text" name="blog_by" value="<?php if(isset($blog->blog_by)){ echo $blog->blog_by;}?>">
                            <select class="form-control hk-sec-title" name="blog_category" required>
                                <option value="0" selected disabled >Blog Category</option>
                                <?php for($i=0;$i<count($blog_category);$i++):
                                    if(isset($blog->blog_category_id) and ($blog->blog_category_id==$blog_category[$i]['blog_category_id']) ): ?>
                                    <option value="<?= $blog->blog_category_id ?>" selected><?= $blog_category[$i]['blog_category_name'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $blog_category[$i]['blog_category_id'] ?>"><?= $blog_category[$i]['blog_category_name'] ?></option>
                                <?php endif; endfor; ?>
                            </select>
                            <textarea name="blog_body_draft" class="editor hk-sec-title"><?php if(isset($blog->blog_body_draft)){ echo stripcslashes($blog->blog_body_draft);}?></textarea>
                        </section>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <section class="hk-sec-wrapper">
                                <button class="btn btn-az-primary pd-x-30 mg-r-5" name="btn"  value="draft">Draft</button>
                                <button class="btn btn-az-primary pd-x-30 mg-r-5" name="btn"  value="publish">Publish</button>
                                <button class="btn btn-dark pd-x-30" name="btn"  value="delete">Delete</button>
                                <button class="btn btn-dark pd-x-30" name="btn"  value="preview">Preview</button>
                            </form>
                        </section>
                        <section class="hk-sec-wrapper">
                        <img src="<?php if(isset($blog->featured_image)){ echo base_url('/upload/featured_images/').$blog->featured_image;}?>" alt="" width="100px" height="100px">
                            <form method="POST" action="<?= base_url('/admin/save_featured_image');?>" enctype="multipart/form-data" >
                            <input type="hidden"  type="text" name="blog_id" value="<?php if(isset($blog->blog_id)){ echo $blog->blog_id;}?>">                            
                            <input type="file" name="featured_image" />
                            <button class="btn btn-dark pd-x-30" value="submit">Upload Featured Image</button>
                            </form>
                        </section>

                    </div>
                </div>
            </div>
            <!-- /Container -->
		<?php include_once 'sections/footer.php' ;?>
        </div>
        <!-- /Main Content -->
</div>
    <!-- /HK Wrapper -->
	<?php include_once 'sections/include-jquery.php' ;?>
   	<!-- Import jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Import Trumbowyg -->
    <script src="<?= base_url('/assets/admin/vendors/trumbowyg/dist/trumbowyg.min.js');?>"></script>
    <script>
        $('.editor').trumbowyg();
    </script>
</body> 