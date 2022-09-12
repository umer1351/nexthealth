<!-- Start: Product detail section -->
               <div class="card">
                  <div class="card-body">
                     <div class="tab_containers_wrap productDetailPage">
                        <div id="" class="tab_container">
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="single_product single_product_image">
                                    <div class="image_preview_container">
                                       <a href="#" class="lightbox">
                                          <img data-zoom-image="<?php echo base_url('uploads/'.$get_single_product->product_image)?>" src="<?php echo base_url('uploads/'.$get_single_product->product_image)?>" alt="">
                                       </a>
                                    </div>
                                 </div>
                                 <div class="image-thumbnails">
                                    <div class="image-thumbnail">
                                       <img src="<?php echo base_url('uploads/'.$get_single_product->product_image)?>" style="cursor: pointer">
                                    </div>                                                
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
                                                <td><?php echo $get_single_product->brand_name?></td>
                                             </tr>
                                             <tr>
                                                <td>Marketed By:</td>
                                                <td><?php echo $get_single_product->brand_name?></td>
                                             </tr>
                                             <tr>
                                                <td>Availability:</td>
                                                <td>In Stock.</td>
                                             </tr>
                                             <tr>
                                                <td>Delivery Time:</td>
                                                <td>Within 24 to 72 hours after payment across Pakistan.</td>
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
                                                   <td class="old_price colorBlue">
                                                      MRP:
                                                      <div class="price">Rs. <?php echo $this->cart->format_number($get_single_product->product_price)?></div>
                                                   </td>
                                                   <!-- <td class="special_price discounted colorBlue">
                                                      Your Price:
                                                      <div class="price">Rs. 2,000.00</div>
                                                   </td>
                                                   <td class="save colorGreen">
                                                      You Save:
                                                      <div class="price">Rs. 1000.00</div>
                                                   </td> -->
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <hr>
                                    <div class="row flex-wrap-justify-content mt-3">
                                       <div class="col-md-12 col-sm-12 col-xs-12 d-flex">
                                          
                                             <div class="description_section_2 v_centered">
                                                <span class="title">Qty:</span>
                                                <!-- <div class="qty min clearfix">
                                                   <select>
                                                      <option>1</option>
                                                      <option>2</option>
                                                      <option>3</option>
                                                      <option>4</option>
                                                   </select>
                                                </div> -->
                                                <form action="<?php echo base_url('save/cart');?>" method="post">
                                                    <input type="number" class="buyfield" name="qty" value="1"/>
                                                    <input type="hidden" class="buyfield" name="product_id" value="<?php echo $get_single_product->product_id?>"/>
                                                    <input type="submit" class="buysubmit button_blue middle_btn" name="submit" value="Add to Cart"/>
                                                </form>
                                                <!-- <button type="submit" class="button_blue middle_btn" ></button> -->
                                             </div>
                                          
                                       </div>
                                    </div>


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
               <!-- End: Description section -->









               
                       <!--  <form action="<?php echo base_url('save/cart');?>" method="post">
                            <input type="number" class="buyfield" name="qty" value="1"/>
                            <input type="hidden" class="buyfield" name="product_id" value="<?php echo $get_single_product->product_id?>"/>
                            <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
                        </form>				
                     -->
                

            

