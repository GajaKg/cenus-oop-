<?php

class Session {
    
    private $logged_in;
    private $admin_id;
    public $message;
    
    function __construct(){
        session_start();
        $this->check_login();
        $this->check_message();
    }
    
    public function login($found_admin){
        if ($found_admin){
            $this->logged_in = true;
            $this->user_id = $_SESSION['admin_id'] = $found_admin->id;
        }
    }
    
    public function logout(){
        if ($this->admin_id){
            unset($this->admin_id);
            unset($_SESSION['admin_id']);
            $this->logged_in = false;
        }
    }
    
    public function admin_id(){
        return $this->admin_id;
    }
    
    public function is_logged_in(){
        return $this->logged_in;
    }
    
    private function check_login(){
        if (isset($_SESSION['admin_id'])){
            $this->logged_in = true;
            $this->admin_id = $_SESSION['admin_id'];
        } else {
            unset($_SESSION['admin_id']);
            $this->logged_in = false;
        }
    }
    

    
    
    // -------------- messages ------------------- \\
    public function message($msg=""){
        $_SESSION['message'] = $msg;
        $this->message = $_SESSION['message'];
        return $this->message;
        
    }

    private function check_message(){
        if (isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }
    
    
}


$session = new Session;





?>