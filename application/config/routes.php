<?php

defined('BASEPATH') or exit('No direct script access allowed');



//Front End Route

$route['default_controller']   = 'web';

$route['404_override']         = 'web/error';

$route['translate_uri_dashes'] = false;



//Web Route

$route['home']       			= 'Web/home';

$route['thanks']       			= 'Web/thanks';

$route['cron']       			= 'Web/cron';

$route['sitemap\.xml']       		= 'Web/sitemap';

$route['product/(:any)']       	= 'Web/single/$1';

$route['cms/about-us']       	= 'Web/about_us';

$route['cms/how_to_order']       = 'Web/hpw_to_order';

$route['cms/shipping_and_returns']       = 'Web/shipping_and_returns';

$route['cms/privacy_and_security']       = 'Web/privacy_and_security';

$route['cms/faqs']       = 'Web/faqs';

$route['cms/payment_method']       = 'Web/payment_method';

$route['cms/terms_of_service']       = 'Web/terms_of_service';

$route['cms/contact_us']       = 'Web/contact_us';

$route['single/(:any)']       = 'Web/single/$1';

$route['contact']             = 'Web/contact';

$route['cart']                = 'Web/cart';

$route['save/cart']           = 'Web/save_cart';

$route['update/cart']         = 'Web/update_cart';

$route['remove/cart']         = 'Web/remove_cart';

$route['user_form']           = 'Web/user_form';

$route['products/(:any)'] 	  = 'Web/category_post/$1';

$route['discounted-products'] 	  = 'Web/discounted_products';
$route['generic-medicines'] 	  = 'Web/special_offers';
$route['lab-test'] 	  = 'Web/lab_test';
// $route['prod_test/(:any)/(:any)'] 	  = 'Web/pagintate';

$route['get/cat-sub/(:any)']  = 'Web/second_cat_post/$1';

$route['get/child-cat/(:any)']= 'Web/third_cat_post/$1';

$route['get/deal/(:any)']	  = 'Web/deal/$1';

$route['get/brand/(:any)']	  = 'Web/brand/$1';

$route['not-found']	  = 'Web/not_found';



$route['search']              = 'Web/search';

$route['advanced_search']     = 'Web/advanced_search';

$route['customer/register']   = 'Web/customer_register';

$route['customer/login']      = 'Web/customer_login';

$route['customer/logout']     = 'Web/logout';

$route['customer/logincheck'] = 'Web/customer_logincheck';

$route['customer/login/admin'] = 'Web/customer_login_admin_panel';

$route['customer/save']       = 'Web/customer_save';

$route['register/success']    = 'Web/register_success';



$route['customer/shipping/login']    = 'Web/customer_shipping_login';

$route['customer/shipping/register'] = 'Web/customer_shipping_register';

$route['customer/shipping']              = 'Web/customer_shipping';

$route['customer/save/shipping/address'] = 'Web/save_shipping_address';

$route['customer/profile'] = 'Web/customer_profile';

$route['customer/update'] = 'Web/update_customer_profile';

$route['customer/manage_shipping_address'] = 'Web/manage_shipping_address';

$route['customer/update_shipping'] = 'Web/update_shipping_address';

$route['customer/delete_ship_address'] = 'Web/delete_shipping_address';

$route['customer/add_ship_address'] = 'Web/add_shipping_address';

$route['customer/add_customer_shipping'] = 'Web/save_shipping_address'; 

$route['customer/update_password'] = 'Web/update_password_view'; 

$route['customer/update_cust_password'] = 'Web/update_password'; 

$route['customer/orders'] = 'Web/get_orders'; 

$route['customer/schedule_orders'] = 'Web/get_schedule_orders'; 



$route['print_invoice'] = 'web/pdf';



$route['checkout']                       = 'Web/checkout';

$route['guest_checkout']                 = 'Web/guest_checkout';

$route['get_ship_methods_with_price']    = 'Web/get_ship_methods_with_price';

$route['payment']                        = 'Web/payment';

$route['save/order']                     = 'Web/save_order';

$route['save/guest_order']               = 'Web/save_guest_order'; 

