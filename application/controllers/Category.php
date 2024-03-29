<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function add_category()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_category', '', true);
        $this->load->view('admin/master', $data);
    }

    public function manage_category()
    {
        $data                 = array();
        $data['all_categroy'] = $this->category_model->getall_category_info();
        $data['maincontent']  = $this->load->view('admin/pages/manage_category', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_category()
    {
        $data                         = array();
        $data['category_name']        = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status']   = $this->input->post('publication_status');
        $data['parent_cat_id']        = $this->input->post('parent_category');
        $data['cat_id']               = $this->input->post('category');
        $data['main_menu_display']    = $this->input->post('main_menu_display');
        $data['seo_keywords']         = $this->input->post('seo_keyword');
        $data['home_page_sections']   = $this->input->post('top_section').','.$this->input->post('shop_by_condition');


        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Category Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');
        $this->form_validation->set_rules('main_menu_display', 'Main Menu Display', 'trim');

        if (!empty($_FILES['category_thumbnail']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 300;
            $config['max_height']    = 300;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('category_thumbnail')) {
                $error = $this->upload->display_errors();
              

                $this->session->set_flashdata('message', $error);
                redirect('add/category');
            } else {
                $post_image            = $this->upload->data();
                $data['category_thumbnail'] = $post_image['file_name'];
            }
        }
         if (!empty($_FILES['category_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('category_image')) {
                $error = $this->upload->display_errors();
              

                $this->session->set_flashdata('message', $error);
                redirect('add/category');
            } else {
                $post_image            = $this->upload->data();
                $data['category_image'] = $post_image['file_name'];
            }
        }

        if ($this->form_validation->run() == true) {
            $result = $this->category_model->save_category_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Category Inserted Sucessfully');
                redirect('manage/category');
            } else {
                $this->session->set_flashdata('message', 'Category Inserted Failed');
                redirect('manage/category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/category');
        }

    }

    public function delete_category($id)
    {
        $result = $this->category_model->delete_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Category Deleted Sucessfully');
            redirect('manage/category');
        } else {
            $this->session->set_flashdata('message', 'Category Deleted Failed');
            redirect('manage/category');
        }
    }

    public function edit_category($id)
    {
        $data                        = array();
        $data['category_info_by_id'] = $this->category_model->edit_category_info($id);
        $data['maincontent']         = $this->load->view('admin/pages/edit_category', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_category($id)
    {
        $data                         = array();
        $data['category_name']        = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status']   = $this->input->post('publication_status');

        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Category Description', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->category_model->update_category_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Category Update Sucessfully');
                redirect('manage/category');
            } else {
                $this->session->set_flashdata('message', 'Category Update Failed');
                redirect('manage/category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/category');
        }

    }

    public function published_category($id)
    {
        $result = $this->category_model->published_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Category Sucessfully');
            redirect('manage/category');
        } else {
            $this->session->set_flashdata('message', 'Published Category  Failed');
            redirect('manage/category');
        }
    }

    public function unpublished_category($id)
    {
        $result = $this->category_model->unpublished_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Category Sucessfully');
            redirect('manage/category');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Category  Failed');
            redirect('manage/category');
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
