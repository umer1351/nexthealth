<!-- Start: Product detail section -->





<!-- <div class="carouselTopBanner mb-4">    
   <a href="<?php echo base_url() ?>special-discount"><img class="img-fluid" src="<?php echo base_url('uploads/sliderTopBanner.jpg') ;?>"></a>
</div> -->
<div id="carouselExampleIndicators" class="carousel slide myCarouselDesktop" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        
        $slider_count = $this->web_model->get_slider_count();
        for ($i=0; $i <  $slider_count; $i++) { 
               
        ?>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i; ?>" class="active" aria-current="true" aria-label="Slide <?php echo $i+1; ?>">
        </button>

        <?php } ?>
       
    </div>
    <div class="carousel-inner">
        <!-- <?php
            $slider_posts = $this->web_model->get_all_slider_post();
            foreach ($slider_posts as $slider_post) {
                ?>
            <div class="carousel-item active">
              <a href="<?php echo $slider_post->slider_link ?>">
                <img src="<?php echo base_url() ?>uploads/<?php echo $slider_post->slider_image ?>" alt=""/>
                </a>
            </div>
       <?php } ?> -->
       <div class="carousel-item active">
            <a href="https://nexthealth.pk/generic-medicines">
              <img src="https://nexthealth.pk/uploads/uplo.jpg">
            </a>
       </div>
       <div class="carousel-item ">
            <a href="https://nexthealth.pk/search?search=prism">
              <img src="https://nexthealth.pk/uploads/prisms.jpg">
            </a>
       </div>
       <!-- <div class="carousel-item">
            <a href="#">
                <img src="https://nexthealth.pk/uploads/2.png">
            </a>
       </div> -->
       <div class="carousel-item">
            <a href="https://nexthealth.pk/search?search=no+bite">
                <img src="https://nexthealth.pk/uploads/3.png">
            </a>
       </div>
       <div class="carousel-item">
            <a href="https://nexthealth.pk/products/Supplements">
                <img src="https://nexthealth.pk/uploads/Slider_Banner.jpg">
            </a>
       </div>
       <div class="carousel-item">
            <a href="https://nexthealth.pk/products/Health-and-Wellness">
                <img src="https://nexthealth.pk/uploads/Slider_Banner_1.jpg">
            </a>
       </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

         <div id="myCarouselMobile" class="carousel slide myCarouselMobile" data-bs-ride="carousel">
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
                      <a href="<?php echo $slider_post->slider_link ?>"><img src="<?php echo base_url() ?>uploads/<?php echo $slider_post->thumbnail ?>" alt=""/></a>
                    </div>
               <?php } ?>
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

<div class="container-fluid">

   <div class="row">

      <div class="col-md-12 ">

         

         <ul class="breadcrumb" style="background-color:white;padding:0">

            <li>

               <i class="bi bi-house-door" style="vertical-align: initial;"></i>

               <a href="<?php echo base_url(); ?>" style="text-decoration:underline">Home</a>

            </li>

            <?php if(isset($first_category->category_name)){ ?>

               <li>

               

               <a href="<?php echo base_url() ?>web/product/<?php  $cat_name =  str_replace(" ", "-", $first_category->category_name); echo  $cat_name; ?>" style="text-decoration:underline"><?php  print_r($first_category->category_name); ?></a>

            </li>

            <?php } if(isset($second_category->category_name)){ ?>

            <li>

               

               <a href="<?php echo base_url() ?>web/sub_products/<?php  $second_cat_name =  str_replace(" ", "-", $second_category->category_name); echo  $second_cat_name; ?>" style="text-decoration:underline"><?php  print_r($second_category->category_name); ?></a>

            </li>

            <?php } if(isset($third_category->name)){ ?>

            <li>

               

               <a href="" style="text-decoration:underline"><?php  print_r($third_category->name); ?></a>

            </li>

            <?php } ?>

               <li>

               <?php echo $get_single_product->product_title?>

            </li>

         </ul>

      </div>

   </div>

