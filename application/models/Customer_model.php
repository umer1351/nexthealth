<?php

class Customer_Model extends CI_Model
{

    public function save_customer_info($data)
    {
         
        $this->db->insert('tbl_customer', $data);
        return $id = $this->db->insert_id();
    }

    public function get_customer_info_by_id($id='')
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function update_customer_group_info($id='', $data='')
    {
       $this->db->where('id', $id);
       
        return $this->db->update('tbl_customer_group', $data);
    }

    public function get_customer_group_info_by_id($id='')
    {
        $this->db->select('*');
        $this->db->from('tbl_customer_group');
        $this->db->where('id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function save_customer_shipping_info($data)
    {
         
        $this->db->insert('tbl_shipping', $data);
        return $id = $this->db->insert_id();
    }

    public function save_customer_group_info($data='')
    {
        $this->db->insert('tbl_customer_group', $data);
        return $id = $this->db->insert_id();
    }

    public function update_customer_info($id, $data)
    {
        $this->db->where('customer_id', $id);
       
        return $this->db->update('tbl_customer', $data);
    }

    public function update_customer_shipping_info($id, $data)
    {
        $this->db->where('customer_id', $id);
        $this->db->where('status', 1);
        return $this->db->update('tbl_shipping', $data);
    }

    

    public function get_all_customer()
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->join('tbl_cities', 'tbl_cities.id=tbl_customer.customer_city');
        $this->db->where('tbl_customer.customer_type', 1);
        $this->db->order_by('tbl_customer.customer_id', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_customer_groups()
    {
        $this->db->select('*');
        $this->db->from('tbl_customer_group');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_product_info($id)
    {
        $this->db->select('*,tbl_product.publication_status as pstatus');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->where('tbl_product.product_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_customer_info($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('tbl_customer');

        $this->db->where('customer_id', $id);
        $this->db->delete('tbl_shipping');
    }

    public function get_groups()
    {
        $this->db->select('*');
        $this->db->from('tbl_customer_group');
        $info = $this->db->get();
        return $info->result();
    }

    public function delete_customer_group_info($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_customer_group');
      
    }

    public function update_product_info($data, $id)
    {
        $this->db->where('product_id', $id);
        return $this->db->update('tbl_product', $data);
    }

    public function published_product_info($id)
    {
        $this->db->set('publication_status', 1);
        $this->db->where('product_id', $id);
        return $this->db->update('tbl_product');
    }

    public function unpublished_product_info($id)
    {
        $this->db->set('publication_status', 0);
        $this->db->where('product_id', $id);
        return $this->db->update('tbl_product');
    }

    public function get_all_published_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_published_brand()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->where('publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

}
