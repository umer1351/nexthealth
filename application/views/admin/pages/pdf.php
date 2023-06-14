<body data-new-gr-c-s-check-loaded="14.1085.0" data-gr-ext-installed="" data-loom-blur-type="NONE">
    <table width="700" border="0" cellspacing="0" cellpadding="5">
     
        <tbody><tr>
            <td align="left" valign="top"><img src="https://nexthealth.pk/images/logo.png" border="0"></td>
            <td colspan="2" align="left" valign="top">
                <div style="font-weight:bold;padding:5px;text-align:right;">Order Code : <u><?php echo $_GET['order_id']; ?></u></div>
                <div style="font-weight:bold;padding:5px;text-align:right;">Order Date : <?php echo $order_info->order_date ?><br> </div>
            </td>
        </tr>
      
        <tr>
            <td colspan="3" align="right"><span class="printlink"><a href="javascript:void(null);" onclick="window.print();" style="color:#008BCE">print</a></span></td>
        </tr>
        <tr>
            <td width="33%" align="center" valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="3" style="border:1px solid #cccccc;">
                    <tbody><tr>
                        <td style="font-weight:bold;border-bottom:1px solid #cccccc;">Invoice address</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; padding-left:5px;"><?php echo $customer_info->customer_name; ?><br><?php echo $customer_info->customer_address; ?><br><?php echo $invoice_city; ?><br><br>Contact : <?php echo $customer_info->customer_phone; ?></td>
                    </tr>
                </tbody></table>
            </td>
            <td width="34%" align="center" valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="3" style="border:1px solid #cccccc;">
                    <tbody><tr>
                        <td style="font-weight:bold;border-bottom:1px solid #cccccc;">Delivery Address</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; padding-left:5px;"><?php echo $shipping_info->shipping_name; ?><br><?php echo $shipping_info->shipping_address; ?><br><?php echo $shipping_city; ?><br><br>Contact : <?php echo $shipping_info->shipping_phone; ?></td>
                    </tr>
                </tbody></table>
            </td>
            <td width="33%" align="center" valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="3" style="border:1px solid #cccccc;">
                    <tbody><tr>
                        <td style="font-weight:bold;border-bottom:1px solid #cccccc;">Shipping information</td>
                    </tr>
                    <tr>
                        <td style="text-align:left; padding-left:5px;">City : <?php echo $shipping_city; ?><br>Courier Company: <?php echo $active_courier_company['company_name'] ?><br>Shipping Method : <?php echo $payment_info->payment_method_name ?><br><br>Shipping Charges : Rs. <?php echo $ship_price?><br></td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">
                <table width="100%" border="0" cellspacing="0" cellpadding="4" style="border:1px solid #cccccc;">
                    <tbody><tr>
                        <th style="border-bottom:1px solid #cccccc;width:5%;text-align:center;font-weight:bold;">#</th>
                        <th style="border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:50%;text-align:left;font-weight:bold;">Item Name</th>
                        <th style="border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:15%;text-align:left;font-weight:bold;">&nbsp;</th>
                        <th style="border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:15%;text-align:left;font-weight:bold;">Quantity</th>
                        <th style="border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:15%;text-align:left;font-weight:bold;">Price</th>
                        <th style="border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:15%;text-align:left;font-weight:bold;">Tax (Included) </th>
                        <th style="border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;width:15%;text-align:left;font-weight:bold;">Sub Total</th>
                    </tr>

                     <?php 
                            $items_total = 0; 
                            foreach ($order_details_info as $key => $value) { ?>
                    <tr>
                            <td style="text-align:center;border-bottom:1px solid #cccccc;"><?php echo $key+1 ?></td>
                            <td style="border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;">
                                <table width="100%" cellpadding="2" cellspacing="0">
                                    <tbody><tr style="background:#FFFFFF">
                                      <td height="19" colspan="3"><?php echo $value->product_name ?></td>
                                      </tr>
                                    </tbody>
                                </table>                            
                            </td>
                            <td style="text-align:center;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;">&nbsp;</td>
                            <td style="text-align:center;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;"><?php echo $value->product_sales_quantity ?></td>
                            <td style="text-align:right;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;">Rs. <?php echo $value->product_price ?></td>
                            <td style="text-align:right;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;">Rs. <?php echo ($value->product_price * 15) / 100;   ?></td>
                            <td style="text-align:right;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;">Rs. <?php echo $value->product_sales_quantity*$value->product_price ?></td>
                        </tr>
                    <?php $items_total += $value->product_sales_quantity*$value->product_price;  } ?>
                                            <tr>
                        <td colspan="6" style="text-align:right;font-weight:bold;border-bottom:1px solid #cccccc;">Item Total <!--( <span class="discount">_DISCOUNT_15</span> )--></td>
                        <td style="text-align:right;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;">Rs. <?php echo $items_total    ?></td>
                    </tr>
                    
                    <tr>
                        <td colspan="6" style="text-align:right;font-weight:bold;border-bottom:1px solid #cccccc;">Tax (Included) <!--( <span class="discount">_DISCOUNT_15</span> )--></td>
                        <td style="text-align:right;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;">Rs. <?php echo ($items_total * 15) / 100;   ?></td>
                    </tr>

                    <tr>
                        <td colspan="6" style="text-align:right;font-weight:bold;border-bottom:1px solid #cccccc;">
                            Transaction Charges
                        </td>
                        <td style="text-align:right;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;">
                            Rs. 0.00                        </td>
                    </tr>
                    
                                        
                    
                    
                    
                    <tr>
                        <td colspan="6" style="text-align:right;font-weight:bold;border-bottom:1px solid #cccccc;">Shipping Charge</td>
                        <td style="text-align:right;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;">Rs. <?php echo $ship_price?></td>
                    </tr>

                    <tr>
                        <td colspan="6" style="text-align:right;font-weight:bold;border-bottom:1px solid #cccccc;">Grand Total</td>
                        <td style="text-align:right;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;">Rs. <?php echo  $order_info->handling_charges + $ship_price + $items_total;?></td>
                    </tr>
                    

                    <tr>
                        <td colspan="6" style="text-align:right;font-weight:bold;border-bottom:1px solid #cccccc;">Payment Method</td>
                        <td style="text-align:right;border-left:1px solid #cccccc;border-bottom:1px solid #cccccc;"><?php echo $payment_info->payment_method_name ?></td>
                    </tr>
                                                                                <tr>
                        <td colspan="7" style="padding-top:20px;border-bottom:1px solid #cccccc;">Thank you for your order.</td>
                    </tr>
                    <tr>
                        <td colspan="7" style="text-align:center;border-bottom:1px solid #cccccc;">Next Health<br>
Tel : 042-32-600-100<br>
e-mail: info@nexthealth.pk<br></td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="right"><span class="printlink"><a href="javascript:void(null);" onclick="window.print();" style="color:#008BCE">print</a></span></td>
        </tr>
    </tbody></table>

