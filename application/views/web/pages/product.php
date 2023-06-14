<?php 
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$required_url = basename(dirname($url));

$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$required_url_id = array_pop($uriSegments);
 ?>
<!-- Wrap the rest of the page in another container to center all the content. -->
  <main>         
         <div style="display:none;" id="myCarousel" class="carousel slide myCarouselDesktop" data-bs-ride="carousel">
            <div class="carousel-indicators">
               <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
               <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
               <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="https://nexthealth.pk/sliderImages/20Purifiers-01.jpg">
               </div>
               <div class="carousel-item">
                  <img src="https://nexthealth.pk/sliderImages/25prism-desktop.png">
               </div>
               <div class="carousel-item">
                  <img src="https://nexthealth.pk/sliderImages/26hiNutritionMW-1920-X-450.jpg">
               </div>
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

         <div style="display:none;" id="myCarouselMobile" class="carousel slide myCarouselMobile" data-bs-ride="carousel">
            <div class="carousel-indicators">
               <button type="button" data-bs-target="#myCarouselMobile" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
               <button type="button" data-bs-target="#myCarouselMobile" data-bs-slide-to="1" aria-label="Slide 2"></button>
               <button type="button" data-bs-target="#myCarouselMobile" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="<?php echo base_url() ?>uploads/27sgindropmob.png">
               </div>
               <div class="carousel-item">
                  <img src="<?php echo base_url() ?>uploads/29buzzing-mobile.png">
               </div>
               <div class="carousel-item">
                  <img src="<?php echo base_url() ?>uploads/15kellogs-Mobile.jpg">
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
         <!-- Marketing messaging and featurettes
            ================================================== -->
         <!-- Wrap the rest of the page in another container to center all the content. -->

        

         <div class="container-fluid categoryThirdSection">            
            <!-- START Product Listing SECTION -->
            <div class="categorySection">

               <div class="row">
                  <div class="col-lg-2 col-md-3 col-sm-3 col-12">
                     <section id="left-category-list" class="animated visible">
                        <h3 class="bcat">
                           Brands
                           <div class="show-hide showHideCategory"></div>
                        </h3>
                        <ul class="topbar1 informationShowHideCategory" id="c_b">
                           <?php
                              $brands_array = array();
                              if(isset($_REQUEST['brand'])){
                                 $brands_array = explode('_', $_REQUEST['brand']);
                              
                              } ?>
                           <?php foreach ($get_brands as $key => $value) { ?>
                                <li class="has_submenu mainFirstLi brandl">
                                    <div class="form-check">
                                      <input class="form-check-input" <?php if(in_array($value->brand_name, $brands_array)){echo 'checked=""';} ?> type="checkbox" value="<?php echo $value->brand_name ?>" id="brands" onclick='brands_filter();' class="brands"  name="brands[]">
                                      <label class="form-check-label" for="">
                                        <?php echo $value->brand_name ?>
                                      </label>
                                    </div>
                                 </li>
                           <?php } ?>
                        </ul>
                     </section>
                     <div class="priceSlider" id="left-category-price">
                        <h3 class="bcat">Price Range:</h3>
                        <input type="hidden" id="required_url_segment" value="<?php echo $required_url  ?>">
                        <input type="hidden" id="url_parameter" value="<?php echo $required_url_id  ?>">  

                        <div class="min-max">
                         <div class="min">
                             <label>Min</label>
                             <span id="min-value">
                              <?php if(isset($_REQUEST['min'])){
                                 echo $_REQUEST['min'];
                              }else{
                                 echo $get_price_range['0']->min_price;
                              } ?>
                             </span>
                         </div>
                         <div class="max">
                             <label>Max</label><span id="max-value"><?php echo $get_price_range['0']->max_price ?></span>
                         </div>     
                        </div> 
                            
                        <div class="min-max-range">
                        <input type="range" min="0" max="5000" value="<?php if(isset($_REQUEST['min'])){ echo $_REQUEST['min']; }else{ echo $get_price_range['0']->min_price; } ?>" class="range" id="min">
                        <input type="range" min="<?php if(isset($_REQUEST['max'])){ echo $_REQUEST['max']; }else{ echo $get_price_range['0']->max_price; } ?>" max="20000" value="<?php if(isset($_REQUEST['max'])){ echo $_REQUEST['max']; }else{ echo $get_price_range['0']->max_price; } ?>" class="range" id="max">      
                        </div>   
                        <div style="clear: both;"></div>
                     </div>
                  </div>
                  <div class="col-lg-10 col-md-9 col-sm-9 col-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-12 mt-3 mb-5 rightProductDetailHideMobile">
                                 <div class="left_side clearfix v_centered">
                                    <!-- - - - Sort by - - - - -->
                                    <div class="v_centered">
                                       <span>Sort by:</span>
                                       <div class="sort_select">
                                          <select name="order" id="order">
                                             <option value="default">Default</option>
                                             <option value="asc" <?php if(isset($_REQUEST['order']) AND $_REQUEST['order'] == 'asc'){echo 'selected';} ?>>A - Z</option>
                                             <option value="desc" <?php if(isset($_REQUEST['order']) AND $_REQUEST['order'] == 'desc'){echo 'selected';} ?>>Z - A</option>
                                             <option value="priceasc" <?php if(isset($_REQUEST['order']) AND $_REQUEST['order'] == 'priceasc'){echo 'selected';} ?>>Price Low - High</option>
                                             <option value="pricedesc" <?php if(isset($_REQUEST['order']) AND $_REQUEST['order'] == 'pricedesc'){echo 'selected';} ?>>Price High - Low</option>
                                          </select>
                                       </div>
                                    </div>
                                    <!-- - - - End of sort by - - - - -->
                                    <!-- - - - - Number of products shown - - - - - -->
                                    <div class="v_centered d-none">
                                       <span>Show:</span>
                                       <div class="">
                                          <select name="perpage" id="perpage">
                                             <option value="32" selected="selected">32 </option>
                                             <option value="48">48 </option>
                                             <option value="64">64 </option>
                                             <option value="80">80 </option>
                                             <option value="96">96 </option>
                                          </select>
                                       </div>
                                    </div>
                                    <!-- - - End of number of products shown - - - -->
                                 </div>
                              </div>
                               <!-- START Brand Main Banner -->
                              
                              <!-- End Brand sub Banner -->
                              <?php
                                foreach($get_all_product as $single_product) {  
                                    ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 colMdBorderRightBottom">
                                       <div class="categoryProductDiv">


                                          <a href="<?php echo base_url('product/' . $single_product->product_url); ?>">
                                             <div class="categoryProductImg">
                                                <!-- Discount circle HTML -->
                                                   <?php if(($single_product->discount_type != 0)){ ?>
                                                      <div class="product-off-border">
                                                         <div class="weight-bold px-5px"> 
                                                         
                                                          <?php 
                                                          echo $single_product->discount; ($single_product->discount_type == 1) ? ( $type = '%') : ( $type = 'Rs.'); echo $type;
                                                          ?>  Off
                                                         </div>
                                                      </div>
                                                   <?php } ?>
                                                <!-- Discount circle HTML -->
                                                <?php if($single_product->product_image != '0'){ ?>
                                                   <img src="<?php echo base_url('uploads/thumbs/' . $single_product->product_image) ?>" class="img-fluid" alt="test">
                                                   <?php }else{ ?>
                                                      <img src="<?php echo base_url('uploads/thumbs/placeholder.jpg') ;?>" class="img-fluid" alt="test">
                                                   <?php } ?>
                                             </div>
                                          </a>
                                          <div class="categoryProductInfo">
                                             <a href="<?php echo base_url('product/' . $single_product->product_url); ?>">
                                                <div class="categoryProductTitle">
                                                   <?php echo $single_product->product_title; ?>
                                                </div>
                                             </a>
                                             <div class="categoryProductDescription">
                                                <?php echo $single_product->brand_name; ?>
                                             </div>                              
                                             <div class="categoryProductPrice">
                                                <span class="categoryPriceTag <?php if(!is_null($single_product->discount_type)){ ?> have-discount <?php }  ?> ">Rs: <?php echo $this->cart->format_number($single_product->product_price); ?></span>
                                                <?php if(($single_product->discount_type != 0)){ ?>
                                                      <span class="special_price discounted "style="color: red;">
                                                         
                                                         <div class="price">Rs: <?php echo $single_product->product_sale_price; ?></div>
                                                      </span>
                                                   <?php } ?>
                                             </div>
                                             <!-- <button class="btnCart_blue"><a style="color: white;text-decoration: none;" href="<?php echo base_url('single/' . $single_product->product_id); ?>">
                                             Add to Cart</a></button> -->
                                       <?php if($single_product->product_quantity == 0 && $single_product->always_in_stock == 1){ ?>

                                       <div class="row flex-wrap-justify-content mt-3">
                                          <div class="col-md-12 col-sm-12 col-xs-12 d-flex">
                                             
                                                <div class="description_section_2 v_centered">
                                                   <!-- <span class="title">Qty:</span> -->

                                                   <form action="<?php echo base_url('save/cart');?>" method="post">
                                                       <input type="hidden" class="buyfield" name="qty" value="1" <?php if($single_product->purchase_qty_limit != 0){ ?>
                                                         max = <?php echo $single_product->purchase_qty_limit; ?>
                                                      <?php } ?>/>
                                                       <!-- Discounted Price For CART -->
                                                         
                                                         <?php if(!is_null($single_product->discount_type)){ ?>
                                                         <input type="hidden" class="buyfield" name="discounted_price" value="<?php echo $single_product->product_sale_price; ?>"/>
                                                         
                                                         <?php } ?>

                                                       <!-- Discounted Price For CART -->
                                                       <input type="hidden" class="buyfield" name="product_id" value="<?php echo $single_product->product_id?>"/>
                                                       <input type="submit" class="buysubmit button_blue middle_btn" name="submit" value="Add to Cart"/>
                                                   </form>
                                                   <!-- <button type="submit" class="button_blue middle_btn" ></button> -->
                                                </div>
                                          </div>
                                       </div>

                                    <?php }elseif ($single_product->product_quantity == 0 && $single_product->always_in_stock == 0) { 

                                       $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                       ?>
                                      <div class="row flex-wrap-justify-content mt-3">
                                       <div class="col-md-12">
                                       <a  id="wpbtn" class="buysubmit button_blue middle_btn" style="display: inline-block; text-decoration: unset;" 
                                        target="_blank" 
                                        href="https://wa.me/923360006398?text=<?php echo $actual_link ?>"> GENERATE DEMAND
                                       </a>
                                       </div>
                                       </div>
                                    <?php }elseif ($single_product->product_quantity >= 1 ) { ?>
                                      
                                      <div class="row flex-wrap-justify-content mt-3">
                                          <div class="col-md-12 col-sm-12 col-xs-12 d-flex">
                                             
                                                <div class="description_section_2 v_centered">
                                                   <!-- <span class="title">Qty:</span> -->

                                                   <form action="<?php echo base_url('save/cart');?>" method="post">
                                                       <input type="hidden" class="buyfield" name="qty" value="1"  <?php if($single_product->purchase_qty_limit != 0){ ?>
                                                         max = <?php echo $single_product->purchase_qty_limit; ?>
                                                      <?php } ?>/>

                                                       <!-- Discounted Price For CART -->
                                                       <?php if(!is_null($single_product->discount_type)){ ?>
                                                         <input type="hidden" class="buyfield" name="discounted_price" value="<?php echo $single_product->product_sale_price; ?>"/>
                                                         
                                                      <?php } ?>
                                                       <!-- Discounted Price For CART -->

                                                       <input type="hidden" class="buyfield" name="product_id" value="<?php echo $single_product->product_id?>"/>
                                                       <input type="submit" class="buysubmit button_blue middle_btn" name="submit" value="Add to Cart"/>
                                                   </form>
                                                   <!-- <button type="submit" class="button_blue middle_btn" ></button> -->
                                                </div>
                                          </div>
                                       </div>

                                    <?php } ?>
                                          </div>
                                          
                                       </div>
                                    </div>
                              <?php } ?>
                             
                           </div>
                           <div class="content_pagi">
                              <div class="pagination">
                                  <?php  echo $this->pagination->create_links();?>
                              </div>
                              <div class="clear"></div>
                          </div>
                        </div>
                     </div>
                  </div>                                    
               </div>
            </div>
            
            <!-- START DEAL OF THE DAY SECTION -->
            <div class="columnTwoSection">
               <div class="row">
                  <div class="col-md-12 mb-3 mt-3">
                     <h1 class="text-center">Deal Of the Day</h1>
                  </div>
                 <?php
                    $deal_posts = $this->web_model->get_all_deals();
                    foreach ($deal_posts as $deal_post) {
                      $deal_placement = explode(',',$deal_post['deal_placement']);
                      if(in_array('deal_of_the_day', $deal_placement) ){   
                        ?>
                     <div class="col-md-6">
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
                     </div>  
                    
                  <?php } } ?>

               </div>
            </div>
            <!-- /END DEAL OF THE DAY SECTION -->  
            
            <!-- START SHOP BY CONDITION SECTION -->
            <div class="shopByConditionSection">
               <div class="col-md-12 mb-3 mt-3">
                  <h1 class="text-center">Shop By Condition</h1>
               </div>
               <div class="row">
                 <?php                         
                   foreach ($parent_categories as $key => $value) {  
                     $cat_placement = explode(',',$value['category_placement']);
                     if(in_array('shop_by_condition', $cat_placement) ){                            
                  ?>                  
                  <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                     <a class="nav-link"  href="<?php echo base_url() ?>get/category/<?php echo $value['id']; ?>" > 
                     <div class="card-our-offerings">
                        <img src="<?php echo base_url() ?>uploads/<?php echo $value['thumbnail'] ?>" alt="">
                        <div class="info">
                           <div class="fw-bold fS-20 gray-7">
                              <?php echo $value['category_name']; ?>
                           </div>
                        </div>
                     </div>  
                     </a>                
                  </div>
               <?php } } ?>


               </div>
            </div>
            <!-- /END SHOP BY CONDITION SECTION -->
         </div>
     
         
         
      </main>

         


 
    
  

          


          
         </div>
         <!-- /.container -->

          
