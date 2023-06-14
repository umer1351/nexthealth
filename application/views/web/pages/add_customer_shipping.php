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
                     <div class="col-md-6">
                        <h3>Add Shipping Address</h3>
                     </div>
                     
                  </div>
                  
               </div>
               <br> 
               <br>
               <!-- Start: Shopping Cart section -->
               <div class="row">
 
                   
              
               <div class="col-md-6">
               <div class="card">
                  <div class="card-body">                     
                     <div class="row registerPage">
                        <div class="col-md-6 mb-4">
                           <h1 style="font-weight: bold;text-decoration: underline;font-size:16px"></h1>
                        </div>
                        <form method="post" action="<?php echo base_url('customer/add_customer_shipping');?>" class="row">
                            <input type="hidden" name="shipping_id" value="">
                        <div class="col-lg-12">                           
                           <div class="mb-3">
                              <label class="required">Full Name</label>
                              <input name="customer_name" type="text" id="customer_name" tabindex="1" placeholder="Full Name" value="" required="">
                           </div>
                           <div class="mb-3">
                              <label class="required">Phone Number (923111213145)</label>
                              <input name="customer_phone" type="tel" pattern="92[0-9]{10}" id="vCellNumber" tabindex="4" placeholder="" value="" required>
                           </div>
                           <div class="mb-3">
                              <label class="required">Address</label>
                              <input name="customer_address" type="text" id="customer_address" tabindex="1" placeholder="Complete Address" value="" required="">
                           </div>
                           <div class="mb-3">
                              <label class="required">City</label>
                              <select name="customer_city" id="customer_city" class="">
                                 <option value="">Select City</option>
                                <?php foreach ($cities as $key => $city) { ?>
                                   <option value="<?php echo $city->id ?>"  ><?php echo $city->city_name ?></option>
                               <?php } ?>
                              </select>
                           </div>
                           
                                                     
                        </div>
                        
                        <div id="result">
                                <p><?php echo $this->session->flashdata('message'); ?></p>
                            </div>
                           <input type="submit" class="button_blue middle_btn" value="Add"/>
                          
                       </form>

                     </div>
                  </div>                  
               </div>
               </div>

               </div>
               <!-- End: Shopping Cart section -->               
               </div>
            </div>
         </div>

