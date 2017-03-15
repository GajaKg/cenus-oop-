<?php


class Administrator extends DatabaseObject {
    
    protected static $db_fields = array("username", "hashed_password");
    protected static $table_name = "admin";
    
    protected $id;
    protected $username;
    protected $hashed_password;
    
    public function attach_admin($username, $password){
        if (isset($username) && !empty($username) && isset($password) && !empty($password)){
            $this->username = $username;
            $this->hashed_password = $this->password_encrypt($password);
            return true;
        } else {
           return false; 
        }
    }
    
    public function __get($property){
        if(property_exists($this, $property)){
            return $this->$property;
        }
    }

    public static function authenticate($username, $password){

        $safe_user = $username;
        $safe_pass = $password;
        
        $q  = "SELECT * FROM admin ";
        $q .= "WHERE username = '$safe_user' ";
       // $q .= "AND hashed_password = '$safe_pass' ";
        $q .= "LIMIT 1";
        
        $result_set = self::find_by_query($q);
        
        $found_admin = !empty($result_set) ? array_shift($result_set) : false;
        
        if (self::password_check($safe_pass, $found_admin->hashed_password)){
            return $found_admin;
        } else {
            return false;
        }

    }  

    private function find_admin_by_username($username){
        global $c;
        $safe_name = $c->safe_string($username);

        $q = "SELECT * FROM admins WHERE admin = '$safe_name' ";
        $r = self::query($q);
        if($admin = self::fetch_assoc($r)){
            return true;
        } else {
            return null;
        }
    }
    
    
        // *-*-*-*-*-*-*-*-*-*-*-*-*-* PASSWORDS *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*///     
    private function password_encrypt($password) {
        $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
        $salt_length = 22; 					// Blowfish salts should be 22-characters or more
        $salt = $this->generate_salt($salt_length);
        $format_and_salt = $hash_format . $salt;
        $hash = crypt($password, $format_and_salt);
        return $hash;
    }

    private function generate_salt($length) {
        // Not 100% unique, not 100% random, but good enough for a salt
        // MD5 returns 32 characters
        $unique_random_string = md5(uniqid(mt_rand(), true));

        // Valid characters for a salt are [a-zA-Z0-9./]
        $base64_string = base64_encode($unique_random_string);

        // But not '+' which is valid in base64 encoding
        $modified_base64_string = str_replace('+', '.', $base64_string);

        // Truncate string to the correct length
        $salt = substr($modified_base64_string, 0, $length);

        return $salt;
    }

    private static function password_check($password, $existing_hash) {
    // existing hash contains format and salt at start
        $hash = crypt($password, $existing_hash);
        if ($hash === $existing_hash) {
            return true;
        } else {
            return false;
        }
    }
    // ------------------ END pass END------------------//
    
}





?>