<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ManageOrder extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function price_slot($value='')
    {
        $data                          = array();
        $data['price_slots'] = $this->manageorder_model->get_price_slots();
        $data['maincontent']           = $this->load->view('admin/pages/manage_price_slot', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function ajaxsearch()
    {

         
  $output = '';
  $query = '';
  
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }


  
  $data = $this->manageorder_model->fetch_search_data($query);
  $output .= '
  <ul class="dropdown-menu show upperUpSide" aria-labelledby="dropdownMenuButton1" data-popper-placement="bottom-start" style="position: absolute; inset: 100px auto auto 30px;; margin: 0px; transform: translate(0px, 46px);display:inline-block;" >
     ';
     if($data->num_rows() > 0)
      {
       foreach($data->result() as $row)
       {
        $output .= '
            <li class="animated_item" style="transition-delay:0.1s"> 
                <a class="dropdown-item" href="'.base_url().'edit/product/'.$row->product_id.'">
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

    public function manage_order()
    {
        if(isset($_POST['cust_name'])){
             $customer_name = $_POST['cust_name'];
        }else{
             $customer_name = '';
        }

        if(isset($_POST['cust_email'])){
             $customer_email = $_POST['cust_email'];
        }else{
             $customer_email = '';
        }

        if(isset($_POST['cust_num'])){
             $customer_num = $_POST['cust_num'];
        }else{
             $customer_num = '';
        }

        if(isset($_POST['ord_num'])){
             $order_num = $_POST['ord_num'];
        }else{
             $order_num = '';
        }
       
       

        $rowno = $this->uri->segment(3); 

        $this->load->library('pagination');
    
        $rowperpage = 35;

        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        
        

       $allcount = $this->manageorder_model->getOrderCount($customer_name,$customer_email,$customer_num,$order_num);
       $config['base_url'] = base_url().'manage/order/'; 

        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        $config['reuse_query_string'] = true;
        $this->pagination->initialize($config);
        

        $data['pagination'] = $this->pagination->create_links();
     
        $data['row'] = $rowno;
       
     
        $data['all_manage_order_info'] = $this->manageorder_model->getDataOrder($rowno,$rowperpage,$customer_name,$customer_email,$customer_num,$order_num);
       
    
        // $data['all_manage_order_info'] = $this->manageorder_model->order_info_all();
            foreach ($data['all_manage_order_info'] as $key => $value) {

              $data['all_manage_order_info'][$key]['order_details'] = $this->manageorder_model->orderdetails_info_by_id($value['order_id']); 
              $data['all_manage_order_info'][$key]['shipping_price'] = $this->web_model->get_ship_price($value['ship_price_slot_id']); 
              $data['all_manage_order_info'][$key]['courier_company'] = $this->web_model->get_courier_company_for_order_details($value['courier_company_id']);
              $data['all_manage_order_info'][$key]['payment_method'] = $this->web_model->get_payment_method_for_order_details($value['payment_method_id']);
              $data['all_manage_order_info'][$key]['shipping_method'] = $this->web_model->get_shipping_method_for_order_details($value['shipping_method_id']);
              $data['all_manage_order_info'][$key]['customer'] = $this->web_model->get_customer_by_id($value['customer_id']);
            }
     

        $data['maincontent']           = $this->load->view('admin/pages/manage_order', $data, true);





        
        $this->load->view('admin/master', $data);
    }


    public function cancel_order()
    {
        $data                          = array();
        $order_cd                      = $_POST['order_id'];
        $sdata = array();
        $sdata['status'] = 2; 
        $data['cancel'] = $this->web_model->cancel_order($order_cd, $sdata);
        $data['all_manage_order_info'] = $this->web_model->get_cancelled_orders();
            foreach ($data['all_manage_order_info'] as $key => $value) {

              $data['all_manage_order_info'][$key]['order_details'] = $this->manageorder_model->orderdetails_info_by_id($value['order_id']); 
              $data['all_manage_order_info'][$key]['shipping_price'] = $this->web_model->get_ship_price($value['ship_price_slot_id']); 
              $data['all_manage_order_info'][$key]['courier_company'] = $this->web_model->get_courier_company_for_order_details($value['courier_company_id']);
              $data['all_manage_order_info'][$key]['payment_method'] = $this->web_model->get_payment_method_for_order_details($value['payment_method_id']);
              $data['all_manage_order_info'][$key]['shipping_method'] = $this->web_model->get_shipping_method_for_order_details($value['shipping_method_id']);
              $data['all_manage_order_info'][$key]['customer'] = $this->web_model->get_customer_by_id($value['customer_id']);
            }
        $data['maincontent'] = $this->load->view('admin/pages/cancelled_order', $data, true);
        $this->load->view('admin/master', $data);

    }
    public function delete_order($value='')
    {
       $data                          = array();
        $order_cd                      = $_POST['order_id'];
        $sdata = array();
        $sdata['status'] = 3; 
        $data['cancel'] = $this->web_model->cancel_order($order_cd, $sdata); 
    }
    public function cancelled_order()
    {

        $data                          = array();
        $data['all_manage_order_info'] = $this->web_model->get_cancelled_orders();
            foreach ($data['all_manage_order_info'] as $key => $value) {

              $data['all_manage_order_info'][$key]['order_details'] = $this->manageorder_model->orderdetails_info_by_id($value['order_id']); 
              $data['all_manage_order_info'][$key]['shipping_price'] = $this->web_model->get_ship_price($value['ship_price_slot_id']); 
              $data['all_manage_order_info'][$key]['courier_company'] = $this->web_model->get_courier_company_for_order_details($value['courier_company_id']);
              $data['all_manage_order_info'][$key]['payment_method'] = $this->web_model->get_payment_method_for_order_details($value['payment_method_id']);
              $data['all_manage_order_info'][$key]['shipping_method'] = $this->web_model->get_shipping_method_for_order_details($value['shipping_method_id']);
              $data['all_manage_order_info'][$key]['customer'] = $this->web_model->get_customer_by_id($value['customer_id']);
            }
        $data['maincontent'] = $this->load->view('admin/pages/cancelled_order', $data, true);
        $this->load->view('admin/master', $data);
    }
    public function process_order()
    {
        $data                          = array();
        $order_cd                      = $_POST['order_id'];
        $order_info  = $this->manageorder_model->order_info_by_id($order_cd);
        $ship_charge  = $this->web_model->get_ship_price($order_info->ship_price_slot_id);;
        $payment_method  = $this->web_model->get_payment_method_for_order_details($order_info->payment_method_id);;
        $shipping_method  = $this->web_model->get_shipping_method_for_order_details($order_info->shipping_method_id);
        $order_details  = $this->manageorder_model->orderdetails_info_by_id($order_cd);
        $customer_info = $this->web_model->get_customer_by_id($order_info->customer_id);
           // print_r($order_info);
           // echo '<pre>';
           // print_r($order_details);
            // echo '<pre>';
            // print_r($customer_info);
           // echo '<pre>';
            // print_r($order_details);
            // echo '<pre>';
           // print_r($payment_method);

        // 'order_id'=>$value->order_id,'customer_id'=>$order_info->customer_id,'product_id'=>$value->product_id,
        //         'product_name'=>$value->product_name,
        //         'Unit'=>"9",'Unit_Name'=>"NO",
        //         'quantity'=>$value->product_sales_quantity,
        //         'price'=>$value->product_price,
        //         'Discount_Amt'=>"0",
        //         'Discount_Per'=>"0",
        //         'Tax_Amt'=>"0",
        //         'Tax_Per'=>"0",
        //         'cart_id'=>"1"
          
        $curl = curl_init();
        // foreach ($order_details as $key => $value) {
        //   $EorderDetail[] =  
        //      array ('order_id'=>$value->order_id,'customer_id'=>$order_info->customer_id,'product_id'=>$value->product_id,
        //         'product_name'=>$value->product_name,
        //         'Unit'=>"9",'Unit_Name'=>"NO",
        //         'quantity'=>$value->product_sales_quantity,
        //         'price'=>$value->product_price,
        //         'Discount_Amt'=>"0",
        //         'Discount_Per'=>"0",
        //         'Tax_Amt'=>"0",
        //         'Tax_Per'=>"0",
        //         'cart_id'=>"1");}
        // echo $order_details[0]->product_id;
        // exit;

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://175.107.239.75:87/NextHealthServices/EcommerceOrder/InsertEOrderMaster',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "eOrder":
    {
           "order_cd": "'.$order_cd.'",
            "customer_Id" : "'.$customer_info['customer_id'].'",
            "customer_Name" : "'.$customer_info['customer_name'].'",
            "customer_Mobile" : "'.$customer_info['customer_phone'].'",
            "order_date" : "'.$order_info->order_date.'",
            "sub_total" : "'.$order_info->order_total.'",
            "Total_tax" : "0",
            "shipping_type" : "",
            "ship_charge" : "'.$ship_charge.'",
            "delivery_time" : "", 
            "grand_total" : "'.$order_info->order_total.'",
            "order_status" : "In Process",
            "payment_method" : "Prepayment",
            "bank_name" : "",
            "account_name" : "",
            "account_number" : "",
            "comments" : "",
            "payment_status" : "Not Paid",
            "ship_city_Name" : "'.$customer_info['city_name'].'",
            "courier_company" : "TCS",
            "shipping_method" : "'.$shipping_method.'",
            "total_weight" : "",
            "prescription_status" : "xxx",
            "doctor_detail_status" : "Not Received",
            "presc_order" : "1",
            "ReschedueOrder" : "0",
            "recurring_cust" : "0",
            "repeated_cust" : "1"
        }, "eOrderDetail":
            [{
                    "order_id" : "'.$order_cd.'",
                    "customer_id" : "'.$customer_info['customer_id'].'",
                    "product_id" : "'.$order_details[0]->product_id.'",
                    "product_name" : "'.$order_details[0]->product_name.'",
                    "Unit" : "9",
                    "Unit_Name" : "NO",
                    "quantity" : "'.$order_details[0]->product_sales_quantity.'",
                    "price" : "'.$order_details[0]->product_price.'",
                    "Discount_Amt" : "0",
                    "Discount_Per" : "0",
                    "Tax_Amt" : "0",
                    "Tax_Per" : "0",
                    "cart_id" : "132654"   
            }]
         
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

// "order_id" : "'.$order_cd.'",
//                     "customer_id" : "'.$customer_info['customer_id'].'",
//                     "product_id" : "'.$order_details[0]->product_id.'",
//                     "product_name" : "'.$order_details[0]->product_name.'",
//                     "Unit" : "9",
//                     "Unit_Name" : "NO",
//                     "quantity" : "'.$order_details[0]->product_sales_quantity.'",
//                     "price" : "'.$order_details[0]->product_price.'",
//                     "Discount_Amt" : "0",
//                     "Discount_Per" : "0",
//                     "Tax_Amt" : "0",
//                     "Tax_Per" : "0",
//                     "cart_id" : "132654"  
$response = curl_exec($curl);

curl_close($curl);
echo $response;
exit;


     

        # get order information
        $payment_status     =  $order_info->payment_status;
        $presc_status       =  $order_info->prescription_image;
        $presc_order        =  $order_info->prescription_image;
        $customer_Id        =  $order_info->customer_id;
        $customer_name      =  "Test";
        $customer_mobile    =  "923024688336";
        $order_date         = "2022-11-03 15:21";
        $sub_total          = "1200";
        $total_tax          = "150";
        $shipping_type      = "";
        $ship_charge        = "110";
        $delivery_time      = "";
        $grand_total        = "1200";
        $order_status       = "pending";
        $payment_method     = "";
        $bank_name          = "";
        $account_name  = "";
        $account_number  = "";
        $comments = "";
        $payment_status = "NULL";
        $ship_city          = "";
        $courier_company = "TCS";
        $shipping_method  = "";
        $total_weight = "";
        $presc_status = "NULL";
        $doctor_detail_status = "";
        $presc_order = "";
        $ReschedueOrder = "0";
        
        $Eorder = array('order_cd' =>$order_cd,'customer_Id' =>$customer_Id,'customer_Name' =>$customer_name,'customer_Mobile' =>$customer_mobile,
            'order_date' =>$order_date,'sub_total' =>$sub_total,'Total_tax' =>$total_tax,'shipping_type' =>$shipping_type,'ship_charge' =>$ship_charge,'delivery_time' =>$delivery_time,'grand_total' =>$grand_total,
            'order_status' =>$order_status,'payment_method' =>$payment_method,'bank_name' =>$bank_name,'account_name' =>$account_name,'account_number' =>$account_number,
            'comments' =>$comments,'payment_status' =>$payment_status,'ship_city_Name' =>$ship_city, 'courier_company' =>$courier_company,'shipping_method' =>$shipping_method,
            'total_weight' =>$total_weight,'prescription_status' =>$presc_status,'doctor_detail_status' =>$doctor_detail_status,'presc_order' =>$presc_order,'ReschedueOrder' => $ReschedueOrder);

        $rec = array();
        $rec['Action'] = 'Ecommerce Order';
        $rec['Eorder'] = $Eorder;
        
        $EorderDetail = array();

      

        $product_id = "1";
        $customer_cd = "1";
        $order_detail_id ="1";
        $order_id = "1";
        $customer_id = "1";
        $product_name = "test";
        $Unit   = "9";
        $Unit_Name = "NO";
        $quantity ="1";
        $price = "12";
        $price1= "11";
        $Discount_Amt ="12";
        $Discount_Per = "1";
        $Tax_Amt = "1";
        $Tax_Per = "1";
        $cart_id = "1800";

        $EorderDetail[] = array ('order_detail_id'=>$order_detail_id,'order_id'=>$order_id,'customer_id'=>$customer_id,'product_id'=>$product_id,
            'product_name'=>$product_name,'Unit'=>$Unit,'Unit_Name'=>$Unit_Name,'quantity'=>$quantity,'price'=>$price,'Discount_Amt'=>$Discount_Amt,
            'Discount_Per'=>$Discount_Per,'Tax_Amt'=>$Tax_Amt,'Tax_Per'=>$Tax_Per,'cart_id'=>$cart_id);


       

        $rec['EorderDetail'] = $EorderDetail;
        
        $jsonstr = json_encode($rec);
        
        $action = "124.29.217.195:87/NextHealthServices/EcommerceOrder/InsertEOrderMaster";
        $queryString = $jsonstr;
        $ch = curl_init($action);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$queryString);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($queryString))
        );

        $result = curl_exec($ch);
        print_r($result);
        exit;
        curl_close($ch);
        $jsonObj=json_decode($result);

        if($jsonObj->meta->code == "-1000")
        {
            $error_message=$jsonObj->meta->message;
            echo "a";

        }
        else if($jsonObj->meta->code == "200")
        {
            echo "string";
           //  $responses=$jsonObj->response;

           //  # get order information
           //  $objOrder = new Order;
           //  $objOrder->setProperty("order_cd", $order_cd);
           //  $objOrder->lstOrder();
           //  $rows           = $objOrder->dbFetchArray(1);
           //  $customer_name  = isset($rows['fullname'])? $rows['fullname']: $rows['ship_contact_name'];
           //  $customer_email =  isset($rows['email'])? $rows['email']: $rows['customer_email'];
           //  $customer_phone =  isset($rows['day_phone'])? $rows['day_phone']: $rows['ship_contact_phone'];

           //  $order_date     = $objCommon->dutch_date($rows['order_date']);
           //  $processed_date = $objCommon->dutch_date(date('Y-m-d'));

           //  # Send mail to customer
           //  $content        = $objTemplate->getTemplate('order_in_process');
           //  $sender_name    = $content['sender_name'];
           //  $sender_email   = $content['sender_email'];
           //  $subject        = $content['template_subject'];
           //  $content        = $content['template_detail'];

           //  $content        = str_replace("[USER_NAME]", $customer_name, $content);
           //  $content        = str_replace("[ORDER_NUMBER]", $order_cd, $content);

           //  $content        = str_replace("[ORDERED_DATE]", $order_date, $content);
           //  $content        = str_replace("[PROCESSED_DATE]", $processed_date, $content);

           //  $content        = str_replace("[SITE_NAME]", SITE_NAME, $content);
           //  $content        = str_replace("[SENDER_NAME]", $sender_name, $content);

           //  $body           = file_get_contents(TEMPLATE_URL . "template.php");
           //  $body           = str_replace("[BODY]", $content, $body);
           //  //echo $body;
           //  $msg = "Order has been processed successfully.";
           // $text = "Dear customer, your Order ID #".$order_cd."  is  ".$order_status."<br> For more information, call 042 32 600 100 or visit www.nexthealth.pk";
           //  sendsms($customer_phone, $text);
        }


  
        
    }

    public function order_update($value='')
    {
       $order_id =  $this->input->post('order_id');
       $qty =  $this->input->post('quantity');
       $product =  $this->input->post('product');

       $product_details = $this->web_model->get_product_by_id($product);
       $order_info = $this->manageorder_model->order_info_by_id($order_id);

       $shipping_method_id = $order_info->shipping_method_id;
       $payment_method_id  = $order_info->payment_method_id;
       $courier_map_id     = $order_info->courier_city_map_id;
       $total_weight       = $order_info->total_weight;
       $handling_charges   = $order_info->handling_charges;
       $total              = $order_info->order_total;
       $old_price_slot_id  = $order_info->ship_price_slot_id;
       $old_price_slot_price = $this->web_model->get_price_slot_price_by_id($old_price_slot_id);


       $product_id         = $product_details->product_id;
       $product_title      = $product_details->product_title;
       $product_price      = $product_details->product_price;
       $product_weight     = $product_details->product_weight;
       $product_handling_charges   = $product_details->handling_charges;
       $product_image      = $product_details->product_image;

       $handling_charges   = $product_handling_charges + $handling_charges;

       $total_weight       = $total_weight+$product_weight;
       $price_slot         = $this->web_model->get_shipping_price_details($courier_map_id, $total_weight);
       $price_slot_id      = $price_slot['id'] ;
       $price_slot_price   = $price_slot['price'] ;  

       $total = $total - $old_price_slot_price;
       $total = $total + $price_slot_price + $handling_charges + ($product_price * $qty);  

       $data['ship_price_slot_id'] = $price_slot_id ;
       $data['total_weight'] = $total_weight ;
       $data['handling_charges'] = $handling_charges ;
       $data['order_total'] = $total ;



       $oddata = array();
       $oddata['order_id']               = $order_id;
       $oddata['product_id']             = $product_id;
       $oddata['product_name']           = $product_title;
       $oddata['product_price']          = $product_price;
       $oddata['product_sales_quantity'] = $qty;
       $oddata['product_image']          = $product_image;
        // $oddata['prescription_image']    =  $prescription_image  ;
        
       $order_result = $this->manageorder_model->update_order($data, $order_id);
       $order_details_save = $this->web_model->save_order_details_info($oddata);
       



    }
    
    public function delete_product()
    {
       $order_id =  $this->input->post('order_id');
       $product =  $this->input->post('product_id');
       $order_details_id =  $this->input->post('order_detail_id');



       $product_details = $this->web_model->get_product_by_id($product);
       $order_info = $this->manageorder_model->order_info_by_id($order_id);

       $shipping_method_id = $order_info->shipping_method_id;
       $payment_method_id  = $order_info->payment_method_id;
       $courier_map_id     = $order_info->courier_city_map_id;
       $total_weight       = $order_info->total_weight;
       $handling_charges   = $order_info->handling_charges;
       $total              = $order_info->order_total;
       $old_price_slot_id  = $order_info->ship_price_slot_id;
       $old_price_slot_price = $this->web_model->get_price_slot_price_by_id($old_price_slot_id);


       $product_id         = $product_details->product_id;
       $product_title      = $product_details->product_title;
       $product_price      = $product_details->product_price;
       $product_weight     = $product_details->product_weight;
       $product_handling_charges   = $product_details->handling_charges;

       $handling_charges   = $handling_charges - $product_handling_charges ;

       $total_weight       = $total_weight-$product_weight;

       $price_slot         = $this->web_model->get_shipping_price_details($courier_map_id, $total_weight);
       $price_slot_id      = $price_slot['id'] ;
       $price_slot_price   = $price_slot['price'] ;  

       // $total = $total - $product_price;
       // $total = $total - $old_price_slot_price;
      
       $total1 = ($total - $product_price) ;  
       $total2 = ($total1 - $old_price_slot_price) ; 
       $total3 = ($total2 - $product_handling_charges) ;
        echo $total3 .','. $old_price_slot_price .','. $product_handling_charges;
       // $data['ship_price_slot_id'] = $price_slot_id ;
       $data['total_weight'] = $total_weight ;
       $data['handling_charges'] = $handling_charges ;
       $data['order_total'] = $total ;

       // print_r($data);
       exit;
        
       $order_result = $this->manageorder_model->update_order($data, $order_id);
       $order_details_delete = $this->manageorder_model->delete_order_details_info($order_details_id);
    }

    public function ajaxsearchProducts()
    {

         
      $output = '';
      $query = '';
      
      if($this->input->post('query'))
      {
       $query = $this->input->post('query');
      }

     
      $data = $this->web_model->fetch_search_data($query);
      $output .= '<datalist id="products">';
         if($data->num_rows() > 0)
          {
           foreach($data->result() as $row)
           {
            $output .= '
                <option value="'.$row->product_id.'" >'.$row->product_title;
           }
          }
          else
          {
           $output .= '
               <option value="No Data Found">
              ';
          }               
        $output .= '</datalist>
              ';
        
        echo $output;
    }

    public function order_details($order_id)
    {
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

        $data['maincontent'] = $this->load->view('admin/pages/order_details', $data, true);
        $this->load->view('admin/master', $data);
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
