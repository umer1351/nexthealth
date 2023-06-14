<?php



defined('BASEPATH') or exit('No direct script access allowed');



class Product extends CI_Controller

{



    public function __construct()

    {

        parent::__construct();

        $this->get_user();

    }



    public function add_product()

    {

        $data                           = array();

        $data['parent_categories']      = $this->category_model->getall_category_info();

        $data['categories']             = $this->category_model->get_category_info();

        $data['sub_categories']         = $this->category_model->get_all_third_categories();

        $data['deals']                  = $this->deal_model->getall_deal_info();

        $data['all_published_brand']    = $this->product_model->get_all_published_brand();

        $data['maincontent']            = $this->load->view('admin/pages/add_product', $data, true);

        $this->load->view('admin/master', $data);

    }



    public function manage_product()

    {





        $rowno = $this->uri->segment(3); 



        $this->load->library('pagination');

    

        $rowperpage = 30;



        if($rowno != 0){

            $rowno = ($rowno-1) * $rowperpage;

        }

        

        



       $allcount = $this->manageorder_model->getProductCount();

       $config['base_url'] = base_url().'manage/product/'; 



        $config['use_page_numbers'] = TRUE;

        $config['total_rows'] = $allcount;

        $config['per_page'] = $rowperpage;



        $config['reuse_query_string'] = true;

        $this->pagination->initialize($config);

        



        $data['pagination'] = $this->pagination->create_links();

     

        $data['row'] = $rowno;

       

     

        $data['get_all_product'] = $this->manageorder_model->getData($rowno,$rowperpage);

       

       

        

        $data['maincontent']     = $this->load->view('admin/pages/manage_product', $data, true);

        $this->load->view('admin/master', $data);

    }



    public function save_product()

