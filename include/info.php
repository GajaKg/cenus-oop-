<?php 

class Info extends DatabaseObject {
    
    protected static $db_fields = array('zaposleni_id', 'pozicija', 'procenat', 'tip_ugovora');
    protected static $table_name = "info";
    
    protected $id;
    protected $zaposleni_id;
    protected $pozicija;
    protected $procenat;
    protected $tip_ugovora;
    
    public function attach_info($zaposleni_id, $pozicija, $procenat, $tip_ugovora){
        
    }
    
    public static function find_info_for($zaposleni_id){
        global $c;
        $safe_id = $c->safe_string($zaposleni_id);
        
        $q  = "SELECT * FROM info ";
        $q .= "WHERE zaposleni_id = '$safe_id' ";
        $q .= "ORDER BY procenat ASC";
        //$r  = $c->query($q);
        $r = self::find_by_query($q);
        return isset($r) ? $r : null;
    }

    public static function employee_info($id){
        $count = 1;
        $emp = Employee::find_by_id($id);
        
        $output = "";
        $output .= "<table class='table table-hover'>";
        $output .= "<thead><tr><th colspan='3'><h3>".$emp->full_name()."</h3></th>";
        $output .= "<th><h4><a href='delete_employee.php?id=".urlencode($emp->id())."'>Obriši radnika</a></h4></th></tr>";
            $output .= "<th>PROCENAT</th><th>POZICIJA</th>";
            $output .= "<th>TIP UGOVORA</th><th colspan='2' style='text-align:center;'>AKCIJA</th>";
        $output .= "</tr></thead>";
        $output .= "<tbody>";
    
        foreach (self::find_info_for($id) as $employee){
            $output .= "<tr>";
                $output .= "<th>".$employee->procenat." %</th>";
                $output .= "<th>".$employee->pozicija."</th>";
                $output .= "<th>".$employee->tip_ugovora."</th>";
                $output .= "<th><a href='update.php?id=".urlencode($employee->id)."'>Izmeni</a></th>";
                $output .= "<th><a href='delete_info.php?infoId=".urlencode($employee->id)."&id=".urlencode($emp->id())."'>Obriši</a></th>";
            $output .= "</tr>";
        }
        
        $output .= "<tr>";
            $output .= "<th colspan='5'>Ukupno procenata: ".self::sum_employee_procents($id)." %</th>";
        $output .= "</tr>";
        
        $output .= "<tbody></table>";
        return $output;
    }    
    
    private static function sum_employee_procents($id){
        $procents = 0;
        
        foreach (self::find_info_for($id) as $employee){
            $procents += $employee->procenat;
        }
        
        return $procents;
    }
    
}







?>