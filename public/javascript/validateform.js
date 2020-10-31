function validateName() {

// Gets reference to form name
    var name = document.getElementById("Name").value;
    var checkname = /^[A-Za-z][A-Za-z\s]*$/;
// checks name with only alphabet characters and character spaces

    
        if (checkname.test(name)) {
        return true;
        }
            else {
                alert("Please enter your name in the correct format in alphabets only!");
                return false;
            }
    }
    

// End of validateName() function.


function validateEmail() {

// Gets reference to form email

    var email = document.getElementById("Email").value;
    var checkemail = /^([\w.-])+@([\w]+\.){1,3}([\w]){2,3}$/;
    // email field contains a user name part follows by “@” and a domain name part
    // The user name contains word characters including hyphen (“-”) and period (“.”)
    // The domain name contains two to four address extensions. 
    // Each extension is string of word characters and separated from the others by a period (“.”). 
    // The last extension must have two to three characters.

    if (checkemail.test(email)) {
        return true;
    }
    else {
        alert("The email address you entered is not valid. Please enter the correct email address!");
        return false;
    }
}

function validateContact() {

// Gets reference to form contact no

    var contact = document.getElementById("Contact").value;
    var checkcontact = /^\d{8}$/;

    if (checkcontact.test(contact)) {
        return true;
    }
    else {
        alert("The phone number you entered is not valid. Please enter a local contact number with 8 numbers and no characters!");
        return false;
    }

}

function validatePassword() {

// Gets reference to password to validate it

    var password = document.getElementById("Password").value;
    var checkpassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    

    if (checkpassword.test(password)) {
        return true;
    }
    else {
        alert("Password must be at least 8 characters long, containing at least 1 number, 1 upper character and 1 lower character!");
        return false;
    }

}


function confirmPassword() {

// Gets reference to password to check if confirmed password is the same 

    var password = document.getElementById("Password").value;
    var checkpassword = document.getElementById("CPassword").value;
    

    if (password!=checkpassword) {
        alert("The passwords are not the same. Please enter the same password in both fields.");
        return false;
        
    }
    else {
        return true;
    }

}



