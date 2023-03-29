/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function checkpwd() {
    var password = document.getElementById("pwd")
            , confirm_password = document.getElementById("pwd_confirm");

    function validatePassword() {
        if (password.value !== confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
}

function enableInputs(clicked_button) {
    
    switch(clicked_button) {
        case    "personal-information-view-button":
                    alert("test");
                    $(".personalInfoButton").toggleClass('d-none');
                    var inputs = document.getElementsByClassName('personalInfo');
                    break;
        case    "delivery-location-view-button":
                    $(".deliverylocationButton").toggleClass('d-none');
                    var inputs = document.getElementsByClassName('deliverylocation');
                    break;
    }
    
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }
}