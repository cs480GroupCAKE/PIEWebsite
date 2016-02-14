/* This is the javascript file for managing popup window display.
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