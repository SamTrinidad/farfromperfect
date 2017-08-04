<?php

class Contact extends Controller{

    public function index() {
        $this->view('contact/index');
    }

    public function mail(){
        $message = $email = $name = $error = '';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

            if(!preg_match($email_exp,$_POST['email'])) {
                $error.= 'The Email Address you entered does not appear to be valid.';
            }else{
            	$email = $_POST['email'];
            }

            $string_exp = "/^[A-Za-z .'-]+$/";

            if(!preg_match($string_exp,$_POST['name'])) {
                $error .= 'The name you entered does not appear to be valid';
            }else{
            	$name = $_POST['name'];
            }
		$message = $_POST['message'];

        }else{    
            $error = 'There was an error sending your message. Message was not sent!';
        }
        if(strlen($error) < 1 ){

            $email_message = "Name: ". $this->clean_string($name)."\n";
            $email_message .= "Email: ". $this->clean_string($email)."\n";
            $email_message .= "Message:\n". $this->clean_string($message)."\n";

            $recipient = "farfromperfect@5am-design.com";
            $subject = "FFP CONTACT - From: $name";
            $mailheader = "From: $email \r\n";
            mail($recipient, $subject, $email_message, $mailheader) or $error = 'There was an error sending your message. Message was not sent!';
            $output = 'Message Sent!';
        }else{
            $output = $error;
        }
        
        
        

        $this->view('contact/index',['message'=> $output]);
    }

    private function clean_string($str){
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$str);
    }
}