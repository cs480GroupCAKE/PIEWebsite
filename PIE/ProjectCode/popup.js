/*
         ******************************************************************
         * This is the javascript file for managing popup window display. *
         *                         CH 2.12.2016                           *
         ******************************************************************
*/

//Checks for empty fields for profile photos
function ppcheck_empty() {
    if(document.getElementById('ppupload').value == "") {
        alert("No file has been selected!");
    } else {
        document.getElementById('ppupform').submit();
        alert("Upload successful!");
    }
}

//Checks for empty fields for event photos
function epcheck_empty() {
    if(document.getElementById('epupload').value == "") {
        alert("No file has been selected!");
    } else {
        document.getElementById('epupform').submit();
        alert("Upload successful!");
    }
}

function uploadSuccess() {
    alert("Upload Successful!");
}

//Displays popup for profile photo upload
function addPP_div_show() {
    document.getElementById('pppopupDiv').style.display = "block";
}

//Displays popup for event photo upload
function addEP_div_show() {
    document.getElementById('peppopupDiv').style.display = "block";
}

//Displays popup for profile photo removal
function remPP_div_show() {
    document.getElementById('rpppopupDiv').style.display = "block";
}

//Displays popup for event photo removal
function remEP_div_show() {
    document.getElementById('reppopupDiv').style.display = "block";
}

//Displays popup for profile photo setting
function setPP_div_show() {
    document.getElementById('spppopupDiv').style.display = "block";
}

//Hides popup for profile photo upload
function addPP_div_hide() {
    document.getElementById('pppopupDiv').style.display = "none";
}

//Hides popup for event photo upload
function addEP_div_hide() {
    document.getElementById('peppopupDiv').style.display = "none";
}

//Hides popup for profile photo removal
function remPP_div_hide() {
    document.getElementById('rpppopupDiv').style.display = "none";
}

//Hides popup for event photo removal
function remEP_div_hide() {
    document.getElementById('reppopupDiv').style.display = "none";
}

//Hides popup for event photo removal
function setPP_div_hide() {
    document.getElementById('spppopupDiv').style.display = "none";
}