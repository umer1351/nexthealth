<?php



defined('BASEPATH') or exit('No direct script access allowed');



class Web extends CI_Controller

{

    public function htmlmail(){

        //setup SMTP configurion
        $config = Array(    
          'protocol' => 'sendmail',
          'smtp_host' => 'your domain SMTP host',
          'smtp_port' => 25,
          'smtp_user' => 'SMTP Username',
          'smtp_pass' => 'SMTP Password',
          'smtp_timeout' => '4',
          'mailtype' => 'html',
          'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config); // Load email template
        $this->email->set_newline("\r\n");
        $this->email->from('your mail id', 'Anil Labs');

        $data = array(
            'name'=> 'Manoj Patil',
            'URL'=> 'http://manojpatial.com/login',
            'user_name'=> 'manojpatil',
            'password'=> 'welcome',

        );

        $this->email->to($user_email); // replace it with receiver email id
        $this->email->subject($subject); // replace it with email subject
        $message = $this->load->view('emails/new_user.php',$data,TRUE);

        $this->email->message($message); 
        $this->email->send();

    }


    public function index()

    {

        // $this->load->view('web/pages/maintainance');



        $data                          = array();

        // $data['all_featured_products'] = $this->web_model->get_all_featured_product();

        $data['all_featured_products'] = $this->web_model->get_all_cat_for_home_product(30148);

        $data['all_featured_product_sup'] = $this->web_model->get_all_cat_for_home_product(30145);

        $data['all_featured_products_opt'] = $this->web_model->get_all_cat_for_home_product(30002);

        $data['all_featured_products'] = $this->web_model->get_all_cat_for_home_product(30000);

        $data['all_new_products']      = $this->web_model->get_all_new_product();

        $data['parent_categories']            = $this->category_model->getall_category_info();

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        }

     

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/inc/slider');

        $this->load->view('web/pages/home', $data);

        $this->load->view('web/inc/footer');

    }



   public function getProductKey($name, $product_cd = 0){

    $find       = array(' ', '_', '&', '%', "'", '"', ';', '(', ')', '[', ']', '.', ',', '/', '\\', '=', '+', '``', '<', '>', '<>', '!', '#');

    $replace    = '-';

    $key        = str_replace($find, $replace, strtolower($name));

    $key        = str_replace('--', $replace, $key);

    $key        = str_replace('--', $replace, $key);

    $key        = preg_replace('/\-$/', '', $key);

    $key = $key.'-'.$product_cd;



    // check if already

    /*$Sql = "SELECT url_key FROM rs_tbl_products WHERE url_key LIKE '" . $key . "%'";

    if(!empty($product_cd)){

        $Sql .= " AND product_cd!='" . $product_cd . "'";

    }

    $this->dbQuery($Sql);

    if($this->totalRecords() >= 1){

        $key = $key . '-' . $this->totalRecords();

    }*/

    return $key;

}



    public function cron(){

  

    



    $p_day = 1;

    $actions = "SignUp";

    $action = "http://124.29.217.195:87/NextHealthServices/SignUp/GetProductAvailableBalance?p_Day=1";

    $ch = curl_init($action);

    curl_setopt($ch, CURLOPT_POST, 1);

    $queryString = "action=$actions";

    curl_setopt($ch, CURLOPT_POSTFIELDS,$queryString);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $result = curl_exec($ch);

    curl_close($ch);

   

    //var_dump($result);

    $jsonObj=json_decode($result);

    // echo "<pre>";

    // print_r($jsonObj);

    // echo "</pre>";

    // exit;

   

    $cur_date = date("Y-m-d H:i:s");



    $first_arr = array("01-001"=>"2", "01-002"=>"3", "01-003"=>"1");

    $second_arr = array("02-"=>"30100", "03-"=>"30097", "04-"=>"30098", "05-"=>"30099", "06-"=>"30136", "07-"=>"601", "08-"=>"600");



    $truncate = "TRUNCATE TABLE rs_tbl_temp_products";

    $this->db->query($truncate);

    // exit;

    // mysqli_query($db_conn, "TRUNCATE `rs_tbl_products_temp`");

    if($jsonObj->meta->code == "200")

    {

        

      

        $responses= $jsonObj->response;

        // print_R($responses);

        // die;

        // echo count($responses);

        // exit;



        //  if(count($responses)>1) -   I sweeeear.... not '>', but '>=' - otherwise only one product change is skipped! -_-'

        if(count($responses)>=1)

        {

            $i = 0;

            $j = 0;

            $records = "";

            $total=count($responses);

            //$chunks=array_chunk($responses, 500);

            //foreach($chunks as $responses){

// print_r($responses);

// exit;

            foreach($responses as $res)

            {

                $i++;

                $j++;

                $cat_id = 0;



                $product_cd =  $res->productId;

                $product_code_original =  $res->ProductCode;

                $product_code = substr($product_code_original,0,3);

                // print_r($res);

                $stock =  $res->balanceAvailable;

                $desc =  addslashes($res->ProductDesc);

                $manufacturer_name =  addslashes($res->ManufacturerName);

                $class_code =  $res->ClassOid;

                $class_name =  addslashes($res->ClassName);

                $drug_form =  addslashes($res->DrugDescription);

                $price = $res->SalePrice;

                $product_price =  round($price,2);

                $base_price = $product_price;

                $purchase_price =  round($res->PurchasePrice,2);

                $prod_discount = $res->DiscountPercecnt;

                $prod_sale_pric = $product_price;

                $discount_type = 0;

                if($prod_discount != 0){

                 $prod_sale_pric_before =   ($prod_discount) * ($product_price/100); 

                 $prod_sale_pric =   $prod_sale_pric - $prod_sale_pric_before; 

                 $discount_type = 1;

                }

                // echo $prod_sale_pric;

                // exit;

                //currently  showing out-of-stock products as well - Buzzz

                //$is_active =  $res->AvailableItem;        //uncomment this line to show out of stock products as well

                //if instock & online sales is available

                // echo $res->balanceAvailable;



                // echo $res->itemSalesNatureOnline;

                // die;

                $is_active= $res->isActive;

                $sale_based_item= $res->BackSales;

                $sale_on_web=$res->itemSalesNatureOnline;

                //show add to cart

                if(($res->balanceAvailable > 0) && ($res->itemSalesNatureOnline == 1 ) && ($res->BackSales == 1 )){

                     $sale_based_item = 1;

                     $is_active= $res->isActive;

                     $sale_on_web = $res->itemSalesNatureOnline;



                }

                

                    

                

                // echo $is_active;

                // die;

                // exit;

               

                //$sale_based_item = $res->SaleBasedItem;

                // else if(($res->balanceAvailable < 0) && ($itemSalesNatureOnline == 1) ){

                //     $is_active= $res->AvailableItem;





                // }

                // else if($itemSalesNatureOnline != 1){

                //     $is_active= 0;

                // }

                //$is_active =  ($res->balanceAvailable > 0) ? $res->AvailableItem : 0; //comment this line to revert to show out of stock products as well

                

                $discount =  $res->DiscountPercecnt;

                $sale_price_tax =  $res->Sale_Tax_Perc;

                $isMRP =  $res->isMRP;

                $purchase_price_tax =  $res->Purchase_Tax_Perc;

                $product_date = $cur_date;



                $sale_tax = ($product_price*$sale_price_tax)/100;

                $price_inc_tax = $product_price + $sale_tax;



                $purchase_tax = ($purchase_price*$purchase_price_tax)/100;

                $purchase_price_inc_tax = $purchase_price + $purchase_tax;



                //$url_key_product = $objRoute->getProductKey($desc, $product_cd);

                $url_key_product = $this->getProductKey($desc, $product_cd);



                if($product_code == "01-")

                {

                   $product_code = substr($product_code_original,0,6);

                   $cat_id = $first_arr[$product_code];

                }

                else

                {

                    $cat_id = $second_arr[$product_code];

                }



            

                

            





                $records .= "('$product_cd', '$desc', '$price_inc_tax', '$prod_sale_pric', '$product_date', '$url_key_product', '$product_code_original', '$purchase_price_inc_tax', '$discount', '$class_name', '$class_code', '$manufacturer_name', '$stock', '$is_active', '$cat_id', '$base_price', '$sale_price_tax','$isMRP','$sale_on_web','$sale_based_item', '$discount_type')";

////echo $records;

//echo $i;

//              die;

                if($i<count($responses))

                {

                    if($j < 100)

                        $records .= ",";

                }



                if($j==100)

//                    if($j>=100)

                {



                    $q2  = "INSERT INTO `rs_tbl_temp_products` (`product_cd`, `product_name`, `product_price`,

                            `product_sale_price`, `product_date`, `url_key`, `product_code`, `purchase_price`,

                            `discount`, `class_name`, `class_code`, `manufacturer_name`, `stock_qty`, `is_active`, `category_cd`, `base_price`, `tax`,`isMRP`,`sale_on_web`,`sale_based_item`, `discount_type`)                      

                             VALUES $records";

                   /*echo $q2;

                     echo '<br>';

                    die;*/

                    $this->db->query($q2);                           $records='';

                    $j = 0;

                }







            } // end foreach

//print_r($records);

//            die;

            //to insert any remaining records - Jamshaid bhai... ALLAH k wastay :"(

            if($j > 0 && $j < 100)

            {

                $q2  = "INSERT INTO `rs_tbl_temp_products` (`product_cd`, `product_name`, `product_price`,

                            `product_sale_price`, `product_date`, `url_key`, `product_code`, `purchase_price`,

                            `discount`, `class_name`, `class_code`, `manufacturer_name`, `stock_qty`, `is_active`, `category_cd`, `base_price`, `tax`,`isMRP`,`sale_on_web`,`sale_based_item`, `discount_type`)                      

                             VALUES $records";

//                 echo $q2;

//                 echo '<br>';

//                 die;

                             $this->db->query($q2);

                // mysqli_query($db_conn,$q2) or die(mysqli_error($db_conn));

                $records='';

                $j = 0;

            }



            $i = 0;

            //  }// end chunk

                // exit;

            //die('poop');

            $q = "UPDATE tbl_product T1 JOIN rs_tbl_temp_products T2 ON (T1.product_cd = T2. product_cd)                        

                        SET T1.product_title = T2.product_name, T2.flag = '1', T1.product_price = T2.product_price, T1.product_sale_price = T2.product_sale_price, T1.published_date = T2.product_date, T1.product_url = T2.url_key, T1.product_pos_id = T2.product_code,  T1.class_name = T2.class_name, T1.class_code = T2.class_code, T1.product_brand = T2.manufacturer_name, T1.product_quantity = T2.stock_qty, T1.publication_status = T2.sale_on_web, T1.product_tax = T2.tax, T1.discount=T2.discount, T1.discount_type=T2.discount_type, T1.is_mrp = T2.isMRP WHERE T1.product_cd = T2.product_cd";

            



           $this->db->query($q);





            // $q = "UPDATE rs_tbl_product_lang T1 JOIN rs_tbl_temp_products T2 ON (T1.product_cd = T2. product_cd)                        

            //             SET T1.product_name = T2.product_name, T1.product_desc = T2.product_name WHERE T1.product_cd = T2.product_cd";

            // $this->db->query($q);





            $q = "DELETE FROM `rs_tbl_temp_products` WHERE `flag` = '1'";

            $this->db->query($q);







            $q = "INSERT INTO tbl_product (`product_cd`, `product_title`, `product_price`,

                        `product_sale_price`, `published_date`, `product_url`, `product_pos_id`, 

                        `class_name`, `class_code`, `product_brand`, `product_quantity`, `publication_status`, `product_category`, `product_tax`, `is_mrp`, `discount_type`)

