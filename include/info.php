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
    
}







?>