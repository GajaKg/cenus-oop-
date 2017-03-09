<?php

class Employee extends DatabaseObject {
    
    protected static $db_fields = array("ime", "prezime", "stepen");
    protected static $table_name = "zaposleni";
    
    protected $id;
    protected $ime;
    protected $prezime;
    protected $stepen;
    
    public function id(){
        return $this->id;
    }    
    
    public function ime(){
        return ucfirst($this->ime);    
    }
    
    public function prezime(){
        return ucfirst($this->prezime);    
    }
    
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
     
    public function full_name(){
        return  ucfirst($this->ime) . " " . ucfirst($this->prezime);
    }
    
    /*  
    * $per_page and $offset is used for pagination, 
    * we get them on page index.php
    * protected static function pagination_query($per_page, $offset, $order)
    */
    public static function employee_bio($per_page, $offset, $order){
        $count = 1;

        $output = "";
        $output .= "<table class='table table-hover'>";
        $output .= "<thead><tr>";
            $output .= "<th>#</th><th>IME</th><th>PREZIME</th><th>STEPEN</th><th>DETALJI</th>";
        $output .= "</thead></tr>";
        $output .= "<tbody>";
        
        foreach (self::pagination_query($per_page, $offset, $order) as $employee){
            $output .= "<tr>";
                $output .= "<th>".$count++."</th>";
                $output .= "<th>".$employee->prezime()."</th>";
                $output .= "<th>".$employee->ime()."</th>";
                $output .= "<th>".$employee->stepen."</th>";
                $output .= "<th><a href='employee_info.php?id=".urlencode($employee->id)."'>Pogledaj</a></th>";
            $output .= "</tr>";
        }
    
        $output .= "<tbody></table>";
        return $output;
    }
    

}








?>