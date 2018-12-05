//get values from register input data
var register = document.getElementById("register");
var username = register.elements.namedItem("username").value;
var email = register.elements.namedItem("email").value;
var firstName = register.elements.namedItem("firstName").value;
var lastName = register.elements.namedItem("lastName").value;

//check if register input data are valid and if it is not break registration
//and display message
function regValidation(){
    
    var password = register.elements.namedItem("password").value;
    var confirm = register.elements.namedItem("confirm").value;
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    if(username === ""){
        
        document.getElementsByTagName("input")["username"].style.border = "1px solid red";
        document.getElementById("username_error").innerHTML = "Korisnicko me je obavezno";
        return false;
    }
    if(email === "" || !re.test(email)){
        
        document.getElementsByTagName("input")["email"].style.border = "1px solid red";
        document.getElementById("email_error").innerHTML = "Morate uneti tacnu e-mail adresu";
        return false;
    }
    if(firstName === ""){
        
        document.getElementsByTagName("input")["firstName"].style.border = "1px solid red";
        document.getElementById("fName_error").innerHTML = "Molimo Vas unesite ime";
        return false;
    }
    if(lastName === ""){
        
        document.getElementsByTagName("input")["lastName"].style.border = "1px solid red";
        document.getElementById("lName_error").innerHTML = "Molimo Vas unesite prezime";
        return false;
    }
    if(password === "" || password.length < 8){
        
        document.getElementsByTagName("input")["password"].style.border = "1px solid red";
        document.getElementById("pass_error").innerHTML = "Morate uneti sifru sa minimum 8 karaktera";
        return false;
    }
    if(confirm === "" || confirm !== password){
        
        document.getElementsByTagName("input")["confirm"].style.border = "1px solid red";
        document.getElementById("confirm_error").innerHTML = "Molimo Vas ponovite sifru";
        return false;
    }
    return true;
}