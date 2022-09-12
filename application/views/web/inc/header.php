<!DOCTYPE HTML>
<head>
    <title>Nexthealth</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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

    <!-- CUSTOM CSS BY BILAL QURESHI -->
    <style>
         .bd-placeholder-img {
         font-size: 1.125rem;
         text-anchor: middle;
         -webkit-user-select: none;
         -moz-user-select: none;
         user-select: none;
         }
         @media (min-width: 768px) {
         .bd-placeholder-img-lg {
         font-size: 3.5rem;
         }
         }
         .b-example-divider {
         height: 3rem;
         background-color: rgba(0, 0, 0, .1);
         border: solid rgba(0, 0, 0, .15);
         border-width: 1px 0;
         box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
         }
         .b-example-vr {
         flex-shrink: 0;
         width: 1.5rem;
         height: 100vh;
         }
         .bi {
         vertical-align: -.125em;
         fill: currentColor;
         }
         .nav-scroller {
         position: relative;
         z-index: 2;
         height: 2.75rem;
         overflow-y: hidden;
         }
         .nav-scroller .nav {
         display: flex;
         flex-wrap: nowrap;
         padding-bottom: 1rem;
         margin-top: -1px;
         overflow-x: auto;
         text-align: center;
         white-space: nowrap;
         -webkit-overflow-scrolling: touch;
         }
      </style>
    <!-- END CUSTOM CSS BY BILAL QURESHI -->

      
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
    
    
    <!-- CAROUSEL CSS BY BILAL QURESHI -->

    <link href="<?php echo base_url() ?>assets/web/css/carousel.css" rel="stylesheet" rel="stylesheet">
    <!-- END CAROUSEL CSS BY BILAL QURESHI -->

    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#dc_mega-menu-orange').dcMegaMenu({rowItems: '4', speed: 'fast', effect: 'fade'});
        });
    </script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('uploads/'); ?><?php echo get_option('site_logo'); ?>" />
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
                                    <div class="login"><a href="<?php echo base_url('/customer/logout'); ?>">Logout</a></div>
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
                            <input type="text" class="form-control searchInputTag" placeholder="Search for Products" name="search">
                        </div>      
                        <!-- <input type="submit" class="btn btn-outline-white text-white advanceSearchBtn" value="SEARCH">  -->                 
                        <button   class="btn btn-outline-white text-white advanceSearchBtn" >
                           <input type="submit"  value="SEARCH">
                        </button>
                     </form>
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
                      

                     ?>
                        <li class="nav-item dropdown"> 
                           <a class="nav-link dropdown-toggle show" data-target="<?php echo base_url() ?>get/category/<?php echo $value['id']; ?>" href="<?php echo base_url() ?>get/category/<?php echo $value['id']; ?>" aria-expanded="true"> <?php echo $value['category_name']; ?> </a>                           
                               <ul class="dropdown-menu" data-bs-popper="none">
                                 <?php if(isset($value['category'])){ 
                                       foreach ($value['category'] as $key1 => $value1) {  
                                    ?>
                                 <li><a class="dropdown-item" href="#">  <?php echo $value1['category_name'];
                                 if ($value1['sub_cat']) {
                                     echo ' »';
                                  } ?></a>
                                    <?php if($value1['sub_cat']){ ?>
                                    <ul class="submenu dropdown-menu">
                                        
                                       <?php    foreach ($value1['sub_cat'] as $key2 => $value2) {  
                                       ?>
                                       <li><a class="dropdown-item" href="#"><?php echo $value2['name'] ?></a></li>
                                      <?php } ?>
                                    </ul>
                                 <?php }  ?>
                                 

                                 </li>
                                 <?php } } ?>
                                 
                              </ul>
                           
                        </li>
                     
                     <?php } ?>
                     
                   
                    
                  </ul>                  
               </div>
               <!-- navbar-collapse.// -->
            </div>
            <!-- container-fluid.// -->
         </nav>

         <div class="sliderServices">
            <div class="sliderServicesSlides">
               <div class="slide-1">
                  <a href="https://nexthealth.pk/products/medicine/">
                     Medicines                    
                  </a>
               </div>
               <div class="slide-1">
                  <a href="https://nexthealth.pk/products/supplements/">
                     Supplements                    
                  </a>
               </div>
               <div class="slide-1">
                  <a href="https://nexthealth.pk/products/health-wellness/">
                     Health &amp; Wellness                   
                  </a>
               </div> 
               <div class="slide-1">
                  <a href="https://nexthealth.pk/products/consumer-products/">
                     Consumer Products                    
                  </a>
               </div>
               <div class="slide-1">
                  <a href="https://nexthealth.pk/products/personal-care/">
                     Personal Care                     
                  </a>
               </div>
               <div class="slide-1">
                  <a href="https://nexthealth.pk/products/optics/">
                     Optics                   
                  </a>
               </div>
            </div>
         </div>

         <a class="d-lg-none navbarToggler" data-trigger="navbar_main">
            <i class="bi bi-list"></i>
         </a>

         <!-- ============= COMPONENT ============== -->
         <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg navbar-dark bg-primary bannerShowMobile">
          <div class="container-fluid">
             <div class="offcanvas-header">  
               <button class="btn-close float-end"></button>
            </div>             

            <ul class="navbar-nav">
               <li class="nav-item active"> <a class="nav-link" href="#">Home </a> </li>
               <li class="nav-item"><a class="nav-link" href="#"> About </a></li>
               <li class="nav-item"><a class="nav-link" href="#"> Services </a></li>
               <li class="nav-item dropdown">
                  <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">  More items  </a>
                   <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
                    <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
                    <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
                   </ul>
               </li>
            </ul>
            <ul class="navbar-nav ms-auto">
               <li class="nav-item"><a class="nav-link" href="#"> Menu item </a></li>
               <li class="nav-item"><a class="nav-link" href="#"> Menu item </a></li>
               <li class="nav-item dropdown">
                  <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> Dropdown right </a>
                   <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
                    <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
                   </ul>
               </li>
            </ul>

          </div> <!-- container-fluid.// -->
         </nav>
         <!-- ============= COMPONENT END// ============== -->


      </header>
      <main>
   
       
        