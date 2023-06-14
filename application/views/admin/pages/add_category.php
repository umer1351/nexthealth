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
            <a href="<?php echo base_url('add/category')?>">Add Category</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('save/category');?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Category Name</label>
                            <div class="controls">
                                <input class="span6 typeahead" id="category_name" name="category_name" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Category Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="category_description" name="category_description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Category Thumbnail</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="category_thumbnail" id="fileInput" type="file"/>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Category Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="category_image" id="fileInput" type="file"/>
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label" for="fileInput">SEO Keywords</label>
                            <div class="controls">
                                <input class="span6 typeahead" id="category_seo_keyword" name="seo_keyword" type="text"/>
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
                         <fieldset>
                            <legend style="text-align: center;">Category Hierarchy:</legend>
                             
                             <div class="control-group">
                                <label class="control-label" for="fileInput">Parent Category</label>
                                <div class="controls">
                                     <select name="parent_category">
                                            <option value="0">--Select--</option>
                                            <?php $categories =  $this->category_model->getall_category_info(); 
                                            foreach ($categories as $key => $value) { 
                                            ?>
                                             <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>
                                            <?php } ?>
                                    </select>        
                                </div>
                             </div>
                              <div class="control-group">
                                <label class="control-label" for="fileInput">Category</label>
                                <div class="controls">
                                     <select name="category">
                                            <option value="0">--Select--</option>
                                            <?php $categories =  $this->category_model->get_category_info(); 
                                            foreach ($categories as $key => $value) { 
                                            ?>
                                             <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>
                                            <?php } ?>
                                    </select>        
                                </div>
                             </div>
                        </fieldset>
                       
                           
                            
                    <fieldset>
                            <legend style="text-align: center;">Parent Category Placement:</legend>
                             <div class="control-group">
                                <label class="control-label" for="textarea2">Choose homepage sections</label>
                                <div class="controls">
                                   <input type="checkbox" id="top_section" name="top_section" value="top_section">Top Section
                                    </br>
                                   <input type="checkbox" id="shop_by_condition" name="shop_by_condition" value="shop_by_condition">Shop By Condition
                                   
                                </div>
                             </div>
                              <div class="control-group">
                                <label class="control-label" for="textarea2">Display on main menu?</label>
                                <div class="controls" style="Display:flex;">
                              
                                      <label><input type="radio" name="main_menu_display" value="0" required>No</label>

                                      <label><input type="radio" name="main_menu_display" value="1">Yes</label>
                                    
                                </div>
                            </div>
                             
                    </fieldset>
                        
                        

                              
                       
                        
                        
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

<!-- end: Content