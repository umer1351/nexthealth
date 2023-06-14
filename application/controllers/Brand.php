<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function add_brand()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_brand', '', true);
        $this->load->view('admin/master', $data);
    }

    public function add_sub_brand()
    {
        $data                = array();
        $data['all_brand']   = $this->brand_model->getall_brand_info();
        $data['maincontent'] = $this->load->view('admin/pages/add_sub_brand', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_brand()
    {
        $data                = array();
        $data['all_brand']   = $this->brand_model->getall_brand_info();
        $data['maincontent'] = $this->load->view('admin/pages/manage_brand', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_brand()
    {
        $data                       = array();
        $data['brand_name']         = $this->input->post('brand_name');
        $data['brand_thumbnail']    = $this->input->post('brand_thumbnail');
        $data['brand_image']        = $this->input->post('brand_image');
        $data['brand_description']  = $this->input->post('brand_description');
        $data['publication_status'] = $this->input->post('publication_status');

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
        $this->form_validation->set_rules('brand_description', 'Brand Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

         if (!empty($_FILES['brand_thumbnail']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 300;
            $config['max_height']    = 300;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('brand_thumbnail')) {
                $error = $this->upload->display_errors();
              

                $this->session->set_flashdata('message', $error);
                redirect('add/brand');
            } else {
                $post_image            = $this->upload->data();
                $data['brand_thumbnail'] = $post_image['file_name'];
            }
        }
         if (!empty($_FILES['brand_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('brand_image')) {
                $error = $this->upload->display_errors();
              

                $this->session->set_flashdata('message', $error);
                redirect('add/category');
            } else {
                $post_image            = $this->upload->data();
                $data['brand_image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {
            $result = $this->brand_model->save_brand_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Brand Inseted Sucessfully');
                redirect('manage/brand');
            } else {
                $this->session->set_flashdata('message', 'Brand Inserted Failed');
                redirect('manage/brand');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/brand');
        }

    }

    public function save_sub_brand()
    {
        $data                       = array();
        $data['brand_name']         = $this->input->post('brand_name');
        $data['brand_thumbnail']    = $this->input->post('brand_thumbnail');
        $data['brand_image']        = $this->input->post('brand_image');
        $data['brand_description']  = $this->input->post('brand_description');
        $data['publication_status'] = $this->input->post('publication_status');
        $data['parent_id']          = $this->input->post('parent_id');

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
        $this->form_validation->set_rules('brand_description', 'Brand Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

         if (!empty($_FILES['brand_thumbnail']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 300;
            $config['max_height']    = 300;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('brand_thumbnail')) {
                $error = $this->upload->display_errors();
              

                $this->session->set_flashdata('message', $error);
                redirect('add/brand');
            } else {
                $post_image            = $this->upload->data();
                $data['brand_thumbnail'] = $post_image['file_name'];
            }
        }
         if (!empty($_FILES['brand_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('brand_image')) {
                $error = $this->upload->display_errors();
              

                $this->session->set_flashdata('message', $error);
                redirect('add/category');
            } else {
                $post_image            = $this->upload->data();
                $data['brand_image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {
            $result = $this->brand_model->save_sub_brand_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Brand Inseted Sucessfully');
                redirect('manage/brand');
            } else {
                $this->session->set_flashdata('message', 'Brand Inserted Failed');
                redirect('manage/brand');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/sub_brand');
        }

    }

    public function delete_brand($id)
    {
        $result = $this->brand_model->delete_brand_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Brand Deleted Sucessfully');
            redirect('manage/brand');
        } else {
            $this->session->set_flashdata('message', 'Brand Deleted Failed');
            redirect('manage/brand');
        }
    }

    public function edit_brand($id)
    {
        $data                     = array();
        $data['brand_info_by_id'] = $this->brand_model->edit_brand_info($id);
        $data['maincontent']      = $this->load->view('admin/pages/edit_brand', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_brand($id)
    {
        $data                       = array();
        $data['brand_name']         = $this->input->post('brand_name');
        $data['brand_description']  = $this->input->post('brand_description');
        $data['publication_status'] = $this->input->post('publication_status');

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');
        $this->form_validation->set_rules('brand_description', 'Brand Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->brand_model->update_brand_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Brand Update Sucessfully');
                redirect('manage/brand');
            } else {
                $this->session->set_flashdata('message', 'Brand Update Failed');
                redirect('manage/brand');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/brand');
        }

    }

    public function published_brand($id)
    {
        $result = $this->brand_model->published_brand_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Brand Sucessfully');
            redirect('manage/brand');
        } else {
            $this->session->set_flashdata('message', 'Published Brand  Failed');
            redirect('manage/brand');
        }
    }

    public function unpublished_brand($id)
    {
        $result = $this->brand_model->unpublished_brand_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Brand Sucessfully');
            redirect('manage/brand');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Brand  Failed');
            redirect('manage/brand');
        }
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