                        SELECT `product_cd`, `product_name`, `product_price`,

                        `product_sale_price`, `product_date`, `url_key`, `product_code`, 

                        `class_name`, `class_code`, `manufacturer_name`, `stock_qty`, `sale_on_web`, `category_cd`,  `tax`, `isMRP`, `discount_type` FROM rs_tbl_temp_products WHERE

                        rs_tbl_temp_products.flag=0";

//          echo $q;

//          exit;

           $this->db->query($q);

            



            // $q = "INSERT INTO rs_tbl_product_lang (`product_cd`, `product_name`, `product_desc`)

            //             SELECT `product_cd`, `product_name`, `product_name` FROM rs_tbl_temp_products WHERE

            //             rs_tbl_temp_products.flag=0";

            // mysqli_query($db_conn,$q);

            //die;

            //if out of stock and online sale is active

           // $out_of_stock = "update rs_tbl_products set is_active = 1  WHERE sale_on_web = 1 and stock_qty <= 0 ";

            

        



           //   mysqli_query($db_conn, $out_of_stock);



             //  $q_hide_zeroprice = "update tbl_product set publication_status= 0 where product_price = 0 or product_sale_price = 0";

             // $this->db->query($q_hide_zeroprice);

             

            // $always_visible_products = array(37688, 37689, 37691, 37680, 37681, 37682, 37683, 37684, 37685, 37686, 37687);

            // $q_always_visible_products = "update tbl_product set is_active = 1 WHERE sale_on_web = 1 and product_code like '01-004-%' or category_cd in (30148) or product_cd in (".implode(",",$always_visible_products).")";

            

          

        

             // mysqli_query($db_conn, $q_always_visible_products);



            //              $products_to_keep_hidden = array(35830,35831);

            // $q_hide_prod_cds = "update rs_tbl_products set is_active= 0 where sale_on_web = 0 or product_code like '07-003-%' or category_cd in (30138) or product_cd in (".implode(",",$products_to_keep_hidden).")";

          

             // mysqli_query($db_conn,$q_hide_prod_cds);

            



            //NO DISCOUNT - BUT ACTIVE PRODUCTS

            //No discount on kits either

            //15241:NEXT  First Aid Kit; 35469:NEXT BURN KIT; 36085:NEXT HEALTH Smog Kit

            //$allways_instock_product_codess = array(36085, 15241, 35469);

            //$allways_instock_product_codess = array(36085, 15241);



            /* $no_discount_active_products = array(36085);

            $q_no_disc_active_stock = "update rs_tbl_products set stock_qty = 15, is_active = 1, discount = 0 where product_cd in (".implode(",",$no_discount_active_products).")";

            mysqli_query($db_conn,$q_no_disc_active_stock); */





