

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

                           <li class="breadcrumb-item active" aria-current="page">Checkout</li>

                        </ol>

                     </nav>

                  </div>

                  <div class="col-sm-12">

                     <h3>Checkout</h3>

                  </div>

               </div>

               <!-- End: Breadcrumb section -->



               <!-- Start: Shopping Cart section -->

               <div class="card checkoutPage">

                  <div class="card-body">                     

                     <div class="row table_wrapNew">

                        <div class="col-md-12">

                           <!-- Table -->

                           <style type="text/css">

                            #result{color:red;padding: 5px}

                            #result p{color:red}

                        </style>

                        <div id="result">

                            <p><?php echo $this->session->flashdata('message'); ?></p>

                        </div>

                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('save/order');?>" style="text-align: left">

                           <div class="responsiveNewTable">

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th width="50%" height="33" class="mobileFontTable tableThWidth" style="font-weight:bold;background:#EEEEEE; text-align:left; padding-left:5px;">Invoice address 

                                            

                                                </th>

                                            

                                                <th width="50%" class="mobileFontTable tableThWidth" style="font-weight:bold;background:#EEEEEE; text-align:left; padding-left:5px;">

                                                    Shipping Address 

                                                    

                                                </th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <tr>

                                                <td style="text-align:left" class="tableThWidth">

                                                  <?php echo $customer_info['customer_name']?>.<br>

                                                  <?php echo $customer_info['customer_address']?><br>

                                                  <?php echo $customer_info['city_name']?>, <br><br>Contact : <?php echo $customer_info['customer_phone']?>

                                                </td>

                                                <td style="text-align:left" class="tableThWidth">

                                                    <?php echo $active_shipping_info['shipping_name']; ?><br>

                                                    <?php echo $active_shipping_info['shipping_address'];?><br><?php echo $active_shipping_info['city_name']; ?>, 

                                                    <br><br>Contact : <?php echo $active_shipping_info['shipping_phone']; ?>                        

                                                    <select class="shipping_addresses" name="shipping_addresses" id="shipping_addresses">



                                                    <option value="">Choose another shipping address</option>

                                                    <?php foreach ($shipping_info as $key => $value) { ?>

                                                        <option value="<?php echo $value['shipping_id'] ?>"><?php echo $value['shipping_address'] ?>, <?php echo $value['city_name'] ?>, <?php echo $value['shipping_phone'] ?></option>

                                                    <?php } ?>

                                                    

                                                    </select>   

                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                                <?php if ($this->cart->total_items()) { ?>

                                <div class="responsiveNewTable">

                              <div class="clearfix spacer5"></div>

                                 <table class="table table-bordered">

                                    <thead>

                                       <tr>

                                          <th class="product_title_col"><b>Product</b></th>

                                          <th class="product_price_col">Price</th>

                                          <th class="product_qty_col">Qty</th>

                                          <th class="product_total_col">Total</th>

                                       </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                            $i = 0;

                                            foreach ($cart_contents as $cart_items) {

                                            $i++;

                                        ?>

                                       <tr>

                                          <td data-title="Product Name">

                                             <a href="#" class="product_title" title="">     

                                                <?php echo $cart_items['name'] ?>

                                             </a>

                                             <?php if($cart_items['prescription'] == '1'){ ?>

                                                Prescription Required

                                                <input class="span6 typeahead" name="prescription_image" id="fileInput" type="file"/>



                                            <?php }   ?>



                                          </td>

                                          <td data-title="Price"> Rs. <?php echo $this->cart->format_number($cart_items['subtotal']/$cart_items['qty']) ?></td>

                                          <td data-title="Quantity"> <?php echo $cart_items['qty'] ?> </td>

                                          <td data-title="Total" class="subtotal">

                                             Rs. <?php echo $this->cart->format_number($cart_items['subtotal']) ?>

                                          </td>

                                       </tr>

                                        <?php } ?>

                                    </tbody>

                                    <tfoot>

                                       <tr>                              

                                          <td colspan="3" align="right" class="bold">

                                             Subtotal

                                          </td>

                                          <td class="total">

                                         

                                             Rs. <?php echo $this->cart->format_number( $this->cart->total()); ?>                                  

                                          </td>

                                       </tr>

                                       <tr>

                                          <td colspan="3" align="right" class="bold">

                                             Tax (Included)

                                          </td>

                                          <td class="total">  Rs. <?php





                                                $total = $this->cart->total();

                                                $tax = ($total * 15) / 100;

                                                echo $this->cart->format_number($tax);

                                                ?></td>

                                       </tr>

                                       <tr>  

                                         <td colspan="3" align="right" class="bold">

                                             Handling Charges

                                         </td>   

                                         <td class="total" id="handling_charges">

                                            Rs. <?php echo $handling_charges; ?>

                                         </td>  

                                       </tr>

                                       <tr>

                                          <td colspan="3" align="right" class="bold">

                                             <div>

                                                <table border="0" cellpadding="0" cellspacing="0" class="mobilePaddingTable mobileTableRowStyle">

                                                   <tr>

                                                      <td width="15%;"><strong>Shipping Method:</strong> 

                                                      <td align="right" valign="top">

                                                        

                                                         <div id="shipping_method_1" class="row">

                                                            <?php foreach ($shipping_methods as $key => $value) { ?>

                                                                <?php if(isset($value['price']['price'] )){?>

                                                                <div class="col-md-3">

                                                               <label class="radio-inline radioDispaly"> 

                                                                  <input  class="shipping_method"type="radio" name="shipping_method" price="<?php echo $value['price']['price'] ?>" price_slot_id="<?php echo $value['price']['id'] ?>" courier_city_map_id="<?php echo $value['mapping_id']['id'] ?>" id="shipping_method" value="<?php echo $value['id'] ?>">

                                                                  <?php echo $value['shipping_method_name'] ?> 

                                                                  <br><span style="font-size:11px;font-style:italic;font-weight:bold;"><?php echo $value['description'] ?> </span><br> (Rs. <?php if(isset($value['price']['price'] )){

                                                                    echo $value['price']['price'] ;

                                                                  }else{ echo 'N/A'; }  ?> )

                                                               </label>         

                                                            </div>  

                                                           

                                                            <?php } } ?>

                                                                   

                                                        </div>

                                                      </td>                  

                                                   </tr>    

                                                </table>

                                             </div>

                                          </td>

                                          <td class="total" id="td_shipping_charge">

                                             Rs.<span id="shipping_price">0</span>

                                          </td>

                                       </tr>

                                       <?php       

                                       $total_amount = $handling_charges + (int)$this->cart->total();

                                       $coupon_discount = 0; 

                                       $discounted_amount = 0;

                                   



                                       if($discount != 0){

                                          $coupon_discount = $discount/100;



                                          $discounted_amount = ($handling_charges + (int)$this->cart->total()) * $coupon_discount;

                                          $total_amount = $total_amount - $discounted_amount;

                                       } 



                                       if($customer_group_discount_type != 0){

                                           if($customer_group_discount_type == 1){

                                             // 1 = percentage

                                           $discounted_amount = ($total_amount/100)*$customer_group_discount;

                                              



                                           }elseif ($customer_group_discount_type == 2) {

                                              $discounted_amount = $total_amount - $customer_group_discount;

                                           }



                                           $total_amount = $total_amount - $discounted_amount; 

                                             

                                       }



                                       // print_r($discounted_amount);

                                       // exit; 

                                       ?>

                                       



                                       <?php if($discounted_amount != 0){ ?>

                                       <tr>

                                          <td colspan="3" align="right" ><b>Discounted Amount</b></td>

                                          <td id="td_grand_total" class="total">

                                             <b>

                                                

                                             Rs. <span ><?php echo $discounted_amount; ?></span>

                                             </b> 

                                          </td>

                                       </tr>

                                       <?php } ?>

                                       <tr>

                                          <td colspan="3" align="right" ><b>Grand Total</b></td>

                                          <td id="td_grand_total" class="total">

                                             <b>

                                             

                                             Rs. <span id="show_grand_total_price"><?php echo $total_amount; ?></span>

                                             </b> 

                                          </td>

                                       </tr>

                                       <tr>

                                       <td colspan="4">

                                          <table class="mobilePaddingTable mobileTableRowStyle" width="99%" border="0" cellpadding="0" cellspacing="0">

                                             <tbody>

                                                <tr>

                                                   <td width="15%;">

                                                      <strong>Payment Method:</strong>

                                                   </td>

                                                    <td class="p_m" width="15%" align="center" id="p_m_id_1" valign="top">

                                                      <label class="radio-inline radioDispaly">     

                                                      <input type="radio" name="payment_method" class="payment_method" id="cod_method" value="1" data-charges="0">

                                                      Cash On Delivery               

                                                      </label>

                                                   </td> 

                                                   <!-- <td class="p_m" width="25%" align="center" id="p_m_id_2" valign="top">

                                                      <label class="radio-inline radioDispaly">     

                                                      <input type="radio" name="payment_method" class="payment_method" id="adamjee_method" value="2" data-charges="0">

                                                      Adamjee Insurance Card

                                                      </label>

                                                      <br/>

                                                      <span id="radio_button_span" style="font-size:11px;font-style:italic;font-weight:bold;">

                                                         <img style="width: 30%;" src="https://nexthealth.pk/images/adamjee.jpg"><br>Please send us your AdamJee Insurance Card on our whatsapp 923360006398 OR Email us at rx@nexthealth.pk 

                                                      </span>

                                                   </td> -->

                                                   

                                                   <!-- <td class="p_m" width="15%" align="center" id="p_m_id_3" valign="top">

                                                      <label class="radio-inline radioDispaly">     

                                                      <input type="radio" name="payment_method" class="payment_method" id="easypesa_method" value="3" data-charges="0">

                                                      Easy Paisa                  

                                                   </label>

                                                   </td> -->

                                                   <!-- <td class="p_m" width="25%" align="center" id="p_m_id_4" valign="top">

                                                      <label class="radio-inline radioDispaly">     

                                                      <input type="radio" name="payment_method" class="payment_method" id="jazzcash_method" value="4" data-charges="0">

                                                      Jazz Cash                      

                                                      </label>

                                                   </td> -->

                                                </tr>

                                                <table class="table table-bordered">

                                            <tfoot>

                                            <!-- <tr>

                                                <td align="left">

                                                    <b>Please Select Schedule Date For Future Delivery:</b>

                                                    <input type="date" id="txtDate" name="schedule_date" width="10px" min="2022-10-26">

                                                </td>



                                            </tr> -->

                                            </tfoot>

                                        </table>

                                             </tbody>

                                          </table>

                                       </td>

                                    </tr>

                                    </tfoot>             

                                 </table>                 

                                <div class="clearfix spacer5"></div>

                                </div>



                                  

                                  <input type="hidden" name="handling_charges" id="handling_charges" value="<?php echo $handling_charges ; ?>">

                                  <input type="hidden" name="total_before_shipping" id="total_before_shipping" value="<?php echo $total_amount  ?>" />

                                  <input type="hidden" name="total_after_shipping" id="total_after_shipping" value="" />

                                  <input type="hidden" name="active_courier_company" id="active_courier_company" value="<?php echo $active_courier_company['id'] ?>" />

                                  <input type="hidden" name="shipping_price_for_order_tbl" id="shipping_price_for_order_tbl" value="" />

                                  <input type="hidden" name="total_weight" id="total_weight" value="<?php echo $total_weight ?>" />

                                  <input type="hidden" name="discounted_amount" value="<?php echo $discounted_amount ?>">

                                  

                                  <input type="hidden" id="courier_map_id" name="courier_city_map_id" value="">

                                  



                                   <div class="responsiveNewTable responsiveNewMargin">

                                      <table class="table table-bordered">

                                         <tfoot class="tfootStyle">

                                            <td  colspan="2" class="buttonAlignRight">

                                               <button class="button_blue middle_btn middleCartMobile" >

                                                  Place Order

                                               </button>

                                            </td>

                                         </tfoot>

                                      </table>

                                      <div class="clearfix"></div>

                                   </div>

                                 <?php } ?>  



                         </form>        

                        </div>

                     </div>

                  </div>                  

               </div>        

            