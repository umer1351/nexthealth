





<!-- Wrap the rest of the page in another container to center all the content. -->

         <div class="container categoryThirdSection">

            



            <!-- START Product Listing SECTION -->

            <div class="categorySection">

               <div class="row">

                  <div class="col-md-12 mb-3 mt-3">

                     <h1 class="text-center text-capitalize">"<?php if($search){echo $search;}?>"</h1>

                  </div>

                    <?php

                     $arr_chunk_product = array_chunk($get_all_product, 4);



                        foreach ($arr_chunk_product as $chunk_products) {

                            foreach ($chunk_products as $single_product) {
                              if($single_product->active == '1'){

                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 colMdBorderRightBottom">

                           <div class="categoryProductDiv">

                              <a href="<?php echo base_url('product/' . $single_product->product_url); ?>">

                                 <div class="categoryProductImg">

                                    <!-- Discount circle HTML -->

                                       <?php if(($single_product->discount_type != 0)){ ?>

                                          <div class="product-off-border">

                                             <div class="weight-bold px-5px"> 

                                             

                                              <?php echo $single_product->discount; ($single_product->discount_type == 1) ? ( $type = '%') : ( $type = 'Rs.'); echo $type;?>  Off 

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

                                    <?php echo $single_product->product_brand; ?>

                                 </div>                              

                                 <div class="categoryProductPrice">

                                    <span <?php if(($single_product->discount_type != 0)){ ?> style='text-decoration-line: line-through; ' <?php } ?> class="categoryPriceTag <?php if(($single_product->discount_type != 0)){ ?> have-discount <?php }  ?> ">Rs: <?php echo $this->cart->format_number($single_product->product_price); ?></span>

                                    <?php if($single_product->discount_type != 0){ ?>

                                          <span class="special_price discounted " style="color: red;">

                                             

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

                                                         

                                                         <?php if($single_product->discount_type != 0){ ?>

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

                                       <a class="" id="wpbtn" class="buysubmit button_blue middle_btn" style="display: inline-block; text-decoration: unset;" 

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

                    <?php } } } ?>

               </div>

            </div>

            <!-- /END Product Listing SECTION -->



                      





          

         </div>

         <!-- /.container -->