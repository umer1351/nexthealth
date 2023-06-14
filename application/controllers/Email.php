<?php



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */



class Email extends CI_Controller

{



    public function index()

    {




$to = 'umer.rehman996@gmail.com';
$subject = "Email Subject";

$message = 'Dear '.$_POST['name'].',<br>';
$message .= "We welcome you to be part of family<br><br>";
$message .= "Regards,<br>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <umer.rehman.official@gmail.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);







//         $this->load->library('email');

// $config['protocol']    = 'smtp';
// $config['smtp_host']    = 'ssl://smtp.gmail.com';
// $config['smtp_port']    = '465';
// $config['smtp_timeout'] = '7';
// $config['smtp_user']    = 'sender_mailid@gmail.com';
// $config['smtp_pass']    = 'password';
// $config['charset']    = 'utf-8';
// $config['newline']    = "\r\n";
// $config['mailtype'] = 'text'; // or html
// $config['validation'] = TRUE; // bool whether to validate email or not      

// $this->email->initialize($config);

// $this->email->from('umer.rehman996@gmail.com', 'sender_name');
// $this->email->to('umer.rehman996@gmail.com'); 
// $this->email->subject('Email Test');
// $this->email->message('Testing the email class.');  

// $this->email->send();

// echo $this->email->print_debugger();

        // $config['protocol']  = 'smtp';

        // $config['smtp_host'] = 'mail.imrostom.com';

        // $config['smtp_port'] = 587;

        // $config['smtp_user'] = 'imrostom@imrostom.com';

        // $config['smtp_pass'] = 'imrostomali';



        // // Load email library and passing configured values to email library

        // $this->load->library('email', $config);

        // $this->email->set_newline("\r\n");



        // // Sender email address

        // $this->email->from('rrr@gmail.com', 'ss');

        // // Receiver email address

        // $this->email->to('rostomali4444@gmail.com');

        // // Subject of email

        // $this->email->subject('subject');

        // // Message in email

        // $this->email->message('Message Send Here');

        // $this->email->send();

        // $this->email->print_debugger(array('headers'));

    }



}

