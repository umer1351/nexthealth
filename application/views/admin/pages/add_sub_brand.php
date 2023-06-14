<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('add/brand')?>">Add Brand</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brand</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('save/sub_brand')?>" method="post">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Brand Name</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="brand_name" id="fileInput" type="text"/>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Brand Thumbnail</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="brand_thumbnail" id="fileInput" type="file"/>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Brand Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="brand_image" id="fileInput" type="file"/>
                            </div>
                        </div>           
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Brand Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" name="brand_description" rows="3"></textarea>
                            </div>
                        </div>

                         <div class="control-group">
                            <label class="control-label" for="textarea2">Parent Brand</label>
                            <div class="controls">
                                <select name="parent_id">
                                    <option value="0">Select Brand</option>
                                    <?php foreach ($all_brand as $key => $value) { ?>
                                      <option value="<?php echo $value->brand_id ?>"><?php echo $value->brand_name ?></option> 
                                    <?php } ?>
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                                <select name="publication_status">
                                    <option value="1">Published</option>
                                    <option value="0">UnPublished</option>
                                </select>
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

<!-- end: Content -->