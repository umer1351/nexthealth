<!-- Start: Product detail section -->
               <div class="card">
                  <div class="card-body">
                     <div class="tab_containers_wrap productDetailPage">
                        <div id="" class="tab_container">
                           <div class="row">
                              <div class="col-md-3">

                                 <div class="single_product single_product_image">
                                    <div class="image_preview_container">
                                       <!-- Discount circle HTML -->
                                       <?php if(!is_null($get_single_product->discount_type)){ ?>
                                          <div class="product-off-border">
                                             <div class="color-red weight-bold px-5px"> 
                                             
                                              <?php echo $get_single_product->discount; ($get_single_product->discount_type == 1) ? ( $type = '%') : ( $type = 'Rs.'); echo $type;?>  
                                             </div>
                                             <div class="color-red weight-bold">Off</div> 
                                          </div>
                                       <?php } ?>
                                       <!-- Discount circle HTML -->
                                       <a href="#" class="lightbox">
                                          <img data-zoom-image="<?php echo base_url('uploads/'.$get_single_product->product_image)?>" src="<?php echo base_url('uploads/'.$get_single_product->product_image)?>" alt="">
                                       </a>
                                    </div>
                                 </div>
                                 <div class="image-thumbnails">
                                    <div class="image-thumbnail">
                                       <img src="<?php echo base_url('uploads/'.$get_single_product->product_image)?>" style="cursor: pointer">
                                    </div> 
                                    <?php if(!empty($get_single_product->product_image2)){ ?>
                                       <div class="image-thumbnail">
                                          <img src="<?php echo base_url('uploads/'.$get_single_product->product_image2)?>" style="cursor: pointer">
                                       </div>
                                    <?php } ?>
                                    <?php if(!empty($get_single_product->product_image3)){ ?>
                                       <div class="image-thumbnail">
                                          <img src="<?php echo base_url('uploads/'.$get_single_product->product_image3)?>" style="cursor: pointer">
                                       </div>
                                    <?php } ?> 
                                    <?php if(!empty($get_single_product->product_image4)){ ?>
                                       <div class="image-thumbnail">
                                          <img src="<?php echo base_url('uploads/'.$get_single_product->product_image4)?>" style="cursor: pointer">
                                       </div>
                                    <?php } ?>                                                 
                                 </div>
                              </div>
                              <div class="col-md-9">
                                 <div class="single_product_description">
                                    <h2 class="offset_title">
                                       <a href="#"><?php echo $get_single_product->product_title?></a>
                                    </h2>
                                    <div class="description_section mt-5">
                                       <table class="product_info">
                                          <tbody>
                                             <tr>
                                                <td>Manufactured By:</td>
                                                <td><a href="<?php echo base_url() ?>get/brand/<?php echo $get_single_product->brand_id; ?>"><?php echo $get_single_product->brand_name?></a></td>
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

                                    <div class="description_section">
                                       <div class="table_wrap product_price_table">
                                          <table>
                                             <tbody>
                                                <tr class="price_class">
                                                   <td class="old_price color-red">
                                                      MRP:
                                                      <div class="price <?php if(!is_null($get_single_product->discount_type)){ ?> have-discount <?php }  ?> ">Rs. <?php echo $this->cart->format_number($get_single_product->product_price)?></div>
                                                   </td>
                                                   <!-- Disctounted Price -->
                                                   <?php if(!is_null($get_single_product->discount_type)){ ?>
                                                      <td class="special_price discounted colorBlue">
                                                         Your Price:
                                                         <div class="price">Rs. <?php echo $get_single_product->product_sale_price; ?></div>
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
                                    <hr>
                                    <?php if($get_single_product->product_quantity == 0 && $get_single_product->always_in_stock == 1){ ?>

                                       <div class="row flex-wrap-justify-content mt-3">
                                          <div class="col-md-12 col-sm-12 col-xs-12 d-flex">
                                             
                                                <div class="description_section_2 v_centered">
                                                   <span class="title">Qty:</span>

                                                   <form action="<?php echo base_url('save/cart');?>" method="post">
                                                       <input type="number" class="buyfield" name="qty" value="1" <?php if($get_single_product->purchase_qty_limit != 0){ ?>
                                                         max = <?php echo $get_single_product->purchase_qty_limit; ?>
                                                      <?php } ?>/>
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
                                      
                                       <a  id="wpbtn"style="   
                                        color: white;
                                        background: #00569b;
                                        padding: 10px;"; 
                                        target="_blank" 
                                        href="https://wa.me/923360006398?text=<?php echo $actual_link ?>"> Generate Demand
                                       </a>
                                    
                                    <?php }elseif ($get_single_product->product_quantity >= 1 ) { ?>
                                      
                                      <div class="row flex-wrap-justify-content mt-3">
                                          <div class="col-md-12 col-sm-12 col-xs-12 d-flex">
                                             
                                                <div class="description_section_2 v_centered">
                                                   <span class="title">Qty:</span>

                                                   <form action="<?php echo base_url('save/cart');?>" method="post">
                                                       <input type="number" class="buyfield" name="qty" value="1"  <?php if($get_single_product->purchase_qty_limit != 0){ ?>
                                                         max = <?php echo $get_single_product->purchase_qty_limit; ?>
                                                      <?php } ?>/>

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
                              <?php echo $get_single_product->product_long_description?>
                           </p>
                           
                        </div>
                     </div>
                  </div>
               </div>

               <section class="section_offset" style="margin-top:20px; ">

                  <!-- - - - - - - - - - - - - - Carousel of you might also like - - - - - - - - - - - - - - - - -->

                  
                  <h3>Related Products</h3>
                  <div class="related_products owl-carousel owl-theme owl-loaded">
                     
                     <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->

                  <div class="owl-stage-outer">
                     <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 610px;">
                        <div class="owl-item active" style="width: 152.5px; margin-right: 0px;">
                           <?php foreach ($related_products as $key => $value) { ?>
                              
                           
                           <div class="product_item" style="font-size:13px;">
                              <div class="image_wrap">
                                 <a href="<?php echo base_url() ?>single/<?php echo $value->product_id;?>" class="mask"><img src="<?php echo base_url('uploads/'.$value->product_image)?>" border="0" class="img-responsive zoom-img" style="height:114px;"></a>
                              </div><!--/. image_wrap-->
                              <div class="description align_center">
                                 <p class="descriptionPtag">
                                    <a href="https://nexthealth.pk/product/evion-capsule-200mg-10s-14939/" class="mask"><?php echo $value->product_title;?></a>
                                 </p>
                                 <!-- <p style="font-size:12px;" class="descriptionPtag">      
                                    Merck (Pvt) Ltd                           
                                 </p> -->
                                 <div class="clearfix product_info">
                                    <p class="product_price  invisible" style="font-size:13px;">
                                       <b>Rs. <?php echo $value->product_price;?></b>
                                    </p>
                                 </div><!--/ .clearfix.product_info-->
                                 <form action="<?php echo base_url('save/cart');?>" method="post">
                                     <input style="display:none;" type="number" class="buyfield" name="qty" value="1" <?php if($get_single_product->purchase_qty_limit != 0){ ?>
                                                         max = <?php echo $get_single_product->purchase_qty_limit; ?>
                                                      <?php } ?>/>
                                     <input type="hidden" class="buyfield" name="product_id" value="<?php echo $value->product_price;?>"/>
                                     <input type="submit" class="buysubmit button_blue middle_btn" name="submit" value="Add to Cart"/>
                                 </form>
                              </div>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                  </div><div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style=""></div><div class="owl-next" style=""></div></div><div class="owl-dots" style=""><div class="owl-dot active"><span></span></div></div></div></div><!--/ .owl_carousel-->
               

               </section>


               <!-- End: Description section -->
               








               
                       <!--  <form action="<?php echo base_url('save/cart');?>" method="post">
                            <input type="number" class="buyfield" name="qty" value="1"/>
                            <input type="hidden" class="buyfield" name="product_id" value="<?php echo $get_single_product->product_id?>"/>
                            <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
                        </form>				
                     -->
                

            

