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
            <a href="<?php echo base_url('add/product')?>">Add Product</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('save/product');?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Name</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_title" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">POS Product ID</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_pos_id" id="fileInput" type="text"/>
                            </div>
                        </div>   
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Meta Keywords</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_meta_keywords" id="fileInput" type="text"/>
                            </div>
                        </div>         
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Meta Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_meta_description" id="textarea4" rows="2"></textarea>
                            </div>
                        </div>
                                
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_long_description" id="textarea2" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Ingredients</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_ingrediens" id="textarea3" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Image(s)</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_image" id="fileInput" type="file"/> (Primary)
                            </div>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_image2" id="fileInput" type="file"/>
                            </div>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_image3" id="fileInput" type="file"/>
                            </div>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_image4" id="fileInput" type="file"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">MRP</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_price" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Sale Price</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_sale_price" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Trade Price</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_trade_price" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Current Stock</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_quantity" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Purchase Qty Limit</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="quantity_limit" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Handling Charges</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="handling_charges" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Weight (grams)</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="weight" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">tax</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_tax" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Delivery Message</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="delivery_msg" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Availability Message</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="availability_msg" id="fileInput" type="text"/>
                            </div>
                        </div>


                         
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Level 1 Category</label>
                            <div class="controls">
                                <select name="parent_category">
                                    <option value="0">--Select Category--</option>
                                    <?php foreach($parent_categories as $parent_category){?>
                                    <option value="<?php echo $parent_category['id'];?>"><?php echo $parent_category['category_name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Level 2 Category</label>
                            <div class="controls">
                                <select name="category">
                                    <option value="0">--Select Category--</option>
                                    <?php foreach($categories as $category){?>
                                    <option value="<?php echo $category['id'];?>"><?php echo $category['category_name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Level 3 Category</label>
                            <div class="controls">
                                <select name="child_category">
                                    <option value="0">--Select Category--</option>
                                    <?php foreach($sub_categories as $child_category){?>
                                    <option value="<?php echo $child_category['id'];?>"><?php echo $child_category['name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product Brand</label>
                            <div class="controls">
                                <select name="product_brand">
                                    <?php foreach($all_published_brand as $single_brand){?>
                                    <option value="<?php echo $single_brand->brand_id;?>"><?php echo $single_brand->brand_name;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Featured</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="0" name="product_feature" id="fileInput" type="radio" checked="true"/> Unfeature
                                <input class="span6 typeahead" value="1" name="product_feature" id="fileInput" type="radio" />Featured
                             </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Dicount Type</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="1" name="product_discount" id="fileInput" type="radio" /> Percentage
                                <input class="span6 typeahead" value="2" name="product_discount" id="fileInput" type="radio" />Amount
                             </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Discount</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="discount" id="fileInput" type="text"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Always Instock</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="0" name="always_instock" id="fileInput" type="radio" /> Yes
                                <input class="span6 typeahead" value="1" name="always_instock" id="fileInput" type="radio" checked="true"/>No
                             </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Form Tabs</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="1" name="show_tabs" id="fileInput" type="radio" /> Yes
                                <input class="span6 typeahead" value="0" name="show_tabs" id="fileInput" type="radio" checked="true"/>No
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
<form method="post" action="<?php echo base_url() ?>spreadsheet/import" enctype="multipart/form-data">
  <div class="form-group">
    <input type="file" name="upload_file" class="form-control" placeholder="Enter Name" id="upload_file" required>
  </div>
  <div class="form-group">
    <input type="submit" name="submit" class="btn btn-primary">
  </div>
</form>
</div><!--/.fluid-container-->


<!-- end: Content