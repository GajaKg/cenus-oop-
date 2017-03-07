<?php 

class Info extends DatabaseObject {
    
    protected static $db_fields = array('zaposleni_id', 'pozicija', 'procenat', 'tip_ugovora');
    protected static $table_name = "info";
    
    protected $id;
    protected $zaposleni_id;
    protected $pozicija;
    protected $procenat;
    protected $tip_ugovora;
    
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
        $output .= "<thead><tr><th colspan='3'><h3>".$emp->full_name()."</h3></th></tr><tr>";
            $output .= "<th>Procenat</th><th>Pozicija</th><th>Tip ugovora</th><th colspan='2'>Akcija</th>";
        $output .= "</tr></thead>";
        $output .= "<tbody>";
    
        foreach (self::find_info_for($id) as $employee){
            $output .= "<tr>";
                $output .= "<th>".$employee->procenat."</th>";
                $output .= "<th>".$employee->pozicija."</th>";
                $output .= "<th>".$employee->tip_ugovora."</th>";
                $output .= "<th><a href='update.php?id=".urlencode($employee->id)."'>Izmeni</a></th>";
                $output .= "<th><a href='delete.php?id=".urlencode($employee->id)."'>Obriši</a></th>";
            $output .= "</tr>";
        }
    
        $output .= "<tbody></table>";
        return $output;
    }    
    
}







?>