<?php



class Manageorder_Model extends CI_Model

{



    public function manage_order_info()

    {

        $this->db->select('*');

        $this->db->from('tbl_order');

        $this->db->join('tbl_customer', 'tbl_customer.customer_id = tbl_order.customer_id');

        $result = $this->db->get();

        return $result->result();

    }



    public function getProductCount() {



        $this->db->select('count(*) as allcount');

        $this->db->from('tbl_product');

        $query = $this->db->get();

        $result = $query->result_array();

      

        return $result[0]['allcount'];

    }



    public function getOrderCount($customer_name="",$customer_email="",$customer_num="",$order_num="") {

        $cust_id = '';

        if($customer_name != ''){

            $this->db->select('customer_id');

            $this->db->from('tbl_customer');

            $this->db->like('customer_name', $customer_name, 'both');
            $this->db->limit(1);
            $cust_id = $this->db->get()->row()->customer_id;

        }

        if($customer_email != ''){

            $this->db->select('customer_id');

            $this->db->from('tbl_customer');

            $this->db->where('customer_email', $customer_email);

            $cust_id = $this->db->get()->row()->customer_id;

        }

        if($customer_num != ''){

            $this->db->select('customer_id');

            $this->db->from('tbl_customer');

            $this->db->like('customer_phone', $customer_num, 'both');
                $this->db->limit(1);
            $cust_id = $this->db->get()->row()->customer_id;

        }



        $this->db->select('count(*) as allcount');

        $this->db->from('tbl_order');

        if($cust_id != ''){

           $this->db->where('customer_id', $cust_id); 

        }

        if($order_num != ''){

           $this->db->where('order_id', $order_num); 

        }

        $query = $this->db->get();

        $result = $query->result_array();

      

        return $result[0]['allcount'];

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

          $this->db->limit(20);

          return $this->db->get();

    }



    public function getData($rowno,$rowperpage)

    {

        $this->db->select('tbl_product.*,tbl_product.publication_status as pstatus');

        $this->db->from('tbl_product');



        $this->db->limit($rowperpage, $rowno);  

        $query = $this->db->get();



        

        return $query->result();

    }



    public function getDataOrder($rowno,$rowperpage,$customer_name,$customer_email,$customer_num,$order_num)

    {

        $cust_id = '';

        if($customer_name != ''){

            $this->db->select('customer_id');

            $this->db->from('tbl_customer');

            $this->db->like('customer_name', $customer_name, 'both');
            $this->db->limit(1);

            $cust_id = $this->db->get()->row()->customer_id;

        }

        if($customer_email != ''){

            $this->db->select('customer_id');

            $this->db->from('tbl_customer');

            $this->db->where('customer_email', $customer_email);

            $cust_id = $this->db->get()->row()->customer_id;

        }

        if($customer_num != ''){

            $this->db->select('customer_id');

            $this->db->from('tbl_customer');

            $this->db->like('customer_phone', $customer_num, 'both');
            $this->db->limit(1);
            $cust_id = $this->db->get()->row()->customer_id;

        }

        $this->db->select('*');

        $this->db->from('tbl_order');

        $this->db->order_by("order_id", "DESC");

        $this->db->where('order_type !=', 2);
        $this->db->where('status !=', 2);

        if($cust_id != ''){

           $this->db->where('customer_id', $cust_id); 

        }

        if($order_num != ''){

           $this->db->where('order_id', $order_num); 

        }

        



        $this->db->limit($rowperpage, $rowno);  

        $result = $this->db->get();



        return $result->result_array();

    }



    public function get_last_order()

    {

        $query = $this->db->query("SELECT order_id FROM tbl_order ORDER BY order_id DESC LIMIT 1");

        $result = $query->row();

        return $result->order_id;

        // return $result->result();

    }



    public function order_info_by_id($order_id)

    {

        $this->db->select('*');

        $this->db->from('tbl_order');

        $this->db->where('order_id', $order_id);

        $result = $this->db->get();

        return $result->row();

    }



    public function update_order($data='',$order_id ='')

    {

        $this->db->where('order_id', $order_id);

        $this->db->update('tbl_order', $data);

    }



    public function delete_order_details_info($id='')

    {

        $this->db->where('order_details_id', $id);

        $this->db->delete('tbl_order_details');

    }



    public function customer_info_by_id($custoemr_id)

    {

        $this->db->select('*');

        $this->db->from('tbl_customer');

        $this->db->where('customer_id', $custoemr_id);

        $result = $this->db->get();

        return $result->row();

    }



    public function shipping_info_by_id($customer_id)

    {

        $this->db->select('*');

        $this->db->from('tbl_shipping');

        $this->db->where('customer_id', $customer_id);

        $this->db->where('status', 1);

        $result = $this->db->get();

        return $result->row();

    }



    public function shipping_city_by_id($city_id='')

    {

        $this->db->select('city_name');

        $this->db->from('tbl_cities');

        $this->db->where('id', $city_id);

        $result = $this->db->get();

        return $result->row()->city_name;

    }



    public function invoice_city_by_id($city_id='')

    {

       $this->db->select('city_name');

        $this->db->from('tbl_cities');

        $this->db->where('id', $city_id);

        $result = $this->db->get();

        return $result->row()->city_name;

    }



    public function payment_info_by_id($payment_id)

    {

        $this->db->select('*');

        $this->db->from('tbl_payment_method');

        $this->db->where('payment_id', $payment_id);

        $result = $this->db->get();

        return $result->row();

    }



    public function orderdetails_info_by_id($order_id)

    {

        $this->db->select('*');

        $this->db->from('tbl_order_details');

        $this->db->where('order_id', $order_id);

        $result = $this->db->get();

        

        return $result->result();

    }



    public function order_info_by_customer_id($customer_id)

    {

        $this->db->select('*');

        $this->db->from('tbl_order');

        $this->db->where('customer_id', $customer_id);

        $this->db->where('order_type', 1);

        $result = $this->db->get();

        return $result->result_array();

    }



    public function order_info_all()

    {

        $this->db->select('*');

        $this->db->from('tbl_order');

        $this->db->order_by("order_id", "DESC");

        $this->db->where('order_type !=', 2);

        

        $result = $this->db->get();



        return $result->result_array();

    }  



    public function schedule_order_info_by_customer_id($customer_id)

    {

        $this->db->select('*');

        $this->db->from('tbl_order');

        $this->db->where('customer_id', $customer_id);

        $this->db->where('order_type', 2);

        $result = $this->db->get();

        return $result->result_array();

    }



}

