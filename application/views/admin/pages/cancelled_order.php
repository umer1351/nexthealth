<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/product')?>">Cancelled Order</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Cancelled Order</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            
            <div class="box-content">
                <table width="100%" cellspacing="1" class="table table-striped table-bordered bootstrap-datatable datatable">
                      <tbody>
                        <tr class="heading">
                            <th style="width:14%;text-align:left; padding-left:4px;">Order Code</th>
                            <th style="width:20%;text-align:left;padding-left:4px;">Date</th>
                            <th style="width:15%;text-align:left;padding-left:4px;">Grand Total</th>
                            <th style="width:10%;text-align:left;padding-left:4px;">Status</th>
                            <th style="width:15%;text-align:left;padding-left:4px;">&nbsp;</th>
                            <th style="width:24%;text-align:left;padding-left:4px;">Action</th>
                        </tr>
                        <?php foreach ($all_manage_order_info as $key => $value) { ?>
                        <tr>
                            <td class="clsleft"><?php echo $value['order_id'] ?></td>
                            <td class="clsleft"><?php echo $value['order_date'] ?></td>
                            <td align="left" class="clsleft" style="text-transform:capitalize;">Rs. <?php echo $value['order_total'] ?></td>
                            <td class="clsleft">Cancelled</td>
                            <td style="text-align:right;">
                                <a class="loginlink" href="javascript:void(null);" onclick="show_order_details('<?php echo $value["order_id"] ?>');" title="View order details">Order Details 
                                <img src="https://nexthealth.pk/images/arrow-asc.png" border="0">
                                </a>
                            </td>
                            <td>
                                <form method="post" action="<?php echo base_url()?>order/details/<?php echo $value["order_id"]  ?>" name="edit_order">
                                    
                                    <button class="btn btn-primary">Edit</button>
                                </form>
                                
                                 <!-- <form method="post" action="<?php echo base_url()?>manage/process_order" name="Reorder">
                                    <input type="hidden" name="order_id" value="<?php echo $value["order_id"] ?>">
                                    <button class="btn btn-success">Process</button>
                                </form> -->
                                <form method="post" action="<?php echo base_url()?>manage/delete_order" name="Reorder">
                                    <input type="hidden" name="order_id" value="<?php echo $value["order_id"] ?>">
                                    <button class="btn btn-danger">Delete</button>
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
                                                Rs. 0.00                        </td>
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
                                                <?php echo $value['shipping_method'] ?>                     </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" style="text-align:right; padding:2px;">
                                                Courier Company :
                                            </td>
                                            <td colspan="2" style="text-align:right; padding:2px;">
                                                <?php echo $value['courier_company'] ?>                         </td>
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
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->