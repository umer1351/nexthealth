<div class="container">



    <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->



	<div class="row">

      <div class="col-sm-12">

         <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

               <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"> 

                  <i class="bi bi-house-fill"></i> Home</a>

               </li>

               <li class="breadcrumb-item active" aria-current="page">Guest Checkout</li>

            </ol>

         </nav>

      </div>

      <div class="col-sm-12">

         <h3>Guest Checkout</h3>

      </div>

    </div>



    <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->

				

					

	<div class="card checkoutPage">

	<!-- Default panel contents -->

		<div class="card-body"> 

		<!-- Table -->

        <form method="post" action="<?php echo base_url('save/guest_order');?>" style="text-align: left">

		  <div class="responsiveNewTable">

			<table class="table table-bordered tableCheckOutMobile">

			    <thead>

					<tr>

					  <th class="mobileFontTable" style="font-weight:bold;background:#EEEEEE; text-align:left; padding-left:5px;"> Guest Details</th>

				  

					  <th class="mobileFontTable mobilehideTh" style="font-weight:bold;background:#EEEEEE; text-align:left; padding-left:5px;"></th>

                    </tr>

				</thead>

				<tbody>

					<tr>

					  <td style="text-align:left;">

                        <label class="required">Name</label>

                        <input name="ship_contact_name" type="text" id="ship_contact_name" tabindex="3" placeholder="Name" value="" ;="" required="">

						<span style="font-style:italic;font-size:0.85em"></span>

						<label class="">Email Address</label>

                        <input name="vEmailAddress" type="email" id="vEmailAddress" tabindex="3" placeholder="E-mail" value="" ;="" required="">

                      </td>

					  <td style="text-align:left">

						<label class="required">Shipping Address</label>

                        <input name="ship_address" type="text" id="vAddress" tabindex="1" placeholder="Address" value="" required="">

						<br>

						<span style="font-style:italic;font-size:0.85em">(Shipping Address in Pakistan)</span>

                        <div  class="row tableCheckOutMobileDisplay">

						 <div class="col-md-6" style="width:100%;" >

                            <label class="required">City</label>

							<br>

                            <select name="guest_city" id="guest_city" class="" style="padding: 9px 8px;margin-bottom: 8px;">

                                <option value="">Select City</option>

                                <?php foreach ($cities as $key => $city) { ?>

                                   <option value="<?php echo $city->id ?>"><?php echo $city->city_name ?></option>

                               <?php } ?>

                            </select>   

                         </div>

						 <div class="col-md-6" style="width:100%;">

					      <label oncopy="return false" onpaste="return false" oncut="return false" class="required" >Phone Number</label>

								<br>

                          <input name="ship_contact_phone" type="tel" pattern="92[0-9]{10}" id="vCellNumber" tabindex="4" placeholder="923211234567" value="" required="">

								<br>

						  <span style="font-style:italic;font-size:0.85em">Format for mobile: 923211234567<br>Format for landline: 924232600100</span>

						 </div>

                        </div>

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

                                                        

                                                         <div id="shipping_method_" class="row">

                                                            

                                                                   

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

                                       <tr>

                                          <td colspan="3" align="right" ><b>Grand Total</b></td>

                                          <td id="td_grand_total" class="total">

                                             <b>

                                                <?php $grand_total =  $handling_charges  + $this->cart->total(); ?>

                                             Rs. <span id="show_grand_total_price"><?php echo $grand_total; ?></span>

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

                                                   <!-- <td class="p_m" id="p_m_id_2" width="25%" align="center" valign="top">

                                                      <label class="radio-inline radioDispaly">     

                                                      <input type="radio" name="payment_method" class="payment_method" id="adamjee_method" value="2" data-charges="0">

                                                      Adamjee Insurance Card

                                                      </label>

                                                      <br/>

                                                      <span id="radio_button_span" style="font-size:11px;font-style:italic;font-weight:bold;">

                                                         <img style="width: 30%;" src="https://nexthealth.pk/images/adamjee.jpg"><br>Please send us your AdamJee Insurance Card on our whatsapp 923360006398 OR Email us at rx@nexthealth.pk 

                                                      </span>

                                                   </td> -->

                                                   <td class="p_m" id="p_m_id_1" width="15%" align="center" valign="top">

                                                      <label class="radio-inline radioDispaly">     

                                                      <input type="radio" name="payment_method" class="payment_method" id="cod_method" value="1" data-charges="0">

                                                      Cash On Delivery               

                                                      </label>

                                                   </td> 

                                                   <!-- <td class="p_m" id="p_m_id_3" width="15%" align="center" valign="top">

                                                      <label class="radio-inline radioDispaly">     

                                                      <input type="radio" name="payment_method" class="payment_method" id="easypesa_method" value="3" data-charges="0">

                                                      Easy Paisa                  

                                                   </label>

                                                   </td> -->

                                                   <!-- <td class="p_m" id="p_m_id_4" width="25%" align="center" valign="top">

                                                      <label class="radio-inline radioDispaly">     

                                                      <input type="radio" name="payment_method" class="payment_method" id="jazzcash_method" value="4" data-charges="0">

                                                      Jazz Cash                      

                                                      </label>

                                                   </td> -->

                                                </tr>

                                             </tbody>

                                          </table>

                                       </td>

                                    </tr>

                                    </tfoot>             

                                 </table>                 

                              <div class="clearfix spacer5"></div>

                                </div>





                                  <input type="hidden" name="handling_charges" id="handling_charges" value="<?php echo $handling_charges ; ?>">

                                  <input type="hidden" name="total_weight" id="total_weight" value="<?php echo $total_weight ; ?>">

                                  <input type="hidden" name="total_before_shipping" id="total_before_shipping" value="<?php echo $handling_charges + $this->cart->total(); ?>" />

                                  <input type="hidden" name="total_after_shipping" id="total_after_shipping" value="" />

                                  <input type="hidden" name="active_courier_company" id="active_courier_company" value="<?php echo $active_courier_company['id'] ?>" />

                                  <input type="hidden" name="shipping_price_for_order_tbl" id="shipping_price_for_order_tbl" value="" />

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