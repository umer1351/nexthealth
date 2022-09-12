<div id="myCarousel" class="carousel slide myCarouselDesktop" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                    $slider_count = $this->web_model->get_slider_count();
                   for ($i=0; $i <  $slider_count; $i++) { 
                       
                ?>
               <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $i; ?>" class="active" aria-current="true" aria-label="Slide <?php echo $i+1; ?>"></button>

                <?php } ?>
               
            </div>
            <div class="carousel-inner">
                <?php
                    $slider_posts = $this->web_model->get_all_slider_post();
                    foreach ($slider_posts as $slider_post) {
                        ?>
                   <div class="carousel-item active">
                      <a href="<?php echo $slider_post->slider_link ?>"><img src="<?php echo base_url() ?>uploads/<?php echo $slider_post->slider_image ?>" alt=""/></a>
                   </div>
               <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
         </div>

         <div id="myCarouselMobile" class="carousel slide myCarouselMobile" data-bs-ride="carousel">
            <div class="carousel-indicators">
               <button type="button" data-bs-target="#myCarouselMobile" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
               <button type="button" data-bs-target="#myCarouselMobile" data-bs-slide-to="1" aria-label="Slide 2"></button>
               <button type="button" data-bs-target="#myCarouselMobile" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="../assets/images/27sgindropmob.png">
               </div>
               <div class="carousel-item">
                  <img src="../assets/images/29buzzing-mobile.png">
               </div>
               <div class="carousel-item">
                  <img src="../assets/images/15kellogs-Mobile.jpg">
               </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarouselMobile" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarouselMobile" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
         </div>

<div class="header_bottom">
    <!-- <div class="header_bottom_left">
        <?php
        $popular_posts = $this->web_model->get_all_popular_posts();

        $popular_posts_chunk = array_chunk($popular_posts, 2);
        foreach ($popular_posts_chunk as $single_popular_chunk) {
            ?>
            <div class="section group">
                <?php foreach($single_popular_chunk as $single_popular){?>
                <div class="listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                        <a href="<?php echo base_url('single/'.$single_popular->product_id);?>"> <img src="<?php echo base_url() ?>uploads/<?php echo $single_popular->product_image?>" alt="" /></a>
                    </div>
                    <div class="text list_2_of_1">
                        <h2><?php echo word_limiter($single_popular->product_title,2) ?></h2>
                        <p><?php echo word_limiter($single_popular->product_short_description, 5) ?></p>
                        <div class="button"><span><a href="<?php echo base_url('single/'.$single_popular->product_id);?>">Add to cart</a></span></div>
                    </div>
                </div>
                <?php }?>
            </div>
        <?php } ?>
        <div class="clear"></div>
    </div> -->
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->
        <!-- <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <?php
                    $slider_posts = $this->web_model->get_all_slider_post();
                    foreach ($slider_posts as $slider_post) {
                        ?>
                        <li><a href="<?php echo $slider_post->slider_link ?>"><img src="<?php echo base_url() ?>uploads/<?php echo $slider_post->slider_image ?>" alt=""/></a></li>
                    <?php } ?>
                </ul>
            </div>
        </section> -->
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>	