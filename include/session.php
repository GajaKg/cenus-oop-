<?php

class Session {
    
    private $logged_in;
    public $user_id;
    public $message;
    
    function __construct(){
        session_start();
    }
    
    public function login($found_admin){
        if($found_admin){
            $this->logged_in = true;
            $this->user_id = $_SESSION['user_id'] = $found_admin->id;
        }
    }
    
    public function logout(){
        if($this->user_id){
            unset($this->user_id);
            unset($_SESSION['user_id']);
            $this->logged_in = false;
        }
    }
    
}


$session = new Session;





?>