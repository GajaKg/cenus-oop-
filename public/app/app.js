$(document).ready(function(){

 
});

function validate_employee(){
    
    var ime = document.getElementById("first_name").value;
    var prezime = document.getElementById("last_name").value;
    var stepen = document.getElementById("stepen").value;
    
    //if (ime.validity.valueMissing){
    if (ime == "" || ime.length < 3){
        error_message("Unesite polje 'Ime', mora imati minimum tri slova.");
        return false;
    }
    
    //if (prezime.validity.valueMissing){
    if (prezime == "" || prezime.length < 3){
        error_message("Unesite polje 'prezime', mora imati minimum tri slova.");
        return false;
    }
    
    //if (stepen.validity.rangeOverflow || stepen.validity.rangeUnderflow){
    if (stepen = "" || stepen < 1 || stepen > 7){
        error_message("Polje stepen mora biti u rasponu od 1 do 7");
        return false;
    }
    
    return true;
    
}

function error_message(msg){
    var div = document.getElementById("validation");
        div.innerHTML = "";
    
    var alertDiv = document.createElement("div");
        alertDiv.setAttribute("class", "alert alert-danger");
        alertDiv.innerHTML = msg;
    
    div.appendChild(alertDiv);
}