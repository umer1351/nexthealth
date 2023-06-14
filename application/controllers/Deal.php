<?php



defined('BASEPATH') or exit('No direct script access allowed');



class Deal extends CI_Controller

{



    public function __construct()

    {

        parent::__construct();

        $this->get_user();

    }



    public function add_deal()

    {

        $data                = array();

        $data['maincontent'] = $this->load->view('admin/pages/add_deal', '', true);

        $this->load->view('admin/master', $data);

    }



    public function manage_deal()

    {

        $data                = array();

        $data['all_deal']  = $this->deal_model->getall_deal_info();

        $data['maincontent'] = $this->load->view('admin/pages/manage_deal', $data, true);

        $this->load->view('admin/master', $data);

    }

    public function edit_lab_test($id='')
    {
        $data                = array();
        $data['discount']  = $this->deal_model->get_lab_test_info($id);
        $data['maincontent'] = $this->load->view('admin/pages/edit_lab_test', $data, true);

        $this->load->view('admin/master', $data);
    }

    
    public function edit_manage_discounts($id='')
    {
        $data                = array();
        $data['discount']  = $this->deal_model->get_discount_info($id);
        $data['maincontent'] = $this->load->view('admin/pages/edit_special_discount', $data, true);

        $this->load->view('admin/master', $data);
    }
    public function update_lab_test($id)
    {
        $data                       = array();

        $data['salt_name']       = $this->input->post('salt_name');

        $data['product_id']        = $this->input->post('product_id');

        $data['sort_order']        = $this->input->post('sort_order');





            $result = $this->deal_model->update_lab_test_info($data, $id);




                $this->session->set_flashdata('message', 'Lab Test Updated Sucessfully');

                redirect('manage/lab_test');

            


    }

    public function update_manage_discounts($id)
    {
        $data                       = array();

        $data['salt_name']       = $this->input->post('salt_name');

        $data['product_id']        = $this->input->post('product_id');

        $data['sort_order']        = $this->input->post('sort_order');





            $result = $this->deal_model->update_discount_info($data, $id);




                $this->session->set_flashdata('message', 'Discount Updated Sucessfully');

                redirect('manage/special_discounts');

            


    }

    public function delete_discounts($id='')
    {
       $result = $this->deal_model->delete_discount_info($id);

        
            $this->session->set_flashdata('message', 'Discount Deleted Sucessfully');

            redirect('manage/special_discounts');
    }

     public function delete_lab_test($id='')
    {
       $result = $this->deal_model->delete_lab_test_info($id);

        
            $this->session->set_flashdata('message', 'Lab Test Deleted Sucessfully');

            redirect('manage/lab_test');
    }

    public function add_special_discounts()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_special_discounts', $data, true);

        $this->load->view('admin/master', $data);
    }


    public function add_lab_test()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_lab_test', $data, true);

        $this->load->view('admin/master', $data);
    }

    public function save_lab_test($value='')
    {
       $data                            = array();

        $data['salt_name']              = $this->input->post('salt_name');
        if(!empty($this->input->post('product_id_1'))){
            $data['product_id']             = $this->input->post('product_id_1');
            $data['is_active']              = 1;
            $data['sort_order']             = 1;
            $result = $this->deal_model->save_lab_test($data);
        }
        if(!empty($this->input->post('product_id_2'))){
            $data['product_id']             = $this->input->post('product_id_2');
            $data['is_active']             = 1;
            $data['sort_order']             = 2;
            $result = $this->deal_model->save_lab_test($data);
        }
        if(!empty($this->input->post('product_id_3'))){
            $data['product_id']             = $this->input->post('product_id_3');
            $data['is_active']             = 1;
            $data['sort_order']             = 3;
            $result = $this->deal_model->save_lab_test($data);
        }
        if(!empty($this->input->post('product_id_4'))){
            $data['product_id']             = $this->input->post('product_id_4');
            $data['is_active']             = 1;
            $data['sort_order']             = 4;
            $result = $this->deal_model->save_lab_test($data);
        }
        

            redirect('manage/lab_test');

       
    }

    public function save_deal_data($value='')
    {
       $data                            = array();

        $data['salt_name']              = $this->input->post('salt_name');
        if(!empty($this->input->post('product_id_1'))){
            $data['product_id']             = $this->input->post('product_id_1');
            $data['is_active']             = 1;
            $result = $this->deal_model->save_special_discount($data);
        }
        if(!empty($this->input->post('product_id_2'))){
            $data['product_id']             = $this->input->post('product_id_2');
            $data['is_active']             = 1;
            $result = $this->deal_model->save_special_discount($data);
        }
        if(!empty($this->input->post('product_id_3'))){
            $data['product_id']             = $this->input->post('product_id_3');
            $data['is_active']             = 1;
            $result = $this->deal_model->save_special_discount($data);
        }
        if(!empty($this->input->post('product_id_4'))){
            $data['product_id']             = $this->input->post('product_id_4');
            $data['is_active']             = 1;
            $result = $this->deal_model->save_special_discount($data);
        }
        

            redirect('manage/special_discounts');

       
    }

    public function lab_test()

    {

        $data                = array();

        $data['all_discounts']  = $this->deal_model->getall_lab_test();

        foreach ($data['all_discounts'] as $key => $value) {
            $data['all_discounts'][$key]['product_name'] = $this->deal_model->get_products_info($value['product_id']);
        }

      

        $data['maincontent'] = $this->load->view('admin/pages/manage_lab_test', $data, true);

        $this->load->view('admin/master', $data);

    }


    public function manage_discounts()

    {

        $data                = array();

        $data['all_discounts']  = $this->deal_model->getall_special_discount_info();

        foreach ($data['all_discounts'] as $key => $value) {
            $data['all_discounts'][$key]['product_name'] = $this->deal_model->get_products_info($value['product_id']);
        }

      

        $data['maincontent'] = $this->load->view('admin/pages/manage_discounts', $data, true);

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

