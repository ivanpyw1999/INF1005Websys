/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function myFunction(clicked_button) {
//  alert(clicked_button);
    switch (clicked_button) {
        
        case  "add-product-view-button":
            $("#add-product-edit").toggleClass('d-none');
            $("#add-product-view").toggleClass('d-none');
            break;

        
        case  "delivery-location-view-button":
            $("#delete-product-edit").toggleClass('d-none');
            $("#delete-product-view").toggleClass('d-none');
            break;

       
        case  "modify-product-check-button":
            $("#modify-product-edit").toggleClass('d-none');
            $("#modify-product-check").toggleClass('d-none');
            break;

    }
}