</div>
 <?php   if(($get_single_product->active != '0')){ ?>
<div class="container-fluid">

               

               <div class="card">

                

                  <div class="card-body">

                     <div class="tab_containers_wrap productDetailPage">

                        <div id="" class="tab_container">

                           <div class="row">

                              <div class="col-md-4">



                                 <div class="single_product single_product_image">

                                    <div class="container">

                                       <!-- Discount circle HTML -->

                                       <?php if(($get_single_product->discount_type != 0)){ ?>

                                           <div class="product-off-border product-off-simple">

                                             <div class="weight-bold px-5px"> 

                                             

                                              <?php echo $get_single_product->discount; ($get_single_product->discount_type == 1) ? ( $type = '%') : ( $type = 'Rs.'); echo $type;?> Off  

                                             </div>

                                          </div> 

                                       <?php } ?>

                                       <!-- Discount circle HTML -->

                                      <div class="show-zoom" href="<?php echo base_url('uploads/thumbs/' . $get_single_product->product_image) ?>">

                                       <?php if($get_single_product->product_image != '0'){ ?>

                                          <img id="show-img" src="<?php echo base_url('uploads/thumbs/' . $get_single_product->product_image) ?>" class="img-fluid" alt="test">

                                          <?php }else{ ?>

                                             <img id="show-img" src="<?php echo base_url('uploads/thumbs/placeholder.jpg') ;?>" class="img-fluid" alt="test">

                                          <?php } ?>

                                      </div>

                                      <div class="small-img">

                                        <img src="<?php echo base_url() ?>assets/web/images/online_icon_right@2x.png" class="icon-left" alt="" id="prev-img">

                                        <div class="small-container">

                                          <div id="small-img-roll">

                                             <?php if($get_single_product->product_image != 0){ ?>

                                            <img src="<?php echo base_url('uploads/thumbs/'.$get_single_product->product_image)?>" class="show-small-img" alt="">

                                             <?php } ?>

                                             <?php if($get_single_product->product_image2 != 0){ ?>

                                            <img src="<?php echo base_url('uploads/thumbs/'.$get_single_product->product_image2)?>" class="show-small-img" alt="">

                                             <?php } ?>

                                             <?php if($get_single_product->product_image3 != 0){ ?>

                                            <img src="<?php echo base_url('uploads/thumbs/'.$get_single_product->product_image3)?>" class="show-small-img" alt="">

                                             <?php } ?>

                                             <?php if($get_single_product->product_image4 != 0){ ?>

                                            <img src="<?php echo base_url('uploads/thumbs/'.$get_single_product->product_image4)?>" class="show-small-img" alt="">

                                         <?php } ?>

                                          </div>

                                        </div>

                                        <img src="<?php echo base_url() ?>assets/web/images/online_icon_right@2x.png" class="icon-right" alt="" id="next-img">

                                      </div>

                                    </div>

                                 </div>

                              </div>

                              <div class="col-md-8">

                                 <div class="single_product_description">

                                    <h1 class="offset_title">

                                       <a href="#"><?php echo $get_single_product->product_title?></a>

                                    </h1>

                                    <div class="description_section mt-5">

                                       <table class="product_info">

                                          <tbody>

                                             <tr>

                                                <td>Manufactured By:</td>

                                                <td><a href="<?php echo base_url() ?>web/brand/<?php  $cat_name =  str_replace(" ", "-", $get_single_product->brand_name); echo  $cat_name; ?>"><?php echo $get_single_product->brand_name?></a></td>

                                             </tr>

                                             <tr>

                                                <td>Marketed By:</td>

                                                <td><?php echo $get_single_product->brand_name?></td>

                                             </tr>

                                             <tr>

                                                <td>Availability:</td>

                                                <td>

                                                   <?php if(!empty($get_single_product->availability_msg)){ 



                                                      echo $get_single_product->availability_msg;



                                                   }else{ ?>

                                                         <?php if ($get_single_product->product_quantity == 0) { ?>

                                                            Out Of Stock.

                                                         <?php } else{ ?>

                                                            In Stock.

                                                      <?php } ?>

                                                   <?php } ?>   

                                               </td>

                                             </tr>

                                             <tr>

                                                <td>Delivery Time:</td>

                                                <td>

                                                   <?php if(!empty($get_single_product->delivery_time_msg)){ 



                                                     echo $get_single_product->delivery_time_msg;



                                                    }else{ ?>

                                                     

                                                      Within 24 to 72 hours after payment across Pakistan.

                                                   

                                                   <?php } ?>   

                                                </td>

                                             </tr>

                                          </tbody>

                                       </table>

                                    </div>

                                    <hr>

                                    <?php if ($get_single_product->product_quantity >= 1 || $get_single_product->always_in_stock == 1) { ?>

                                    <div class="description_section">

                                       <div class="table_wrap product_price_table">

                                          <table>

                                             <tbody>

                                                <tr class="price_class">

                                                   <td class="old_price ">

                                                      <?php if($get_single_product->discount_type != '0'){ ?> Old Price: <?php }else{?> MRP: <?php } ?>

                                                      <div  style=" <?php if($get_single_product->discount_type != '0'){ ?>  text-decoration-line: line-through;<?php } ?> color: #00569b;" class="price <?php if($get_single_product->discount_type != '0'){ ?> have-discount <?php }  ?> ">Rs. <?php echo $this->cart->format_number($get_single_product->product_price)?></div>

                                                   </td>

                                                   <!-- Disctounted Price -->

                                                   <?php if($get_single_product->discount_type != 0){ ?>

                                                      <td class="special_price discounted color-red">

                                                         Your Price:

                                                         <div class="price" style="color: red;">Rs. <?php echo $get_single_product->product_sale_price; ?></div>

                                                      </td>

                                                   <?php } ?>

                                                   <!-- Discounted Price  -->

                                                   <!-- <td class="save colorGreen">

                                                      You Save:

                                                      <div class="price">Rs. 1000.00</div>

                                                   </td> -->

                                                </tr>

                                             </tbody>

                                          </table>

                                       </div>

                                    </div>

                                    <?php } ?>

                                    <hr>

                                    <?php if($get_single_product->product_quantity == 0 && $get_single_product->always_in_stock == 1){ ?>



                                       <div class="row flex-wrap-justify-content mt-3">

                                          <div class="col-md-12 col-sm-12 col-xs-12 d-flex">

                                             

                                                <div class="description_section_2 v_centered">

                                                   <span class="title">Qty:</span>



                                                   <form action="<?php echo base_url('save/cart');?>" method="post">

                                                      <select  name="qty">

                                                         <option value="1">1</option>

                                                         <option value="2">2</option>

                                                         <option value="3">3</option>

                                                         <option value="4">4</option>

                                                         <option value="5">5</option>

                                                         <option value="6">6</option>

                                                         <option value="7">7</option>

                                                         <option value="8">8</option>

                                                         <option value="9">9</option>

                                                         <option value="10">10</option>

                                                      </select>

                                                      <!--  <input type="number" class="buyfield" name="qty" value="1" <?php if($get_single_product->purchase_qty_limit != 0){ ?>

                                                         max = <?php echo $get_single_product->purchase_qty_limit; ?>

                                                      <?php } ?>/> -->

                                                       <!-- Discounted Price For CART -->

                                                         

                                                         <?php if(!is_null($get_single_product->discount_type)){ ?>

                                                         <input type="hidden" class="buyfield" name="discounted_price" value="<?php echo $get_single_product->product_sale_price; ?>"/>

                                                         

                                                         <?php } ?>



                                                       <!-- Discounted Price For CART -->

                                                       <input type="hidden" class="buyfield" name="product_id" value="<?php echo $get_single_product->product_id?>"/>

                                                       <input type="submit" class="buysubmit button_blue middle_btn" name="submit" value="Add to Cart"/>

                                                   </form>

                                                   <!-- <button type="submit" class="button_blue middle_btn" ></button> -->

                                                </div>

                                          </div>

                                       </div>



                                    <?php }elseif ($get_single_product->product_quantity == 0 && $get_single_product->always_in_stock == 0) { 



                                       $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



                                       ?>

                                      <!-- <div class="row flex-wrap-justify-content mt-3">

                                       <div class="col-md-12">

                                          <a  id="wpbtn" class="buysubmit button_blue middle_btn" style="display: inline-block; text-decoration: unset;"

                                        target="_blank" 

                                        href="https://wa.me/923360006398?text=<?php echo $actual_link ?>"> Generate Demand

                                          </a>

                                       </div>

                                       </div> -->

                                    <?php }elseif ($get_single_product->product_quantity >= 1 ) { ?>

                                      

                                      <div class="row flex-wrap-justify-content mt-3">

                                          <div class="col-md-6 col-sm-6 col-xs-12 d-flex">

                                             

                                                <div class="description_section_2 v_centered">

                                                   



                                                   <form action="<?php echo base_url('save/cart');?>" method="post">

                                                      <span class="title">Qty:</span>

                                                       <select  name="qty">

                                                         <option value="1">1</option>

                                                         <option value="2">2</option>

                                                         <option value="3">3</option>

                                                         <option value="4">4</option>

                                                         <option value="5">5</option>

                                                         <option value="6">6</option>

                                                         <option value="7">7</option>

                                                         <option value="8">8</option>

                                                         <option value="9">9</option>



                                                         <option value="10">10</option>

                                                      </select>

                                                      <hr>



                                                       <!-- Discounted Price For CART -->

                                                       <?php if(!is_null($get_single_product->discount_type)){ ?>

                                                         <input type="hidden" class="buyfield" name="discounted_price" value="<?php echo $get_single_product->product_sale_price; ?>"/>

                                                         

                                                      <?php } ?>

                                                       <!-- Discounted Price For CART -->



                                                       <input type="hidden" class="buyfield" name="product_id" value="<?php echo $get_single_product->product_id?>"/>

                                                       <input type="submit" class="buysubmit button_blue middle_btn" name="submit" value="Add to Cart"/>

                                                   </form>

                                                   <!-- <button type="submit" class="button_blue middle_btn" ></button> -->

                                                </div>

                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 d-flex " >

                                             <fieldset>                                         

                                                    <?php if($get_single_product->prescription_required == '1'){ ?>     

                                                   <h2 class="delop"> <i class="bi bi-prescription"></i> Prescription Methods</h2>

                                                     

                                                   <li style="margin-bottom: 10px">

                                                   <i class="bi bi-user" style="font-size:25px;color:#27318b;"></i>                                            

                                                      <span class="des">Provide Valid Doctor Details</span>

                                                   </li>           

                                                <ul>

                                                      <li style="margin-bottom: 5px">

                                                         <i class="bi bi-exclamation-circle" style="font-size:20px;color:#27318b;"></i>

                                                         <span style="font-size: 14px;font-weight:bold;margin-left:7px;">Item requires Valid Prescription</span>

                                                      </li>

                                                      <li style="margin-bottom: 10px">

                                                         <i class="bi bi-whatsapp" style="font-size:20px;color:green;font-weight:bold;"></i>

                                                            <!--<span class="headdel">Credit Card Payment</span><br/>-->

                                                         <span class="des">WhatsApp Your Prescription

                                                         <br/><span class="whatapp_Right">0336-000-6398 (NEXT)</span></span>

                                                      </li>    

                                                      <li style="margin-bottom: 20px">

                                                         <i class="bi bi-envelope"></i>

                                                         <span class="des">Email Us At

                                                         <a href="mailto:rx@nexthealth.pk">rx@nexthealth.pk</a></span>

                                                      </li>                 

                                                      

                                                     <!--  <li style="margin-bottom: 10px">

                                                         <span class="storage_Icon paymentMethodIconsRight"></span>

                                                         <span class="des">Storage Condition</span>

                                                      </li>

                                                      <li style="margin-bottom: 10px">

                                                         <span class="storage_Icon paymentMethodIconsRight"></span>                                            

                                                         <span class="des">This product is Temperature</span> <br/><span class="whatapp_Right">Sensitive</span>

                                                      </li> -->

                                                  

                                                </ul>

                                             <?php } ?>

                                             </fieldset>

                                          </div>

                                       </div>



                                    <?php } ?>

                                    





                                 </div>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>                  
              
               </div>

               <!-- End: Product detail section -->



               <!-- Start: Description section -->

               <div class="card mt-3 descriptionCard">

                  <div class="card-header">

                     

                     <ul class="nav nav-pills card-header-pills">

                        <li class="nav-item">

                          <a class="nav-link active" href="#">Description</a>

                        </li>                        

                      </ul>

                  </div>

                  <div class="card-body">

                     <div class="row">

                        <div class="col-md-12">

                           <p>   

                              <?php echo $get_single_product->product_short_description?>

                           </p>

                           

                        </div>

                     </div>

                  </div>

               </div>

            <div class="row">

               <!-- <div class="col-md-3 col-sm-3 col-xs-12"></div> -->

               <div class="col-md-12 col-sm-12 col-xs-12">

               <section class="section_offset" style="margin-top:20px; ">



                  <!-- - - - - - - - - - - - - - Carousel of you might also like - - - - - - - - - - - - - - - - -->



                  

                  <h3>Related Products</h3>

                  <div class="related_products owl-carousel owl-theme owl-loaded">

                     

                     <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->



                  <div class="owl-stage-outer">

                     <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 610px;">

                        <?php foreach ($related_products as $key => $value) { ?>

                        <div class="owl-item active" style="width: 152.5px; margin-right: 0px;">

                           

                              

                           

                           <div class="product_item" style="font-size:13px;">

                              <?php if(($value->discount_type != 0)){ ?>

                                                      <div class="product-off-border">

                                                         <div class="weight-bold px-5px"> 

                                                         

                                                          <?php 

                                                          echo $value->discount; ($value->discount_type == 1) ? ( $type = '%') : ( $type = 'Rs.'); echo $type;

                                                          ?>  Off

                                                         </div>

                                                      </div>

                                                   <?php } ?>

                              <div class="image_wrap">

                                 <a href="<?php echo base_url() ?>product/<?php echo $value->product_url;?>" class="mask">

                                    <?php if($value->product_image != '0'){ ?>

                                          <img src="<?php echo base_url('uploads/thumbs/'.$value->product_image)?>" border="0" class="img-fluid "  style="text-align: center;

    height: 156px;

    position: relative;

    display: block;

    width: auto;">

                                          <?php }else{ ?>

                                             <img id="" src="<?php echo base_url('uploads/thumbs/placeholder.jpg') ;?>" class="img-fluid" alt="test" style="text-align: center;

    height: 156px;

    position: relative;

    display: block;

    width: auto;">

                                          <?php } ?>

                                    

                                 </a>

                              </div><!--/. image_wrap-->

                              <div class="description align_center">

                                 <p class="descriptionPtag">

                                    <a href="<?php echo $value->product_url;?>" class="mask"><?php echo $value->product_title;?></a>

                                 </p>

                                 <!-- <p style="font-size:12px;" class="descriptionPtag">      

                                    Merck (Pvt) Ltd                           

                                 </p> -->

                                 <div class="clearfix product_info">

                                    <p class="product_price  invisible" style="font-size:13px;">

                                       <b>Rs. <?php echo $value->product_sale_price;?></b>

                                    </p>

                                 </div><!--/ .clearfix.product_info-->

                                 <form action="<?php echo base_url('save/cart');?>" method="post">

                                     <input style="display:none;" type="number" class="buyfield" name="qty" value="1" <?php if($get_single_product->purchase_qty_limit != 0){ ?>

                                                         max = <?php echo $get_single_product->purchase_qty_limit; ?>

                                                      <?php } ?>/>

                                     <input type="hidden" class="buyfield" name="product_id" value="<?php echo $value->product_sale_price;?>"/>

                                     <input type="submit" class="buysubmit button_blue middle_btn" name="submit" value="Add to Cart"/>

                                 </form>

                              </div>

                           </div>

                           

                        </div>

                        <?php } ?>

                     </div>

                  </div><div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style=""></div><div class="owl-next" style=""></div></div><div class="owl-dots" style=""><div class="owl-dot active"><span></span></div></div></div></div><!--/ .owl_carousel-->

               </section>

               </div>

            </div>

</div>
<?php } ?>
<div class="container">

               <div class="row">

                  <div class="col-md-12 mb-3 mt-3">

                     <h1 class="text-center">Popular Brands</h1>

                  </div>



                  <?php

                    $deal_posts = $this->web_model->get_all_deals();

                    foreach ($deal_posts as $deal_post) {

                      $deal_placement = explode(',',$deal_post['deal_placement']);

                      if(in_array('deal_of_the_day', $deal_placement) ){   

                        ?>

                       

                        <div class="col-md-6">

                           <a href="<?php echo base_url() ?><?php echo $deal_post['brand_name']; ?>">

                              <div class="columnTwoSectionContent">

                                 <div class="saleDivContent">

                                    <div class="img-wrap">

                                       <img src="<?php echo base_url() ?>uploads/<?php echo $deal_post['deal_thumbnail'] ?>" class="img-fluid" alt="test">

                                    </div>

                                    <div class="titles-description-sticky">

                                       <div class="titles-wrap">

                                          <span class="discount-text"><?php echo $deal_post['deal_title'] ?></span>

                                       </div>

                                       <div class="description" style="color:grey;">

                                         <?php echo $deal_post['deal_description'] ?>

                                       </div>                        

                                    </div>

                                 </div>

                              </div>

                            </a> 

                        </div>  

                     

                    

                  <?php } } ?>

               </div>

            </div>

