start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('add/customer')?>">Add Group</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Group</h2>
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
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('update/customer_group/');?><?php echo $customer_info->id ?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Name</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="name" id="fileInput" type="text" value="<?php echo $customer_info->name ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Dicount Type</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="1" name="discount_type" id="fileInput" type="radio" /> Percentage
                                <input class="span6 typeahead" value="2" name="discount_type" id="fileInput" type="radio" />Amount
                             </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Discount</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="discount" id="fileInput" value="<?php echo $customer_info->discount ?>"  type="text"/>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content