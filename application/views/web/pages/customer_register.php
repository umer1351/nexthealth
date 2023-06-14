<div class="product-detail-page">

            <div class="container-fluid">

               <!-- Start: Shopping Cart section -->

               <div class="card">

                  <div class="card-body">                     

                     <div class="row registerPage">

                        <div class="col-md-12 mb-4">

                           <h1 style="font-weight: bold;text-decoration: underline;font-size:16px">Personal Details</h1>

                        </div>

                        <form method="post" action="<?php echo base_url('customer/save');?>" class="row">

                        <div class="col-lg-6">                           

                           <div class="mb-3">

                              <label class="required">Full Name</label>

                              <input name="customer_name" type="text" id="customer_name" tabindex="1" placeholder="Full Name" value="" required="">

                           </div>

                           <div class="mb-3">

                              <label class="required">Address</label>

                              <input name="customer_address" type="text" id="customer_address" tabindex="1" placeholder="Complete Address" value="" required="">

                           </div>

                           <div class="mb-3">

                              <label class="required">Email Address</label>

                              <input name="customer_email" type="email" id="customer_email" tabindex="1" placeholder="someone@email.com" value="" required="">

                           </div>

                           <div class="row">

                              <div class="col-lg-7">

                                 <div class="mb-3">

                                    <label class="required">Date of Birth</label>

                                    <div style="display:flex;clear:both;">



                                       <select name="day" id="day" class="">

                                          <option value="">Day</option>

                                          <? for ($i = 1; $i <= 31; $i++) { ?>

                                              <option value="<?= $i ?>"><?= $i ?></option>

                                          <? } ?>

                                       </select>

                                       <select name="month" id="month" class="">

                                             <option value="">Month</option>

                                             <option value="01">Jan</option>

                                             <option value="02">Feb</option>

                                             <option value="03">Mar</option>

                                             <option value="04">Apr</option>

                                             <option value="05">May</option>

                                             <option value="06">June</option>

                                             <option value="07">July</option>

                                             <option value="08">Aug</option>

                                             <option value="09">Sep</option>

                                             <option value="10">Oct</option>

                                             <option value="11">Nov</option>

                                             <option value="12">Dec</option>

                                       </select>

                                       <select name="year" id="year" class="">

                                             <option value="">year</option>

                                             <? for ($i = 1940; $i <= date('Y'); $i++) { ?>

                                                 <option value="<?= $i ?>"><?= $i ?></option>

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

                                         <option value="male">Male</option>

                                         <option value="female">Female</option>

                                     </select>

                                 </div>

                              </div>

                           </div>                           

                        </div>

                        <div class="col-lg-6">

                           <div class="mb-3">

                              <label class="required">Phone Number (923111213145)</label>

                              <input name="customer_phone" type="tel" pattern="92[0-9]{10}" id="vCellNumber" tabindex="4" placeholder="" value="" required>

                           </div>

                           <div class="mb-3">

                              <label class="required">City</label>

                              <select name="customer_city" id="customer_city" class="">

                                 <option value="">Select City</option>

                                <?php foreach ($cities as $key => $city) { ?>

                                   <option value="<?php echo $city->id ?>"><?php echo $city->city_name ?></option>

                               <?php } ?>                              </select>

                           </div>

                           <div class="mb-3">

                              <label class="required">Password</label>

                              <input name="customer_password" type="customer_password" required>

                           </div>

                           <div class="mb-3">

                              <label style="width: 100%">Add Discount Coupon</label>

                              <input name="customer_coupon" type="text" placeholder="Enter Coupon">

                           </div>                           

                        </div>

                        <div class="col-md-12 mb-4 mt-4">

                           <h1 style="font-weight: bold;text-decoration: underline;font-size:16px">Shipping Details</h1>

                        </div>

                        <div class="col-lg-6">

                           <div class="mb-3">

                              <label class="required">City</label>

                              <select name="shipping_city" id="" class="">

                                 <option value="">select</option>

                                 <option value="">Select City</option>

                                <?php foreach ($cities as $key => $city) { ?>

                                   <option value="<?php echo $city->id ?>"><?php echo $city->city_name ?></option>

                               <?php } ?>

                              </select>

                           </div>

                           <div class="mb-3">

                              <label class="required">Address</label>

                              <input name="shipping_address" type="text" required>

                           </div>

                        </div>

                        <div class="col-lg-6">

                           <div class="mb-3">

                              <label class="required">Person Name</label>

                              <input name="shipping_contact_name" type="text" required>

                           </div>

                           <div class="mb-3">

                              <label oncopy="return false" onpaste="return false" oncut="return false" class="required" >Contact # (923111213145)</label>

                                <input name="shipping_contact" type="tel" pattern="92[0-9]{10}" required>

                           </div>

                        </div>

                        <div class="col-md-12">

                           <div class="mb-3 position-relative">

                              <input type="text" name="vercode" class="" placeholder="Verfication Code" required="required">                        

                           </div>

                           <div class="mb-3 position-relative">

                              <label class="checkbox-inline">Verification Code</label>

                              <img src="https://nexthealth.pk/uploads/captcha.php">

                           </div>

                        </div>

                        <div class="address submit col-md-12">                        

                           <div class="form-check mb-4">

                             <input class="form-check-input" type="checkbox" value="" id="checkbox_1" checked>

                             <label class="form-check-label" for="checkbox_1">

                               I agree to

                               <a href="" target="_blank"

                                  style="text-decoration: underline;">

                                   Terms of Service

                               </a>,

                               <a href="" target="_blank"

                                  style="text-decoration: underline;">

                                   Privacy & Security Policy

                               </a>

                             </label>

                           </div>

                           <style type="text/css">

                                #result p{color:red}

                            </style>

                            <div id="result">

                                <p><?php echo $this->session->flashdata('message'); ?></p>

                            </div>

                           <input type="submit" class="button_blue middle_btn" value="Submit"/>

                       </div>



                       </form>

                     </div>

                  </div>                  

               </div>

               <!-- End: Shopping Cart section -->               

         

            </div>

         </div>



