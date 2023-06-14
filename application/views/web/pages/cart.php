

<div class="product-detail-page">
            <div class="container-fluid">
               <!-- Start: Breadcrumb section -->
               <div class="row">
                  <div class="col-sm-12">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"> 
                              <i class="bi bi-house-fill"></i> Home</a>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                     </nav>
                  </div>
               </div>
               <!-- End: Breadcrumb section -->
            <?php if ($this->cart->total_items()) { ?>
               <!-- Start: Shopping Cart section -->
               <div class="card">
                  <div class="card-body">                     
                     <div class="row table_wrapNew">
                        <div class="col-md-12">
                           <!-- Table -->
                           <div class="responsiveNewTable">
                              <table class="table table-bordered">
                                 <thead>
                                    <tr>
                                       <th class="product_image_col mobileDisplayNone">Product Image</th>
                                       <th class="product_title_col">Product</th>
                                       <th>Price</th>
                                       <th class="product_qty_col">Qty</th>
                                       <th>Total</th>
                                       <th class="product_actions_col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $i = 0;
                                        foreach ($cart_contents as $cart_items) {
                                        $i++;
                                       ?>
                                    <tr>
                                       <td class="product_image_col mobileDisplayNone" data-title="Product Image">      
                                          <a href="#" title="Actifed">
                                             <img src="<?php echo base_url('uploads/thumbs/' . $cart_items['options']['product_image']) ?>" class="img-fluid" alt="<?php echo $cart_items['name'] ?>">
                                          </a>
                                       </td>
                                       <td data-title="Product Name">
                                          <a href="#" class="product_title">
                                            <?php echo $cart_items['name'] ?>
                                          </a>
                                       </td>
                                       <td class="subtotal" data-title="Price">
                                          Rs. <?php echo $this->cart->format_number($cart_items['subtotal']/$cart_items['qty']) ?>
                                       </td>
                                       <td class="product_qty_td" data-title="Quantity">
                                            <form action="<?php echo base_url('update/cart'); ?>" method="post">
                                                <input type="number" class="quantity" name="qty" value="<?php echo $cart_items['qty'] ?>"/>
                                                <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>"/>
                                                <input type="submit" name="submit" value="Update"/>
                                            </form>
                                        
                                       </td>
                                       <td class="total" data-title="Total">
                                          Rs. <?php echo $this->cart->format_number($cart_items['subtotal']) ?>
                                       </td>

                                       <td data-title="Action">
                                         <!--  <a href="#" class="button_dark_grey icon_btn edit_product">
                                             <i class="bi bi-pencil-fill"></i>
                                          </a> -->
                                          <a href="#" class="button_dark_grey ">
                                             
                                                <form action="<?php echo base_url('remove/cart'); ?>" method="post">
                                                    <input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>"/>
                                                    <input type="submit" name="submit" value='X'/>
                                                </form>
                                          </a>                                          
                                       </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                           <div class="responsiveNewTable">
                              <div class="clearfix spacer5"></div>
                              <div class="col-md-4 offset-md-8 paddingRight paddingRightMobile">
                                 <table class="table table-bordered">
                                    <tbody>
                                       <tr>
                                          <td>Subtotal</td>
                                          <td class="fontStyle600">
                                             Rs. <?php echo $this->cart->format_number($this->cart->total()) ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Tax (Included):</td>
                                          <td class="fontStyle600">
                                             Rs. <?php
                                                $total = $this->cart->total();
                                                $tax = ($total * 15) / 100;
                                                echo $this->cart->format_number($tax);
                                                ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             Grand Total
                                          </td>
                                          <td class="fontStyle600">
                                             Rs. <?php echo $this->cart->format_number($this->cart->total()); ?>
                                          </td>
                                       </tr>
                                       
                                    </tbody>             
                                 </table>
                              </div>                  
                              <div class="clearfix spacer5"></div>
                           </div>

                           <div class="responsiveNewTable responsiveNewMargin">
                              <table class="table table-bordered">
                                 <tfoot class="tfootStyle">
                                    
                                    <td colspan="2" class="buttonAlignLeft">
                                       <a href="<?php echo base_url() ?>" class="button_blue middle_btn middleCartMobile">
                                          Continue Shopping
                                       </a>
                                    </td>
                                    <td  colspan="2" class="buttonAlignRight">
                                         <?php
                                            $customer_id = $this->session->userdata('customer_id');
                                            if (empty($customer_id)) {
                                                ?>
                                                <a class="button_blue middle_btn middleCartMobile" href="<?php echo base_url('user_form?guest=1') ?>">
                                                  Proceed to Checkout
                                               </a>
                                                <?php
                                            } elseif (!empty($customer_id)) {
                                                ?>
                                                <form action="<?php echo base_url('checkout'); ?>" method="post">
                                                   
                                                      Coupon
                                                   
                                                
                                                      <input type="text" name="coupon" value="">
                                                   
                                                <button class="button_blue middle_btn middleCartMobile" type="submit">Proceed to Checkout</button>
                                                  
                                             </form>
                                              
                                                <?php
                                            }
                                            ?>
                                       
                                    </td>
                                 </tfoot>
                              </table>
                              <div class="clearfix"></div>
                           </div>


                        </div>
                     </div>
                  </div>                  
               </div>
               <!-- End: Shopping Cart section -->               
            <?php } else {
                    echo "<h1>Your Cart Is Empty</h1>";
                } ?>
            </div>
         </div>



