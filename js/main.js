/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */

//Starting point, just call functions that need to be called
$(document).ready(function ()
{
    var img_thumbnail;

    //consist array of elements that have class = "Img-Thumbnail"
    img_thumbnail = document.getElementsByClassName("img-thumbnail");

    for (var i = 0; i < img_thumbnail.length; i++) {
        img_thumbnail[i].addEventListener('click', imagepopup, false);
    }
    
    activateMenu();
});


function imagepopup(e) {

    const span = document.createElement("span");
    span.setAttribute("class", "img-popup");
    const src = e.target.getAttribute("src");
    const largeImage = src.replace("small", "large");
    span.innerHTML = `<img src= ${largeImage}/>`;
    e.target.parentNode.insertAdjacentElement("afterend", span);

}

document.body.addEventListener('click', removespan, true);


function removespan() {
    $(".img-popup").remove();
}

/*
 * This function toggles the nav menu active/inactive status as
 * different pages are selected. It should be called from $(document).ready()
 * or whenever the page loads.
 */
function activateMenu()
{
    var current_page_URL = location.href;
    $(".navbar-nav a").each(function ()
    {
        var target_URL = $(this).prop("href");
        if (target_URL === current_page_URL)
        {
            $('nav a').parents('li, ul').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        }
    });
}


