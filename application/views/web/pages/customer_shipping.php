<div class="product-detail-page">
            <div class="container-fluid">
               <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"> 
                              <i class="bi bi-house-fill"></i> Home</a>
                           </li>
                           <li class="breadcrumb-item active" aria-current="page">Shipping Address</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <h3>Shipping Address</h3>
                     </div>
                     <div class="col-md-6">
                        <a href="<?php echo base_url()?>customer/add_ship_address" class="button_blue middle_btn">
                        Add Shipping Address 
                     </a>
                     </div>
                  </div>
                  
               </div>
               <br> 
               <br>
               <!-- Start: Shopping Cart section -->
               <div class="row">
               <?php foreach ($customer_shipping as $key => $value) { ?>
                   
              
               <div class="col-md-6">
               <div class="card">
                  <div class="card-body">                     
                     <div class="row registerPage">
                        <div class="col-md-6 mb-4">
                           <h1 style="font-weight: bold;text-decoration: underline;font-size:16px">Address # <?php echo $key+1 ?></h1>
                        </div>
                        <form method="post" action="<?php echo base_url('customer/update_shipping');?>" class="row">
                            <input type="hidden" name="shipping_id" value="<?php echo $value['shipping_id'] ?>">
                        <div class="col-lg-12">                           
                           <div class="mb-3">
                              <label class="required">Full Name</label>
                              <input name="customer_name" type="text" id="customer_name" tabindex="1" placeholder="Full Name" value="<?php echo $value['shipping_name'] ?>" required="">
                           </div>
                           <div class="mb-3">
                              <label class="required">Phone Number (923111213145)</label>
                              <input name="customer_phone" type="tel" pattern="92[0-9]{10}" id="vCellNumber" tabindex="4" placeholder="" value="<?php echo $value['shipping_phone'] ?>" required>
                           </div>
                           <div class="mb-3">
                              <label class="required">Address</label>
                              <input name="customer_address" type="text" id="customer_address" tabindex="1" placeholder="Complete Address" value="<?php echo $value['shipping_address'] ?>" required="">
                           </div>
                           <div class="mb-3">
                              <label class="required">City</label>
                              <select name="customer_city" id="customer_city" class="">
                                 <option value="">Select City</option>
                                <?php foreach ($cities as $key => $city) { ?>
                                   <option value="<?php echo $city->id ?>" <?php if($value['shipping_city'] == "$city->id"){ echo 'Selected'; } ?> ><?php echo $city->city_name ?></option>
                               <?php } ?>
                              </select>
                           </div>
                           
                                                     
                        </div>
                        
                        <div id="result">
                                <p><?php echo $this->session->flashdata('message'); ?></p>
                            </div>
                           <input type="submit" class="button_blue middle_btn" value="Update"/>
                           <button type="button" class="button_blue middle_btn" onclick="delete_shipping(<?php echo $value['shipping_id'] ?>); return false;">Delete</button>
                       </form>

                     </div>
                  </div>                  
               </div>
               </div>
               <?php } ?>
               </div>
               <!-- End: Shopping Cart section -->               
               </div>
            </div>
         </div>

