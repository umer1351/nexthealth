start: Content -->

<div id="content" class="span10">





    <ul class="breadcrumb">

        <li>

            <i class="icon-home"></i>

            <a href="<?php echo base_url('dashboard') ?>">Home</a> 

            <i class="icon-angle-right"></i>

        </li>

        <li><a href="<?php echo base_url('manage/order') ?>">Order Details</a></li>

    </ul>



    <div class="row-fluid sortable">		

        <div class="box span12">

            <div class="box-header" data-original-title>

                <h2><i class="halflings-icon user"></i><span class="break"></span>Order Details - <?php echo $order_info->order_id?></h2>

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

                <div class="span4 text-left">

                    <h2>Billing Details</h2>

                    <table class="table table-striped table-bordered">

                        

                        <tr>

                            <td>Billing Adress : </td>

                            <td><?php echo $shipping_info->shipping_address; ?></td>

                        </tr>

                        <tr>

                            <td>Customer Mobile : </td>

                            <td><?php echo $customer_info->customer_phone; ?></td>

                        </tr>

                        <tr>

                            <td>Customer Email : </td>

                            <td><?php echo $customer_info->customer_email; ?></td>

                        </tr>

                        <tr>

                            <td>Print Invoice : </td>

                            <td><a href="javascript:void(null);" onclick="window.open('<?php echo base_url() ?>print_invoice?order_id=<?php echo $order_info->order_id?>', 'INV', 'width=720,height=550,scrollbars=yes');" class="loginlink"><?php echo ' Invoice';?>

                                </a></td>

                        </tr>

                    </table>

                </div>

                <div class="span4"></div>

                <div class="span4 text-right" class="table table-striped table-bordered">

                    <h2>Add Products</h2>



                        <div class="form-popup" id="myForm">

                          <!-- <form action="/action_page.php" class="form-container"> -->

                           

                            

                            <form action="<?php echo base_url() ?>order/order_update_add_product" method="POST">

                              <label for="products">Choose Products from below:</label>

                              <input type="hidden" name="order_id" value="<?php echo $order_info->order_id?>">

                              <input type="number" name="quantity" value="1" placeholder="Qty"> 

                              <br> 

                              <input list="products" name="product" id="search_products" placeholder="product Name">

                              <div id="product_results">

                                  

                              </div>

                              <br>

                              <button type="submit" class="btn">Add</button>

                              <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

                            </form>

                            <!-- <input type="text" id="search_products" class="form-control searchInputTag" placeholder="Search for Products" > -->

                            <!-- <div id="products_search"></div>  -->

                            



                            

                            

                            

                          <!-- </form> -->

                        </div>

                            <button class="button btn btn-primary" onclick="order_edit_add_product()">Add +</button>

                    

                </div>

                <table class="table table-striped table-bordered">

                    <thead>

                        <tr>

                            <th>Sr.</th>

                            <th>Product Name</th>

                            <th>Product Image</th>

                            <th>Product Price</th>

                            <th>Product Qty</th>

                            <th>Product Subtotal</th>

                            <th>Actions</th>

                        </tr>

                    </thead>   

                    <tbody>

                        <?php

                        $i = 0;

                        foreach ($order_details_info as $single_order_details) {

                            $i++;

                            ?>

                            <tr>

                                <td><?php echo $i; ?></td>

                                <td><?php echo $single_order_details->product_name ?></td>

                                <td><?php if($single_order_details->product_image != 0){ ?>

                                    <img style='height: 50px; width: 50px;' src="<?php echo base_url('uploads/thumbs/' . $single_order_details->product_image) ?>" class="img-fluid" alt="">

                                    <?php }else{ ?>

                                       <img style='height: 50px; width: 50px;' src="<?php echo base_url('uploads/thumbs/placeholder.jpg') ;?>" class="img-fluid" alt="test">

                                    <?php } ?></td>

                                <td>Rs.<?php echo $this->cart->format_number($single_order_details->product_price)?> </td>

                                <td><input type="number" name="product_qty" value="<?php echo $single_order_details->product_sales_quantity ?>"></td>

                                <td>Rs. <?php echo $this->cart->format_number($single_order_details->product_price * $single_order_details->product_sales_quantity) ?></td>

                                <td><button onclick="remove_product_from_order(<?php echo $single_order_details->order_details_id  ?>, <?php echo $order_info->order_id ?>,<?php echo $single_order_details->product_id ?>);">x</button></td>

                            </tr>

                        <?php } ?>

                    </tbody>

                    <tfooter>

                        <tr>

                            <td colspan="5">Total Amount</td>

                            <td>= Rs.<?php echo $this->cart->format_number($order_info->order_total)?> </td>

                        </tr>

                        <tr>

                            <td colspan="5">Total Amount</td>

                            <td>= Rs.<?php echo $this->cart->format_number($order_info->order_total)?> </td>

                        </tr>

                        <tr>

                            <td colspan="5">Total Amount</td>

                            <td>= Rs.<?php echo $this->cart->format_number($order_info->order_total)?> </td>

                        </tr>

                    </tfooter>

                </table> 

                

                            

            </div>



            

        </div><!--/span-->



    </div><!--/row-->







</div><!--/.fluid-container-->



<!-- end: Content