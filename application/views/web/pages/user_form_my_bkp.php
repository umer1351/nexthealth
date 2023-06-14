
<div class="login-guest-page">
            <div class="container">
               
               <!-- Start: Login page section -->                  
               <div class="row column-reverse">
                  <div class="col-lg-6">
                     <div class="padding15 mobileBoderFull">                       
                       <h1 class="text-center"> Create A New Account </h1> <p></p>
                       <div class="clearfix spacer10"></div>
                       <p> When you create an account with us, you'll have the following benefits: </p>
                       <div class="clearfix"></div>
                       <ul class="loginRegisterLeftUl mt-4 mb-4">
                          <li>Check out faster</li>
                          <li>Save multiple addresses to your address book</li>
                          <li>Track your order history</li>
                       </ul>
                       <div class="clearfix"></div>
                       <div class="col-md-12 text-center ">
                          <a href="<?php echo base_url() ?>customer/register" class="btn btn-primary middle_btn">
                           create an account
                          </a>
                       </div>                       
                     </div> 
                  </div>
                  <div class="col-lg-6 boderLeftDesktop">
                     <h1 class="text-center"> 
                        Sign In To Your Account 
                      <?php if(isset($_GET['guest']) && $_GET['guest']==1){ ?> /Guest Checkout  <?php } ?>
                     </h1>
                     <?php if(isset($_GET['guest']) && $_GET['guest']==1){ ?>
                         <a href="<?php echo base_url() ?>guest_checkout" class="btn btn-primary middle_btn">
                           Checkout as Guest
                         </a>
                         <p class="text-center"><b>OR</b></p>
                    <?php } ?>
                     <p class="text-center"><b>Login As Existing Customer</b></p>
                     <form action="<?php echo base_url('customer/logincheck');?>" method="post">
                         
                
                     <div class="mb-3 position-relative">
                        <label for="" class="form-label required">Email address</label>
                        <i class="bi bi-envelope-fill iconWithInout"></i>
                        <input type="email" name="customer_email"  class="form-control" id="" placeholder="">
                     </div>
                     <div class="mb-3 position-relative">
                        <label for="" class="form-label required">Password</label>
                        <i class="bi bi-key iconWithInout"></i>
                        <input name="customer_password" type="password" class="form-control" id="" placeholder="">
                     </div>
                     <div class="mb-3 position-relative">
                        <input type="text" name="vercode" class="form-control" placeholder="Verfication Code" required="required">                        
                     </div>
                     <div class="mb-3 position-relative">
                        <label class="checkbox-inline">Verification Code</label>
                        <img src="https://nexthealth.pk/html/captcha.php">
                     </div>
                     <div class="mb-3 position-relative">
                        <input type="submit" id="inputt" class="btn btn-primary middle_btn " value="LOGIN">
                     </div>
                    
                        <div id="result">
                            <p><?php echo $this->session->flashdata('messagelogin'); ?></p>
                        </div>
                          </form>

                  </div>
               </div>
               <!-- End: Login page section -->               
         
            </div>
         </div>
<!-- <div class="main">
    <div class="content">
        <div class="login_panel">
            <h3>Existing Customers</h3>
            <p>Sign in with the form below.</p>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('messagelogin'); ?></p>
            </div>
            
            <form action="<?php echo base_url('customer/shipping/login');?>" method="post">
                <input name="customer_email" placeholder="Enter Your Email" type="text"/>
                <input name="customer_password" placeholder="Enter Your Password" type="password"/>
                <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                <div class="buttons"><div><button class="grey">Sign In</button></div></div>
            </form>
        </div>
        <div class="register_account">
            <h3>Register New Account</h3>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <form method="post" action="<?php echo base_url('customer/shipping/register');?>">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="customer_name" placeholder="Enter Your Name">
                                </div>

                                <div>
                                    <input type="text" name="customer_password" placeholder="Enter Your Password">

                                </div>

                                <div>
                                    <input type="text" name="customer_city" placeholder="Enter Your City">
                                </div>
                                <div>
                                    <input type="text" name="customer_phone" placeholder="Enter Your Phone">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="customer_email" placeholder="Enter Your Email">
                                </div>
                                        

                                <div>
                                    <input type="text" name="customer_address" placeholder="Enter Your Address">
                                </div>
                                
                                <div>
                                    <select id="country" name="customer_country" class="frm-field required">
                                        <option value="null">Select a Country</option>         
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="India">India</option>

                                    </select>
                                </div>		

                                <div>
                                    <input type="text" name="customer_zipcode" placeholder="Enter Your ZipCode">
                                </div>
                            </td>
                        </tr> 
                    </tbody></table> 
                <div class="search"><div><button class="grey">Create Account</button></div></div>
                <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
                <div class="clear"></div>
            </form>
        </div>  	
        <div class="clear"></div>
    </div>
</div> -->