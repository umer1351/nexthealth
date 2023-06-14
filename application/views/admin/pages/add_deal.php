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
            <a href="<?php echo base_url('add/deal')?>">Add deal</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add deal</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('save/deal');?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">deal Title</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="deal_title" type="text"/>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label" for="fileInput">deal Thumbnail</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="deal_thumbnail" type="file"/>
                            </div>
                        </div>
                         <div class="control-group">
                            <label class="control-label" for="fileInput">deal Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="deal_image" type="file"/>
                            </div>
                        </div>

                         <div class="control-group">
                            <label class="control-label" for="fileInput">deal Description</label>
                            <div class="controls">
                                <input class="span6 typeahead"  name="deal_description" type="text"/>
                            </div>
                        </div>
                         <div class="control-group">
                        <label class="control-label" for="textarea2">Choose homepage placement sections</label>
                        <div class="controls">
                           <input type="checkbox" id="top_section" name="top_section" value="top_section">Deal of the day
                            </br>
                           <input type="checkbox" id="shop_by_condition" name="shop_by_condition" value="shop_by_condition">Latest offers
                           
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
                            <button type="submit" id="save_category" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

    
    
</div><!--/.fluid-container-->

<!-- end: Content -->