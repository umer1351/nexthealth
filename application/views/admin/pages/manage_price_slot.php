<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/product')?>">Manage Price slots</a></li>
    </ul>

    <div class="row-fluid sortable">        
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Price Slots</h2>
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
                            <th>Mapping ID</th>
                            <th>City name</th>
                            <th>company name</th>
                            <th>method name</th>
                            <th>cold chain</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($all_mappings as $single_product){
                            $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td class="center"><?php echo $single_product['id'];?></td>
                            <td class="center"><?php echo $single_product['city'];?></td>
                            <td class="center"><?php echo $single_product['courier_company'];?></td>
                            <td class="center"><?php echo $single_product['ship_method'];?></td>
                            <td class="center">
                                <?php if ($single_product['allow_cold_chain'] == 1) { ?>
                                    <span class="label label-success">Allowed</span>
                                <?php } else {
                                    ?>
                                    <span class="label label-danger" style="background:red">Not Allowed</span>
                                    <?php }
                                ?>
                            </td>
                            <td class="center">
                                <?php if ($single_product['status'] == 1) { ?>
                                    <span class="label label-success">Published</span>
                                <?php } else {
                                    ?>
                                    <span class="label label-danger" style="background:red">Unpublished</span>
                                    <?php }
                                ?>
                            </td>
                           <td class="center">
                                    
                                    <a class="btn btn-primary" href="<?php echo base_url('price_slot_edit/' . $single_product['id']); ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-info" href="<?php echo base_url('price_slot_detail/' . $single_product['id']); ?>">Prices
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('price_slot_detail/' . $single_product['id']); ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
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