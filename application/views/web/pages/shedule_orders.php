<div class="product-detail-page">
    <div class="container-fluid">
       <div class="container">
		<div class="table_wrapNew">
			<div class="responsiveNewTable">

				<table width="100%" cellspacing="1" class="table table-striped table-bordered">
	                  <tbody>
	                  	<tr class="heading">
		                	<th style="width:14%;text-align:left; padding-left:4px;">Order Code</th>
					      	<th style="width:20%;text-align:left;padding-left:4px;">Date</th>
					      	<th style="width:15%;text-align:left;padding-left:4px;">Grand Total</th>
					      	<th style="width:10%;text-align:left;padding-left:4px;">Status</th>
					      	<th style="width:15%;text-align:left;padding-left:4px;">&nbsp;</th>
					      	<th style="width:24%;text-align:left;padding-left:4px;">Action</th>
		                </tr>
		                <?php foreach ($orders as $key => $value) { ?>
	                	<tr>
			                <td class="clsleft"><?php echo $value['order_id'] ?></td>
			                <td class="clsleft"><?php echo $value['order_date'] ?></td>
			                <td align="left" class="clsleft" style="text-transform:capitalize;">Rs. <?php echo $value['order_total'] ?></td>
			                <td class="clsleft"><?php if($value['status'] == '0'){ echo 'Pending';}else{ echo 'Processed';}  ?></td>
			                <td style="text-align:right;">
								<a class="loginlink" href="javascript:void(null);" onclick="show_order_details('<?php echo $value["order_id"] ?>');" title="View order details">Order Details 
								<img src="https://nexthealth.pk/images/arrow-asc.png" border="0">
								</a>
							</td>
							<td>
								<i>NA</i>
							     <form method="post" action="" name="Reorder">
	                                <input type="hidden" name="btnReorder" value="1">
	                                <input type="hidden" name="order_cd" value="0c0d38120604">
	                            	<button class="btn button_blue middle_btn repay_btn">Re-Order</button>
	                            </form>
							</td>
					    </tr>
			    		<tr id="<?php echo $value['order_id'] ?>" style="display: none;" bgcolor="">
			    			<td colspan="1">
			    				<a href="javascript:void(null);" onclick="window.open('<?php echo base_url() ?>print_invoice?order_id=<?php echo $value['order_id'] ?>', 'INV', 'width=720,height=550,scrollbars=yes');" class="loginlink"><?php echo 'Print Invoice';?>
								</a>
							</td>
			    			<td colspan="5">
				    			<table width="100%" cellpadding="0" cellspacing="0" style="background:#CCCCCC" class="wordRapText">
									<tbody>
										<tr style="background:#CCCCCC">
											<th style="width:41%;text-align:left; padding:2px;" colspan="2">Item</th>
											<th style="width:33%;text-align:left; padding:2px;" class="wordRapTextTH">
												Prescription / Doc Details						
											</th>
											<th style="width:15%; padding:2px;">Quantity</th>
											<th style="width:15%;text-align:right; padding:2px;text-transform:capitalize;">Price</th>
											<th style="width:16%;text-align:right; padding:2px;    text-transform: capitalize;">Total</th>
										</tr>
										<?php $total = 0;   foreach ($value['order_details'] as $key1 => $value1) { ?>
											
										
										<tr style="background:#CCCCCC">
											<td style="text-align:left; padding:2px;" colspan="2">
											  <table class="responsiveNewTableInner" width="100%" cellpadding="2" cellspacing="0">
												<tbody>
												<tr >
												  <td height="19" colspan="3" class="wordRapTextTH"><?php echo $value1->product_name ?></td>
												  </tr>
												</tbody>
											  </table>
											</td>
											<td style="text-align:left; padding:2px;" class="wordRapTextTH">
															<i>N/A</i>
											</td>
											<td style="padding:2px;"><?php echo $value1->product_sales_quantity ?></td>
											<td style="text-align:right; padding:2px;    text-transform: capitalize;">Rs. <?php echo $value1->product_price ?></td>
											<td style="text-align:right; padding:2px;    text-transform: capitalize;">Rs. <?php  $total += ($value1->product_price * $value1->product_sales_quantity);
												echo ($value1->product_price * $value1->product_sales_quantity);
											 ?></td>
										</tr>
										<?php } ?>
										<tr>
											<td colspan="4" style="text-align:right; padding:2px;">Sub Total<!--( <span class="discount">@15% Discount</span> )-->:</td>
											<td colspan="2" style="text-align:right; padding:2px;text-transform:capitalize;">Rs. <?php echo $total ?></td>
										</tr>
					
										<tr>
											<td colspan="4" style="text-align:right; padding:2px;">Tax (Included) <!--( <span class="discount">@15% Discount</span> )-->:</td>
											<td colspan="2" style="text-align:right; padding:2px;">Rs. <?php echo ($total * 15) / 100;   ?></td>
										</tr>

										<tr>
											<td colspan="4" style="text-align:right; padding:2px;">
												Transaction Charges :
											</td>
											<td colspan="2" style="text-align:right; padding:2px;">
												Rs. 0.00						</td>
										</tr>
										<tr>	
                                            <td colspan="4" style="text-align:right; padding:2px;">	
                                                Handling Charges :	
                                            </td>	
                                            <td colspan="2" style="text-align:right; padding:2px;">	
                                                Rs. <?php echo $value['handling_charges'] ?>	
                                            </td>	
                                        </tr>
					
									
										<tr>
											<td colspan="4" style="text-align:right; padding:2px;">Shipping Charges:</td>
											<td colspan="2" style="text-align:right; padding:2px;">Rs. <?php echo $value['shipping_price'] ?></td>
										</tr>
					


										<tr>
											<td colspan="4" style="text-align:right; padding:2px;">
												Shipping Method :
											</td>
											<td colspan="2" style="text-align:right; padding:2px;">
												<?php echo $value['shipping_method'] ?>						</td>
										</tr>

										<tr>
											<td colspan="4" style="text-align:right; padding:2px;">
												Courier Company :
											</td>
											<td colspan="2" style="text-align:right; padding:2px;">
												<?php echo $value['courier_company'] ?>							</td>
										</tr>
					

					                    <tr>
											<td colspan="4" style="text-align:right; padding:2px;">Payment Method:</td>
											<td colspan="2" style="text-align:right; padding:2px;text-transform:capitalize;"><?php echo $value['payment_method'] ?> <br> </td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>