<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/customer')?>">Manage Customer</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Customer</h2>
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
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Publication Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($get_all_customer as $single_customer){
                            $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td class="center"><?php echo $single_customer->customer_name;?></td>
                            <td class="center"><?php echo $single_customer->customer_address;?></td>
                            <td class="center"><?php echo $single_customer->customer_gender;?></td>
                            <td class="center"><?php echo $single_customer->customer_phone;?></td>
                            <td class="center">
                                <?php if ($single_customer->customer_active == 1) { ?>
                                    <span class="label label-success">Active</span>
                                <?php } else {
                                    ?>
                                    <span class="label label-danger" style="background:red">Deactive</span>
                                    <?php }
                                ?>
                            </td>
                           <td class="center">
                                    <?php if ($single_customer->customer_active == 0) { ?>
                                        <!-- <a class="btn btn-success" href="">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a> -->
                                    <?php } else {
                                        ?>
                                        <!-- <a class="btn btn-danger" href="">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a> -->
                                        <?php }
                                    ?>

                                    <a class="btn btn-info" href="<?php echo base_url('edit/customer/' . $single_customer->customer_id); ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('delete/customer/' . $single_customer->customer_id); ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                    
                                        <form action="<?php echo base_url('customer/login/admin');?>" method="post">
                                            <input type="hidden" name="customer_email"  class="form-control" id="" value="<?php echo $single_customer->customer_email  ?>" placeholder="">
                                            <input name="customer_password" type="hidden" class="form-control" value="<?php echo $single_customer->customer_password  ?>" id="" placeholder="">
                                            <button target="_blank" type="submit">login</button>
                                        </form>
                                    
                                </td>
                        </tr>
                        <?php }?>
                        
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->