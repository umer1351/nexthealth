<!DOCTYPE HTML>
<head>
    <title>Nexthealth</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Meta Tags for SEO -->
    <meta name="keywords" content="<?php if(isset($get_single_product->meta_keywords)){echo $get_single_product->meta_keywords;} ?>" />
    <meta name="description" content="<?php if(isset($get_single_product->meta_description)){echo $get_single_product->meta_description;} ?>"/>
    <!-- Meta Tags for SEO -->
    <!-- CSS BY BILAL QURESHI -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!-- END CSS BY BILAL QURESHI -->

    <!-- FONTS BY BILAL QURESHI -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- END FONTS BY BILAL QURESHI -->

     <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

    <!-- BOOTSTRAP BY BILAL QURESHI -->
    <link href="<?php echo base_url() ?>assets/web/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- END BOOTSTRAP BY BILAL QURESHI -->

    <!-- CSS BY BILAL QURESHI -->
    <link href="<?php echo base_url() ?>assets/web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- END CSS BY BILAL QURESHI -->

      
    <!--------------------------------- THEME FILES --------------------------------------->


    <!-- CSS BY THEME -->
    <link href="<?php echo base_url() ?>assets/web/css/menu.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- END CSS BY THEME -->

    <!-- SCRIPTS BY THEME -->
    <script src="<?php echo base_url() ?>assets/web/js/jquerymain.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/nav.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/easing.js"></script> 
    <script type="text/javascript" src="<?php echo base_url() ?>assets/web/js/nav-hover.js"></script>
    <!-- END SCRIPTS BY THEME -->
    
    <!-- CSS FOR PRICE RANGE FILTER -->  
    <link href="<?php echo base_url() ?>assets/web/css/price_range.css" rel="stylesheet" rel="stylesheet">
    <!-- END CSS FOR PRICE RANGE FILTER -->
    
    <!-- CAROUSEL CSS BY BILAL QURESHI -->

    <link href="<?php echo base_url() ?>assets/web/css/carousel.css" rel="stylesheet" rel="stylesheet">
    <!-- END CAROUSEL CSS BY BILAL QURESHI -->

    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#dc_mega-menu-orange').dcMegaMenu({rowItems: '4', speed: 'fast', effect: 'fade'});
        });
    </script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('uploads/'); ?><?php echo get_option('site_logo'); ?>" />
    <style type="text/css">
       .dropdown-menu.show {
             display: inline-grid;
         }
    </style>
