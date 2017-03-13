<?php

function redirect_to($location){
    header("Location: " . $location);
    exit;
}


function display_errors($errors){
    $output = "";
    $output .= "<ul>"; 
    foreach($errors as $error){
        $output .= "<li>";
        $output .= $error;
        $output .= "</li>";
    }
    $output .= "</ul>";
    return $output;
}

?>