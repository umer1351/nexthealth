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
                           <li class="breadcrumb-item active" aria-current="page">My Account</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <h3>My Account</h3>
                     </div>
                     <div class="col-md-6">
                        <a href="<?php echo base_url()?>customer/manage_shipping_address" class="button_blue middle_btn">
                        Manage Shipping Address Book
                     </a>
                     </div>
                  </div>
                  
               </div>
               <br> 
               <div><b>Your Customer ID: <?php echo $customer_details['customer_id'] ?></b></div>
               <br>
               <!-- Start: Shopping Cart section -->
               <div class="card">
                  <div class="card-body">                     
                     <div class="row registerPage">

                        <div class="col-md-12 mb-4">
                           <h1 style="font-weight: bold;text-decoration: underline;font-size:16px">Personal Details</h1>
                        </div>
                        <form method="post" action="<?php echo base_url('customer/update');?>" class="row">
                        <div class="col-lg-6">                           
                           <div class="mb-3">
                              <label class="required">Full Name</label>
                              <input name="customer_name" type="text" id="customer_name" tabindex="1" placeholder="Full Name" value="<?php echo $customer_details['customer_name'] ?>" required="">
                           </div>
                           <div class="mb-3">
                              <label class="required">Address</label>
                              <input name="customer_address" type="text" id="customer_address" tabindex="1" placeholder="Complete Address" value="<?php echo $customer_details['customer_address'] ?>" required="">
                           </div>
                           <div class="mb-3">
                              <label class="required">Email Address</label>
                              <input name="customer_email" type="email" id="customer_email" tabindex="1" placeholder="someone@email.com" value="<?php echo $customer_details['customer_email'] ?>" required="">
                           </div>
                           <div class="row">
                              <div class="col-lg-7">
                                 <div class="mb-3">
                                    <label class="required">Date of Birth</label>
                                    <div style="display:flex;clear:both;">

                                       <select name="day" id="day" class="">
                                          <option value="">Day</option>
                                          <? for ($i = 1; $i <= 31; $i++) { ?>
                                              <option value="<?= $i ?>" <?php if($customer_details['customer_day'] == $i){echo 'Selected';} ?> ><?= $i ?></option>
                                          <? } ?>
                                       </select>
                                       <select name="month" id="month" class="">
                                             <option value="">Month</option>
                                             <option value="1" <?php if($customer_details['customer_month'] == '1'){echo 'Selected';} ?>>Jan</option>
                                             <option value="2"<?php if($customer_details['customer_month'] == '2'){echo 'Selected';} ?>>Feb</option>
                                             <option value="3"<?php if($customer_details['customer_month'] == '3'){echo 'Selected';} ?>>Mar</option>
                                             <option value="4"<?php if($customer_details['customer_month'] == '4'){echo 'Selected';} ?>>Apr</option>
                                             <option value="5"<?php if($customer_details['customer_month'] == '5'){echo 'Selected';} ?>>May</option>
                                             <option value="6"<?php if($customer_details['customer_month'] == '6'){echo 'Selected';} ?>>June</option>
                                             <option value="7"<?php if($customer_details['customer_month'] == '7'){echo 'Selected';} ?>>July</option>
                                             <option value="8"<?php if($customer_details['customer_month'] == '8'){echo 'Selected';} ?>>Aug</option>
                                             <option value="9"<?php if($customer_details['customer_month'] == '9'){echo 'Selected';} ?>>Sep</option>
                                             <option value="10"<?php if($customer_details['customer_month'] == '10'){echo 'Selected';} ?>>Oct</option>
                                             <option value="11"<?php if($customer_details['customer_month'] == '11'){echo 'Selected';} ?>>Nov</option>
                                             <option value="12"<?php if($customer_details['customer_month'] == '12'){echo 'Selected';} ?>>Dec</option>
                                       </select>
                                       <select name="year" id="year" class="">
                                             <option value="">year</option>
                                             <? for ($i = 1940; $i <= date('Y'); $i++) { ?>
                                                 <option value="<?= $i ?>" <?php if($customer_details['customer_year'] == $i){echo 'Selected';} ?>><?= $i ?></option>
                                             <? } ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-5">
                                 <div class="mb-3">
                                    <label class="required" style="display:block;">Gender</label>
                                     <select name="gender" id="gender" class="">
                                         <option value="">select</option>
                                         <option value="male" <?php if($customer_details['customer_gender'] == 'male'){echo 'selected';} ?>>Male</option>
                                         <option value="female" <?php if($customer_details['customer_gender'] == 'female'){echo 'selected';} ?>>Female</option>
                                     </select>
                                 </div>
                              </div>
                           </div>                           
                        </div>
                        <div class="col-lg-6">
                           <div class="mb-3">
                              <label class="required">Phone Number (923111213145)</label>
                              <input name="customer_phone" type="tel" pattern="92[0-9]{10}" id="vCellNumber" tabindex="4" placeholder="" value="<?php echo $customer_details['customer_phone'] ?>" required>
                           </div>
                           <div class="mb-3">
                              <label class="required">City</label>
                              <select name="customer_city" id="customer_city" class="">
                                 <option value="">Select City</option>
                                <?php foreach ($cities as $key => $city) { ?>
                                   <option value="<?php echo $city->id ?>" <?php if($customer_details['customer_city'] == "$city->id"){ echo 'Selected'; } ?> ><?php echo $city->city_name ?></option>
                               <?php } ?>
                              </select>
                           </div>
                           
                                                     
                        </div>
                        <div id="result">
                                <p><?php echo $this->session->flashdata('message'); ?></p>
                            </div>
                           <input type="submit" class="button_blue middle_btn" value="Update"/>
                       </form>
                     </div>
                  </div>                  
               </div>
               <!-- End: Shopping Cart section -->               
               </div>
            </div>
         </div>

