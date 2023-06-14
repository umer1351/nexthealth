<?php



class Web_Model extends CI_Model

{

    public function get_cus_email($value='')
    {
        $this->db->select('customer_email');

        $this->db->from('tbl_customer');
        $this->db->where('customer_id', $value);


      

       return $this->db->get()->row()->customer_email;
    }

    public function get_all_featured_product()

    {

        $this->db->select('*,tbl_product.publication_status as pstatus');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_id', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

        // $this->db->where('product_feature', 1);

        $info = $this->db->get();

      

        return $info->result();

    }



    public function get_count($value='')

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->where('product_category', $value);

        return $this->db->count_all();

    }

    public function get_brands_id_by_name($value='')

    {

        $this->db->select('brand_id');

        $this->db->from('tbl_brand');

        $this->db->where('brand_name', $value);

        $info = $this->db->get();

       

        return $info->row()->brand_id;

    }



    public function get_all_cat_for_home_product($id)

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->where('tbl_product.product_category', $id);

        $this->db->where('tbl_product.product_image !=', 0);

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->limit(12);

        $info = $this->db->get();

        return $info->result();

    }



    public function cancel_order($id='', $data)

    {

        $this->db->where('order_id', $id);

        $this->db->update('tbl_order', $data);

        return 1;

    }



     public function get_prod_id_by_name($url='')

    {

        $this->db->select('product_id');

        $this->db->from('tbl_product');

        $this->db->where('product_url', $url);

        $info = $this->db->get();

       // print_r($this->db->last_query());

        return $info->row()->product_id;

    }



    public function get_deals_id_by_name($url='')

    {

        $this->db->select('deal_id');

        $this->db->from('tbl_deal');

        $this->db->where('deal_title', $url);

        $info = $this->db->get();

       

        return $info->row()->deal_id;

    }



    



    public function get_cancelled_orders()

    {

        $this->db->select('*');

        $this->db->from('tbl_order');

        $this->db->join('tbl_customer', 'tbl_customer.customer_id = tbl_order.customer_id');

        $this->db->where('tbl_order.status', 2);

        $result = $this->db->get();

        return $result->result_array();

    }



    public function get_cat_id_by_name($value='')

    {

        $this->db->select('id');

        $this->db->from('tbl_category_parent');

        $this->db->where('category_name', $value);

        $this->db->limit(1);

        $query = $this->db->get(); 

        return $query->row()->id;       

    }



    public function get_second_cat_id_by_name($value='')

    {

        $this->db->select('id');

        $this->db->from('tbl_category');

        $this->db->where('category_name', $value);

        $this->db->limit(1);

        $query = $this->db->get(); 

        return $query->row()->id;       

    }



    public function get_third_cat_id_by_name($value='')

    {

        $this->db->select('id');

        $this->db->from('tbl_category_child');

        $this->db->where('name', $value);

        $this->db->limit(1);

        $query = $this->db->get(); 

        return $query->row()->id;       

    }



    public function get_all_brands()

    {

        $this->db->select('*');

        $this->db->from('tbl_brand');

        $info = $this->db->get();

        return $info->result_array();

    }



    public function get_all_new_product()

    {

        $this->db->select('*,tbl_product.publication_status as pstatus');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');

        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_id', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->limit(4);

        $info = $this->db->get();

        return $info->result();

    }



    public function get_all_product()

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_id', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

        $info = $this->db->get();

        return $info->result();

    }



    public function get_all_product_pagi($limit,$offset)

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');

        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_id', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->limit($limit,$offset);

        $info = $this->db->get();

        return $info->result();

    }



    public function get_single_product($id)

    {

        $this->db->select('tbl_product.*, tbl_brand.*,  tbl_product.publication_status as active');

        $this->db->from('tbl_product');

        // $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        $this->db->where('tbl_product.product_id', $id);

        $info = $this->db->get();

        // print_r($this->db->last_query());

        return $info->row();

    }



    public function get_first_category($id)

    {

        $this->db->select('tbl_category_parent.category_name as category_name');

        $this->db->from('tbl_category_parent');

        $this->db->join('tbl_product', 'tbl_category_parent.id=tbl_product.product_category');

        $this->db->where('tbl_product.product_id', $id);

        $info = $this->db->get();

        return $info->row();

    }



    public function get_second_category($id)

    {

        $this->db->select('tbl_category.category_name');

        $this->db->from('tbl_category');

        $this->db->join('tbl_product', 'tbl_category.id=tbl_product.product_second_category');

        $this->db->where('tbl_product.product_id', $id);

        $info = $this->db->get();

        return $info->row();

    }



    public function get_third_category($id)

    {

        $this->db->select('tbl_category_child.name');

        $this->db->from('tbl_category_child');

        $this->db->join('tbl_product', 'tbl_category_child.id=tbl_product.product_third_category');

        $this->db->where('tbl_product.product_id', $id);

        $info = $this->db->get();

        return $info->row();

    }



    public function tbl_pages($value='')

    {

        $this->db->select('url_key');

        $this->db->from('tbl_pages');

        $info = $this->db->get();

       return $info->result_array();

    }



    public function tbl_product_urls($value='')

    {

        $this->db->select('product_url');

        $this->db->from('tbl_product');

        $info = $this->db->get();

       return $info->result_array();

    }



    public function get_all_category()

    {

        $this->db->select('*');

        $this->db->from('tbl_category');

        $this->db->where('publication_status', 1);

        $info = $this->db->get();

        return $info->result();

    }



    public function get_cat_prod_count($id='')

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->where('product_category', $id);

        

        return $this->db->get()->num_rows();

    }



    

    public function get_all_product_by_cat($id,$limit,$offset, $min, $max, $brand, $order)

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category_parent', 'find_in_set(tbl_category_parent.id,tbl_product.product_category )');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        

        $this->db->where('tbl_product.publication_status', 1);



        if($min != ''){

         $this->db->where('tbl_product.product_price >=', $min);   

        }

        if($max != ''){

         $this->db->where('tbl_product.product_price <=', $max);   

        }



        if($brand != ''){

          $brands_array = explode('_', $brand);

            $where = '1=1 AND ';

          foreach ($brands_array as $key => $value) {

            $where .= 'tbl_product.product_brand ='.$value.' OR ';            

          }

            $w =  rtrim($where, ' OR ');

            $w = '('.$w.')';

            $this->db->where($w); 

        }

         

        $this->db->where('tbl_category_parent.id', $id);

        if($order != ''){

         if($order == 'asc'){

            $this->db->order_by("tbl_product.product_title", "asc");

         }elseif($order == 'desc'){

            $this->db->order_by("tbl_product.product_title", "desc");

         }elseif($order == 'priceasc'){

            $this->db->order_by("tbl_product.product_price", "asc");

         }elseif($order == 'pricedesc'){

            $this->db->order_by("tbl_product.product_price", "desc");

         }

          

        }else{

            $this->db->order_by("tbl_product.product_image", "desc");

        }



        $this->db->limit($limit,$offset);

        $info = $this->db->get();

        return $info->result();

    }



    public function get_prod($id,$limit, $start) {



        $this->db->limit($limit, $start);

        $query = $this->db->get();



        return $query->result();

    }



    // Fetch records

    public function getData($id,$rowno,$rowperpage,$min, $max, $brand, $order, $table) {

            

        $this->db->select('*');

        $this->db->from('tbl_product');

        

        if($table == 'tbl_category_parent'){

         $this->db->join('tbl_category_parent', 'tbl_category_parent.id = tbl_product.product_category ');

          $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        }elseif($table == 'tbl_category'){

            $this->db->join('tbl_category', 'tbl_category.id = tbl_product.product_second_category ');

             $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        }elseif($table == 'tbl_brand'){

            $this->db->join('tbl_brand', 'tbl_brand.brand_name = tbl_product.product_brand');

        }

       

        

        $this->db->where('tbl_product.publication_status', '1');

        if($min != ''){

         $this->db->where('tbl_product.product_price >=', $min);   

        }

        if($max != ''){

         $this->db->where('tbl_product.product_price <=', $max);   

        }

        if($brand != ''){

          $brand= str_replace("_" , " ", $brand);

          $this->db->where('tbl_product.product_brand', $brand);      

        }



        if($table == 'tbl_category_parent'){

            $this->db->where('tbl_category_parent.id', $id);

        }elseif($table == 'tbl_category'){

             $this->db->where('tbl_category.id', $id);

        }

        elseif($table == 'tbl_brand'){

             $this->db->where('tbl_brand.brand_id', $id);

        }

        if($order != ''){

         if($order == 'asc'){

            $this->db->order_by("tbl_product.product_title", "asc");

         }elseif($order == 'desc'){

            $this->db->order_by("tbl_product.product_title", "desc");

         }elseif($order == 'priceasc'){

            $this->db->order_by("tbl_product.product_price", "asc");

         }elseif($order == 'pricedesc'){

            $this->db->order_by("tbl_product.product_price", "desc");

         }elseif($order == 'default'){

            $this->db->order_by("tbl_product.product_image", "desc");

         }

          

        }else{

            $this->db->order_by("tbl_product.product_image", "desc");

        }



        $this->db->limit($rowperpage, $rowno);  

        $query = $this->db->get();



        

        return $query->result();

    }



    // Select total records







    public function getrecordCount($id,$min, $max, $brand, $order, $table) {



        $this->db->select('count(*) as allcount');

        $this->db->from('tbl_product');

        if($table == 'tbl_category_parent'){

         $this->db->join('tbl_category_parent', 'tbl_category_parent.id = tbl_product.product_category ');

         $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        }elseif($table == 'tbl_category'){

            $this->db->join('tbl_category', 'tbl_category.id = tbl_product.product_second_category ');

            $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        }

        elseif($table == 'tbl_brand'){

            $this->db->join('tbl_brand', 'tbl_brand.brand_name = tbl_product.product_brand');

            $this->db->where('tbl_brand.brand_id', $id);

        }

        

        

        $this->db->where('tbl_product.publication_status', 1);

        if($min != ''){

         $this->db->where('tbl_product.product_price >=', $min);   

        }

        if($max != ''){

         $this->db->where('tbl_product.product_price <=', $max);   

        }



        if($brand != ''){

          $brand= str_replace("_" , " ", $brand);

          $this->db->where('tbl_product.product_brand', $brand);

      

        }

        $query = $this->db->get();

        $result = $query->result_array();

      

        return $result[0]['allcount'];

    }



    public function get_all_product_by_second_cat($id,$limit,$offset, $min, $max, $brand, $order)

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category', 'find_in_set(tbl_category.id,tbl_product.product_second_category )');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        

         $this->db->where('tbl_product.publication_status', 1);



        if($min != ''){

         $this->db->where('tbl_product.product_price >=', $min);   

        }

        if($max != ''){

         $this->db->where('tbl_product.product_price <=', $max);   

        }



        if($brand != ''){

          $brands_array = explode('_', $brand);

            $where = '1=1 AND ';

          foreach ($brands_array as $key => $value) {

            $where .= 'tbl_product.product_brand ='.$value.' OR ';            

          }

            $w =  rtrim($where, ' OR ');

            $w = '('.$w.')';

            $this->db->where($w); 

        }

         

        $this->db->where('tbl_category.id', $id);

        if($order != ''){

         if($order == 'asc'){

            $this->db->order_by("tbl_product.product_title", "asc");

         }elseif($order == 'desc'){

            $this->db->order_by("tbl_product.product_title", "desc");

         }elseif($order == 'priceasc'){

            $this->db->order_by("tbl_product.product_price", "asc");

         }elseif($order == 'pricedesc'){

            $this->db->order_by("tbl_product.product_price", "desc");

         }

          

        }else{

            $this->db->order_by("tbl_product.product_image", "desc");

        }



        $this->db->limit($limit,$offset);

        $info = $this->db->get();

        return $info->result();







        // $this->db->select('*');

        // $this->db->from('tbl_product');

        // $this->db->join('tbl_category', 'find_in_set(tbl_category.id, tbl_product.product_second_category)');

        // $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');

        // $this->db->order_by('tbl_product.product_id', 'DESC');

        // $this->db->where('tbl_product.publication_status', 1);

        // $this->db->where('tbl_category.id', $id);

        // $info = $this->db->get();

        // return $info->result();

    }



     public function get_all_product_by_third_cat($id,$limit,$offset, $min, $max, $brand, $order)

    {



        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category_child', 'find_in_set(tbl_category_child.id, tbl_product.product_third_category)');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        

        // $this->db->where('tbl_product.publication_status', 1);



        if($min != ''){

         $this->db->where('tbl_product.product_price >=', $min);   

        }

        if($max != ''){

         $this->db->where('tbl_product.product_price <=', $max);   

        }



        if($brand != ''){

          $brands_array = explode('_', $brand);

            $where = '1=1 AND ';

          foreach ($brands_array as $key => $value) {

            $where .= 'tbl_product.product_brand ='.$value.' OR ';            

          }

            $w =  rtrim($where, ' OR ');

            $w = '('.$w.')';

            $this->db->where($w); 

        }

         

        $this->db->where('tbl_category_child.id', $id);

        if($order != ''){

         if($order == 'asc'){

            $this->db->order_by("tbl_product.product_title", "asc");

         }elseif($order == 'desc'){

            $this->db->order_by("tbl_product.product_title", "desc");

         }elseif($order == 'priceasc'){

            $this->db->order_by("tbl_product.product_price", "asc");

         }elseif($order == 'pricedesc'){

            $this->db->order_by("tbl_product.product_price", "desc");

         }

          

        }else{

            $this->db->order_by("tbl_product.product_image", "desc");

        }



        $this->db->limit($limit,$offset);

        $info = $this->db->get();

        return $info->result();





        // $this->db->select('*');

        // $this->db->from('tbl_product');

        // $this->db->join('tbl_category_child', 'find_in_set(tbl_category_child.id, tbl_product.product_third_category)');

        // $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');

        // $this->db->order_by('tbl_product.product_id', 'DESC');

        // $this->db->where('tbl_product.publication_status', 1);

        // $this->db->where('tbl_category_child.id', $id);

        // $info = $this->db->get();

        // return $info->result();

    }



    public function get_all_product_by_deal($id,$limit,$offset, $min, $max, $brand, $order)

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->join('tbl_deal', 'tbl_deal.deal_id=tbl_product.product_deal');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        if($min != ''){

         $this->db->where('tbl_product.product_price >=', $min);   

        }

        if($max != ''){

         $this->db->where('tbl_product.product_price <=', $max);   

        }



        if($brand != ''){

          $brands_array = explode('_', $brand);

            $where = '1=1 AND ';

          foreach ($brands_array as $key => $value) {

            $where .= 'tbl_product.product_brand ='.$value.' OR ';            

          }

            $w =  rtrim($where, ' OR ');

            $w = '('.$w.')';

            $this->db->where($w); 

        }

        if($order != ''){

         if($order == 'asc'){

            $this->db->order_by("tbl_product.product_title", "asc");

         }elseif($order == 'desc'){

            $this->db->order_by("tbl_product.product_title", "desc");

         }elseif($order == 'priceasc'){

            $this->db->order_by("tbl_product.product_price", "asc");

         }elseif($order == 'pricedesc'){

            $this->db->order_by("tbl_product.product_price", "desc");

         }

          

        }else{

            $this->db->order_by("tbl_product.product_image", "desc");

        }

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->where('tbl_deal.deal_id', $id);

        $this->db->limit(8);

        $info = $this->db->get();

        return $info->result();

    }



    public function get_all_product_by_brand($id='',$limit, $offset, $min, $max, $brand, $order)

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_id', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

         if($min != ''){

         $this->db->where('tbl_product.product_price >=', $min);   

        }

        if($max != ''){

         $this->db->where('tbl_product.product_price <=', $max);   

        }

         

        if($order != ''){

         if($order == 'asc'){

            $this->db->order_by("tbl_product.product_title", "asc");

         }elseif($order == 'desc'){

            $this->db->order_by("tbl_product.product_title", "desc");

         }elseif($order == 'priceasc'){

            $this->db->order_by("tbl_product.product_price", "asc");

         }elseif($order == 'pricedesc'){

            $this->db->order_by("tbl_product.product_price", "desc");

         }

          

        }else{

            $this->db->order_by("tbl_product.product_image", "desc");

        }



        $this->db->limit($limit,$offset);

        $this->db->where('tbl_brand.brand_id', $id);

        $info = $this->db->get();

        return $info->result();

    }



    public function get_all_sub_brands($id='')

    {

        $this->db->select('*');

        $this->db->from('tbl_sub_brand');

        $this->db->where('publication_status', 1);

        $this->db->where('parent_id', $id);

        $info = $this->db->get();

        return $info->result_array();

    }



    public function get_brand_image($id='')

    {

        $this->db->select('brand_image,brand_thumbnail');

        $this->db->from('tbl_brand');

        $this->db->where('publication_status', 1);

        $this->db->where('brand_id', $id);

        $info = $this->db->get();

        return $info->row_array();

    }





    public function get_product_by_id($id)

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        // $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_id', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->where('tbl_product.product_id', $id);

        $info = $this->db->get();

        return $info->row();

    }







    public function get_coupon($coupon='')

    {

        $this->db->select('discount');

        $this->db->from('tbl_coupon');

        $this->db->where('coupon', $coupon);

        $this->db->where('status', 1);

        $info = $this->db->get();

        if ($info->num_rows() > 0) {

            return $info->row()->discount;

        }else{

            return 0;

        }

        

    }



    public function get_all_product_brands_filter_deal($id='')

    {

        $this->db->distinct('tbl_product.product_brand');
        $this->db->select('tbl_product.product_brand, tbl_product.product_category, tbl_product.product_deal,  tbl_brand.brand_id, tbl_brand.brand_name');

        $this->db->from('tbl_product');

        $this->db->join('tbl_deal', 'tbl_deal.deal_id= tbl_product.product_deal');

        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_brand', 'DESC');

        // $this->db->group_by('tbl_product.product_brand', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->where('tbl_deal.deal_id', $id);

        $info = $this->db->get();

        return $info->result();

    }



     public function get_all_product_brands_filter($id)

    {
        $this->db->distinct('tbl_product.product_brand');
        $this->db->select('tbl_product.product_brand, tbl_product.product_category, tbl_brand.brand_id, tbl_brand.brand_name');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category_parent', 'find_in_set(tbl_category_parent.id, tbl_product.product_category)');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');
        // $this->db->group_by('tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_brand', 'DESC');

        // 

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->where('tbl_category_parent.id', $id);

        $info = $this->db->get();

        return $info->result();

    }



    public function get_all_brands_brand_fliter_product($id)

    {

         $this->db->distinct('tbl_product.product_brand');
        $this->db->select('tbl_product.product_brand, tbl_product.product_category, tbl_brand.brand_id, tbl_brand.brand_name');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category_parent', 'find_in_set(tbl_category_parent.id, tbl_product.product_category)');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_brand', 'DESC');

        // $this->db->group_by('tbl_product.product_brand', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->where('tbl_brand.brand_id', $id);

        $info = $this->db->get();

        return $info->result();

    }



    public function get_all_product_brands_filter_second_cat($id)

    {




$this->db->distinct('tbl_product.product_brand');
         $this->db->select('tbl_product.product_brand, tbl_product.product_category, tbl_brand.brand_id, tbl_brand.brand_name');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category', 'find_in_set(tbl_category.id, tbl_product.product_second_category)');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_brand', 'DESC');

        // $this->db->group_by('tbl_product.product_brand', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->where('tbl_category.id', $id);

        $info = $this->db->get();

        return $info->result(); 





       

    }





    public function get_all_product_brands_filter_third_cat($id)

    {


 $this->db->distinct('tbl_product.product_brand');
        $this->db->select('tbl_product.product_brand, tbl_product.product_category, tbl_brand.brand_id, tbl_brand.brand_name');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category_child', 'find_in_set(tbl_category_child.id, tbl_product.product_third_category)');

        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_brand', 'DESC');

        // $this->db->group_by('tbl_product.product_brand', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->where('tbl_category_child.id', $id);

        $info = $this->db->get();

        return $info->result();

    }



     public function get_all_product_price($id)

    {

        $this->db->select('MAX(product_price) as max_price, MIN(product_price) as min_price');

        $this->db->from('tbl_product');

        $this->db->where(" FIND_IN_SET($id, tbl_product.product_category)" );



        $info = $this->db->get();

        return $info->result();

    }



    public function get_all_product_price_deal($id)

    {

        $this->db->select('MAX(product_price) as max_price, MIN(product_price) as min_price');

        $this->db->from('tbl_product');

        $this->db->where("product_deal", $id );



        $info = $this->db->get();

        return $info->result();

    }





    public function get_all_product_price_by_brand($id)

    {

        $this->db->select('MAX(product_price) as max_price, MIN(product_price) as min_price');

        $this->db->from('tbl_product');

        $this->db->where(" FIND_IN_SET($id, tbl_product.product_brand)" );



        $info = $this->db->get();

        return $info->result();

    }



    public function get_all_product_price_second_cat($id)

    {

        $this->db->select('MAX(product_price) as max_price, MIN(product_price) as min_price');

        $this->db->from('tbl_product');

        $this->db->where(" FIND_IN_SET($id, tbl_product.product_second_category)" );

        $info = $this->db->get();

        return $info->result();

    }



    public function get_all_product_price_third_cat($id)

    {

        $this->db->select('MAX(product_price) as max_price, MIN(product_price) as min_price');

        $this->db->from('tbl_product');

         $this->db->where(" FIND_IN_SET($id, tbl_product.product_third_category)" );

        $info = $this->db->get();

        return $info->result();

    }





    public function update_customer_info($data='', $cust_id='')

    {

        $this->db->where('customer_id', $cust_id);

        $this->db->update('tbl_customer', $data);

        return 1;

    }



    public function save_customer_info($data)

    {

        $this->db->insert('tbl_customer', $data);

        return $this->db->insert_id();

    }



    public function get_customer_by_id($data)

    {

        $this->db->select('tbl_customer.*,tbl_cities.city_name');

        $this->db->from('tbl_customer');

        $this->db->join('tbl_cities', 'tbl_cities.id=tbl_customer.customer_city');

        $this->db->where('tbl_customer.customer_id', $data);

        $info = $this->db->get();

       

        return $info->row_array();

    }



    public function get_shipping_info_by_cust_id($data='')

    {

        $this->db->select('tbl_shipping.*,tbl_cities.city_name');

        $this->db->from('tbl_shipping');

        $this->db->join('tbl_cities', 'tbl_cities.id=tbl_shipping.shipping_city');

        $this->db->where('tbl_shipping.customer_id', $data);

        $info = $this->db->get();

        return $info->result_array();

    }

    public function get_active_shipping_info_by_cust_id($data='')

    {

        $this->db->select('tbl_shipping.*,tbl_cities.city_name');

        $this->db->from('tbl_shipping');

        $this->db->join('tbl_cities', 'tbl_cities.id=tbl_shipping.shipping_city');

        $this->db->where('tbl_shipping.customer_id', $data);

        $this->db->where('tbl_shipping.status', '1');

        $info = $this->db->get();

    

        return $info->row_array();

    }

    public function get_customer_group_discount_check($id='')

    {

        $this->db->select('customer_group');

        $this->db->from('tbl_customer');

        $this->db->where('customer_id', $id);

        $info = $this->db->get();

    

        return $info->row()->customer_group;

    }



    public function get_customer_group_discount($id='')

    {

        $this->db->select('discount');

        $this->db->from('tbl_customer_group');

        $this->db->where('id', $id);

        $info = $this->db->get();

    

        return $info->row()->discount;

    }



    public function get_customer_group_discount_type($id='')

    {

        $this->db->select('discount_type');

        $this->db->from('tbl_customer_group');

        $this->db->where('id', $id);

        $info = $this->db->get();

    

        return $info->row()->discount_type;

    }



    public function get_handling_charges_price($id='')

    {

        $this->db->select('handling_charges');

        $this->db->from('tbl_product');

        $this->db->where('product_id', $id);

        $this->db->limit(1);

        $query = $this->db->get(); 

        return $query->row()->handling_charges;       

    }



    public function get_product_weight($id='',$qty='')

    {

        $this->db->select('product_weight');

        $this->db->from('tbl_product');

        $this->db->where('product_id', $id);

        $this->db->limit(1);

        $query = $this->db->get(); 

        return $query->row()->product_weight*$qty;       

    }



    public function get_shipping_methods()

    {

        $this->db->select('*');

        $this->db->from('tbl_shipping_methods');

        $this->db->where('status', '1');

        $query = $this->db->get(); 

        return $query->result_array();

    }



    public function get_courier_company_for_order_details($order_courier_company_id)

    {

       

        $this->db->select('company_name');

        $this->db->from('tbl_courier_company');

        $this->db->where('id', $order_courier_company_id);

        $query = $this->db->get(); 

        return $query->row()->company_name;

    }



    public function get_payment_method_for_order_details($order_payment_method_id)

    {

        $this->db->select('payment_method_name');

        $this->db->from('tbl_payment_method');

        $this->db->where('payment_id', $order_payment_method_id);

        $query = $this->db->get(); 

        return $query->row()->payment_method_name;

    }



    public function get_shipping_method_for_order_details($order_shipping_method_id)

    {

        $this->db->select('shipping_method_name');

        $this->db->from('tbl_shipping_methods');

        $this->db->where('id', $order_shipping_method_id);

        $query = $this->db->get(); 

        return $query->row()->shipping_method_name;

    }



    public function get_active_courier_company()

    {

        $this->db->select('*');

        $this->db->from('tbl_courier_company');

        $this->db->where('status', '1');

        $this->db->limit(1);

        $query = $this->db->get(); 

        return $query->row_array(); 

    }



    public function get_ship_price($value='')

    {

        

        $this->db->select('price');

        $this->db->from('tbl_price_slots');

        $this->db->where('id', $value);

        $this->db->limit(1);

        $query = $this->db->get(); 

        

        return $query->row()->price; 

    }



    public function fetch_search_data($query='')

    {

          $this->db->select("product_id,product_title,product_url");

          $this->db->from("tbl_product");

          $this->db->where('tbl_product.publication_status', 1);

          if($query != '')

          {

           $this->db->like('product_title', $query);

           // $this->db->or_like('product_short_description', $query);

          }

          $this->db->order_by('product_id', 'DESC');
          $this->db->limit(60);
          return $this->db->get();

    }



    public function get_cities()

    {

        $this->db->select("*");

        $this->db->from("tbl_cities");

        $this->db->where("status",1);

        $this->db->order_by('city_name', 'ASC');

        return $this->db->get()->result();

    }



    public function get_shipping_method_details($method_id, $city_id, $courier_company,$handling_charges)

    {

       

        if ($handling_charges == '0') {

            

            $this->db->select('id');

            $this->db->from('tbl_courirer_company_city_map');

            $this->db->where('status', '1');

            // $this->db->where('allow_cold_chain', 0);

            $this->db->where('city_id', $city_id);

            $this->db->where('ship_company_id', $courier_company);

            $this->db->where('ship_method_id', $method_id);

            $this->db->limit(1);

            $query = $this->db->get();

           

            return $query->row_array();

        

        }else{



            $this->db->select('id');

            $this->db->from('tbl_courirer_company_city_map');

            $this->db->where('status', '1');

            $this->db->where('allow_cold_chain', 1);

            $this->db->where('city_id', $city_id);           

            $this->db->where('ship_company_id', $courier_company);

            $this->db->where('ship_method_id', $method_id);

            $this->db->limit(1);

            $query = $this->db->get();

             // print_r($this->db->last_query());

            return $query->row_array();



        }

        

    }

    public function get_price_slot_price_by_id($id='')

    {

        $this->db->select('price');

        $this->db->from('tbl_price_slots');

        $this->db->where('id', $id);

        $query = $this->db->get(); 

        

        return $query->row()->price;

    }



    public function get_shipping_price_details($id='',$weight='')

    {

        $this->db->select('price,id');

        $this->db->from('tbl_price_slots');

        $this->db->where('status', '1');

        $this->db->where('courier_city_map_id', $id);          

        $w = '('.'weight_from <='.$weight.' AND  weight_to > '.$weight.')';

        $this->db->where($w);

        $query = $this->db->get(); 

        

        return $query->row_array();



    }



    public function update_active_ship_address($id='',$cust_id='')

    {

        $data = array(

        'status' => '0'

        );



        $this->db->where('customer_id', $cust_id);

        $this->db->update('tbl_shipping', $data);



        $data = array(

        'status' => '1'

        );



        $this->db->where('shipping_id', $id);

        $this->db->update('tbl_shipping', $data);

        return 1;

    }



    public function update_shipping_address($data, $id)

    {

        $this->db->where('shipping_id', $id);

        $this->db->update('tbl_shipping', $data);

        return 1;

    }



    public function delete_shipping_address($id, $cust_id)

    {

        

        $this->db->where('shipping_id', $id);

        $this->db->delete('tbl_shipping');



        $this->db->select('shipping_id');

        $this->db->from('tbl_shipping');

        $this->db->where('customer_id',$cust_id);

        $this->db->where('status',1);

        $info = $this->db->get();

        if ($info->num_rows() > 0) {

            return $info->row();

        } else {

            $this->db->select('shipping_id');

            $this->db->from('tbl_shipping');

            $this->db->where('customer_id',$cust_id);

            $this->db->limit(1);

            $query = $this->db->get();

            $query = $query->row()->shipping_id;

            $data = array(

            'status' => '1'

            );



            $this->db->where('shipping_id', $query);

            $this->db->update('tbl_shipping', $data);

            return 1;

        }

 

    }



    public function update_password($data='')

    {

        $this->db->select('*');

        $this->db->from('tbl_customer');

        $this->db->where('customer_id',$data['customer_id']);

        $this->db->where('customer_password',md5($data['old_password']));

        $info = $this->db->get();

        if ($info->num_rows() > 0) {

            $table_arr = array(

             'customer_password' => md5($data['customer_password'])

             );

            $this->db->set($table_arr);

            $this->db->where('customer_id', $data['customer_id']);

            $this->db->update('tbl_customer');

            return 1;

        } else {

            return 0;

        }

    }



    public function save_cust_shipping_address($data)

    {

        

        $this->db->insert('tbl_shipping', $data);

        return $this->db->insert_id();

        

        

    }





    public function save_shipping_address($data)

    {

        $this->db->select('shipping_id');

        $this->db->from('tbl_shipping');

        $this->db->where('customer_id',$data['customer_id']);

        $this->db->where('status',1);

        $info = $this->db->get();

        if ($info->num_rows() > 0) {

            return $info->row();

        } else {

            $this->db->insert('tbl_shipping', $data);

        return $this->db->insert_id();

        }

        

    }



    public function get_customer_info($data)

    {

        $this->db->select('*');

        $this->db->from('tbl_customer');

        $this->db->where($data);

        $info = $this->db->get();

        return $info->row();

    }

    public function get_customer_login_details($data)

    {

        $this->db->select('*');

        $this->db->from('tbl_customer');

        $this->db->where($data);

        $info = $this->db->get();

        return $info->row();

    }



    public function save_guest_customer($data)

    {

        $this->db->select('customer_id');

        $this->db->from('tbl_customer');

        $this->db->where('customer_email',$data['customer_email']);

        $info = $this->db->get();

        if ($info->num_rows() > 0) {

            return $info->row()->customer_id;

        } else {

            $this->db->insert('tbl_customer', $data);

            return $this->db->insert_id();

        }

        

    }



    public function save_payment_info($data)

    {

        $this->db->insert('tbl_payment', $data);

        return $this->db->insert_id();

    }



    public function save_order_info($data)

    {

        $this->db->insert('tbl_order', $data);

         return $this->db->insert_id();

    }



    public function save_order_details_info($oddata)

    {

         $this->db->insert('tbl_order_details', $oddata);

    }



    public function get_all_slider_post()

    {

        $this->db->select('*');

        $this->db->from('tbl_slider');

        $this->db->where('publication_status', 1);

        $info = $this->db->get();

        return $info->result();

    }



    public function get_slider_count()

    {

        $this->db->select('*');

        $this->db->from('tbl_slider');

        $this->db->where('publication_status', 1);

        $query = $this->db->get();

        $info = $query->num_rows();

        return $info;

    }



    public function get_all_popular_posts()

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->where('publication_status', 1);

        $this->db->limit(4);

        $info = $this->db->get();

        return $info->result();

    }



     public function get_all_deals()

    {

        $this->db->select('*');

        $this->db->from('tbl_deal');

        $this->db->where('publication_status', '1');

        $info = $this->db->get();

        return $info->result_array();

    }

    public function get_all_discounted_product($value='')
    {
        $this->db->select('*');

        $this->db->from('tbl_product');

        // $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');

         $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        // $this->db->join('tbl_user', 'tbl_user.user_id=tbl_product.product_author');

        // $this->db->order_by('tbl_product.product_id', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

      $this->db->where('tbl_product.discount !=', 0);

   

        // $this->db->or_like('tbl_product.product_long_description', $search, 'both');

        // $this->db->or_like('tbl_category.category_name', $search, 'both');

      

        $this->db->order_by("tbl_product.discount", "desc");

        $this->db->order_by("tbl_product.product_image", "desc");

        $info = $this->db->get();

        // print_r($this->db->last_query());

        // exit;

        return $info->result();
    }



    public function get_all_search_product($search)

    {

        $this->db->select('tbl_product.*, tbl_brand.*, tbl_product.publication_status as active');

        $this->db->from('tbl_product');

        // $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');

         $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        // $this->db->join('tbl_user', 'tbl_user.user_id=tbl_product.product_author');

        // $this->db->order_by('tbl_product.product_id', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

     

        $this->db->like('tbl_product.product_title', $search, 'both');

        $this->db->or_like('tbl_product.product_short_description', $search, 'both');

        // $this->db->or_like('tbl_product.product_long_description', $search, 'both');

        // $this->db->or_like('tbl_category.category_name', $search, 'both');

        $this->db->or_like('tbl_brand.brand_name', $search, 'both');

        $this->db->order_by("tbl_product.discount", "desc");

        $this->db->order_by("tbl_product.product_image", "desc");

        $info = $this->db->get();

        // print_r($this->db->last_query());

        // exit;

        return $info->result();

    }



     public function get_all_special_offer_product($value='')

    {

        $this->db->select('*');

        $this->db->from('tbl_special_discounts');
        $this->db->order_by('salt_name', 'ASC');
        $info = $this->db->get();

        return $info->result_array();

    }



    public function get_all_special_discount_products($value='')
    {
        $this->db->select('tbl_special_discounts.*, tbl_product.*');

        $this->db->from('tbl_special_discounts');
        $this->db->join('tbl_product', 'tbl_product.product_pos_id=tbl_special_discounts.product_id');
        $this->db->where('tbl_special_discounts.salt_name', $value);
        $this->db->order_by('tbl_special_discounts.sort_order', 'ASC');
        $info = $this->db->get();

        return $info->result_array();
    }

    public function get_all_lab_test_products($value='')
    {
        $this->db->select('tbl_lab_test.*, tbl_product.*');

        $this->db->from('tbl_lab_test');
        $this->db->join('tbl_product', 'tbl_product.product_pos_id=tbl_lab_test.product_id');
        $this->db->where('tbl_lab_test.salt_name', $value);
        $this->db->order_by('tbl_lab_test.sort_order', 'ASC');
        $info = $this->db->get();

        return $info->result_array();
    }


    public function getall_special_discount_info($value='')

    {
        $qStr = "SELECT distinct salt_name FROM `tbl_special_discounts` order by salt_name asc";
        $query = $this->db->query($qStr);
        return $query->result_array();

    }

     public function getall_lab_test($value='')

    {
        $qStr = "SELECT distinct salt_name FROM `tbl_lab_test` order by salt_name asc";
        $query = $this->db->query($qStr);
        return $query->result_array();

    }



    public function get_all_adv_search_product($search = "", $category_cd= "", $manufacturer_name= "", $max_price= "", $min_price= "" )

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->join('tbl_category_parent', 'tbl_category_parent.id=tbl_product.product_category');

        $this->db->join('tbl_brand', 'tbl_brand.brand_name=tbl_product.product_brand');

        $this->db->order_by('tbl_product.product_id', 'DESC');

        $this->db->where('tbl_product.publication_status', 1);

        

        if(!empty($category_cd)){

            $this->db->where(" FIND_IN_SET($category_cd, tbl_category_parent.id)");

        }

        if(!empty($manufacturer_name)){

           $this->db->where('tbl_brand.brand_id', $manufacturer_name); 

        } 

        if (!empty($max_price)) {

            $this->db->where('tbl_product.product_price <', $max_price);

        }

        if(!empty($min_price)){

            $this->db->where('tbl_product.product_price >', $min_price);

        }

        

        $this->db->like('tbl_product.product_title', $search, 'both');

        $info = $this->db->get();

        return $info->result();

    }



    public function get_related_productd($name='',$id='',$ing='',$cat)

    {

        $this->db->select('*');

        $this->db->from('tbl_product');

        $this->db->where('tbl_product.publication_status', 1);

        $this->db->where('tbl_product.product_id !=', $id);

        $this->db->where('tbl_product.product_third_category', $cat);

        $this->db->where('tbl_product.product_image !=', '0');

        $this->db->order_by('tbl_product.discount_type', 'DESC');

        // $this->db->order_by('tbl_product.product_image', 'DESC');

        // $this->db->like('tbl_product.ingredients', $ing, 'both');

        // $this->db->or_like('tbl_product.product_short_description', $name, 'both');

        $this->db->limit(8);

        

        $info = $this->db->get();

        return $info->result();

    }



    public function get_product_prescription($id='')

    {

        $this->db->select('prescription_required');

        $this->db->from('tbl_product');

        $this->db->where('tbl_product.product_id', $id);

        

        $info = $this->db->get();

        return $info->row()->prescription_required;

    }



    



}

