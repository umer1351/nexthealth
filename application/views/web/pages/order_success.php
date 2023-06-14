
<main class="col-md-12 col-sm-12">
<div class="ckeckout">
        <div class="container">
            <div class="cartInfo">
                <div style="text-align:justify;margin:0px 0px 10px 0px;">
                    Dear <b><?php echo $customer_info->customer_name; ?></b>,<br><br>
                    Thanks for your order.                          
                    <br>
                    Your Order Number is:  <b><?php echo $order_info->order_id; ?></b>
                    <br>                         
                    <br>
                </div>
                <div style="text-align:right;margin:0px 10px 15px 0px;">
                    <a href="javascript:void(null);" onclick="window.open('<?php echo base_url() ?>print_invoice?order_id=<?php echo  $order_info->order_id;?>', 'INV', 'width=720,height=550,scrollbars=yes');" class="loginlink"><?php echo 'Print Invoice';?>
                                </a>
                </div> 
                <table width="100%" style="border:1px solid #cccccc;" class="table table-responsive">
                    <tbody><tr><td width="33%" height="30" style="font-weight:bold;background:#EEEEEE; text-align:left; padding-left:5px;">Invoice address</td>                     
                    <td width="33%" style="font-weight:bold;background:#EEEEEE; text-align:left; padding-left:5px;">Delivery Address</td>
                    <td width="33%" style="font-weight:bold;background:#EEEEEE; text-align:left; padding-left:5px;">Shipping information</td>
                    </tr>

                    <tr><td style="text-align:left; padding-left:5px;"><?php echo $customer_info->customer_name; ?><br><?php echo $customer_info->customer_address; ?><br><?php echo $invoice_city; ?><br><br>Contact : <?php echo $customer_info->customer_phone; ?></td>
                    <td style="text-align:left; padding-left:5px;"><?php echo $shipping_info->shipping_name; ?><br><?php echo $shipping_info->shipping_address; ?><br><?php echo $shipping_city; ?><br><br>Contact : <?php echo $shipping_info->shipping_phone; ?></td>
                    <td style="text-align:left; padding-left:5px;">City : <?php echo $shipping_city; ?><br>Courier Company: <?php echo $active_courier_company['company_name'] ?><br>Shipping Method : <?php echo $payment_info->payment_method_name ?><br><br>Shipping Charges : Rs. <?php echo $ship_price?><br></td>                        
                    </tr>

                    </tbody>
                </table>
                        
                        
                <div style="margin-bottom:15px;clear:both;"></div>
                <div class="table-responsive responsiveNewTable">
                    <table width="99%" cellspacing="1" id="cartdetail" class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Product Name</th>
                            <th>Requirements</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>

                        

                            <?php 
                            $items_total = 0; 
                            foreach ($order_details_info as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value->product_name ?></td>
                                <td><i>N/A</i></td>
                                <td><?php echo $value->product_sales_quantity ?></td>
                                <td align="right">
                                    Rs. <?php echo $value->product_price ?>
                                </td>
                                <td align="right">
                                    Rs. <?php echo $value->product_sales_quantity*$value->product_price ?>
                                </td> 
                             </tr>

                            <?php $items_total += $value->product_sales_quantity*$value->product_price;  } ?>  
                        
                                                        
                        <tr>
                            <td align="right" colspan="4">Order Code</td>
                            <td align="right"><?php echo $this->uri->segment(3); ?></td>
                        </tr>
                        <tr>
                            <td align="right" colspan="4">Item Total <!--( <span class="discount">_DISCOUNT_15</span> )--></td>
                            <td align="right">Rs. <?php echo $items_total; ?></td>
                        </tr>
                        
                                                        
                        <tr>
                            <td align="right" colspan="4">Tax (Included)</td>
                            <td align="right">Rs. <?php echo $tax = ($items_total * 15) / 100; ?></td>
                        </tr>

                        <tr>
                            <td align="right" colspan="4">Transaction Charges</td>
                            <td align="right">
                                Rs. 0.00                                    </td>
                        </tr>
                        
                        <tr>
                            <td align="right" colspan="4">Shipping Charge</td>
                            <td align="right">Rs. <?php echo $ship_price?></td>
                        </tr>
                        
                        <tr>        
                            <td align="right" colspan="4">Handling Charges</td>     
                            <td align="right">Rs. <?php echo $order_info->handling_charges ?></td>     
                        </tr>

                        <tr>
                            <td align="right" colspan="4">Grand Total</td>
                            <td align="right">Rs. <?php echo  $order_info->order_total;?></td>
                        </tr>

                        <tr>
                            <td align="right" colspan="4">Payment Method</td>
                            <td align="right"><?php echo $payment_info->payment_method_name ?></td>
                        </tr>
                    </tbody>
                 </table>
                </div>
                <div style="margin-bottom:15px;clear:both;"></div>
                <div style="text-align:right;margin-right:10px;">
                   <a href="javascript:void(null);" onclick="window.open('<?php echo base_url() ?>print_invoice?order_id=<?php echo $order_info->order_id; ?>', 'INV', 'width=720,height=550,scrollbars=yes');" class="loginlink"><?php echo 'Print Invoice';?>
                    </a>
                </div>            
            </div>      
        </div>
    </div>
</main>
