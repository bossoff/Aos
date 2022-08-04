<!-- banner -->
	<?php
        $slider_Query = mysqli_query($connect, "SELECT * FROM slider");
    if(!empty($slider_Query)){
        $fetch_slider = mysqli_fetch_assoc($slider_Query);

        $title1 = $fetch_slider['title1'];
        $decription1 = $fetch_slider['description1'];
        $image1 = $fetch_slider['image1'];

        $title2 = $fetch_slider['title2'];
        $decription2 = $fetch_slider['description2'];
        $image2 = $fetch_slider['image2'];

        $title3 = $fetch_slider['title3'];
        $decription3 = $fetch_slider['description3'];
        $image3 = $fetch_slider['image3'];
    }
    ?>
    <div class="banner">
		<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">

            <!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- First-Slide -->
                <div class="item active">
                            <img src="<?= $image1; ?>" class="img-responsive" alt="Image-2">

                    
                    <div class="carousel-caption kb_caption">
                        <h3 data-animation="animated flipInX"><?= $title1;?></h3>
                        <h4 data-animation="animated flipInX"><?= $decription1 ;?></h4>
                    </div>
                </div>

                <!-- Second-Slide -->
                <div class="item">
                            <img src="<?= $image2; ?>" class="img-responsive" alt="Image-2">

                    
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h3 data-animation="animated flipInX"><?= $title2;?></</h3>
                        <h4 data-animation="animated flipInX"><?= $decription2 ;?></h4>
                    </div>
                </div>

                <!-- Third-Slide -->
                <div class="item">
                            <img src="<?= $image3; ?>" class="img-responsive" alt="Image-2">
                    
                    
                    <div class="carousel-caption kb_caption kb_caption_center">
                        <h3 data-animation="animated flipInX"><?= $title3 ;?></</h3>
                        <h4 data-animation="animated flipInX"><?= $decription3 ;?></h4>
                    </div>
                </div>

            </div>
			
            <!-- Left-Button -->
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right-Button -->
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
			
        </div>
		<script src="<?= base_url('assets/fronted/js/custom.js');?>"></script>
	</div>
<!--banner-->