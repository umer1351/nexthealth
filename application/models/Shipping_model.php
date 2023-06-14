<?php

class Shipping_Model extends CI_Model
{

    public function save_deal_info($data)
    {
        return $this->db->insert('tbl_deal', $data);
    }

    public function getall_payment_menthod_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_payment_method');
        $info = $this->db->get();
        return $info->result();
    }

    public function getall_cities($value='')
    {
        $this->db->select('*');
        $this->db->from('tbl_cities');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_companies($value='')
    {
        
        $this->db->select('*');
        $this->db->from('tbl_courier_company');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_company_name($value='')
    {
        $this->db->select('company_name');
        $this->db->from('tbl_courier_company');
        $this->db->where('id', $value);
        $info = $this->db->get();
        return $info->row()->company_name;
    }

    public function get_ship_method_name($value='')
    {
        $this->db->select('shipping_method_name');
        $this->db->from('tbl_shipping_methods');
        $this->db->where('id', $value);
        $info = $this->db->get();
        return $info->row()->shipping_method_name;
    }

    public function get_price_slot_details($id='')
    {
        $this->db->select('*');
        $this->db->from('tbl_price_slots');
        $this->db->where('courier_city_map_id', $id);
        $info = $this->db->get();
        return $info->result_array();
    }

    public function getall_shipping_methods($value='')
    {
        $this->db->select('*');
        $this->db->from('tbl_shipping_methods');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_city_name($value='')
    {
        $this->db->select('city_name');
        $this->db->from('tbl_cities');
        $this->db->where('id', $value);
        $info = $this->db->get();
        return $info->row()->city_name;
    }

    public function getall_mappings($value='')
    {
        $this->db->select('*');
        $this->db->from('tbl_courirer_company_city_map');
        $info = $this->db->get();
        return $info->result_array();
    }

    public function get_payment_method_by_id($value='')
    {
         $this->db->select('*');
        $this->db->from('tbl_payment_method');
        $this->db->where('payment_id', $value);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_shipping_method_by_id($value='')
    {
         $this->db->select('*');
        $this->db->from('tbl_shipping_methods');
        $this->db->where('id', $value);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_cities($value='')
    {
         $this->db->where('id', $value);
        return $this->db->delete('tbl_cities');
    }

    public function delete_payment_methods($value='')
    {
        $this->db->where('payment_id', $value);
        return $this->db->delete('tbl_payment_method');
    }

    public function delete_courier_companies($value='')
    {
        $this->db->where('id', $value);
        return $this->db->delete('tbl_courier_company');
    }

    public function delete_shipping_methods($value='')
    {
        $this->db->where('id', $value);
        return $this->db->delete('tbl_shipping_methods');
    }

    public function save_cities($data='')
    {
        return $this->db->insert('tbl_cities', $data);
    }

    public function save_shipping_methods($value='')
    {
       return $this->db->insert('tbl_shipping_methods', $value);
    }

    public function save_payment_method($value='')
    {
        return $this->db->insert('tbl_payment_method', $value);
    }

    public function save_courier_companies($value='')
    {
       return $this->db->insert('tbl_courier_company', $value);
    }

    public function edit_deal_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_deal');
        $this->db->where('deal_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_deal_info($id)
    {
        $this->db->where('deal_id', $id);
        return $this->db->delete('tbl_deal');
    }

    public function update_deal_info($data, $id)
    {
        $this->db->where('deal_id', $id);
        return $this->db->update('tbl_deal', $data);
    }

    public function published_deal_info($id)
    {
        $this->db->set('publication_status', 1);
        $this->db->where('deal_id', $id);
        return $this->db->update('tbl_deal');
    }

    public function unpublished_deal_info($id)
    {
        $this->db->set('publication_status', 0);
        $this->db->where('deal_id', $id);
        return $this->db->update('tbl_deal');
    }

}
