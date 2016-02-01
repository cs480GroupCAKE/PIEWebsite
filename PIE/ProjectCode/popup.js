// Checks registration form for empty fields
function registerEmpty() {
    if(document.getElementById('firstname').value == "" || document.getElementById('lastname').value == "" || 
       document.getElementById('username').value == "" || document.getElementById('email').value == "" || 
       document.getElementById('password').value == "" || document.getElementById('passwordVerify').value == "" || 
       document.getElementById('datepicker').value == "") {
        alert("One or more field has been left empty. Please try again!");
    } else {
        alert("Registration successful!");
    }
}

// Checks login form for empty fields
function loginEmpty() {
    if(document.getElementById('username').value == "" || document.getElementById('password').value == "") {
        alert("Username or password is empty. Please try again!")
    } else {
        // add log in function here
    }
}

function divShow() {
    document.getElementById('popupFull').style.display = "block";
}

function divHide() {
    document.getElementById('popupFull').style.display = "none";
}