<div class="container">

               <div class="row">

                  <div class="col-md-12 mb-3 mt-3">

                     <h1 class="text-center">latest Brands</h1>

                  </div>

                  <?php

                    

                    foreach ($deal_posts as $deal_post) {

                      $deal_placement = explode(',',$deal_post['deal_placement']);

                      if(in_array('latest_offers', $deal_placement) ){   

                        ?>

                     <div class="col-md-6">

                        <a href="<?php echo base_url() ?><?php echo $deal_post['brand_name']; ?>">

                        <div class="columnTwoSectionContent">

                           <div class="saleDivContent">

                              <div class="img-wrap">

                                 <img src="<?php echo base_url() ?>uploads/<?php echo $deal_post['deal_thumbnail'] ?>" class="img-fluid" alt="test">

                              </div>

                              <div class="titles-description-sticky">

                                 <div class="titles-wrap">

                                    <span class="discount-text"><?php echo $deal_post['deal_title'] ?></span>

                                 </div>

                                 <div class="description">

                                   <?php echo $deal_post['deal_description'] ?>

                                 </div>                        

                              </div>

                           </div>

                        </div>

                        </a>

                     </div>  

                    

                  <?php } } ?>

               </div>

            </div>            



               <!-- End: Description section -->

               



<script type="text/javascript">

   $(function() {

      $('.related_products').owlCarousel({

         center: true,

         loop:true,

         

         navText: ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],

         dots: true,

         margin:10,

         navigation : true, // Show next and prev buttons

         nav:true,

         //responsiveClass:true,

         responsive:{

           0:{

               items:1,

               nav:true

           },

           600:{

               items:4,

               nav:true

           },

           1000:{

               items:5,

               nav:true,

           }

         }

      });

   });

</script>













               

                       <!--  <form action="<?php echo base_url('save/cart');?>" method="post">

                            <input type="number" class="buyfield" name="qty" value="1"/>

                            <input type="hidden" class="buyfield" name="product_id" value="<?php echo $get_single_product->product_id?>"/>

                            <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>

                        </form>           

                     -->

                



            



