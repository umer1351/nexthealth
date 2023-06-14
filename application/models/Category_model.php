<?php

class Category_Model extends CI_Model
{
    public function save_category_info($data)
    {

        if(!empty($data['cat_id']) && !empty($data['parent_cat_id'])){

            $child_cat_query =  
                    'INSERT INTO tbl_category_child SET 
                    cat_id              = "'.$data['cat_id'].'",
                    name                = "'.$data['category_name'].'",
                    description         = "'.$data['category_description'].'",
                    thumbnail           = "'.$data['category_thumbnail'].'",
                    image               = "'.$data['category_image'].'",
                    published_status    = "'.$data['publication_status'].'",
                    seo_keywords        = "'.$data['seo_keywords'].'"
                    ';
            $query = $this->db->query($child_cat_query);
            return $query;

        }elseif (!empty($data['parent_cat_id']) && empty($data['cat_id'])) {
             $cat_query =  
                    'INSERT INTO tbl_category SET 
                    parent_cat_id                = "'.$data['parent_cat_id'].'",
                    category_name                = "'.$data['category_name'].'",
                    category_description         = "'.$data['category_description'].'",
                    category_thumbnail           = "'.$data['category_thumbnail'].'",
                    category_image               = "'.$data['category_image'].'",
                    seo_keywords                 = "'.$data['seo_keywords'].'",
                    publication_status           = "'.$data['publication_status'].'"
                    ';
            $query = $this->db->query($cat_query);
            return $query;

        }elseif (empty($data['parent_cat_id']) && empty($data['cat_id'])) {
             $parent_cat_query =  
                    'INSERT INTO tbl_category_parent SET 
                    category_name                = "'.$data['category_name'].'",
                    category_description         = "'.$data['category_description'].'",
                    thumbnail                    = "'.$data['category_thumbnail'].'",
                    image                        = "'.$data['category_image'].'",
                    seo_keywords                 = "'.$data['seo_keywords'].'",
                    publication_status           = "'.$data['publication_status'].'"
                    ';
            $query = $this->db->query($parent_cat_query);
            return $query;
        } 

        // return $this->db->insert('tbl_category_parent', $data);
    }

    // Get parent categories
    public function getall_category_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_category_parent');
        $this->db->where('tbl_category_parent.publication_status', 1);
        $info = $this->db->get();
        return $info->result_array();
    }

   

    // Get categories
    public function get_category_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $info = $this->db->get();
        return $info->result_array();
    }

    
    public function get_second_category_info($id='')
    {

        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('tbl_category.parent_cat_id', $id);
        $this->db->where('tbl_category.publication_status', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_third_categories($id='')
    {
        $this->db->select('*');
        $this->db->from('tbl_category_child');
        $this->db->where('tbl_category_child.published_status', 1);
        $info = $this->db->get();
        return $info->result_array();
    }

    // Get child-categories by id
    public function get_third_category_info($id='')
    {
        $this->db->select('*');
        $this->db->from('tbl_category_child');
        $this->db->where('cat_id', $id);
        $this->db->where('tbl_category_child.published_status', 1);
        $info = $this->db->get();
        return $info->result_array();
    }

    public function edit_category_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category_parent');
        $this->db->where('id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_category_info($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_category_parent');
    }

    public function update_category_info($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_category_parent', $data);
    }

    public function published_category_info($id)
    {
        $this->db->set('publication_status', 1);
        $this->db->where('id', $id);
        return $this->db->update('tbl_category_parent');
    }

    public function unpublished_category_info($id)
    {
        $this->db->set('publication_status', 0);
        $this->db->where('id', $id);
        return $this->db->update('tbl_category_parent');
    }

}
