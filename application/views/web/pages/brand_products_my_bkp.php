<?php 
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$required_url = basename(dirname($url));

$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$required_url_id = array_pop($uriSegments);
 ?>
<!-- Wrap the rest of the page in another container to center all the content. -->
  <main>         
        <div class="container-fluid">
            <div class="row">
               <div class="col-md-12 mb-3 mt-3">
                  <img src="<?php echo base_url() ?>uploads/<?php echo $brand_image['brand_image'] ?>" class="img-fluid" alt="brand image">
               </div>
            </div>
         </div>
         <!-- Marketing messaging and featurettes
            ================================================== -->
         <!-- Wrap the rest of the page in another container to center all the content. -->

        

         <div class="container categoryThirdSection">            
            <!-- START Product Listing SECTION -->
            <div class="categorySection">

               <div class="row">
                  <div class="col-lg-2 col-md-3 col-sm-3 col-12">
                     <section id="left-category-list" class="animated visible d-none">
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
                                      <input class="form-check-input" <?php if(in_array($value->brand_id, $brands_array)){echo 'checked=""';} ?> type="checkbox" value="<?php echo $value->brand_id ?>" id="brands" onclick='brands_filter();' class="brands"  name="brands[]">
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
                               <?php foreach ($sub_brands as $key1 => $value1) { ?>
                                 <div class="container-fluid">
                                    <div class="row">
                                       <div class="col-md-12 mb-3 mt-3">
                                          <img src="<?php echo base_url() ?>uploads/<?php echo $value1['brand_image'] ?>" class="img-fluid" alt="brand image">
                                       </div>
                                    </div>
                                 </div>
                              <!-- End Brand Main Banner -->

                              
                              <?php
                                   foreach($get_all_product as $single_product) {
                                       if($single_product->product_sub_brand == $value1['brand_id']){  
                                       ?>
                                       <div class="col-lg-3 col-md-4 col-sm-6 col-6 colMdBorderRightBottom">
                                          <div class="categoryProductDiv">
                                             <a href="<?php echo base_url('single/' . $single_product->product_id); ?>">
                                                <div class="categoryProductImg">
                                                   <img src="<?php echo base_url('uploads/' . $single_product->product_image) ?>" class="img-fluid" alt="test">
                                                </div>
                                             </a>
                                             <div class="categoryProductInfo">
                                                <a href="<?php echo base_url('single/' . $single_product->product_id); ?>">
                                                   <div class="categoryProductTitle">
                                                      <?php echo $single_product->product_title; ?>
                                                   </div>
                                                </a>
                                                <div class="categoryProductDescription">
                                                   <?php echo $single_product->brand_name; ?>
                                                </div>                              
                                                <div class="categoryProductPrice">
                                                   <span class="categoryPriceTag">Rs: <?php echo $this->cart->format_number($single_product->product_price); ?></span>
                                                </div>
                                                <button class="btnCart_blue"><a style="color: white;text-decoration: none;" href="<?php echo base_url('single/' . $single_product->product_id); ?>">
                                                Add to Cart</a></button>
                                             </div>
                                             
                                          </div>
                                       </div>
                              <?php } } } ?>
                             
                           </div>
                        </div>
                     </div>
                  </div>                                    
               </div>
            </div>
            <div class="content_pagi">
            <div class="pagination">
                <?=$this->pagination->create_links();?>
            </div>
            <style>
    .content_pagi{padding:20px;border: 1px solid #EBE8E8;border-radius: 3px;}
    .pagination{}
    .pagination ul{}
    .pagination ul li{float: left}
    .pagination ul li a{color: #000;padding: 7px 12px;border: 1px solid #ddd;font-size: 18px;}
    .pagination ul li a:hover{background:#ddd;}
    .pagiactive a{background:#ddd;}

</style>
            <div class="clear"></div>
        </div>
            <!-- START DEAL OF THE DAY SECTION -->
            <div class="columnTwoSection">
               <div class="row">
                  <div class="col-md-12 mb-3 mt-3">
                     <h2 class="text-center">Deal Of the Day</h2>
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
                  <h2 class="text-center">Shop By Condition</h2>
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

          
