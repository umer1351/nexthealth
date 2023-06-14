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
                           <li class="breadcrumb-item active" aria-current="page">Password</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <h3>Password</h3>
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
                           <h1 style="font-weight: bold;text-decoration: underline;font-size:16px">Update Password</h1>
                        </div>
                        <form method="post" action="<?php echo base_url('customer/update_cust_password');?>" class="row">
                            
                        <div class="col-lg-12">                           
                           <div class="mb-3">
                              <label class="required">Old Password</label>
                              <input name="old_password" type="text" id="old_password" tabindex="1" placeholder="Old Password" value="" required="">
                           </div>
                           <div class="mb-3">
                              <label class="required">New Password</label>
                              <input name="new_password" type="text" id="new_password" tabindex="4" placeholder="New Password" value="" required>
                           </div>
                           <div class="mb-3">
                              <label class="required">Confirm Password</label>
                              <input name="customer_password" type="text" id="customer_password" tabindex="1" placeholder="customer_password" value="" required="">
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
               </div>
    
               </div>
               <!-- End: Shopping Cart section -->               
               </div>
            </div>
         </div>