</head>
<body>
    <span class="screen-darken"></span>
    <header>
         <div class="logoTopBar pt-3 pb-3 ps-3 pe-3">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                     <a class="logo" href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('uploads/'); ?><?php echo get_option('site_logo'); ?>" alt="" /></a>
                  </div>                  
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topMobileDisplayHide d-flex align-items-center justify-content-end">
                     <div class="divCenterFull text-end">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <ul class="asterLoginArea">
                              <li> <a href="<?php echo base_url('/'); ?>">Home</a> |</li>

                              <?php
                                $customer_id = $this->session->userdata('customer_id');
                                if ($customer_id) {
                                    ?>
                                <li>    
                          <button class="btn btn-outline-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                          </button>
                          <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton1" style="">
                              <li class="animated_item" style="transition-delay:0.1s"> 
                                 <a class="dropdown-item" href="<?php echo base_url() ?>customer/profile">
                                   My Account                                 
                                </a>
                              </li>
                               <li class="animated_item" style="transition-delay:0.1s"> 
                                 <a class="dropdown-item" href="<?php echo base_url() ?>customer/manage_shipping_address">
                                   Shipping address                                
                                </a>
                              </li>
                              <li class="animated_item" style="transition-delay:0.1s"> 
                                 <a class="dropdown-item" href="<?php echo base_url() ?>customer/orders">
                                   Order History                                
                                </a>
                              </li>
                              <li class="animated_item" style="transition-delay:0.1s"> 
                                 <a class="dropdown-item" href="<?php echo base_url() ?>customer/schedule_orders">
                                   Schedule Orders                                
                                </a>
                              </li> 
                              <li class="animated_item" style="transition-delay:0.1s"> 
                                 <a class="dropdown-item" href="<?php echo base_url() ?>customer/update_password">
                                   Update Password                                
                                </a>
                              </li>                  
                            
                          </ul>
                       
                        | 
                     </li>
                     <li><div class="login"><a href="<?php echo base_url('/customer/logout'); ?>">Logout</a></div></li>
                                    
                                <?php } else {
                                    ?>
                                    <li> 
                                       <b> 
                                        <a href="<?php echo base_url('/customer/login'); ?>">Sign In</a>
                                       </b>|
                                    </li>
                                    <li> 
                                       <b> 
                                        <a href="<?php echo base_url('/customer/register'); ?>">Sign Up</a>
                                       </b>|
                                    </li>

                                    <?php
                                }
                                ?>
                                                            
                           </ul>
                        </div>
                        <div class="clearfix spacer5"></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <a class="DL-CustomEvent whatsapp-button" target="_blank" href="https://wa.me/923360006398?text=I'm%20interested%20in%20your%20sale" title="Whatsapp">                              
                              <i class="bi bi-whatsapp fs-3 colorGreen marginTopApp"></i>
                              <span class="headerMiddleText">
                                 WhatsApp Your Prescription 
                              </span>
                           </a>
                           <i class="bi bi-telephone fs-3"></i>
                           <span> <b> Call Us! </b> </span>
                           <span class="phone">042-32-600-100</span>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="searchSecondBar">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
                     <form class="d-flex" role="search" method="get" action="<?php echo base_url()?>search">                        
                        <div class="dropdown">
                          <button class="btn btn-outline-white dropdown-toggle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            All Categories
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                           <?php $categories =  $this->category_model->getall_category_info(); 
                                
                              foreach ($categories as $key => $value) {
                               
                           ?>
                            <li class="animated_item" style="transition-delay:0.1s"> 
                                 <a class="dropdown-item" href="<?php echo base_url() ?>get/category/<?php echo $value['id']; ?>">
                                   <?php echo $value['category_name']; ?>
                                 </a>
                              </li>
                           <?php } ?>
                              
                          </ul>
                        </div>

                        
                        <div class="search">
                          <i class="bi bi-search"></i>                        
                            <input type="text" id="search_text" class="form-control searchInputTag" placeholder="Search for Products" name="search">
                          <div id="result"></div>  
                        </div>      
                        <!-- <input type="submit" class="btn btn-outline-white text-white advanceSearchBtn" value="SEARCH">  -->                 
                        <button   class="btn btn-outline-white text-white advanceSearchBtn d-none" >
                           <input type="submit"  value="SEARCH">
                        </button>
                        <a class="btn btn-outline-white text-white advanceSearchBtn" type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           Advance Search
                        </a>
                     </form>

                     <!-- Advance search Modal -->
                     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="staticBackdropLabel">Advance Search</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                             <form method="POST" action="<?php echo base_url()?>advanced_search">
                                 <div class="form-group mb-3">
                                    <label class="control-label">
                                       Product Name:
                                    </label>
                                    <input type="text" name="adv_search" class="form-control search-autocomplete"
                                       data-url="" value="">
                                 </div>
                                 <div class="form-group mb-3">
                                    <label class="control-label">
                                       Product Category:
                                    </label>
                                    <select name="category_cd" class="form-control">
                                       <option value="">--- Choose a category ---</option>
                                      <?php $categories =  $this->category_model->getall_category_info(); 
                                       
                                       foreach ($categories as $key => $value) { ?>
                                          <option value="<?php echo $value['id'] ?>"><?php echo $value['category_name']; ?></option>
                                       <?php } ?> 
                                    </select>
                                 </div>
                                 <div class="form-group mb-3">
                                    <label class="control-label">
                                       Manufactured by:
                                    </label>
                                    <select name="manufacturer_name" class="form-control">
                                       <option value="">--- Choose a maufacturer ---</option>
                                       <?php $brands =  $this->web_model->get_all_brands(); 
                                
                                       foreach ($brands as $key => $value) { ?>
                                          <option value="<?php echo $value['brand_id'] ?>"><?php echo $value['brand_name']; ?></option>
                                       <?php } ?> 
                                    </select>
                                 </div>
                                 <div class="form-group mb-3">
                                    <label class="control-label">
                                       Max Price: (RS)
                                    </label>
                                    <input type="number" name="max_price" min="0" class="form-control" value="">
                                 </div>
                                 <div class="form-group mb-3">
                                    <label class="control-label">
                                       Min Price: (RS)
                                    </label>
                                    <input type="number" name="min_price" min="0" class="form-control" value="">
                                 </div>
                                 <div class="row mb-3">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <button type="submit" class="button_blue middle_btn btn-block">Search</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <!--  <button type="button" class="clear-search button_blue middle_btn btn-block">Clear Fields</button> -->
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                              </form>
                           </div>
                         </div>
                       </div>
                     </div>
                      <!-- Advance search Modal end -->

                  </div>                  
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 text-center text-white">
                     <div class="position-relative margin5Minus">
                        <i id="open_shopping_cart" class="bi bi-cart4 fs-2">
                           <b class="title">My Cart
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                 <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                              </svg>
                              <div class="shopping_cart">
                                <div class="cart">
                                    <a  href="<?php echo base_url('cart');?>" title="View my shopping cart" rel="nofollow">
                                        <span class="no_product"><?php echo $this->cart->total_items();?></span>
                                    </a>
                                </div>
                            </div>
                           </b>
                        </i>
                        <div class="cart">
                           <a href="<?php echo base_url() ?>cart" title="View my shopping cart" rel="nofollow">
                               <span class="no_product"><?php echo $this->cart->total_items();?></span>
                           </a>
                       </div>
                     </div>                     
                  </div>
               </div>
            </div>
         </div>
         <nav class="navbar navbar-expand-lg bg-none topMobileDisplayHide" >
            <div class="container-fluid">               
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="main_nav">
                  <ul class="navbar-nav">
                     <?php                         
                        foreach ($parent_categories as $key => $value) { 
                        if($value['main_menu_display'] == '1'){   
                     ?>
                     <li class="nav-item 
                        <?php 
                        if(!empty($value['category']))
                        {  
                           echo 'dropdown'; 
                        } ?>"> 
                           <a class="nav-link 
                              <?php 
                              if(!empty($value['category']))
                              { 
                                 echo 'dropdown-toggle show'; 
                              } ?>" 
                              data-target="<?php echo base_url() ?>products/<?php  $cat_name =  str_replace(" ", "-", $value['category_name']); echo  $cat_name; ?>" href="<?php echo base_url() ?>products/<?php echo $cat_name; ?>" aria-expanded="true">

                                 <?php echo $value['category_name']; ?> 
                           </a>  
                               <?php if(!empty($value['category'])){ ?>                         
                               <ul class="dropdown-menu" data-bs-popper="none">
                                 
                                    <?php  
                                       foreach ($value['category'] as $key1 => $value1) {  
                                    ?>
                                    <li>
                                       <a class="dropdown-item" href="<?php echo base_url() ?>get/cat-sub/<?php echo $value1['id']; ?>">  
                                          <?php echo $value1['category_name'];
                                          if ($value1['sub_cat']) {
                                             echo ' »';
                                          } ?>
                                       </a>
                                          <?php if($value1['sub_cat']){ ?>
                                             <ul class="submenu dropdown-menu">
                                        
                                                <?php    
                                                foreach ($value1['sub_cat'] as $key2 => $value2) 
                                                {  
                                                ?>
                                                   <li>
                                                      <a class="dropdown-item" href="<?php echo base_url() ?>get/child-cat/<?php echo $value2['id']; ?>">
                                                         <?php echo $value2['name'] ?>
                                                      </a>
                                                   </li>
                                                <?php 
                                                } 
                                                ?>
                                             </ul>
                                          <?php }  ?>
                                    </li>
                                    <?php }  ?>
                               </ul>
                              <?php } ?>
                     </li>
                     <?php } }?>
                  </ul>                  
               </div>
               <!-- navbar-collapse.// -->
            </div>
            <!-- container-fluid.// -->
         </nav>

         <div class="sliderServices">
            <div class="sliderServicesSlides">
               <?php                         
                  foreach ($parent_categories as $key => $value) { 
                  if($value['main_menu_display'] == '1'){   
               ?>
               <div class="slide-1">
                  <a   href="<?php echo base_url() ?>get/category/<?php echo $value['id']; ?>">
                     <?php echo $value['category_name']; ?>                    
                  </a>
               </div>
               <?php } } ?>
            </div>
         </div>

         <a class="d-lg-none navbarToggler" data-trigger="navbar_main">
            <i class="bi bi-list"></i>
         </a>

         <!-- ============= COMPONENT ============== -->
         <nav id="navbar_main" style="background: #00569b;" class="mobile-offcanvas navbar navbar-expand-lg navbar-dark bannerShowMobile">
          <div class="container-fluid">
             <div class="offcanvas-header">  
               <button class="btn-close float-end"></button>
            </div>             

            <ul class="navbar-nav">
               <?php                         
                  foreach ($parent_categories as $key => $value) { 
                  if($value['main_menu_display'] == '1'){   
               ?>
               <li class="nav-item dropdown"> 
                  <a style="text-transform: uppercase;" class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" href="#">
                     <?php echo $value['category_name'] ?> </a> 
                        <?php if(!empty($value['category'])){ ?>
                        <ul class="dropdown-menu">
                           <li> 
                             <a style="text-transform: uppercase;" class="dropdown-item" href="<?php echo base_url() ?>get/category/<?php echo $value['id']; ?>"><?php echo $value['category_name'] ?>
                             </a>
                           </li>
                           <?php  
                              foreach ($value['category'] as $key1 => $value1) {  
                           ?>
                              <li>
                                 <a style="text-transform: uppercase;" class="dropdown-item" href="<?php echo base_url() ?>get/cat-sub/<?php echo $value1['id']; ?>"> <?php echo $value1['category_name'];?>
                                 </a>
                              </li>
                             
                           <?php }?>
                        </ul>
                        <?php } ?>
                  
               </li>
              
            <?php } } ?>
            </ul>
           

          </div> <!-- container-fluid.// -->
         </nav>
         <!-- ============= COMPONENT END// ============== -->


      </header>
      <main>
   
       
        