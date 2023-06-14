<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Shipping extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function payment_methods()
    {
        $data                = array();
        $data['all_methods'] = $this->shipping_model->getall_payment_menthod_info();
        $data['maincontent'] = $this->load->view('admin/pages/manage_payment_methods', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function add_payment_methods()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_payment_method', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_price_slot()
    {
        $data                = array();
        $data['all_mappings']  = $this->shipping_model->getall_mappings();

       
        foreach ($data['all_mappings']  as $key => $value) {
           $data['all_mappings'][$key]['city'] = $this->shipping_model->get_city_name($value['city_id']);
           $data['all_mappings'][$key]['courier_company'] = $this->shipping_model->get_company_name($value['ship_company_id']);
           $data['all_mappings'][$key]['ship_method'] = $this->shipping_model->get_ship_method_name($value['ship_method_id']);
        }
       
        $data['maincontent'] = $this->load->view('admin/pages/manage_price_slot', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function price_slot_detail($id='')
    {
        $data                = array();
        $data['price_slots']  = $this->shipping_model->get_price_slot_details($id);       
        $data['maincontent'] = $this->load->view('admin/pages/manage_price_slot_detail', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_cities()
    {
        $data                = array();
        $data['all_cities']  = $this->shipping_model->getall_cities();
        $data['maincontent'] = $this->load->view('admin/pages/manage_cities', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_shipping_methods($value='')
    {
        $data                = array();
        $data['all_shipping']  = $this->shipping_model->getall_shipping_methods();
        $data['maincontent'] = $this->load->view('admin/pages/manage_shipping_methods', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function add_cities()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_cities', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function add_courier_companies($value='')
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_courier_companies', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function add_shipping_methods($value='')
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_shipping_methods', $data, true);
        $this->load->view('admin/master', $data);
    }


    public function delete_payment_methods($value='')
    {
         $result = $this->shipping_model->delete_payment_methods($value);
         $this->session->set_flashdata('message', 'Payment Method Deleted');
         redirect('manage/payment_methods');
    }

    public function delete_courier_companies($value='')
    {
         $result = $this->shipping_model->delete_courier_companies($value);
         $this->session->set_flashdata('message', 'Courier Company Deleted');
         redirect('manage/courier_companies');
    }

    public function save_cities()
    {
        $data                = array();
        $data['city_name']              = $this->input->post('name');
        $result = $this->shipping_model->save_cities($data);
        $this->session->set_flashdata('message', 'City Inserted');
        redirect('manage/cities');
    }



    public function save_payment_method()
    {
         $data                = array();
        $data['payment_method_name']              = $this->input->post('name');
        $data['status']              = $this->input->post('status');
        $result = $this->shipping_model->save_payment_method($data);
        $this->session->set_flashdata('message', 'payment Method Inserted');
        redirect('manage/payment_methods');
    }

   

    public function save_courier_companies()
    {
        $data                = array();
        $data['company_name']              = $this->input->post('name');
        $result = $this->shipping_model->save_courier_companies($data);
        $this->session->set_flashdata('message', 'Company Inserted');
        redirect('manage/courier_companies');
    }

     public function save_shipping_methods()
    {
        $data                = array();
        $data['shipping_method_name']              = $this->input->post('name');
        $result = $this->shipping_model->save_shipping_methods($data);
        $this->session->set_flashdata('message', 'Shipping Method Inserted');
        redirect('manage/shipping_methods');
    }

     public function edit_payment_methods($id)
    {
        $data                = array();
        $data['payment_method'] = $this->shipping_model->get_payment_method_by_id($id);
        $data['maincontent'] = $this->load->view('admin/pages/edit_payment_methods', $data, true);
        $this->load->view('admin/master', $data);
    }


    public function edit_shipping_methods($id)
    {
        $data                = array();
        $data['shipping_method'] = $this->shipping_model->get_shipping_method_by_id($id);
        $data['maincontent'] = $this->load->view('admin/pages/edit_shipping_methods', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function delete_cities($value='')
    {
         $result = $this->shipping_model->delete_cities($value);
         $this->session->set_flashdata('message', 'City Deleted');
         redirect('manage/cities');
    }

    public function delete_shipping_methods($value='')
    {
        $result = $this->shipping_model->delete_shipping_methods($value);
         $this->session->set_flashdata('message', 'Shipping Method Deleted');
         redirect('manage/shipping_methods');
    }

    public function manage_courier_companies($value='')
    {
        $data                = array();
        $data['all_companies']  = $this->shipping_model->get_all_companies();
        $data['maincontent'] = $this->load->view('admin/pages/manage_courier_companies', $data, true);
        $this->load->view('admin/master', $data);
    }



    public function save_deal()
    {
        $data                            = array();
        $data['deal_title']              = $this->input->post('deal_title');
        $data['deal_description']        = $this->input->post('deal_description');
        $data['deal_placement']          = $this->input->post('top_section').','.$this->input->post('shop_by_condition');
        $data['publication_status']      = $this->input->post('publication_status');

        $this->form_validation->set_rules('deal_title', 'deal Title', 'trim|required');
        $this->form_validation->set_rules('deal_description', 'deal Link', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['deal_thumbnail']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('deal_thumbnail')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/deal');
            } else {
                $post_image           = $this->upload->data();
                $data['deal_thumbnail'] = $post_image['file_name'];
            }
        }
        if (!empty($_FILES['deal_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('deal_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/deal');
            } else {
                $post_image           = $this->upload->data();
                $data['deal_image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->deal_model->save_deal_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'deal Inserted Sucessfully');
                redirect('manage/deal');
            } else {
                $this->session->set_flashdata('message', 'deal Inserted Failed');
                redirect('manage/deal');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/deal');
        }
    }

    public function delete_deal($id)
    {
        $delete_image = $this->get_image_by_id($id);
        unlink('uploads/' . $delete_image->deal_image);
        $result = $this->deal_model->delete_deal_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'deal Deleted Sucessfully');
            redirect('manage/deal');
        } else {
            $this->session->set_flashdata('message', 'deal Deleted Failed');
            redirect('manage/deal');
        }
    }

    public function edit_deal($id)
    {
        $data                      = array();
        $data['deal_info_by_id'] = $this->deal_model->edit_deal_info($id);
        $data['maincontent']       = $this->load->view('admin/pages/edit_deal', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_deal($id)
    {
        $data                       = array();
        $data['deal_title']       = $this->input->post('deal_title');
        $data['deal_link']        = $this->input->post('deal_link');
        $data['publication_status'] = $this->input->post('publication_status');
        $delete_image               = $this->input->post('deal_delete_image');

        $this->form_validation->set_rules('deal_title', 'deal Title', 'trim|required');
        $this->form_validation->set_rules('deal_link', 'deal Link', 'trim|required');
        // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['deal_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('deal_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/deal');
            } else {
                $post_image           = $this->upload->data();
                $data['deal_image'] = $post_image['file_name'];
                unlink('uploads/' . $delete_image);
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->deal_model->update_deal_info($data, $id);

            if ($result) {
                $this->session->set_flashdata('message', 'deal Updated Sucessfully');
                redirect('manage/deal');
            } else {
                $this->session->set_flashdata('message', 'deal Updated Failed');
                redirect('manage/deal');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/deal');
        }

    }

    public function published_deal($id)
    {
        $result = $this->deal_model->published_deal_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published deal Sucessfully');
            redirect('manage/deal');
        } else {
            $this->session->set_flashdata('message', 'Published deal  Failed');
            redirect('manage/deal');
        }
    }

    public function unpublished_deal($id)
    {
        $result = $this->deal_model->unpublished_deal_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished deal Sucessfully');
            redirect('manage/deal');
        } else {
            $this->session->set_flashdata('message', 'UnPublished deal  Failed');
            redirect('manage/deal');
        }
    }

    private function get_image_by_id($id)
    {
        $this->db->select('deal_image');
        $this->db->from('tbl_deal');
        $this->db->where('deal_id', $id);
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