            // mysqli_query($db_conn,"INSERT INTO rs_tbl_cron SET action='$action', `date` = '$cur_date'");



        } // end count



    }

}



    public function home()

    {

        $data                          = array();

        // $data['all_featured_products'] = $this->web_model->get_all_featured_product();

        $data['all_featured_products'] = $this->web_model->get_all_cat_for_home_product(30000);

        $data['all_featured_product_sup'] = $this->web_model->get_all_cat_for_home_product(30145);

        $data['all_featured_products_opt'] = $this->web_model->get_all_cat_for_home_product(30002);

        $data['all_featured_products'] = $this->web_model->get_all_cat_for_home_product(30000);

        $data['all_new_products']      = $this->web_model->get_all_new_product();

        $data['parent_categories']            = $this->category_model->getall_category_info();

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        }

     

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/inc/slider');

        $this->load->view('web/pages/home', $data);

        $this->load->view('web/inc/footer');

    }



    public function contact()

    {

        $data = array();

        $this->load->view('web/inc/header');

        $this->load->view('web/pages/contact');

        $this->load->view('web/inc/footer');

    }



    public function cart()

    {

        $data                  = array();

         $data['parent_categories']            = $this->category_model->getall_category_info();

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        }

        $data['cart_contents'] = $this->cart->contents();

        // print_r($data['cart_contents']);

        $this->load->view('web/inc/header' , $data);

        $this->load->view('web/pages/cart', $data);

        $this->load->view('web/inc/footer');

    }



    // public function product()

    // {

    //     $this->load->library('pagination');



    //     $config['base_url'] = base_url('web/product');

    //     $config['total_rows'] = $this->db->get('tbl_product')->num_rows();

    //     $config['per_page'] = 8;

    //     $config['num_links'] = 2;

    //     $config['full_tag_open'] = '<ul>';

    //     $config['full_tag_close'] = '</ul>';

    //     $config['first_link'] = false;

    //     $config['last_link'] = false;

    //     $config['prev_link'] = '&lt; Previous';

    //     $config['prev_tag_open'] = '<li>';

    //     $config['prev_tag_close'] = '</li>';

    //     $config['last_link'] = false;

    //     $config['next_link'] = 'Next &gt;';

    //     $config['next_tag_open'] = '<li>';

    //     $config['next_tag_close'] = '</li>';

    //     $config['num_tag_open'] = '<li>';

    //     $config['num_tag_close'] = '</li>';

    //     $config['cur_tag_open'] = '<li class="active"><a>';

    //     $config['cur_tag_close'] = '</a></li>';



    //     $this->pagination->initialize($config);



    //     $data                    = array();

    //     $data['get_all_product'] = $this->web_model->get_all_product_pagi($config['per_page'], $this->uri->segment('3'));

    //     $this->load->view('web/inc/header');

    //     $this->load->view('web/pages/product', $data);

    //     $this->load->view('web/inc/footer');

    // }

    public function sitemap()

    {

        $data = array();

        $data['products'] = $this->web_model->tbl_product_urls();



        $data['pages'] = $this->web_model->tbl_pages();

       

        $this->load->view('sitemap', $data);

    }



    public function single($prod_name)

    {

        $id = $this->web_model->get_prod_id_by_name($prod_name);

        $data                       = array();

        $data['get_single_product'] = $this->web_model->get_single_product($id);

       

        $data['first_category'] = $this->web_model->get_first_category($id);

        $data['second_category'] = $this->web_model->get_second_category($id);

        $data['third_category'] = $this->web_model->get_third_category($id);

        $data['related_products'] = $this->web_model->get_related_productd($data['get_single_product']->product_title,$id,$data['get_single_product']->ingredients,$data['get_single_product']->product_third_category );

        

        // $data['get_all_category']   = $this->web_model->get_all_category();

        $data['parent_categories']            = $this->category_model->getall_category_info();

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/single', $data);

        $this->load->view('web/inc/footer');

    }



    public function error()

    {

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/error' , $data);

        $this->load->view('web/inc/footer');

    }



    public function not_found()

    {

        

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }



        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/not_found' , $data);

        $this->load->view('web/inc/footer');

    }



    public function category_post($ids = 0)

    {

        $cat_name =  str_replace("-", " ", $ids);

        

        $id = $this->web_model->get_cat_id_by_name($cat_name);

        

        $offset = 0;

        if(isset($_REQUEST['page'])){

                $offset = $_REQUEST['page'];

        }

        $min = "";

        if(isset($_REQUEST['min'])){

                $min = $_REQUEST['min'];

        }

        $max = "";

        if(isset($_REQUEST['max'])){

                $max = $_REQUEST['max'];

        }

        $brand = "";

        if(isset($_REQUEST['brand'])){

                $brand = $_REQUEST['brand'];

        }

        $order = "";

        if(isset($_REQUEST['order'])){

                $order = $_REQUEST['order'];

        }

        

        $this->load->library('pagination');

        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (isset($_GET['min'])) {

            $page= '&page=';

        }else{

            $page= '?page=';

        }

        if(isset($_GET['page'])){

            $page = '';

        }

        $config['base_url'] = $url.$page;

        $config['total_rows'] = $this->db->where('product_category', $id)->get('tbl_product')->num_rows();

        $config['per_page'] = 30;

        $config['num_links'] = 2;

        $config['full_tag_open'] = '<ul>';

        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = false;

        $config['last_link'] = false;

        $config['prev_link'] = '&lt; Previous';

        $config['prev_tag_open'] = '<li>';

        $config['prev_tag_close'] = '</li>';

        $config['last_link'] = false;

        $config['next_link'] = false;

        $config['next_tag_open'] = '<li>';

        $config['next_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li>';

        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li ><a>';

        $config['cur_tag_close'] = '</a></li>';

        

        $this->pagination->initialize($config);

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            } 

            

                

        $data['get_all_product'] = $this->web_model->get_all_product_by_cat($id,$config['per_page'], $offset, $min, $max, $brand, $order);

        // filters

        

       

        $data['get_brands'] = $this->web_model->get_all_product_brands_filter($id);

        $data['get_price_range'] = $this->web_model->get_all_product_price($id);

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/product', $data);

        $this->load->view('web/inc/footer');

    }


    public function lab_test()

    {


            $data                    = array();

            $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

            $data['get_all_product']  = $this->web_model->getall_lab_test();

            foreach ($data['get_all_product'] as $key => $value) {
                $data['get_all_product'][$key]['product_details'] = $this->web_model->get_all_lab_test_products($value['salt_name']);
            }

           



            if ($data['get_all_product']) {

                $this->load->view('web/inc/header', $data);

                $this->load->view('web/pages/lab_test', $data);

                $this->load->view('web/inc/footer');

            } else {

                 

                redirect('https://nexthealth.pk/not-found#gsc.tab=0&gsc.sort=&gsc.q='.$search);

            }

        

    }



     public function special_offers()

    {


            $data                    = array();

            $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

            $data['get_all_product']  = $this->web_model->getall_special_discount_info();

            foreach ($data['get_all_product'] as $key => $value) {
                $data['get_all_product'][$key]['product_details'] = $this->web_model->get_all_special_discount_products($value['salt_name']);
            }

           



            if ($data['get_all_product']) {

                $this->load->view('web/inc/header', $data);

                $this->load->view('web/pages/special_offers', $data);

                $this->load->view('web/inc/footer');

            } else {

                 

                redirect('https://nexthealth.pk/not-found#gsc.tab=0&gsc.sort=&gsc.q='.$search);

            }

        

    }




    public function discounted_products()

    {

       



        

            $data                    = array();

            $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

            $data['get_all_product'] = $this->web_model->get_all_discounted_product();

            $data['search']          = 'Discounted Products';

            // print_r($data['get_all_product']);

            // exit;



            if ($data['get_all_product']) {

                $this->load->view('web/inc/header', $data);

                $this->load->view('web/pages/search', $data);

                $this->load->view('web/inc/footer');

            } else {

                 

                redirect('https://nexthealth.pk/not-found#gsc.tab=0&gsc.sort=&gsc.q='.$search);

            }

        

    }



    public function product($rowno=0)

    {   



        $cat_name = $this->uri->segment(3);

        $rowno = $this->uri->segment(4);

        $cat_name =  str_replace("-", " ", $cat_name);



        $id = $this->web_model->get_cat_id_by_name($cat_name); 



        $this->load->library('pagination');

    

        $rowperpage = 30;



        if($rowno != 0){

            $rowno = ($rowno-1) * $rowperpage;

        }

        

         $min = "";

        if(isset($_REQUEST['min'])){

                $min = $_REQUEST['min'];

        }

        $max = "";

        if(isset($_REQUEST['max'])){

                $max = $_REQUEST['max'];

        }

        $brand = "";

        if(isset($_REQUEST['brand'])){

                $brand = $_REQUEST['brand'];

        }

        $order = "";

        if(isset($_REQUEST['order'])){

                $order = $_REQUEST['order'];

        }



       $allcount = $this->web_model->getrecordCount($id,$min, $max, $brand, $order, 'tbl_category_parent');

       $cat_name =  str_replace(" ", "-", $cat_name);

       $config['base_url'] = base_url().'web/product/'.$cat_name.'/'; 



        $config['use_page_numbers'] = TRUE;

        $config['total_rows'] = $allcount;

        $config['per_page'] = $rowperpage;



        $config['reuse_query_string'] = true;

        $this->pagination->initialize($config);

        



        $data['pagination'] = $this->pagination->create_links();

     

        $data['row'] = $rowno;

       

     

        $data['get_all_product'] = $this->web_model->getData($id,$rowno,$rowperpage,$min, $max, $brand, $order, 'tbl_category_parent');

       

        $data['parent_categories']            = $this->category_model->getall_category_info();

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        } 

        

       

        $data['get_brands'] = $this->web_model->get_all_product_brands_filter($id);

        $data['get_price_range'] = $this->web_model->get_all_product_price($id);

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/prod_test', $data);

        $this->load->view('web/inc/footer');

       

    }



    public function sub_products($rowno=0)

    {   



        $cat_name = $this->uri->segment(3);

        $rowno = $this->uri->segment(4);

        $cat_name =  str_replace("-", " ", $cat_name);



        $id = $this->web_model->get_second_cat_id_by_name($cat_name); 



        $this->load->library('pagination');

    

        $rowperpage = 30;



        if($rowno != 0){

            $rowno = ($rowno-1) * $rowperpage;

        }

        

         $min = "";

        if(isset($_REQUEST['min'])){

                $min = $_REQUEST['min'];

        }

        $max = "";

        if(isset($_REQUEST['max'])){

                $max = $_REQUEST['max'];

        }

        $brand = "";

        if(isset($_REQUEST['brand'])){

                $brand = $_REQUEST['brand'];

        }

        $order = "";

        if(isset($_REQUEST['order'])){

                $order = $_REQUEST['order'];

        }



       $allcount = $this->web_model->getrecordCount($id,$min, $max, $brand, $order, 'tbl_category');

        $cat_name =  str_replace(" ", "-", $cat_name);

       $config['base_url'] = base_url().'web/sub_products/'.$cat_name.'/'; 



        $config['use_page_numbers'] = TRUE;

        $config['total_rows'] = $allcount;

        $config['per_page'] = $rowperpage;



        $config['reuse_query_string'] = true;

        $this->pagination->initialize($config);

        



        $data['pagination'] = $this->pagination->create_links();

     

        $data['row'] = $rowno;

       

     

        $data['get_all_product'] = $this->web_model->getData($id,$rowno,$rowperpage,$min, $max, $brand, $order, 'tbl_category');

       

        $data['parent_categories']            = $this->category_model->getall_category_info();

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        } 

        

       

        $data['get_brands'] = $this->web_model->get_all_product_brands_filter_second_cat($id);

        $data['get_price_range'] = $this->web_model->get_all_product_price_second_cat($id);

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/prod_test', $data);

        $this->load->view('web/inc/footer');

       

    }



    public function second_cat_post($ids)

    {



        $cat_name =  str_replace("-", " ", $ids);

       

        $id = $this->web_model->get_second_cat_id_by_name($cat_name); 



        $offset = 0;

        if(isset($_REQUEST['page'])){

                $offset = $_REQUEST['page'];

        }

        $min = "";

        if(isset($_REQUEST['min'])){

                $min = $_REQUEST['min'];

        }

        $max = "";

        if(isset($_REQUEST['max'])){

                $max = $_REQUEST['max'];

        }

        $brand = "";

        if(isset($_REQUEST['brand'])){

                $brand = $_REQUEST['brand'];

        }

        $order = "";

        if(isset($_REQUEST['order'])){

                $order = $_REQUEST['order'];

        }

        

        $this->load->library('pagination');

        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (isset($_GET['min'])) {

            $page= '&page=';

        }else{

            $page= '?page=';

        }

        $config['base_url'] = $url.$page;

        $config['total_rows'] = $this->db->where('product_category', $id)->get('tbl_product')->num_rows();

        $config['per_page'] = 25;

        $config['num_links'] = 2;

        // $config['full_tag_open'] = '<ul>';

        // $config['full_tag_close'] = '</ul>';

        // $config['first_link'] = false;

        // $config['last_link'] = false;

        // $config['prev_link'] = '&lt; Previous';

        // $config['prev_tag_open'] = '<li>';

        // $config['prev_tag_close'] = '</li>';

        // $config['last_link'] = false;

        // $config['next_link'] = 'Next &gt;';

        // $config['next_tag_open'] = '<li>';

        // $config['next_tag_close'] = '</li>';

        // $config['num_tag_open'] = '<li>';

        // $config['num_tag_close'] = '</li>';

        // $config['cur_tag_open'] = '<li class="active"><a>';

        // $config['cur_tag_close'] = '</a></li>';

        

        $this->pagination->initialize($config);

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $data['get_all_product'] = $this->web_model->get_all_product_by_second_cat($id,$config['per_page'], $offset, $min, $max, $brand, $order);

        // Filters

        $data['get_brands'] = $this->web_model->get_all_product_brands_filter_second_cat($id);

        $data['get_price_range'] = $this->web_model->get_all_product_price_second_cat($id);

        

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/product', $data);

        $this->load->view('web/inc/footer');

        

    }



    public function third_cat_post($ids)

    {

        $cat_name =  str_replace("-", " ", $ids);

        

        $id = $this->web_model->get_third_cat_id_by_name($cat_name); 

        $offset = 0;

        if(isset($_REQUEST['page'])){

                $offset = $_REQUEST['page'];

        }

        $min = "";

        if(isset($_REQUEST['min'])){

                $min = $_REQUEST['min'];

        }

        $max = "";

        if(isset($_REQUEST['max'])){

                $max = $_REQUEST['max'];

        }

        $brand = "";

        if(isset($_REQUEST['brand'])){

                $brand = $_REQUEST['brand'];

        }

        $order = "";

        if(isset($_REQUEST['order'])){

                $order = $_REQUEST['order'];

        }

        

        $this->load->library('pagination');

        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (isset($_GET['min'])) {

            $page= '&page=';

        }else{

            $page= '?page=';

        }

        $config['base_url'] = $url.$page;

        $config['total_rows'] = $this->db->where('product_category', $id)->get('tbl_product')->num_rows();

        $config['per_page'] = 25;

        $config['num_links'] = 2;

        // $config['full_tag_open'] = '<ul>';

        // $config['full_tag_close'] = '</ul>';

        // $config['first_link'] = false;

        // $config['last_link'] = false;

        // $config['prev_link'] = '&lt; Previous';

        // $config['prev_tag_open'] = '<li>';

        // $config['prev_tag_close'] = '</li>';

        // $config['last_link'] = false;

        // $config['next_link'] = 'Next &gt;';

        // $config['next_tag_open'] = '<li>';

        // $config['next_tag_close'] = '</li>';

        // $config['num_tag_open'] = '<li>';

        // $config['num_tag_close'] = '</li>';

        // $config['cur_tag_open'] = '<li class="active"><a>';

        // $config['cur_tag_close'] = '</a></li>';

        

        $this->pagination->initialize($config);

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $data['get_all_product'] = $this->web_model->get_all_product_by_third_cat($id,$config['per_page'], $offset, $min, $max, $brand, $order);

       // filters

        $data['get_brands'] = $this->web_model->get_all_product_brands_filter_third_cat($id);

        $data['get_price_range'] = $this->web_model->get_all_product_price_third_cat($id);

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/product', $data);

        $this->load->view('web/inc/footer');

    }



    public function deal($name)

    {

        $names =  str_replace("-", " ", $name);

        $id = $this->web_model->get_deals_id_by_name($names);

        $offset = 0;

        if(isset($_REQUEST['page'])){

                $offset = $_REQUEST['page'];

        }

        $min = "";

        if(isset($_REQUEST['min'])){

                $min = $_REQUEST['min'];

        }

        $max = "";

        if(isset($_REQUEST['max'])){

                $max = $_REQUEST['max'];

        }

        $brand = "";

        if(isset($_REQUEST['brand'])){

                $brand = $_REQUEST['brand'];

        }

        $order = "";

        if(isset($_REQUEST['order'])){

                $order = $_REQUEST['order'];

        }

        

        $this->load->library('pagination');

        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (isset($_GET['min'])) {

            $page= '&page=';

        }else{

            $page= '?page=';

        }

        $config['base_url'] = $url.$page;

        $config['total_rows'] = $this->db->where('product_category', $id)->get('tbl_product')->num_rows();

        $config['per_page'] = 25;

        $config['num_links'] = 2;

        // $config['full_tag_open'] = '<ul>';

        // $config['full_tag_close'] = '</ul>';

        // $config['first_link'] = false;

        // $config['last_link'] = false;

        // $config['prev_link'] = '&lt; Previous';

        // $config['prev_tag_open'] = '<li>';

        // $config['prev_tag_close'] = '</li>';

        // $config['last_link'] = false;

        // $config['next_link'] = 'Next &gt;';

        // $config['next_tag_open'] = '<li>';

        // $config['next_tag_close'] = '</li>';

        // $config['num_tag_open'] = '<li>';

        // $config['num_tag_close'] = '</li>';

        // $config['cur_tag_open'] = '<li class="active"><a>';

        // $config['cur_tag_close'] = '</a></li>';

        

        $this->pagination->initialize($config);

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $data['get_all_product'] = $this->web_model->get_all_product_by_deal($id,$config['per_page'], $offset, $min, $max, $brand, $order);

        $data['get_brands'] = $this->web_model->get_all_product_brands_filter_deal($id);

        $data['get_price_range'] = $this->web_model->get_all_product_price_deal($id);

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/product', $data);

        $this->load->view('web/inc/footer');

    }





    public function brand($rowno=0)

    {

        $cat_name = $this->uri->segment(3);

        $rowno = $this->uri->segment(4);

        $cat_name =  str_replace("-", " ", $cat_name);



       $id = $this->web_model->get_brands_id_by_name($cat_name);



        $this->load->library('pagination');

    

        $rowperpage = 30;



        if($rowno != 0){

            $rowno = ($rowno-1) * $rowperpage;

        }

        

         $min = "";

        if(isset($_REQUEST['min'])){

                $min = $_REQUEST['min'];

        }

        $max = "";

        if(isset($_REQUEST['max'])){

                $max = $_REQUEST['max'];

        }

        $brand = "";

        if(isset($_REQUEST['brand'])){

                $brand = $_REQUEST['brand'];

        }

        $order = "";

        if(isset($_REQUEST['order'])){

                $order = $_REQUEST['order'];

        }



       $allcount = $this->web_model->getrecordCount($id,$min, $max, $brand, $order, 'tbl_brand');

       $cat_name =  str_replace(" ", "-", $cat_name);

       $config['base_url'] = base_url().'web/brand/'.$cat_name.'/'; 



        $config['use_page_numbers'] = TRUE;

        $config['total_rows'] = $allcount;

        $config['per_page'] = $rowperpage;



        $config['reuse_query_string'] = true;

        $this->pagination->initialize($config);

        



        $data['pagination'] = $this->pagination->create_links();

     

        $data['row'] = $rowno;

       

     

        $data['get_all_product'] = $this->web_model->getData($id,$rowno,$rowperpage,$min, $max, $brand, $order, 'tbl_brand');

       

        $data['parent_categories']            = $this->category_model->getall_category_info();

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        } 

        

       

        $data['get_brands'] = $this->web_model->get_all_brands_brand_fliter_product($id);

        $data['get_price_range'] = $this->web_model->get_all_product_price($id);

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/prod_test', $data);

        $this->load->view('web/inc/footer');



        // $names =  str_replace("-", " ", $name);

        // $id = $this->web_model->get_brands_id_by_name($names);



        // $data                    = array();

        // $data['parent_categories']            = $this->category_model->getall_category_info();

        //     foreach ($data['parent_categories'] as $key => $value) {

             

        //         $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

        //         foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

        //            $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

        //         }



        //     }



        //  $offset = 0;

        // if(isset($_REQUEST['page'])){

        //         $offset = $_REQUEST['page'];

        // }

        // $min = "";

        // if(isset($_REQUEST['min'])){

        //         $min = $_REQUEST['min'];

        // }

        // $max = "";

        // if(isset($_REQUEST['max'])){

        //         $max = $_REQUEST['max'];

        // }

        // $brand = "";

        // if(isset($_REQUEST['brand'])){

        //         $brand = $_REQUEST['brand'];

        // }

        // $order = "";

        // if(isset($_REQUEST['order'])){

        //         $order = $_REQUEST['order'];

        // }

        

        // $this->load->library('pagination');

        // $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        // if (isset($_GET['min'])) {

        //     $page= '&page=';

        // }else{

        //     $page= '?page=';

        // }

        // $config['base_url'] = $url.$page;

        // $config['total_rows'] = $this->db->where('product_category', $id)->get('tbl_product')->num_rows();

        // $config['per_page'] = 8;

        // $config['num_links'] = 2;

        // $config['full_tag_open'] = '<ul>';

        // $config['full_tag_close'] = '</ul>';

        // $config['first_link'] = false;

        // $config['last_link'] = false;

        // $config['prev_link'] = '&lt; Previous';

        // $config['prev_tag_open'] = '<li>';

        // $config['prev_tag_close'] = '</li>';

        // $config['last_link'] = false;

        // $config['next_link'] = 'Next &gt;';

        // $config['next_tag_open'] = '<li>';

        // $config['next_tag_close'] = '</li>';

        // $config['num_tag_open'] = '<li>';

        // $config['num_tag_close'] = '</li>';

        // $config['cur_tag_open'] = '<li class="active"><a>';

        // $config['cur_tag_close'] = '</a></li>';

        

        // $this->pagination->initialize($config);

        // $data                    = array();

        // $data['parent_categories']            = $this->category_model->getall_category_info();

        //     foreach ($data['parent_categories'] as $key => $value) {

             

        //         $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

        //         foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

        //            $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

        //         }



        //     } 

        // $data['brand_image'] = $this->web_model->get_brand_image($id);        

        // $data['sub_brands'] = $this->web_model->get_all_sub_brands($id);      

        // $data['get_all_product'] = $this->web_model->get_all_product_by_brand($id,$config['per_page'], $offset, $min, $max, $brand, $order);

        // // filters

        // $data['get_brands'] = $this->web_model->get_all_product_brands_filter($id);

        // $data['get_price_range'] = $this->web_model->get_all_product_price_by_brand($id);

          

        // // $data['get_all_product'] = $this->web_model->get_all_product_by_brand($id);

        // $this->load->view('web/inc/header', $data);

        // $this->load->view('web/pages/brand_products', $data);

        // $this->load->view('web/inc/footer');



    }









    public function save_cart()

    {

        $data       = array();

        $product_id = $this->input->post('product_id');



        $results    = $this->web_model->get_product_by_id($product_id);



        $data['id']      = $results->product_id;

        $data['name']    = $results->product_title;

        if ($this->input->post('discounted_price')) {

           $data['price']   =  $this->input->post('discounted_price'); 

        }else{

           $data['price']   = $results->product_price;

        }





        

        $data['qty']     = $this->input->post('qty');

        $data['options'] = array('product_image' => $results->product_image);

           // print_r($data['qty']);



        $this->cart->insert($data);

        redirect('cart');

    }



    public function update_cart()

    {

        $data          = array();

        $data['qty']   = $this->input->post('qty');

        $data['rowid'] = $this->input->post('rowid');



        $this->cart->update($data);

        redirect('cart');

    }



    public function remove_cart()

    {



        $data = $this->input->post('rowid');

        $this->cart->remove($data);

        redirect('cart');

    }



    public function register_success()

    {

		$data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            } 

        $customer_name = $this->session->flashdata('customer_name');

        if (!$customer_name) {

            redirect('customer/register');

        }

       

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/register_success', $data);

        $this->load->view('web/inc/footer');

    }



    public function about_us($value='')

    {

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/about_us', $data);

        $this->load->view('web/inc/footer');

    }

    public function hpw_to_order($value='')

    {

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/how_to_order', $data);

        $this->load->view('web/inc/footer');

    }

    public function shipping_and_returns($value='')

    {

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/shipping_and_return', $data);

        $this->load->view('web/inc/footer');

    }

    public function privacy_and_security($value='')

    {

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/privacy_and_security', $data);

        $this->load->view('web/inc/footer');

    }

    public function payment_method($value='')

    {

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/paymnt_methods', $data);

        $this->load->view('web/inc/footer');

    }

    public function terms_of_service($value='')

    {

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/terms_of_service', $data);

        $this->load->view('web/inc/footer');

    }

    public function contact_us($value='')

    {

        $data                    = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/contact_us', $data);

        $this->load->view('web/inc/footer');

    }

    





    



    public function user_form()

    {

        $data = array();

         $data['parent_categories']            = $this->category_model->getall_category_info();

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        }

         if(isset($_SESSION['customer_id'])){

            redirect('/');

        }else{

            $this->load->view('web/inc/header' , $data);

            $this->load->view('web/pages/user_form' , $data);

            $this->load->view('web/inc/footer'); 

        }

        

    }



    public function customer_register()

    {

        $data = array();

        $data['parent_categories']            = $this->category_model->getall_category_info();

        $data['cities']            = $this->web_model->get_cities();

		

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        }

         if(isset($_SESSION['customer_id'])){

           redirect('/');

        }else{

            $this->load->view('web/inc/header' , $data);

            $this->load->view('web/pages/customer_register' , $data);

            $this->load->view('web/inc/footer'); 

        }

    }



    public function customer_login()

    {

        $data = array();

         $data['parent_categories']            = $this->category_model->getall_category_info();

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        }

        

        if(isset($_SESSION['customer_id'])){

            redirect('/');

        }else{

            $this->load->view('web/inc/header' , $data);

            $this->load->view('web/pages/user_form' , $data);

            $this->load->view('web/inc/footer'); 

        }

        

    }



    public function update_customer_profile($value='')

    {

        $data                               = array();

        $data['customer_name']              = $this->input->post('customer_name');

        $data['customer_email']             = $this->input->post('customer_email');

        $data['customer_address']           = $this->input->post('customer_address');

        $data['customer_city']              = $this->input->post('customer_city');

        $data['customer_day']               = $this->input->post('day');

        $data['customer_month']             = $this->input->post('month');

        $data['customer_year']              = $this->input->post('year');

        $data['customer_gender']            = $this->input->post('gender');

        $data['customer_phone']             = $this->input->post('customer_phone');

        $data['customer_active']            = '1';



        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');

        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');



        if ($this->form_validation->run() == true) {

            $result = $this->web_model->update_customer_info($data,$_SESSION['customer_id']);

           

            if ($result) {

                $this->session->set_flashdata('message', 'Customer Updated Successfully');

                redirect('customer/profile');

            } else {

                $this->session->set_flashdata('message', 'Customer Updation Fail');

                redirect('customer/profile');

            }

        } else {

            $this->session->set_flashdata('message', validation_errors());

            redirect('customer/profile');

        }

    }



    public function manage_shipping_address($value='')

    {

        $data = array();

        $data['cities']            = $this->web_model->get_cities();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

            if(isset($_SESSION['customer_id'])){

               $data['customer_details'] = $this->web_model->get_customer_by_id($_SESSION['customer_id']); 

               $data['customer_shipping'] = $this->web_model->get_shipping_info_by_cust_id($_SESSION['customer_id']);

               $data['customer_active_shipping'] = $this->web_model->get_active_shipping_info_by_cust_id($_SESSION['customer_id']);  

                $this->load->view('web/inc/header', $data);

                $this->load->view('web/pages/customer_shipping', $data);

                $this->load->view('web/inc/footer');

            }else{

                $this->load->view('web/inc/header' , $data);

                $this->load->view('web/pages/customer_register' , $data);

                $this->load->view('web/inc/footer'); 

            }

    }



    public function delete_shipping_address($value='')

    {

        $ship                               = array();

        $ship['shipping_id']                = $this->input->post('id');



        $result = $this->web_model->delete_shipping_address($ship['shipping_id'],$_SESSION['customer_id'] );

        if ($result) {

            $this->session->set_flashdata('message', 'Shipping address deleted successfully');

            redirect('customer/manage_shipping_address');

        } else {

            $this->session->set_flashdata('message', 'Shipping address delete Failure');

            redirect('customer/manage_shipping_address');

        }

       

    }



    public function add_shipping_address()

    {

        $data = array();

        $data['cities']            = $this->web_model->get_cities();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

            if(isset($_SESSION['customer_id'])){

              

                $this->load->view('web/inc/header', $data);

                $this->load->view('web/pages/add_customer_shipping', $data);

                $this->load->view('web/inc/footer');

            }else{

                $this->load->view('web/inc/header' , $data);

                $this->load->view('web/pages/customer_register' , $data);

                $this->load->view('web/inc/footer'); 

            }

       

    }



    public function update_shipping_address()

    {

        $ship                               = array();

        $ship['shipping_id']                = $this->input->post('shipping_id');

        $ship['shipping_city']              = $this->input->post('customer_city');

        $ship['shipping_name']              = $this->input->post('customer_name');

        $ship['shipping_phone']             = $this->input->post('customer_phone');

        $ship['shipping_address']           = $this->input->post('customer_address');



        $this->form_validation->set_rules('customer_city', 'Shipping City', 'trim|required');

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');

        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');

        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');



        if ($this->form_validation->run() == true) {

           

            $result = $this->web_model->update_shipping_address($ship, $ship['shipping_id'] );

            if ($result) {

                $this->session->set_flashdata('message', 'Shipping Update successfully');

                redirect('customer/manage_shipping_address');

            } else {

                $this->session->set_flashdata('message', 'Shipping Update Fail');

                redirect('customer/manage_shipping_address');

            }

        } else {

            $this->session->set_flashdata('message', validation_errors());

            redirect('customer/manage_shipping_address');

        }

    }



    public function customer_save()

    {

        

        $data                               = array();

        $ship                               = array();

        $data['customer_name']              = $this->input->post('customer_name');

        $data['customer_email']             = $this->input->post('customer_email');

        $data['customer_password']          = md5($this->input->post('customer_password'));

        $data['customer_address']           = $this->input->post('customer_address');

        $data['customer_city']              = $this->input->post('customer_city');

        $data['customer_day']               = $this->input->post('day');

        $data['customer_month']             = $this->input->post('month');

        $data['customer_year']              = $this->input->post('year');

        $data['customer_gender']            = $this->input->post('gender');

        $data['customer_coupon']            = $this->input->post('customer_coupon');

        $data['customer_phone']             = $this->input->post('customer_phone');

        $data['customer_active']            = '1';

		$data['customer_type']              = '1';

        $ship['shipping_city']              = $this->input->post('shipping_city');

        $ship['shipping_name']              = $this->input->post('shipping_contact_name');

        $ship['shipping_phone']             = $this->input->post('shipping_contact');

        $ship['shipping_address']           = $this->input->post('shipping_address');

		$ship['status']              		= '1';



        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email|is_unique[tbl_customer.customer_email]');

        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');

        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');

        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');



        if ($this->form_validation->run() == true) {

            $result = $this->web_model->save_customer_info($data);

            $ship['customer_id'] = $result;

            $result = $this->web_model->save_shipping_address($ship);

            if ($result) {

                $this->session->set_flashdata('customer_name', $data['customer_name']);

                $this->session->set_flashdata('customer_email', $data['customer_email']);

                redirect('register/success');

            } else {

                $this->session->set_flashdata('message', 'Customer Registration Fail');

                redirect('customer/register');

            }

        } else {

            $this->session->set_flashdata('message', validation_errors());

            redirect('customer/register');

        }

    }



    public function customer_login_admin_panel()

    {

        $data                      = array();

        $data['customer_email']    = $this->input->post('customer_email');

        $data['customer_password'] = $this->input->post('customer_password');

        

            $result = $this->web_model->get_customer_info($data);

            if ($result) {

                $this->session->set_userdata('customer_id', $result->customer_id);

                $this->session->set_userdata('customer_email', $data['customer_email']);

                redirect('/');

            } else {

                $this->session->set_flashdata('message', 'Customer Login Fail');

                redirect('customer/login');

            }

        

    }



    public function customer_logincheck()

    {

        $data                      = array();

        $data['customer_email']    = $this->input->post('customer_email');

        $data['customer_password'] = md5($this->input->post('customer_password'));

        

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');



        if ($this->form_validation->run() == true) {

            $result = $this->web_model->get_customer_info($data);

            if ($result) {

                $this->session->set_userdata('customer_id', $result->customer_id);

                $this->session->set_userdata('customer_email', $data['customer_email']);

                redirect('/');

            } else {

                $this->session->set_flashdata('message', 'Customer Login Fail');

                redirect('customer/login');

            }

        } else {

            $this->session->set_flashdata('message', validation_errors());

            redirect('customer/login');

        }

    }



    public function customer_shipping_login()

    {

        $data                      = array();

        $data['customer_email']    = $this->input->post('customer_email');

        $data['customer_password'] = md5($this->input->post('customer_password'));



        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');



        if ($this->form_validation->run() == true) {

            $result = $this->web_model->get_customer_info($data);

            if ($result) {

                $this->session->set_userdata('customer_id', $result->customer_id);

                $this->session->set_userdata('customer_email', $result->customer_email);

                redirect('/');

            } else {

                $this->session->set_flashdata('messagelogin', 'Customer Login Fail');

                redirect('user_form');

            }

        } else {

            $this->session->set_flashdata('messagelogin', validation_errors());

            redirect('user_form');

        }

    }



    public function customer_shipping_register()

    {

        $data                      = array();

        $data['customer_name']     = $this->input->post('customer_name');

        $data['customer_email']    = $this->input->post('customer_email');

        $data['customer_password'] = md5($this->input->post('customer_password'));

        $data['customer_address']  = $this->input->post('customer_address');

        $data['customer_city']     = $this->input->post('customer_city');

        $data['customer_country']  = $this->input->post('customer_country');

        $data['customer_phone']    = $this->input->post('customer_phone');

        $data['customer_zipcode']  = $this->input->post('customer_zipcode');



        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email|is_unique[tbl_customer.customer_email]');

        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');

        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');

        $this->form_validation->set_rules('customer_city', 'Customer City', 'trim|required');

        $this->form_validation->set_rules('customer_country', 'Customer Country', 'trim|required');

        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');

        $this->form_validation->set_rules('customer_zipcode', 'Customer Zipcode', 'trim|required');



        if ($this->form_validation->run() == true) {

            $result = $this->web_model->save_customer_info($data);



            if ($result) {

                $this->session->set_userdata('customer_id', $result);

                redirect('customer/shipping');

            } else {

                $this->session->set_flashdata('message', 'Customer Shipping Fail');

                redirect('user_form');

            }

        } else {

            $this->session->set_flashdata('message', validation_errors());

            redirect('user_form');

        }

    }



    public function customer_shipping()

    {

        $data = array();

        $this->load->view('web/inc/header');

        $this->load->view('web/pages/customer_shipping');

        $this->load->view('web/inc/footer');

    }



    public function update_password_view()

    {

      if(isset($_SESSION['customer_id'])){

            $data                    = array();

            $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }

            } 



            $data['orders'] = $this->manageorder_model->order_info_by_customer_id($_SESSION['customer_id']);

            foreach ($data['orders'] as $key => $value) {

              $data['orders'][$key]['order_details'] = $this->manageorder_model->orderdetails_info_by_id($value['order_id']); 

              $data['orders'][$key]['shipping_price'] = $this->web_model->get_ship_price($value['ship_price_slot_id']); 

              $data['orders'][$key]['courier_company'] = $this->web_model->get_courier_company_for_order_details($value['courier_company_id']);

              $data['orders'][$key]['payment_method'] = $this->web_model->get_payment_method_for_order_details($value['payment_method_id']);

              $data['orders'][$key]['shipping_method'] = $this->web_model->get_shipping_method_for_order_details($value['shipping_method_id']);

            }

               

            $this->load->view('web/inc/header', $data);

            $this->load->view('web/pages/update_password', $data);

            $this->load->view('web/inc/footer');

        }else{



            redirect('/customer/login');

        }



         

                 

    }



    public function update_password()

    {

        $sdata                          = array();

        $sdata['customer_id']           = $_SESSION['customer_id'];

        $sdata['old_password']          = $this->input->post('old_password');

        $sdata['customer_password']              = $this->input->post('new_password');

        $sdata['confirm_password']      = $this->input->post('customer_password');

        

        $this->form_validation->set_rules('old_password', 'Password', 'required');

        $this->form_validation->set_rules('customer_password', 'Password', 'required');

        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[customer_password]');

        $shipping_id = $this->web_model->update_password($sdata);

        if ($shipping_id) {

            $this->session->set_flashdata('message', 'Password Updated Successfully');

            redirect('customer/update_password');

        }else{

            $this->session->set_flashdata('message', 'Old Password doesnot match with new password ');

            redirect('customer/update_password');

        }

        

    }



    public function get_orders()

    {

        if(isset($_SESSION['customer_id'])){

            $data                    = array();

            $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }

            } 



            $data['orders'] = $this->manageorder_model->order_info_by_customer_id($_SESSION['customer_id']);

            foreach ($data['orders'] as $key => $value) {

              $data['orders'][$key]['order_details'] = $this->manageorder_model->orderdetails_info_by_id($value['order_id']); 

              $data['orders'][$key]['shipping_price'] = $this->web_model->get_ship_price($value['ship_price_slot_id']); 

              $data['orders'][$key]['courier_company'] = $this->web_model->get_courier_company_for_order_details($value['courier_company_id']);

              $data['orders'][$key]['payment_method'] = $this->web_model->get_payment_method_for_order_details($value['payment_method_id']);

              $data['orders'][$key]['shipping_method'] = $this->web_model->get_shipping_method_for_order_details($value['shipping_method_id']);

            }

               

            $this->load->view('web/inc/header', $data);

            $this->load->view('web/pages/orders', $data);

            $this->load->view('web/inc/footer');

        }else{



            redirect('/customer/login');

        }

            

    }

    public function get_schedule_orders()

    {

        if(isset($_SESSION['customer_id'])){

            $data                    = array();

            $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }

            } 



            $data['orders'] = $this->manageorder_model->schedule_order_info_by_customer_id($_SESSION['customer_id']);

            foreach ($data['orders'] as $key => $value) {

              $data['orders'][$key]['order_details'] = $this->manageorder_model->orderdetails_info_by_id($value['order_id']); 

              $data['orders'][$key]['shipping_price'] = $this->web_model->get_ship_price($value['ship_price_slot_id']); 

              $data['orders'][$key]['courier_company'] = $this->web_model->get_courier_company_for_order_details($value['courier_company_id']);

              $data['orders'][$key]['payment_method'] = $this->web_model->get_payment_method_for_order_details($value['payment_method_id']);

              $data['orders'][$key]['shipping_method'] = $this->web_model->get_shipping_method_for_order_details($value['shipping_method_id']);

            }

               

            $this->load->view('web/inc/header', $data);

            $this->load->view('web/pages/orders', $data);

            $this->load->view('web/inc/footer');

        }else{



            redirect('/');

        }

            

    }



    public function save_shipping_address()

    {

        if (isset($_SESSION['customer_id'])) {

            

            $sdata                          = array();

            $sdata['customer_id']           = $_SESSION['customer_id'];

            $sdata['shipping_name']         = $this->input->post('customer_name');

            $sdata['shipping_address']      = $this->input->post('customer_address');

            $sdata['shipping_phone']        = $this->input->post('customer_phone');

            $sdata['shipping_city']         = $this->input->post('customer_city');           





        $this->form_validation->set_rules('shipping_name', 'Shipping Name', 'trim|required');

        $this->form_validation->set_rules('shipping_address', 'Shipping Address', 'trim|required');

        $this->form_validation->set_rules('shipping_city', 'Shipping City', 'trim|required');

        $this->form_validation->set_rules('shipping_phone', 'Shipping Phone', 'trim|required');

        $shipping_id = $this->web_model->save_cust_shipping_address($sdata);



 

        redirect('customer/manage_shipping_address');

   

        

        }

        else {

            $this->session->set_flashdata('message', validation_errors());

            redirect('customer/register');

        }

    }



    public function checkout()

    {

       



    if ($this->cart->contents()) {



        $data = array();

        $coupon = $this->input->post('coupon');

        $data['discount'] = 0;

        if (!empty($coupon)) {

            $data['discount'] = $this->web_model->get_coupon($coupon);

        }

        $data['customer_group_discount'] = 0;

        $data['customer_group_discount_type'] = 0;

        $customer_group_discount_check = $this->web_model->get_customer_group_discount_check($_SESSION['customer_id']);

        if(!empty($customer_group_discount_check)){

           $data['customer_group_discount'] = $this->web_model->get_customer_group_discount($customer_group_discount_check);

           $data['customer_group_discount_type'] = $this->web_model->get_customer_group_discount_type($customer_group_discount_check);

        }





        $data['parent_categories']            = $this->category_model->getall_category_info();

        foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        }

        $data['customer_info']  = $this->web_model->get_customer_by_id($_SESSION['customer_id']);

        $data['shipping_info']  = $this->web_model->get_shipping_info_by_cust_id($_SESSION['customer_id']);

        $data['active_shipping_info'] = $this->web_model->get_active_shipping_info_by_cust_id($_SESSION['customer_id']);

        $data['cart_contents']  = $this->cart->contents();  



        $ship_city_id           = $data['active_shipping_info']['shipping_city'];

        



        $data['shipping_methods']  = $this->web_model->get_shipping_methods();

        $data['active_courier_company']  = $this->web_model->get_active_courier_company();  

        $active_courier_company          =     $data['active_courier_company']['id'];

        

        



        $data['handling_charges'] = '0';

        $data['total_weight'] = '0';

        foreach ($data['cart_contents'] as $key2 => $value2) {

            $data['handling_charges'] += $this->web_model->get_handling_charges_price($value2['id']);

            $data['total_weight'] += $this->web_model->get_product_weight($value2['id'],$value2['qty']);

            $data['cart_contents'][$key2]['prescription'] = $this->web_model->get_product_prescription($value2['id']);



            

        }

        



        foreach ($data['shipping_methods'] as $key3 => $shipping_method) {

            $data['shipping_methods'][$key3]['mapping_id'] = $this->web_model->get_shipping_method_details($shipping_method['id'], $ship_city_id,$active_courier_company,$data['handling_charges']);

            

        }



      

        foreach ($data['shipping_methods'] as $key4 => $value4) {

            if(isset($value4['mapping_id']['id'])){

             $data['shipping_methods'][$key4]['price'] = $this->web_model->get_shipping_price_details($value4['mapping_id']['id'], $data['total_weight']);

            }

        }

       

         

        



        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/checkout' , $data);

        $this->load->view('web/inc/footer');

    }else{

        redirect('/');

    }

    }





    public function get_ship_methods_with_price()

    {     $data = array();    

          $output = '';

          $city =$this->input->post('city');

          $handling_charges = $this->input->post('handling_charges');

          $weight = $this->input->post('total_weight');

          

          $data['shipping_methods']  = $this->web_model->get_shipping_methods();

          $data['active_courier_company']  = $this->web_model->get_active_courier_company();  

          $active_courier_company          =     $data['active_courier_company']['id'];



            foreach ($data['shipping_methods'] as $key3 => $shipping_method) {

              $data['shipping_methods'][$key3]['mapping_id'] = $this->web_model->get_shipping_method_details($shipping_method['id'], $city,$active_courier_company,$handling_charges);

            

            }



          

            foreach ($data['shipping_methods'] as $key4 => $value4) {

                if(isset($value4['mapping_id']['id'])){

                 $data['shipping_methods'][$key4]['price'] = $this->web_model->get_shipping_price_details($value4['mapping_id']['id'], $weight);

                }

            }



          

          





          

            foreach ($data['shipping_methods'] as $key => $value) { 

            if(isset($value['price']['price'] )){

              

            $output .= '<div class="col-md-3">

                <label class="radio-inline radioDispaly"> 

                    <input  class="shipping_method" onclick="guest_shipping_method('.$value['id'].','.(int)$value["price"]["price"].','.$value["price"]["id"].','.$value['mapping_id']['id'] .')" type="radio" name="shipping_method"   id="shipping_method" value="'.$value['id'].'">'. $value['shipping_method_name'].' 

                        <br><span style="font-size:11px;font-style:italic;font-weight:bold;">'. $value['description'].' </span><br> (Rs.'.

                             $value["price"]["price"] .')</label></div>'; 

                         } }; 

 



            echo $output;

    }



    public function guest_checkout()

    {



        if ($this->cart->contents()) {

        

        

       $data = array();

         $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

         

            $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

            

            foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

         

               $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

 

            }



        }

       

        $data['cart_contents']  = $this->cart->contents();  

        $data['cities']  = $this->web_model->get_cities(); 

        $data['handling_charges'] = '0';

        $data['total_weight'] = '0';

        foreach ($data['cart_contents'] as $key2 => $value2) {

            $data['handling_charges'] += $this->web_model->get_handling_charges_price($value2['id']);

            $data['total_weight'] += $this->web_model->get_product_weight($value2['id'],$value2['qty']);



        }

        $data['active_courier_company']  = $this->web_model->get_active_courier_company(); 

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/guest_checkout' , $data);

        $this->load->view('web/inc/footer');

    }else{

        redirect('/');

    }

    }



    public function update_active_ship_address($value='')

    {

       $active_address  = $_POST['active_address'];

       $cust_id         = $_SESSION['customer_id'];

       $result          = $this->web_model->update_active_ship_address($active_address,$cust_id);

       if ($result) {

           return $result;

       }

        

    }



    public function thanks()

    {

        $order_id = $this->manageorder_model->get_last_order();; 

        $data        = array();

        $order_info  = $this->manageorder_model->order_info_by_id($order_id);

        $customer_id = $order_info->customer_id;

        $shipping_id = $order_info->shipping_method_id;

        $payment_id  = $order_info->payment_method_id;



        $data['customer_info']      = $this->manageorder_model->customer_info_by_id($customer_id);

        $data['shipping_info']      = $this->manageorder_model->shipping_info_by_id($customer_id);

        $data['shipping_city']      = $this->manageorder_model->shipping_city_by_id($data['shipping_info']->shipping_city);

        $data['invoice_city']       = $this->manageorder_model->invoice_city_by_id($data['customer_info']->customer_city);

        $data['payment_info']       = $this->manageorder_model->payment_info_by_id($payment_id);

        $data['order_details_info'] = $this->manageorder_model->orderdetails_info_by_id($order_id);

        $data['order_info']         = $this->manageorder_model->order_info_by_id($order_id); 

        $data['active_courier_company']  = $this->web_model->get_active_courier_company();  

        $data['ship_price']         = $this->web_model->get_ship_price($data['order_info']->ship_price_slot_id); 

      

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/order_success', $data);

        $this->load->view('web/inc/footer');

    }



    public function order_success()

    {

        $order_id = $this->uri->segment(3); 

        $data        = array();

        $order_info  = $this->manageorder_model->order_info_by_id($order_id);

        $customer_id = $order_info->customer_id;

        $shipping_id = $order_info->shipping_method_id;

        $payment_id  = $order_info->payment_method_id;



        $data['customer_info']      = $this->manageorder_model->customer_info_by_id($customer_id);

        $data['shipping_info']      = $this->manageorder_model->shipping_info_by_id($customer_id);

        $data['shipping_city']      = $this->manageorder_model->shipping_city_by_id($data['shipping_info']->shipping_city);

        $data['invoice_city']       = $this->manageorder_model->invoice_city_by_id($data['customer_info']->customer_city);

        $data['payment_info']       = $this->manageorder_model->payment_info_by_id($payment_id);

        $data['order_details_info'] = $this->manageorder_model->orderdetails_info_by_id($order_id);

        $data['order_info']         = $this->manageorder_model->order_info_by_id($order_id); 

        $data['active_courier_company']  = $this->web_model->get_active_courier_company();  

        $data['ship_price']         = $this->web_model->get_ship_price($data['order_info']->ship_price_slot_id); 

      

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

        $this->load->view('web/inc/header', $data);

        $this->load->view('web/pages/order_success', $data);

        $this->load->view('web/inc/footer');

    }



    public function save_order()

    {

     



        $this->form_validation->set_rules('shipping_method', 'Shipping', 'trim|required');

        $this->form_validation->set_rules('payment_method', 'Payment', 'trim|required');



        if ($this->form_validation->run() == true) {

            $prescription_image = 0;

            if (!empty($_FILES['prescription_image']['name'])) {

                $config['upload_path']   = './uploads/';

                $config['allowed_types'] = 'jpg|png';

                $config['max_size']      = 4096;

                $config['max_width']     = 2000;

                $config['max_height']    = 2000;



                $this->upload->initialize($config);

                

                if (!$this->upload->do_upload('prescription_image')) {

                    $error = $this->upload->display_errors();

                    $this->session->set_flashdata('message', $error);



                    // redirect('add/product');

                } else {

                    $post_image          = $this->upload->data();



                    $prescription_image = $post_image['file_name'];

                   

                }

            }



        



            $odata                          = array();

            $odata['customer_id']           = $this->session->userdata('customer_id');

            $odata['shipping_method_id']    = $this->input->post('shipping_method');

            $odata['payment_method_id']     = $this->input->post('payment_method');

            $odata['order_total']           = $this->input->post('total_after_shipping');

            $odata['ship_price_slot_id']    = $this->input->post('shipping_price_for_order_tbl');

            $odata['courier_company_id']    = $this->input->post('active_courier_company');

            $odata['courier_city_map_id']   = $this->input->post('courier_city_map_id');

            $odata['total_weight']          = $this->input->post('total_weight');

            $odata['handling_charges']      = $this->input->post('handling_charges');

            

            $odata['discount']              = $this->input->post('discounted_amount');

            $odata['order_date']            = date('Y-m-d H:i:s');  

            $odata['prescription_image']    =  $prescription_image;                    

            if ($this->input->post('schedule_date')) {

              $odata['order_type']            = 2;

              $odata['schedule_date']         = $this->input->post('schedule_date');    

            }else{

               $odata['order_type']            = 1; 

            }

            $order_id                       = $this->web_model->save_order_info($odata);



            $oddata = array();



            $myoddata = $this->cart->contents();



            foreach ($myoddata as $oddatas) {



                $oddata['order_id']               = $order_id;

                $oddata['product_id']             = $oddatas['id'];

                $oddata['product_name']           = $oddatas['name'];

                $oddata['product_price']          = $oddatas['price'];

                $oddata['product_sales_quantity'] = $oddatas['qty'];

                $oddata['product_image']          = $oddatas['options']['product_image'];

                // $oddata['prescription_image']    =  $prescription_image  ;

                $this->web_model->save_order_details_info($oddata);

            }



            if ($odata['payment_method_id'] == '4') {



                // $data['parent_categories']            = $this->category_model->getall_category_info();

                //     foreach ($data['parent_categories'] as $key => $value) {

                     

                //         $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                        

                //         foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

                     

                //            $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

             

                //         }



                //     } 



                // $data['order_id'] = $order_id ;

                // $data['amount'] = $odata['order_total']  ;     



                // $this->load->view('web/inc/header', $data);

                // $this->load->view('web/pages/jc_payment');

                // $this->load->view('web/inc/footer');

                // $this->cart->destroy();

           

               // redirect(base_url()."Web/order_success/".$order_id);



            }

            if ($odata['payment_method_id'] == '2') {

                $this->cart->destroy();

           

              redirect(base_url()."Web/order_success/".$order_id);

            }

            if ($odata['payment_method_id'] == '1') {



                $this->cart->destroy();
                $msg = "Your order has been received at nexthealth";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$cust_email =$this->web_model->get_cus_email($odata['customer_id']); 

// send email
mail($cust_email,"Order Received",$msg);
           

              redirect(base_url()."Web/order_success/".$order_id);



            }



            

           



        } else {

            $this->session->set_flashdata('message', validation_errors());

            redirect('checkout');

        }

    }



    private function get_SecureHash($data_array)

    {

        ksort($data_array);

        

        $str = '';

        foreach($data_array as $key => $value)

        {

            if(!empty($value))

            {

                $str = $str . '&' . $value;

            }

        }

        

        $HashKey = "x9a63484y2";

        // $str = $this->integrity_salt.$str;

        $Securehash = hash_hmac('sha256', $str, $HashKey);

        // $pp_SecureHash = hash_hmac('sha256', $str, $this->integrity_salt);

        

        //echo '<pre>';

        //print_r($data_array);

        //echo '</pre>';

        

        return $Securehash;

    }



    public function save_guest_order()

    {

     



        $this->form_validation->set_rules('shipping_method', 'Shipping Method', 'trim|required');

        $this->form_validation->set_rules('payment_method', 'Payment Method', 'trim|required');

        $this->form_validation->set_rules('ship_contact_name', 'Name is Required', 'trim|required');

        $this->form_validation->set_rules('payment_method', 'Payment Method', 'trim|required');

        $this->form_validation->set_rules('ship_address', 'Payment Method', 'trim|required');

        $this->form_validation->set_rules('vEmailAddress', 'Payment Method', 'trim|required');

        $this->form_validation->set_rules('guest_city', 'Payment Method', 'trim|required');



        if ($this->form_validation->run() == true) {

            



            $cdata                          = array();

            $cdata['customer_email']        = $this->input->post('vEmailAddress'); 

            $cdata['customer_name']         = $this->input->post('ship_contact_name');

            $cdata['customer_address']      = $this->input->post('ship_address');

            $cdata['customer_phone']        = $this->input->post('ship_contact_phone');

            $cdata['customer_address']      = $this->input->post('ship_address');

            $cdata['customer_phone']        = $this->input->post('ship_contact_phone'); 

            $cdata['customer_city']         = $this->input->post('guest_city');

            $cdata['customer_type']         = '2';

            $cdata['customer_active']       = '1';



           



            $customer_id = $this->web_model->save_guest_customer($cdata);

            

            $sdata                          = array();

            $sdata['customer_id']           = $customer_id;

            $sdata['shipping_name']         = $this->input->post('ship_contact_name');

            $sdata['shipping_address']      = $this->input->post('ship_address');

            $sdata['shipping_phone']        = $this->input->post('ship_contact_phone');

            $sdata['shipping_city']         = $this->input->post('guest_city');

            $sdata['status']                = '1';               



            $shipping_id = $this->web_model->save_shipping_address($sdata);



            $odata                          = array();

            $odata['customer_id']           = $customer_id;

            $odata['shipping_method_id']    = $this->input->post('shipping_method');

            $odata['payment_method_id']        = $this->input->post('payment_method');

            $odata['order_total']           = $this->input->post('total_after_shipping');

            $odata['ship_price_slot_id']           = $this->input->post('shipping_price_for_order_tbl');

            $odata['courier_company_id']           = $this->input->post('active_courier_company');

            $odata['handling_charges']           = $this->input->post('handling_charges');

            $odata['courier_city_map_id']   = $this->input->post('courier_city_map_id');

            $odata['total_weight']          = $this->input->post('total_weight');

            $order_id = $this->web_model->save_order_info($odata);



            $oddata = array();



            $myoddata = $this->cart->contents();



            foreach ($myoddata as $oddatas) {



                $oddata['order_id']               = $order_id;

                $oddata['product_id']             = $oddatas['id'];

                $oddata['product_name']           = $oddatas['name'];

                $oddata['product_price']          = $oddatas['price'];

                $oddata['product_sales_quantity'] = $oddatas['qty'];

                $oddata['product_image']          = $oddatas['options']['product_image'];

                $this->web_model->save_order_details_info($oddata);

            }



            if ($odata['payment_method_id'] == '4') {

                $data['parent_categories']            = $this->category_model->getall_category_info();

                    foreach ($data['parent_categories'] as $key => $value) {

                     

                        $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                        

                        foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

                     

                           $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

             

                        }



                    } 



                $data['order_id'] = $order_id ;

                $data['amount'] = $odata['order_total']  ;     



                $this->load->view('web/inc/header', $data);

                $this->load->view('web/pages/jc_payment');

                $this->load->view('web/inc/footer');

                $this->cart->destroy();

            }

            if ($odata['payment_method_id'] == 'easypesa') {

                $this->cart->destroy();

           

            redirect(base_url()."Web/order_success/".$order_id);

            }

            if ($odata['payment_method_id'] == '1') {

                $this->cart->destroy();

           

            redirect(base_url()."Web/order_success/".$order_id);

            }



            

            // redirect('payment', $odata);



        } else {

            $this->session->set_flashdata('message', validation_errors());

            redirect('guest_checkout');

        }

    }



    public function pdf()

    {

       

        $data        = array();

        $order_id = $_GET['order_id'];

        $data        = array();

        $order_info  = $this->manageorder_model->order_info_by_id($order_id);

        $customer_id = $order_info->customer_id;

        $shipping_id = $order_info->shipping_method_id;

        $payment_id  = $order_info->payment_method_id;



        $data['customer_info']      = $this->manageorder_model->customer_info_by_id($customer_id);

        $data['shipping_info']      = $this->manageorder_model->shipping_info_by_id($customer_id);

        $data['shipping_city']      = $this->manageorder_model->shipping_city_by_id($data['shipping_info']->shipping_city);

        $data['invoice_city']       = $this->manageorder_model->invoice_city_by_id($data['customer_info']->customer_city);

        $data['payment_info']       = $this->manageorder_model->payment_info_by_id($payment_id);

        $data['order_details_info'] = $this->manageorder_model->orderdetails_info_by_id($order_id);

        $data['order_info']         = $this->manageorder_model->order_info_by_id($order_id); 

        $data['active_courier_company']  = $this->web_model->get_active_courier_company();  

        $data['ship_price']         = $this->web_model->get_ship_price($data['order_info']->ship_price_slot_id); 

        $this->load->view('admin/pages/pdf', $data);

        // $this->load->library('pdf');

        // $this->load->view('web/inc/header', $data);

        

        // $this->load->view('web/inc/footer');

        // $this->pdf->load_view('admin/pages/pdf', $data);

        // $this->pdf->setPaper('A4', 'portrait');

        // $this->pdf->render();

        // $this->pdf->stream("welcome.pdf");

    }



    public function search()

    {



         

        $search = $this->input->get('search');



        if (!empty($search)) {

            $data                    = array();

            $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

            $data['get_all_product'] = $this->web_model->get_all_search_product($search);

            $data['search']          = $search;

            // print_r($data['get_all_product']);

            // exit;



            if ($data['get_all_product']) {

                $this->load->view('web/inc/header', $data);

                $this->load->view('web/pages/search', $data);

                $this->load->view('web/inc/footer');

            } else {

                // function file_get_contents_curl($url) {

                //     $ch = curl_init();



                //     curl_setopt($ch, CURLOPT_HEADER, 0);

                //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.

                //     curl_setopt($ch, CURLOPT_URL, $url);



                //     $data = curl_exec($ch);

                //     curl_close($ch);



                //     return $data;

                // }

                // // $scrape = array();



                // $query = $search;

                // $url = 'http://www.google.co.in/search?q='.urlencode($query).'';

                // $data['scrape'] = file_get_contents_curl($url);

                // // print_r($scrape);

                // $this->load->view('web/inc/header', $data);

                // $this->load->view('web/pages/404', $data);

                // $this->load->view('web/inc/footer');

                 

                redirect('https://nexthealth.pk/not-found#gsc.tab=0&gsc.sort=&gsc.q='.$search);

            }

        } else {

            // $query = "search term";

            //     $url = 'http://www.google.co.in/search?q='.urlencode($query).'';

            //     $scrape = file_get_contents_curl($url);

            //     print_r($scrape);

            redirect('error');

        }

    }



    public function advanced_search()

    {


        $search = $this->input->post('adv_search');



        if (!empty($search)) {

            $data                    = array();

            $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);
                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

                }
            }

            $data['get_all_product'] = $this->web_model->get_all_search_product($search);

            $data['search']          = $search;


            if ($data['get_all_product']) {

                $this->load->view('web/inc/header', $data);

                $this->load->view('web/pages/search', $data);

                $this->load->view('web/inc/footer');

            } else {
                redirect('https://nexthealth.pk/not-found#gsc.tab=0&gsc.sort=&gsc.q='.$search);
             }

        } else {

            

            redirect('error');

        }
         

        // $search             = $this->input->post('adv_search');

        // $category_cd        = $this->input->post('category_cd');

        // $manufacturer_name  = $this->input->post('manufacturer_name');

        // $max_price          = $this->input->post('max_price');

        // $min_price          = $this->input->post('min_price');



        // if (!empty($search)) {

        //     $data                    = array();

        //     $data['parent_categories']            = $this->category_model->getall_category_info();

        //     foreach ($data['parent_categories'] as $key => $value) {

             

        //         $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

        //         foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

        //            $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

        //         }



        //     }

        //     $data['get_all_product'] = $this->web_model->get_all_adv_search_product($search, $category_cd, $manufacturer_name, $max_price, $min_price);

        //     $data['search']          = $search;

            

           

        //     if ($data['get_all_product']) {

        //         $this->load->view('web/inc/header', $data);

        //         $this->load->view('web/pages/search', $data);

        //         $this->load->view('web/inc/footer');

        //     } else {

        //         redirect('error');

        //     }

        // } else {

        //     redirect('error');

        // }

    }



    public function customer_profile()

    {

        $data = array();

        $data['cities']            = $this->web_model->get_cities();

        $data['parent_categories']            = $this->category_model->getall_category_info();

            foreach ($data['parent_categories'] as $key => $value) {

             

                $data['parent_categories'][$key]['category'] = $this->category_model->get_second_category_info($value['id']);

                

                foreach ($data['parent_categories'][$key]['category'] as $key1 => $value1) {

             

                   $data['parent_categories'][$key]['category'][$key1]['sub_cat'] = $this->category_model->get_third_category_info($value1['id']);

     

                }



            }

            if(isset($_SESSION['customer_id'])){

               $data['customer_details'] = $this->web_model->get_customer_by_id($_SESSION['customer_id']);   

                $this->load->view('web/inc/header', $data);

                $this->load->view('web/pages/customer_profile', $data);

                $this->load->view('web/inc/footer');

            }else{

                $this->load->view('web/inc/header' , $data);

                $this->load->view('web/pages/customer_register' , $data);

                $this->load->view('web/inc/footer'); 

            }



    }



    public function ajaxsearch()

    {



         

  $output = '';

  $query = '';

  

  if($this->input->get('query'))

  {

   $query = $this->input->get('query');

  }



  

  $data = $this->web_model->fetch_search_data($query);

  $output .= '

  <ul class="dropdown-menu show" aria-labelledby="dropdownMenuButton1" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 46px);">

     ';

     if($data->num_rows() > 0)

      {

       foreach($data->result() as $row)

       {

        $output .= '

            <li class="animated_item" style="transition-delay:0.1s"> 

                <a class="dropdown-item" href="'.base_url().'product/'.$row->product_url.'">

                '.$row->product_title.'                                

                </a>

            </li>';

       }

      }

      else

      {

       $output .= '

           <td colspan="5">Press Enter To Search</td>

          ';

      }               

    

    $output .= '</ul>';

    echo $output;

 }

    



    public function logout()

    {

        $this->session->unset_userdata('customer_id');

        $this->session->unset_userdata('customer_email');

        redirect('customer/login');

    }



}

