<?php

class Category_Model extends CI_Model
{
    public function save_category_info($data)
    {
        return $this->db->insert('tbl_category_parent', $data);
    }

    public function getall_category_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_category_parent');
        $info = $this->db->get();
        return $info->result_array();
    }

    public function get_second_category_info($id='')
    {

        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('tbl_category.parent_cat_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_third_category_info($id='')
    {
        $this->db->select('*');
        $this->db->from('tbl_category_child');
        $this->db->where('cat_id', $id);
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
