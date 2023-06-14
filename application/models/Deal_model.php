<?php



class Deal_Model extends CI_Model

{

    public function get_discount_info($value='')
    {
        $this->db->select('*');

        $this->db->from('tbl_special_discounts');
        $this->db->where('id', $value);
        $info = $this->db->get();

        return $info->row();
    }


    public function get_lab_test_info($value='')
    {
        $this->db->select('*');

        $this->db->from('tbl_lab_test');
        $this->db->where('id', $value);
        $info = $this->db->get();

        return $info->row();
    }



    public function save_deal_info($data)

    {

        return $this->db->insert('tbl_deal', $data);

    }

     public function save_special_discount($data)

    {

        return $this->db->insert('tbl_special_discounts', $data);

    }

    public function save_lab_test($data)

    {

        return $this->db->insert('tbl_lab_test', $data);

    }

    public function get_products_info($value='')
    {
        $this->db->select('*');

        $this->db->from('tbl_product');
        $this->db->where('product_pos_id', $value);
        $info = $this->db->get();

        return $info->result();
    }

    public function getall_lab_test($value='')
    {
        $this->db->select('*');

        $this->db->from('tbl_lab_test');

        $info = $this->db->get();

        return $info->result_array();
    }

    public function getall_special_discount_info($value='')
    {
        $this->db->select('*');

        $this->db->from('tbl_special_discounts');

        $info = $this->db->get();

        return $info->result_array();
    }



    public function getall_deal_info()

    {

        $this->db->select('*');

        $this->db->from('tbl_deal');

        $info = $this->db->get();

        return $info->result();

    }



    public function edit_deal_info($id)

    {

        $this->db->select('*');

        $this->db->from('tbl_deal');

        $this->db->where('deal_id', $id);

        $info = $this->db->get();

        return $info->row();

    }

    public function delete_lab_test_info($id='')
    {
       $this->db->where('id', $id);

        return $this->db->delete('tbl_lab_test');
    }


    public function delete_discount_info($id='')
    {
       $this->db->where('id', $id);

        return $this->db->delete('tbl_special_discounts');
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


    public function update_discount_info($data, $id)

    {

        $this->db->where('id', $id);

        return $this->db->update('tbl_special_discounts', $data);

    }

    public function update_lab_test_info($data, $id)

    {

        $this->db->where('id', $id);

        return $this->db->update('tbl_lab_test', $data);

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