$route['check_email']                    = 'Web/check_email';

$route['update_active_ship_address']     = 'Web/update_active_ship_address';





//Admin Panel Route

$route['dashboard']            = 'Admin/index';

$route['manage/order/(:any)']         = 'ManageOrder/manage_order/$1';

$route['manage/process_order'] = 'ManageOrder/process_order';

$route['manage/delete_order'] = 'ManageOrder/delete_order';

$route['manage/cancel_order']  = 'ManageOrder/cancel_order';

$route['manage/cancelled_order']  = 'ManageOrder/cancelled_order';

$route['order/details/(:num)'] = 'ManageOrder/order_details/$1';

$route['order/order_update_add_product'] = 'ManageOrder/order_update';



$route['manage/price_slot']         = 'ManageOrder/price_slot';



//Category  Route List

$route['add/category']                = 'Category/add_category';

$route['manage/category']             = 'Category/manage_category';

$route['save/category']               = 'Category/save_category';

$route['delete/category/(:num)']      = 'Category/delete_category/$1';

$route['edit/category/(:num)']        = 'Category/edit_category/$1';

$route['update/category/(:num)']      = 'Category/update_category/$1';

$route['published/category/(:num)']   = 'Category/published_category/$1';

$route['unpublished/category/(:num)'] = 'Category/unpublished_category/$1';



//Brand  Route List

$route['add/brand']                = 'Brand/add_brand';

$route['add/sub_brand']            = 'Brand/add_sub_brand';

$route['manage/brand']             = 'Brand/manage_brand';

$route['manage/sub_brand']         = 'Brand/manage_sub_brand';

$route['save/brand']               = 'Brand/save_brand';

$route['save/sub_brand']           = 'Brand/save_sub_brand';

$route['delete/brand/(:num)']      = 'Brand/delete_brand/$1';

$route['edit/brand/(:num)']        = 'Brand/edit_brand/$1';

$route['update/brand/(:num)']      = 'Brand/update_brand/$1';

$route['published/brand/(:num)']   = 'Brand/published_brand/$1';

$route['unpublished/brand/(:num)'] = 'Brand/unpublished_brand/$1';



//Shipping

$route['manage/payment_methods']             	= 'Shipping/payment_methods';

$route['add/payment_methods']             		= 'Shipping/add_payment_methods';

$route['edit/payment_methods/(:num)']           = 'Shipping/edit_payment_methods/$1';

$route['delete/payment_methods/(:num)']         = 'Shipping/delete_payment_methods/$1';

$route['save/payment_method']             		= 'Shipping/save_payment_method';

$route['manage/price_slot']            	 		= 'Shipping/manage_price_slot';

$route['price_slot_detail/(:num)']            	= 'Shipping/price_slot_detail/$1';

$route['manage/shipping_methods']             	= 'Shipping/manage_shipping_methods';

$route['add/shipping_methods']             	    = 'Shipping/add_shipping_methods';

$route['save/shipping_methods']                 = 'Shipping/save_shipping_methods';

$route['edit/shipping_methods/(:num)']          = 'Shipping/edit_shipping_methods/$1';

$route['delete/shipping_methods/(:num)']        = 'Shipping/delete_shipping_methods/$1';

$route['manage/cities']             			= 'Shipping/manage_cities';

$route['add/cities']             				= 'Shipping/add_cities';

$route['edit/cities']             				= 'Shipping/add_cities';

$route['delete/cities/(:num)']             		= 'Shipping/delete_cities/$1';

$route['save/cities']             				= 'Shipping/save_cities';

$route['manage/courier_companies']             	= 'Shipping/manage_courier_companies';

$route['add/courier_companies']             	= 'Shipping/add_courier_companies';

$route['save/courier_companies']             	= 'Shipping/save_courier_companies';

$route['delete/courier_companies/(:num)']       = 'Shipping/delete_courier_companies/$1';

$route['manage/user_management']             	= 'Shipping/manage_brand';



//Post Route List

$route['add/product']                = 'product/add_product';

$route['manage/product/(:num)']       = 'product/manage_product/$1';

