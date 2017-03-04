<?php 


class DatabaseObject {
    
    // ------------------------------ QUERIES -------------------------------- \\
    // main method for queries (create instance from query results)
    protected static function find_by_query($q){
        global $c;
        $object_array = array();
        
        $result_set = $c->query($q);
        
        while($row = $c->fetch_array($result_set)){
            $object_array[] = self::create_instance($row);
        }
        return $object_array;
    }
 
    public static function find_by_id($id){
        global $c;
        //$safe_id = $c->safe_string($id);
        
        $q  = "SELECT * FROM " . static::$table_name . " ";
        $q .= "WHERE id = '$id' LIMIT 1"; 
        $result = self::find_by_query($q);

        return empty($result) ? null : array_shift($result);
    }
    
    public static function find_all(){
        return $result = self::find_by_query("SELECT * FROM " . static::$table_name);
    }
    
     // ----------------END--------------- queries ------------END------------- \\
    
    
    // ------------------------------- CREATE INSTANCE ---------------------- \\
    private static function create_instance($record){
        $called_class = get_called_class();
        $object = new $called_class;
        
        foreach($record as $attribute => $value){
            if($object->has_attribute($attribute)){
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    // check if called class has attributes
    private function has_attribute($attribute){
        $object_vars = get_object_vars($this);
        return array_key_exists($attribute, $object_vars);
    }
    // ----------------END--------------- create instance ------------END------------- \\
    
    
    /************************** CRUD ****************************/
    // find class attributes
    private function attributes(){
        $attr = array();

        foreach(static::$db_fields as $field){
            $attr[$field] = $this->$field;
        }
        
        return $attr;
    }
    
    private function safe_attributes(){
        $safe = array();
        global $c;
        
        foreach($this->attributes() as $key => $value){
            $safe[$key] = $c->safe_string($value);
        }
        return $safe;
        
    }
    
    public function create(){
        $escaped = self::safe_attributes();
        global $c;
        
        $q  = "INSERT INTO " . static::$table_name . " ( ";
        $q .= join(", ", array_keys($escaped));
        $q .= " ) VALUES ( '";
        $q .= join("', '", array_values($escaped));
        $q .= "' )";
        $result = $c->query($q);
        if($result && $c->affected_rows() >= 1){
            $this->id = $c->insert_id();
        }
    }
    
    public function update(){
        
    }
    
    public function delete(){
        
    }
    
    public function save(){
        
    }
}






?>