    {

        $data                              = array();

        $data['product_title']             = $this->input->post('product_title');

        $data['product_pos_id']            = $this->input->post('product_pos_id');

        $data['meta_keywords']             = $this->input->post('product_meta_keywords');

        $data['meta_description']          = $this->input->post('product_meta_description');

        $data['ingredients']               = $this->input->post('product_ingrediens');

        $data['product_long_description']  = $this->input->post('product_long_description');

        $data['product_price']             = $this->input->post('product_price');

        // $data['product_sale_price']        = $this->input->post('product_price');

        $data['product_trade_price']       = $this->input->post('product_trade_price');

        $data['product_quantity']          = $this->input->post('product_quantity');

        $data['purchase_qty_limit']        = $this->input->post('quantity_limit');

        $data['handling_charges']          = $this->input->post('handling_charges');

        $data['product_weight']            = $this->input->post('weight');

        $data['delivery_time_msg']         = $this->input->post('delivery_msg');

        $data['availability_msg']          = $this->input->post('availability_msg');

        // $data['product_deal']              = $this->input->post('deals');

        $data['product_category']          = $this->input->post('parent_category');

        $data['product_second_category']   = $this->input->post('category');

        $data['product_third_category']    = $this->input->post('child_category');

        $data['product_brand']             = $this->input->post('product_brand');

        $data['product_feature']           = $this->input->post('product_feature');

        $data['drug_form_tabs']            = $this->input->post('show_tabs');

        $data['always_in_stock']           = $this->input->post('always_instock'); 

        $data['publication_status']        = $this->input->post('publication_status'); 

        $data['product_author']            = $this->session->userdata('user_id'); 

        $data['product_tax']               = $this->input->post('product_tax');

        // $data['discount_type']             = 0;

        // $data['discount']                  = 0;

        // if(!empty($this->input->post('product_discount')) && !empty($this->input->post('discount'))){



        //     if ($this->input->post('product_discount') == 1) { // Percentage

        //        $discount                          = ($data['product_price']/100) *  ($this->input->post('discount')) ;

        //        $data['product_sale_price']        = $data['product_price'] - $discount;

        //        $data['discount_type']             = $this->input->post('product_discount');

        //        $data['discount']                  = $this->input->post('discount');

               

        //     }else{

                

        //         $data['discount_type']             = $this->input->post('product_discount');

        //         $data['discount']                  = $this->input->post('discount');

        //         $data['product_sale_price']        = $data['product_price'] - $data['discount'];

        //     }



        // }

        



        $this->form_validation->set_rules('product_title', 'Product Title', 'trim|required');

        // $this->form_validation->set_rules('product_short_description', 'Product Short Description', 'trim|required');

        $this->form_validation->set_rules('product_long_description', 'Product Long Status', 'trim|required');

        // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');

        $this->form_validation->set_rules('product_price', 'Product Price', 'trim|required');

        $this->form_validation->set_rules('product_quantity', 'Product Quantity', 'trim|required');

        // $this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');

        $this->form_validation->set_rules('product_brand', 'Product Brand', 'trim|required');

        $this->form_validation->set_rules('product_feature', 'Product Feature', 'trim');

        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');



        if (!empty($_FILES['product_image']['name'])) {

            $config['upload_path']   = './uploads/thumbs/';

            $config['allowed_types'] = 'gif|jpg|png';

            $config['max_size']      = 4096;

            $config['max_width']     = 2000;

            $config['max_height']    = 2000;



            $this->upload->initialize($config);



            if (!$this->upload->do_upload('product_image')) {

                $error = $this->upload->display_errors();

                $this->session->set_flashdata('message', $error);

                redirect('add/product');

            } else {

                $post_image            = $this->upload->data();

                $data['product_image'] = $post_image['file_name'];

            }

        }

        if (!empty($_FILES['product_image2']['name'])) {

            $config['upload_path']   = './uploads/thumbs/';

            $config['allowed_types'] = 'gif|jpg|png';

            $config['max_size']      = 4096;

            $config['max_width']     = 2000;

            $config['max_height']    = 2000;





            $this->upload->initialize($config);



            if (!$this->upload->do_upload('product_image2')) {

                $error = $this->upload->display_errors();

                $this->session->set_flashdata('message', $error);

                redirect('add/product');

            } else {

                $post_image            = $this->upload->data();

                $data['product_image2'] = $post_image['file_name'];

            }

        }

        if (!empty($_FILES['product_image3']['name'])) {

            $config['upload_path']   = './uploads/thumbs/';

            $config['allowed_types'] = 'gif|jpg|png';

            $config['max_size']      = 4096;

            $config['max_width']     = 2000;

            $config['max_height']    = 2000;



            $this->upload->initialize($config);



            if (!$this->upload->do_upload('product_image3')) {

                $error = $this->upload->display_errors();

                $this->session->set_flashdata('message', $error);

                redirect('add/product');

            } else {

                $post_image            = $this->upload->data();

                $data['product_image3'] = $post_image['file_name'];

            }

        }

        if (!empty($_FILES['product_image4']['name'])) {

            $config['upload_path']   = './uploads/thumbs/';

            $config['allowed_types'] = 'gif|jpg|png';

            $config['max_size']      = 4096;

            $config['max_width']     = 2000;

            $config['max_height']    = 2000;



            $this->upload->initialize($config);



            if (!$this->upload->do_upload('product_image4')) {

                $error = $this->upload->display_errors();

                $this->session->set_flashdata('message', $error);

                redirect('add/product');

            } else {

                $post_image            = $this->upload->data();

                $data['product_image4'] = $post_image['file_name'];

            }

        }

        if ($this->form_validation->run() == true) {



            $result = $this->product_model->save_product_info($data);



            if ($result) {

                $this->session->set_flashdata('message', 'Product Inserted Sucessfully');

                redirect('manage/product');

            } else {

                $this->session->set_flashdata('message', 'Product Inserted Failed');

                redirect('manage/product');

            }

        } else {

            $this->session->set_flashdata('message', validation_errors());

            redirect('add/product');

        }

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



    public function edit_product($id)

    {

        $data                           = array();

        $data['parent_categories']      = $this->category_model->getall_category_info();

        $data['categories']             = $this->category_model->get_category_info();

        $data['sub_categories']         = $this->category_model->get_all_third_categories();

        $data['deals']                  = $this->deal_model->getall_deal_info();

        $data['product_info_by_id']     = $this->product_model->edit_product_info($id);

        $data['maincontent']            = $this->load->view('admin/pages/edit_product', $data, true);

        $this->load->view('admin/master', $data);

    }



    public function update_product($id)

    {



        $data                              = array();

        $data['product_title']             = $this->input->post('product_title');

        // $data['product_pos_id']            = $this->input->post('product_pos_id');

        $data['meta_keywords']             = $this->input->post('product_meta_keywords');

        $data['meta_description']          = $this->input->post('product_meta_description');

        $data['ingredients']               = $this->input->post('product_ingrediens');

        $data['product_long_description']  = $this->input->post('product_long_description');

        $data['product_sale_price']         = $this->input->post('product_sale_price');

         $data['product_price']         = $this->input->post('product_trade_price');

         // $data['product_sale_price']        = $this->input->post('product_price');

        // $data['product_trade_price']       = $this->input->post('product_trade_price');

        $data['product_quantity']          = 45;

        $data['purchase_qty_limit']        = $this->input->post('quantity_limit');

        $data['handling_charges']          = $this->input->post('handling_charges');

        $data['product_weight']            = $this->input->post('weight');

        $data['delivery_time_msg']         = $this->input->post('delivery_msg');

        $data['availability_msg']          = $this->input->post('availability_msg');

        // $data['product_deal']              = $this->input->post('deals');

        // $data['product_category']          = $this->input->post('parent_category');

        // $data['product_second_category']   = $this->input->post('category');

        // $data['product_third_category']    = $this->input->post('child_category');

        $data['product_brand']             = $this->input->post('product_brand');

        $data['product_feature']           = $this->input->post('product_feature');

        $data['drug_form_tabs']            = $this->input->post('show_tabs');

        $data['always_in_stock']           = $this->input->post('always_instock'); 

        $data['publication_status']        = $this->input->post('publication_status'); 

        $data['product_author']            = $this->session->userdata('user_id'); 

        $data['product_tax']               = $this->input->post('product_tax');

        // $data['discount_type']             = 0;

        // $data['discount']                  = 0;

        // if(!empty($this->input->post('product_discount')) && !empty($this->input->post('discount'))){



        //     if ($this->input->post('product_discount') == 1) { // Percentage

        //        $discount                          = ($data['product_price']/100) *  ($this->input->post('discount')) ;

        //        $data['product_sale_price']        = $data['product_price'] - $discount;

        //        $data['discount_type']             = $this->input->post('product_discount');

        //        $data['discount']                  = $this->input->post('discount');

               

        //     }else{

                

        //         $data['discount_type']             = $this->input->post('product_discount');

        //         $data['discount']                  = $this->input->post('discount');

        //         $data['product_sale_price']        = $data['product_price'] - $data['discount'];

        //     }



        // }

        



        $this->form_validation->set_rules('product_title', 'Product Title', 'trim|required');

        // $this->form_validation->set_rules('product_short_description', 'Product Short Description', 'trim|required');

        // $this->form_validation->set_rules('product_long_description', 'Product Long Status', 'trim|required');

        // // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');

        // $this->form_validation->set_rules('product_price', 'Product Price', 'trim|required');

        // $this->form_validation->set_rules('product_quantity', 'Product Quantity', 'trim|required');

        // // $this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');

        // $this->form_validation->set_rules('product_brand', 'Product Brand', 'trim|required');

        // $this->form_validation->set_rules('product_feature', 'Product Feature', 'trim');

        // $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');



        if (!empty($_FILES['product_image']['name'])) {

            $config['upload_path']   = './uploads/thumbs/';

            $config['allowed_types'] = 'gif|jpg|png';

            $config['max_size']      = 4096;

            $config['max_width']     = 4000;

            $config['max_height']    = 4000;



            $this->upload->initialize($config);



            if (!$this->upload->do_upload('product_image')) {

                $error = $this->upload->display_errors();

                $this->session->set_flashdata('message', $error);

                redirect('add/product');

            } else {

                $post_image            = $this->upload->data();

                $data['product_image'] = $post_image['file_name'];

            }

        }

        if (!empty($_FILES['product_image2']['name'])) {

            $config['upload_path']   = './uploads/thumbs/';

            $config['allowed_types'] = 'gif|jpg|png';

            $config['max_size']      = 4096;

            $config['max_width']     = 4000;

            $config['max_height']    = 4000;





            $this->upload->initialize($config);



            if (!$this->upload->do_upload('product_image2')) {

                $error = $this->upload->display_errors();

                $this->session->set_flashdata('message', $error);

                redirect('add/product');

            } else {

                $post_image            = $this->upload->data();

                $data['product_image2'] = $post_image['file_name'];

            }

        }

        if (!empty($_FILES['product_image3']['name'])) {

            $config['upload_path']   = './uploads/thumbs/';

            $config['allowed_types'] = 'gif|jpg|png';

            $config['max_size']      = 4096;

            $config['max_width']     = 4000;

            $config['max_height']    = 4000;



            $this->upload->initialize($config);



            if (!$this->upload->do_upload('product_image3')) {

                $error = $this->upload->display_errors();

                $this->session->set_flashdata('message', $error);

                redirect('add/product');

            } else {

                $post_image            = $this->upload->data();

                $data['product_image3'] = $post_image['file_name'];

            }

        }

        if (!empty($_FILES['product_image4']['name'])) {

            $config['upload_path']   = './uploads/thumbs/';

            $config['allowed_types'] = 'gif|jpg|png';

            $config['max_size']      = 4096;

            $config['max_width']     = 4000;

            $config['max_height']    = 400;



            $this->upload->initialize($config);



            if (!$this->upload->do_upload('product_image4')) {

                $error = $this->upload->display_errors();

                $this->session->set_flashdata('message', $error);

                redirect('add/product');

            } else {

                $post_image            = $this->upload->data();

                $data['product_image4'] = $post_image['file_name'];

            }

        }
        

        if ($this->form_validation->run() == true) {

            // print_r($data);

            // exit;

            $result = $this->product_model->update_product_info($data, $id);



            if ($result) {

                $this->session->set_flashdata('message', 'Product Updated Sucessfully');

                redirect('manage/product');

            } else {

                $this->session->set_flashdata('message', 'Product Updated Failed');

                redirect('manage/product');

            }

        } else {

            $this->session->set_flashdata('message', validation_errors());

            redirect('add/product');

        }







    }



    public function delete_product($id)

    {

        $delete_image = $this->get_image_by_id($id);

        unlink('uploads/' . $delete_image->product_image);

        $result = $this->product_model->delete_product_info($id);

        if ($result) {

            $this->session->set_flashdata('message', 'Product Deleted Sucessfully');

            redirect('manage/product');

        } else {

            $this->session->set_flashdata('message', 'Product Deleted Failed');

            redirect('manage/product');

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