$route['save/product']               = 'product/save_product';

$route['delete/product/(:num)']      = 'product/delete_product/$1';

$route['edit/product/(:num)']        = 'product/edit_product/$1';

$route['update/product/(:num)']      = 'product/update_product/$1';

$route['published/product/(:num)']   = 'product/published_product/$1';

$route['unpublished/product/(:num)'] = 'product/unpublished_product/$1';



//Post Route List

$route['add/customer']                = 'customer/add_customer';

$route['manage/customer']             = 'customer/manage_customer';

$route['save/customer']               = 'customer/save_customer';

$route['delete/customer/(:num)']      = 'customer/delete_customer/$1';

$route['edit/customer/(:num)']        = 'customer/edit_customer/$1';

$route['update/customer/(:num)']      = 'customer/update_customer/$1';

$route['published/customer/(:num)']   = 'customer/published_customer/$1';

$route['unpublished/customer/(:num)'] = 'customer/unpublished_customer/$1';



$route['add/customer/groups']                = 'customer/add_customer_groups';

$route['manage/customer/groups']             = 'customer/manage_customer_groups';

$route['save/customer_group']                = 'customer/save_customer_groups';

$route['edit/customer_group/(:num)']         = 'customer/edit_customer_group/$1';

$route['update/customer_group/(:num)']       = 'customer/update_customer_group/$1';

$route['delete/customer_group/(:num)']       = 'customer/delete_customer_group/$1';



//Admin login

$route['nhcrtf']             = 'AdminLogin';

$route['admin_login_check'] = 'AdminLogin/admin_login_check';

$route['logout']            = 'Admin/logout';





//Slider  Route List

$route['add/slider']                = 'slider/add_slider';

$route['manage/slider']             = 'slider/manage_slider';

$route['save/slider']               = 'slider/save_slider';

$route['delete/slider/(:num)']      = 'slider/delete_slider/$1';

$route['edit/slider/(:num)']        = 'slider/edit_slider/$1';

$route['update/slider/(:num)']      = 'slider/update_slider/$1';

$route['published/slider/(:num)']   = 'slider/published_slider/$1';

$route['unpublished/slider/(:num)'] = 'slider/unpublished_slider/$1';



//Deals  Route List

$route['add/deal']                	= 'Deal/add_deal';

$route['manage/deals']             	= 'Deal/manage_deal';
$route['manage/special_discounts']          = 'Deal/manage_discounts';
$route['manage/edit_special_discounts/(:num)']          = 'Deal/edit_manage_discounts/$1';
$route['update/special_discount/(:num)']          = 'Deal/update_manage_discounts/$1';
$route['delete/special_discount/(:num)']          = 'Deal/delete_discounts/$1';
$route['manage/add_special_discounts']          = 'Deal/add_special_discounts';
$route['save/deal']               	= 'Deal/save_deal';
$route['save/special_discounts']               	= 'Deal/save_deal_data';
$route['delete/deal/(:num)']      	= 'Deal/delete_deal/$1';

$route['edit/deal/(:num)']        	= 'Deal/edit_deal/$1';

$route['update/deal/(:num)']      	= 'Deal/update_deal/$1';

$route['published/deal/(:num)']   	= 'Deal/published_deal/$1';

$route['unpublished/deal/(:num)'] 	= 'Deal/unpublished_deal/$1';

$route['manage/lab_test']          = 'Deal/lab_test';
$route['manage/edit_lab_test/(:num)']          = 'Deal/edit_lab_test/$1';
$route['update/lab_test/(:num)']          = 'Deal/update_lab_test/$1';
$route['delete/lab_test/(:num)']          = 'Deal/delete_lab_test/$1';
$route['manage/add_lab_test']          = 'Deal/add_lab_test';
$route['save/lab_test']               	= 'Deal/save_lab_test';


//Theme Option  Route List

$route['theme/option'] = 'themeoption';

$route['save/option']  = 'themeoption/save_option';



$route['spreadsheet/import'] = 'SpreadsheetController/import';

$route['spreadsheet/export'] = 'SpreadsheetController/export';

