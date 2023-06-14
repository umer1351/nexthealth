
<style type="text/css">
   .table-striped>tbody>tr td.sorting_1 {
    background: #e7f1ff;
    color: #0c63e4 !important;
    font-size: 1.5rem;
}
   div.dataTables_wrapper div.dataTables_length label {
    font-weight: normal;
    text-align: left;
    white-space: nowrap;
   }
   label {
       display: inline-block;
   }
   div.dataTables_wrapper div.dataTables_length select {
       width: auto;
       display: inline-block;
   }
   select {
    width: 100%;
    cursor: pointer;
    padding: 5px;
    border: 1px solid #eaeaea;
    background-color: #fff;
    color: #000;
    word-wrap: normal;
}
div#DataTables_Table_0_length {
    float: left;
}
div#DataTables_Table_0_filter {
    float: right;
    margin-bottom: 25px;
}
tr.row.odd, tr.row.even {
    margin-bottom: 20px;
}
div.dataTables_wrapper div.dataTables_info {
    padding-top: 0.85em;
    float: left;
}
div.dataTables_wrapper div.dataTables_paginate {
    margin: 0;
    white-space: nowrap;
    float: right;
}
a#DataTables_Table_0_previous, .dataTables_paginate span, .dataTables_paginate span a{
    padding: 5px;
}
.dataTables_paginate span a.paginate_button.current {
    color: #fff;
    background: #00569b;
    text-align: center;
    border-radius: 5px;
}
a#DataTables_Table_0_previous, .dataTables_paginate span, .dataTables_paginate span a, .paginate_button.next{
   cursor: pointer;
}
</style>
<main>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12  mt-4">
            <h1 class="text-center">"Special Offer On Lab Tests"</h1>
         </div>
         <div class="col-md-12 mb-4 ">
            <!-- <h6 class="text-center" style="color:red;">(Consult your Physician before use)</h6> -->
         </div>
         
         <div class="col-lg-12 col-md-12 col-sm-12 col-12" >
            <div class="card">
               <div class="card-body">
                  <div class="bd-example p-2">
                     <table class="table table-striped table-bordered mt-4">
                        <thead style="display: none;">
                           <?php for ($i=0; $i < 5; $i++) {  ?>
                            <th></th>
                         <?php   }?>
                           
                           <!-- <th></th>
                            <th></th>
                           <th></th>
                           <th></th> --> 
                        </thead>
                        <tbody>
                           <?php $count =1; foreach ($get_all_product as $key => $single_product) { ?>
                           <tr class="row">
                              <td colspan="5"> <?php echo $single_product['salt_name'] ?></td>
                              <?php foreach ($single_product['product_details'] as $key => $value) { ?>
                              <td class="col-lg-3 col-md-4 col-sm-6 col-6 colMdBorderRightBottom">
                                 <div >
                                    <div >
                                       <div class="categoryProductDiv">
                                          <a href="<?php echo base_url('product/' . $value['product_url']); ?>">
                                             <div class="categoryProductImg">
                                                <!-- Discount circle HTML -->
                                                <?php if(($value['discount_type'] != 0)){ ?>
                                                <div class="product-off-border">
                                                   <div class="weight-bold px-5px"> 
                                                      <?php echo $value['discount']; ($value['discount_type'] == 1) ? ( $type = '%') : ( $type = 'Rs.'); echo $type;?>  Off 
                                                   </div>
                                                </div>
                                                <?php } ?>
                                                <!-- Discount circle HTML -->
                                                <?php if($value['product_image'] != '0'){ ?>
                                                <img src="<?php echo base_url('uploads/thumbs/' . $value['product_image']) ?>" class="img-fluid" alt="Nexthealth">
                                                <?php }else{ ?>
                                                <img src="<?php echo base_url('uploads/thumbs/placeholder.jpg') ;?>" class="img-fluid" alt="Nexthealth">
                                                <?php } ?>
                                             </div>
                                          </a>
                                          <div class="categoryProductInfo">
                                             <a href="<?php echo base_url('product/' . $value['product_url']); ?>">
                                                <div class="categoryProductTitle">
                                                   <?php echo  $value['product_title']; ?>
                                                </div>
                                             </a>
                                             <!--  -->
                                             <div class="categoryProductDescription">
                                                <?php echo  $value['product_brand']; ?>
                                             </div>
                                             <div class="categoryProductPrice">
                                                <span <?php if(($value['discount_type'] != 0)){ ?> style='text-decoration-line: line-through; ' <?php } ?> class="categoryPriceTag <?php if(($value['discount_type'] != 0)){ ?> have-discount <?php }  ?> ">Rs: <?php echo $this->cart->format_number($value['product_price']); ?></span>
                                                <?php if($value['discount_type'] != 0){ ?>
                                                <span class="special_price discounted " style="color: red;">
                                                   <div class="price">Rs: <?php echo $value['product_sale_price']; ?></div>
                                                </span>
                                                <?php } ?>
                                             </div>
                                             <form action="<?php echo base_url('save/cart');?>" method="post">
                                                <input type="hidden" class="buyfield" name="qty" value="1" <?php if($value['purchase_qty_limit'] != 0){ ?>
                                                   max = <?php echo $value['purchase_qty_limit']; ?>
                                                   <?php } ?>/>
                                                <!-- Discounted Price For CART -->
                                                <?php if($value['discount_type'] != 0){ ?>
                                                <input type="hidden" class="buyfield" name="discounted_price" value="<?php echo $value['product_sale_price']; ?>"/>
                                                <?php } ?>
                                                <!-- Discounted Price For CART -->
                                                <input type="hidden" class="buyfield" name="product_id" value="<?php echo $value['product_id']?>"/>
                                                <input type="submit" class="buysubmit button_blue middle_btn" name="submit" value="Add to Cart"/>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <?php } ?>
                           </tr>
                           <?php $count++;} ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
      $('.table-striped').DataTable();
   });
</script>