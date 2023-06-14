<!-- start: Content -->

<div id="content" class="span10">





    <ul class="breadcrumb">

        <li>

            <i class="icon-home"></i>

            <a href="<?php echo base_url('dashboard') ?>">Home</a> 

            <i class="icon-angle-right"></i>

        </li>

        <li><a href="<?php echo base_url('manage/brand') ?>">Manage Lab Test</a></li>

    </ul>



    <div class="row-fluid sortable">        

        <div class="box span12">

            <div class="box-header" data-original-title>

                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Lab Test</h2>

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
                            <th>Salt Name</th>
                            <th>Product Name</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th>Actions</th>

                        </tr>

                    </thead>   

                    <tbody>

                        <?php

                        $i = 0;

                        foreach ($all_discounts as $single_slider) {

                            $i++;

                            ?>

                            <tr>

                                <td><?php echo $i; ?></td>

                                <td class="center"><?php echo $single_slider['salt_name']; ?></td>
                                
                                <td class="center"><?php  if(!empty($single_slider['product_name'][0]->product_title)){echo $single_slider['product_name'][0]->product_title;}else{echo 'PLease write correct and existing Product ID';} ?></td>
                                <td class="center"><?php echo $single_slider['sort_order']; ?></td>
                                <td class="center">

                                    <?php if ($single_slider['is_active'] == 1) { ?>

                                        <span class="label label-success">Published</span>

                                    <?php } else {

                                        ?>

                                        <span class="label label-danger" style="background:red">Unpublished</span>

                                    <?php }

                                    ?>

                                </td>

                                <td class="center">

                                    



                                    <a class="btn btn-info" href="<?php echo base_url('manage/edit_lab_test/' . $single_slider['id']); ?>">

                                        <i class="halflings-icon white edit"></i>  

                                    </a>

                                    <a class="btn btn-danger" href="<?php echo base_url('delete/lab_test/' . $single_slider['id']); ?>">

                                        <i class="halflings-icon white trash"></i> 

                                    </a>

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>            

            </div>

        </div><!--/span-->



    </div><!--/row-->







</div><!--/.fluid-container-->



<!-- end: Content -->