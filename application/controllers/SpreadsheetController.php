<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SpreadsheetController extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    // Load Model
    $this->load->model('Spreadsheet_model');
    // $this->ip_address    = $_SERVER['REMOTE_ADDR'];
  }
  
  public function spreadhseet_format_download()
  {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="hello_world.xlsx"');
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'id');
    $sheet->setCellValue('B1', 'Category name');
    $sheet->setCellValue('C1', 'Quantity');
    $sheet->setCellValue('D1', 'Price');

    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");
  }
  public function import()
  {
    $upload_file=$_FILES['upload_file']['name'];
    $extension=pathinfo($upload_file,PATHINFO_EXTENSION);
    if($extension=='csv')
    {
      $reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else if($extension=='xls')
    {
      $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    } else
    {
      $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
    $spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
    $sheetdata=$spreadsheet->getActiveSheet()->toArray();
    $sheetcount=count($sheetdata);
    if($sheetcount>1)
    {
      $data=array();
      for ($i=1; $i < $sheetcount; $i++) { 
        $product_id=$sheetdata[$i][0];
        $product_cd=$sheetdata[$i][1];
        $product_pos_id=$sheetdata[$i][2];
        $product_title=$sheetdata[$i][3];
        $product_long_description=$sheetdata[$i][4];
        $product_image=$sheetdata[$i][5];
        $product_image2=$sheetdata[$i][6];
        $product_image3=$sheetdata[$i][7];
        $product_image4=$sheetdata[$i][8];
        $product_price=$sheetdata[$i][9];
        $product_sale_price=$sheetdata[$i][10];
        $product_trade_price=$sheetdata[$i][11];
        $purchase_qty_limit=$sheetdata[$i][12];
        $product_weight=$sheetdata[$i][13];
        $delivery_time_msg=$sheetdata[$i][14];
        $availability_msg=$sheetdata[$i][15];
        $handling_charges=$sheetdata[$i][16];
        $is_cold_chain=$sheetdata[$i][17];
        $is_mrp=$sheetdata[$i][18];
        $product_tax=$sheetdata[$i][19];
        $product_quantity=$sheetdata[$i][20];
        $always_in_stock=$sheetdata[$i][21];
        $pack_quantity=$sheetdata[$i][22];
        $product_feature=$sheetdata[$i][23];
        $product_category=$sheetdata[$i][24];
        $product_second_category=$sheetdata[$i][25];
        $product_third_category=$sheetdata[$i][26];
        $product_deal=$sheetdata[$i][27];
        $product_brand=$sheetdata[$i][28];
        $product_sub_brand=$sheetdata[$i][29];
        $product_author=$sheetdata[$i][30];
        $product_url=$sheetdata[$i][31];
        $prescription_required=$sheetdata[$i][32];
        $ingredients=$sheetdata[$i][33];
        $published_date=$sheetdata[$i][34];
        $meta_keywords=$sheetdata[$i][35];
        $meta_description=$sheetdata[$i][36];
        $discount_type=$sheetdata[$i][37];
        $discount=$sheetdata[$i][38];
        $drug_form=$sheetdata[$i][39];
        $publication_status=$sheetdata[$i][40];

        $data[]=array(
          'product_id'=>$product_id,
          'product_cd'=>$product_cd,
          'product_pos_id'=>$product_pos_id,
          'product_title'=>$product_title,
          'product_long_description'=>$product_long_description,
          'product_image'=>$product_image,
          'product_image2'=>$product_image2,
          'product_image3'=>$product_image3,
          'product_image4'=>$product_image4,
          'product_price'=>$product_price,
          'product_sale_price'=>$product_sale_price,
          'product_trade_price'=>$product_trade_price,
          'purchase_qty_limit'=>$purchase_qty_limit,
          'product_weight'=>$product_weight,
          'availability_msg' => $availability_msg,
          'delivery_time_msg' => $delivery_time_msg,
          'handling_charges' => $handling_charges,
          'is_cold_chain' => $is_cold_chain,
          'is_mrp' => $is_mrp,
          'product_tax' => $product_tax,
          'product_quantity' => $product_quantity,
          'product_feature' => $product_feature,
          'product_category' => $product_category,
          'product_second_category' => $product_second_category,
          'product_third_category' => $product_third_category,
          'product_deal' => $product_deal,
          'product_brand' => $product_brand,
          'product_sub_brand' => $product_sub_brand,
          'product_author' => $product_author,
          'product_url' => $product_url,
          'prescription_required' => $prescription_required,
          'ingredients' => $ingredients,
          'published_date' => $published_date,
          'meta_keywords' => $meta_keywords,
          'meta_description' => $meta_description,
          'discount_type' => $discount_type,
          'discount' => $discount,
          'drug_form_tabs' => $drug_form,
          'publication_status' => $publication_status,
        );
      }
      $inserdata=$this->Spreadsheet_model->insert_batch($data);
      if($inserdata)
      {
        $this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
        redirect('home');
      } else {
        $this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
        redirect('home');
      }
    }
  }
  public function spreadsheet_export()
  {
    //fetch my data
    $productlist=$this->home_model->product_list();
    
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="product.xlsx"');
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'S.No');
    $sheet->setCellValue('B1', 'Product Name');
    $sheet->setCellValue('C1', 'Quantity');
    $sheet->setCellValue('D1', 'Price');
    $sheet->setCellValue('E1', 'Subtotal');

    $sn=2;
    foreach ($productlist as $prod) {
      //echo $prod->product_name;
      $sheet->setCellValue('A'.$sn,$prod->product_id);
      $sheet->setCellValue('B'.$sn,$prod->product_name);
      $sheet->setCellValue('C'.$sn,$prod->product_quantity);
      $sheet->setCellValue('D'.$sn,$prod->product_price);
      $sheet->setCellValue('E'.$sn,'=C'.$sn.'*D'.$sn);
      $sn++;
    }
    //TOTAL
    $sheet->setCellValue('D8','Total');
    $sheet->setCellValue('E8','=SUM(E2:E'.($sn-1).')');

    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");
  }
}