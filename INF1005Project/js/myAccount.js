/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function myFunction(clicked_button) {
//  alert(clicked_button);
    switch (clicked_button) {
        case  "personal-information-edit-button":
        case  "personal-information-view-button":
            $("#personal-information-edit").toggleClass('d-none');
            $("#personal-information-view").toggleClass('d-none');
            break;

        case  "delivery-location-edit-button":
        case  "delivery-location-view-button":
            $("#delivery-location-edit").toggleClass('d-none');
            $("#delivery-location-view").toggleClass('d-none');
            break;

        case  "change-password-edit-button":
        case  "change-password-check-button":
            $("#change-password-edit").toggleClass('d-none');
            $("#change-password-check").toggleClass('d-none');
            break;

    }
}