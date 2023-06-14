
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('add/customer')?>">Add Lab Test</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Lab Test</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('save/lab_test');?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Salt Name</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="salt_name" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="control-group">
                            <label class="control-label" for="fileInput">Product 1</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_id_1" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product 2</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_id_2" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product 3</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_id_3" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product 4</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_id_4" id="fileInput" type="text"/>
                            </div>
                        </div>
                            </div>
                           <!--  <div class="col-lg-4">
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Sort Order 1</label>
                                    <div class="controls">
                                        <input class="span6 typeahead" name="sort_id_1" id="fileInput" type="text"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Sort Order 2</label>
                                    <div class="controls">
                                        <input class="span6 typeahead" name="sort_id_2" id="fileInput" type="text"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Sort Order 3 </label>
                                    <div class="controls">
                                        <input class="span6 typeahead" name="sort_id_3" id="fileInput" type="text"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="fileInput">Sort Order 4</label>
                                    <div class="controls">
                                        <input class="span6 typeahead" name="sort_id_4" id="fileInput" type="text"/>
                                    </div>
                                </div>
                            </div> -->
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