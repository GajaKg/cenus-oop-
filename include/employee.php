<?php

class Employee extends DatabaseObject {
    
    protected static $db_fields = array("ime", "prezime", "stepen");
    protected static $table_name = "zaposleni";
    
    protected $id;
    protected $ime;
    protected $prezime;
    protected $stepen;
    
    public function attach_employee($ime, $prezime, $stepen){
        if(!empty($ime) && !empty($prezime) && !empty($stepen)){
            $this->ime = $ime;
            $this->prezime = $prezime;
            $this->stepen = $stepen;
            return true;
        } else {
            return false;
        }
            
    }
    
    public function id(){
        return $this->id;
    }
    
    public function full_name(){
        return  ucfirst($this->ime) . " " . ucfirst($this->prezime);
    }
    
}








?>