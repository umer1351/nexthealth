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
            <a href="<?php echo base_url('add/customer')?>">Add Customer</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Customer</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('save/customer');?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Name</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="customer_name" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Email</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="customer_email" id="fileInput" type="text"/>
                            </div>
                        </div>   
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Password</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="customer_password" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Address</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="customer_address" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="textarea2">City</label>
                            <div class="controls">
                                <select name="customer_city" id="guest_city" class="" style="padding: 9px 8px;margin-bottom: 8px;">
                                    <option value="">Select City</option>
                                    <?php foreach ($cities as $key => $city) { ?>
                                    <option value="<?php echo $city->id ?>"><?php echo $city->city_name ?></option>
                                   <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Groups</label>
                            <div class="controls">
                                <select name="customer_group" id="groups" class="" style="padding: 9px 8px;margin-bottom: 8px;">
                                    <option value="">Select Group</option>
                                    <?php foreach ($group as $key => $city) { ?>
                                    <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                   <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Birtday Day</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="customer_day" id="fileInput" type="number"/>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Birtday Month</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="customer_month" id="fileInput" type="number"/>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Birtday Year</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="customer_year" id="fileInput" type="number"/>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Customer gender</label>
                            <div class="controls">
                                <input class="span6 typeahead" placeholder="male/female" name="customer_gender" id="fileInput" type="text"/>
                            </div>
                        </div>         
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Phone</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="customer_phone" id="fileInput" type="number"/>
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