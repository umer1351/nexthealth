<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    

    public function add_customer()
    {
        $data                           = array();
        $data['cities']  = $this->web_model->get_cities();
        $data['group']  = $this->customer_model->get_groups(); 
        $data['maincontent']            = $this->load->view('admin/pages/add_customer', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_customer()
    {
        $data                    = array();
        $data['get_all_customer'] = $this->customer_model->get_all_customer();
        $data['maincontent']     = $this->load->view('admin/pages/manage_customer', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function add_customer_groups()
    {
        $data                           = array();
        $data['maincontent']            = $this->load->view('admin/pages/add_customer_groups', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_customer_groups()
    {
        $data                    = array();
        $data['get_all_customer'] = $this->customer_model->get_all_customer_groups();
        $data['maincontent']     = $this->load->view('admin/pages/manage_customer_groups', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_customer_groups()
    {
        $data                              = array();
        $data['name']                       = $this->input->post('name');
        $data['discount_type']              = $this->input->post('discount_type');
        $data['discount']                   = $this->input->post('discount');


        // $this->form_validation->set_rules('product_title', 'Product Title', 'trim|required');
        // // $this->form_validation->set_rules('product_short_description', 'Product Short Description', 'trim|required');
        // $this->form_validation->set_rules('product_long_description', 'Product Long Status', 'trim|required');
        // // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
        // $this->form_validation->set_rules('product_price', 'Product Price', 'trim|required');
        // $this->form_validation->set_rules('product_quantity', 'Product Quantity', 'trim|required');
        // // $this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');
        // $this->form_validation->set_rules('product_brand', 'Product Brand', 'trim|required');
        // $this->form_validation->set_rules('product_feature', 'Product Feature', 'trim');
        // $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        
        // if ($this->form_validation->run() == true) {

            $result = $this->customer_model->save_customer_group_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Customer Inserted Sucessfully');
                redirect('manage/customer/groups');
            } else {
                $this->session->set_flashdata('message', 'Customer Inserted Failed');
                redirect('manage/customer/groups');
            }
        // } else {
        //     $this->session->set_flashdata('message', validation_errors());
        //     redirect('add/product');
        // }
    }
    public function save_customer()
    {
        $data                              = array();
        $data['customer_name']             = $this->input->post('customer_name');
        $data['customer_email']            = $this->input->post('customer_email');
        $data['customer_password']         = md5($this->input->post('customer_password'));
        $data['customer_address']          = $this->input->post('customer_address');
        $data['customer_city']             = $this->input->post('customer_city');
        $data['customer_day']              = $this->input->post('customer_day');
        $data['customer_month']            = $this->input->post('customer_month');
        $data['customer_year']             = $this->input->post('customer_year');
        $data['customer_gender']           = $this->input->post('customer_gender');
        $data['customer_phone']            = $this->input->post('customer_phone');
        $data['customer_group']            = $this->input->post('customer_group');
        $data['customer_type']             = 1;
        $data['customer_active']           = 1;

        $sdata = array();
        $sdata['shipping_name']             = $this->input->post('customer_name');
        $sdata['shipping_address']          = $this->input->post('customer_address');
        $sdata['shipping_city']             = $this->input->post('customer_city');
        $sdata['status']                    = 1;
        $sdata['shipping_phone']            = $this->input->post('customer_phone');
        $sdata['customer_id']               = $this->input->post('customer_phone');

        // $this->form_validation->set_rules('product_title', 'Product Title', 'trim|required');
        // // $this->form_validation->set_rules('product_short_description', 'Product Short Description', 'trim|required');
        // $this->form_validation->set_rules('product_long_description', 'Product Long Status', 'trim|required');
        // // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
        // $this->form_validation->set_rules('product_price', 'Product Price', 'trim|required');
        // $this->form_validation->set_rules('product_quantity', 'Product Quantity', 'trim|required');
        // // $this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');
        // $this->form_validation->set_rules('product_brand', 'Product Brand', 'trim|required');
        // $this->form_validation->set_rules('product_feature', 'Product Feature', 'trim');
        // $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        
        // if ($this->form_validation->run() == true) {

            $result = $this->customer_model->save_customer_info($data);
            $sdata['customer_id']               = $result;
            $result = $this->customer_model->save_customer_shipping_info($sdata);
            if ($result) {
                $this->session->set_flashdata('message', 'Customer Inserted Sucessfully');
                redirect('manage/customer');
            } else {
                $this->session->set_flashdata('message', 'Customer Inserted Failed');
                redirect('manage/customer');
            }
        // } else {
        //     $this->session->set_flashdata('message', validation_errors());
        //     redirect('add/product');
        // }
    }

    public function published_product($id)
    {
        $result = $this->product_model->published_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Product Sucessfully');
            redirect('manage/product');
        } else {
            $this->session->set_flashdata('message', 'Published Product  Failed');
            redirect('manage/product');
        }
    }
    public function unpublished_product($id)
    {
        $result = $this->product_model->unpublished_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Product Sucessfully');
            redirect('manage/product');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Product  Failed');
            redirect('manage/product');
        }
    }

    public function edit_customer($id)
    {
        $data                           = array();
        $data['cities']  = $this->web_model->get_cities(); 
        $data['group']  = $this->customer_model->get_groups(); 
        $data['customer_info']          = $this->customer_model->get_customer_info_by_id($id);
        $data['maincontent']            = $this->load->view('admin/pages/edit_customer', $data, true);
        $this->load->view('admin/master', $data);
    }

     public function edit_customer_group($id)
    {
        $data                           = array(); 
        $data['customer_info']          = $this->customer_model->get_customer_group_info_by_id($id);
        $data['maincontent']            = $this->load->view('admin/pages/edit_customer_group', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_customer_group($id)
    {
       $data                              = array();
        $data['name']                       = $this->input->post('name');
        $data['discount_type']              = $this->input->post('discount_type');
        $data['discount']                   = $this->input->post('discount');
        

        $result = $this->customer_model->update_customer_group_info($id, $data);
  
        if ($result) {
            $this->session->set_flashdata('message', 'Group Updated Sucessfully');
            redirect('manage/customer/groups');
        } else {
            $this->session->set_flashdata('message', 'Customer Inserted Failed');
            redirect('manage/customer');
        }
    }

    public function update_customer($id)
    {
       $data                              = array();
        $data['customer_name']             = $this->input->post('customer_name');
        $data['customer_email']            = $this->input->post('customer_email');
        // $data['customer_password']         = $this->input->post('customer_password');
        $data['customer_address']          = $this->input->post('customer_address');
        $data['customer_city']             = $this->input->post('customer_city');
        $data['customer_day']              = $this->input->post('customer_day');
        $data['customer_month']            = $this->input->post('customer_month');
        $data['customer_year']             = $this->input->post('customer_year');
        $data['customer_gender']           = $this->input->post('customer_gender');
        $data['customer_phone']            = $this->input->post('customer_phone');
        $data['customer_type']             = 1;
        $data['customer_active']           = 1;
        $data['customer_group']            = $this->input->post('customer_group');
        $sdata = array();
        $sdata['shipping_name']             = $this->input->post('customer_name');
        $sdata['shipping_address']          = $this->input->post('customer_address');
        $sdata['shipping_city']             = $this->input->post('customer_city');
        $sdata['status']                    = 1;
        $sdata['shipping_phone']            = $this->input->post('customer_phone');

        // $this->form_validation->set_rules('product_title', 'Product Title', 'trim|required');
        // // $this->form_validation->set_rules('product_short_description', 'Product Short Description', 'trim|required');
        // $this->form_validation->set_rules('product_long_description', 'Product Long Status', 'trim|required');
        // // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
        // $this->form_validation->set_rules('product_price', 'Product Price', 'trim|required');
        // $this->form_validation->set_rules('product_quantity', 'Product Quantity', 'trim|required');
        // // $this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');
        // $this->form_validation->set_rules('product_brand', 'Product Brand', 'trim|required');
        // $this->form_validation->set_rules('product_feature', 'Product Feature', 'trim');
        // $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        
        // if ($this->form_validation->run() == true) {

            $result = $this->customer_model->update_customer_info($id, $data);
      
            $result = $this->customer_model->update_customer_shipping_info($id, $sdata);
            if ($result) {
                $this->session->set_flashdata('message', 'Customer Updated Sucessfully');
                redirect('manage/customer');
            } else {
                $this->session->set_flashdata('message', 'Customer Inserted Failed');
                redirect('manage/customer');
            }
    }

    public function delete_customer($id)
    {
        
        $result = $this->customer_model->delete_customer_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'customer Deleted Sucessfully');
            redirect('manage/customer');
        } else {
            $this->session->set_flashdata('message', 'Product Deleted Failed');
            redirect('manage/customer');
        }
    }

    public function delete_customer_group($id)
    {
        
        $result = $this->customer_model->delete_customer_group_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Group Deleted Sucessfully');
            redirect('manage/customer/groups');
        } else {
            $this->session->set_flashdata('message', 'Group Deleted ');
            redirect('manage/customer/groups');
        }
    }

    private function get_image_by_id($id)
    {
        $this->db->select('product_image');
        $this->db->from('tbl_product');
        $this->db->where('tbl_product.product_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_user()
    {

        $email = $this->session->userdata('user_email');
        $name  = $this->session->userdata('user_name');
        $id    = $this->session->userdata('user_id');

        if ($email == false) {
            redirect('admin');
        }

    }

}
