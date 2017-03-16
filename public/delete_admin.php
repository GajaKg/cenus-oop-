<?php 
require_once("../include/initialize.php");


$id = $_GET['id'];

if ($id != $session->admin_id()){
    
    $admin = Administrator::find_by_id($id);
    
    if ($admin->__get('username') != "ivana"){
        
        if ($admin->delete()){
            $session->message("Uspesno ste obrisali administratora!");
            redirect_to("manage_admins.php");
        } else {
            $session->message("Neuspelo brisanje, kontaktirajte administratora!");
            redirect_to("manage_admins.php");
        }       
        
    } else {
        $session->message("Ne mozete izbrisati glavnog administratora!");
        redirect_to("manage_admins.php");
    }

    
} else {
    $session->message("Ne mozete obrisati aktivnog administratora!");
    redirect_to("manage_admins.php");
}



?>