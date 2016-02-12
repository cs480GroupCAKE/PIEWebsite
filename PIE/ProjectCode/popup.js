/* This is the javascript file for managing popup window display.
*/

//Checks for empty fields for profile photos
function ppcheck_empty() {
    if(document.getElementById('ppupload').value == "") {
        alert("No file has been selected!");
    } else {
        document.getElementById('ppform').submit();
        alert("Upload successful!");
    }
}

//Checks for empty fields for event photos
function epcheck_empty() {
    if(document.getElementById('epupload').value == "") {
        alert("No file has been selected!");
    } else {
        document.getElementById('epform').submit();
        alert("Upload successful!");
    }
}

//Displays popup for profile photo upload
function addPP_div_show() {
    document.getElementById(ppPopup).style.display = "block";
}

//Displays popup for event photo upload
function addEP_div_show() {
    document.getElementById(ppPopup).style.display = "block";
}

//Displays popup for profile photo removal
function remPP_div_show() {
    document.getElementById(ppPopup).style.display = "block";
}

//Displays popup for event photo removal
function remEP_div_show() {
    document.getElementById(ppPopup).style.display = "block";
}

//Hides popup for profile photo upload
function addPP_div_hide() {
    document.getElementById(ppPopup).style.display = "none";
}

//Hides popup for event photo upload
function addPP_div_hide() {
    document.getElementById(ppPopup).style.display = "none";
}

//Hides popup for profile photo removal
function addPP_div_hide() {
    document.getElementById(ppPopup).style.display = "none";
}

//Hides popup for event photo removal
function addPP_div_hide() {
    document.getElementById(ppPopup).style.display = "none";
}