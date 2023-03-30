function $(selector){
    return document.querySelector(selector);
}

loadproducts(1);

function loadproducts(page = 1, query = ''){
    $('#product_area').style.display = 'none';
    $('#skeleton_area').style.display = 'block';
    $('#skeleton_area').innerHTML = make_skeleton();
    
    fetch('process_products.php?page='+page+query+'').then(function(response){

        return response.json();

    }).then(function(responseData){

        var html = '';

        if(responseData.data)
        {
            if(responseData.data.length > 0)
            {
                html += '<p class="h6">'+responseData.total_data+' Products Found</p>';

                html += '<div class="row">';

                for(var i = 0; i < responseData.data.length; i++)
                {
                    html += '<div class="col-md-3 mb-2 p-3">';

                    html += '<img src ="'+responseData.data[i].image+'" class="img-fluid border mb-3 p-3" />';

                    html += '<p class="fs-6 text-center">'+responseData.data[i].name+'&nbsp;&nbsp;&nbsp;<span class="badge bg-info text-dark">'+responseData.data[i].brand+'</span><br />';

                    html += '<span class="fw-bold text-danger"><span>&#8377;</span> '+responseData.data[i].price+'</span>';

                    html += '</div>';
                }

                html += '</div>';

                $('#product_area').innerHTML = html;
            }
            else
            {
                $('#product_area').innerHTML = '<p class="h6">No Product Found</p>';
            }
        }

        if(responseData.pagination)
        {
            $('#pagination_area').innerHTML = responseData.pagination;
        }

        setTimeout(function(){

            $('#product_area').style.display = 'block';

            $('#skeleton_area').style.display = 'none';

        }, 3000);

    });
}

function make_skeleton()
{
    var output = '<div class="row">';

    for(var count = 0; count < 8; count++)
    {
        output += '<div class="col-md-3 mb-3 p-4">';

        output += '<div class="mb-2 bg-light text-dark" style="height:240px;"></div>';

        output += '<div class="mb-2 bg-light text-dark" style="height:50px;"></div>';

        output += '<div class="mb-2 bg-light text-dark" style="height:25px;"></div>';

        output += '</div>';
    }

    output += '</div>';

    return output;
}

load_filter();

function load_filter()
{
    fetch('process.php?action=filter').then(function(response){

        return response.json();

    }).then(function(responseData){

        if(responseData.gender)
        {

            if(responseData.gender.length > 0)            
            {
                var html = '<div class="list-group">';

                for(var i = 0; i < responseData.gender.length; i++)
                {
                    html += '<label class="list-group-item">';

                    html += '<input type="radio" class="form-check-input me-1 gender_filter" name="gender_filter" value="'+responseData.gender[i].name+'" >';

                    html += responseData.gender[i].name+' <span class="text-muted">('+responseData.gender[i].total+')</span>';

                    html += '</label>';
                }

                html += '</div>';

                $('#gender_filter').innerHTML = html;

                var gender_elements = document.getElementsByClassName('gender_filter');

                for(var i = 0; i < gender_elements.length; i++)
                {
                    gender_elements[i].onclick = function(){

                        load_product(page = 1, make_query());

                    }
                }
            }

        }

        if(responseData.price)
        {
            if(responseData.price.length > 0)
            {
                var html = '<div class="list-group">';

                for(var i = 0; i < responseData.price.length; i++)
                {
                    html += '<a href="#" class="list-group-item list-group-item-action price_filter" id="'+responseData.price[i].condition+'"><span>&#8377;</span> '+responseData.price[i].name+' <span class="text-muted">('+responseData.price[i].total+')</a>';
                }

                html += '</div>';

                $('#price_filter').innerHTML = html;

                var price_elements = document.getElementsByClassName('price_filter');

                for(var i = 0; i < price_elements.length; i++)
                {
                    price_elements[i].onclick = function()
                    {
                        remove_active_class(price_elements);

                        this.classList.add('active');

                        load_product(page = 1, make_query());
                    }
                }
            }
        }

        if(responseData.brand)
        {
            if(responseData.brand.length > 0)
            {
                var html = '<div class="list-group">';

                for(var i = 0; i < responseData.brand.length; i++)
                {
                    html += '<label class="list-group-item">';

                    html += '<input type="checkbox" class="form-check-input me-1 brand_filter" value="'+responseData.brand[i].name+'" />';

                    html += responseData.brand[i].name + ' <span class="text-muted">('+responseData.brand[i].total+')</span>';

                    html += '</label>';
                }

                html += '</div>';

                $('#brand_filter').innerHTML = html;

                var brand_elements = document.getElementsByClassName("brand_filter");

                for(var i = 0; i < brand_elements.length; i++)
                {
                    brand_elements[i].onclick = function(){

                        load_product(page = 1, make_query());

                    }
                }
            }
        }

    });
}

function make_query()
{
    var query = '';

    var gender_elements = document.getElementsByClassName('gender_filter');

    for(var i = 0; i < gender_elements.length; i++)
    {
        if(gender_elements[i].checked)
        {
            query += '&gender_filter='+gender_elements[i].value+'';
        }
    }

    var price_elements = document.getElementsByClassName('price_filter');

    for(var i = 0; i < price_elements.length; i++)
    {
        if(price_elements[i].matches('.active'))
        {
            query += '&price_filter='+price_elements[i].getAttribute('id')+'';
        }
    }

    var brand_elements = document.getElementsByClassName('brand_filter');

    var brandlist = '';

    for(var i = 0; i < brand_elements.length; i++)
    {
        if(brand_elements[i].checked)
        {
            brandlist += brand_elements[i].value +',';
        }
    }

    if(brandlist != '')
    {
        query += '&brand_filter='+brandlist+'';
    }

    var search_query = $('#search_textbox').value;

    query += '&search_filter='+search_query+'';

    return query;
}

function remove_active_class(element)
{
    for(var i = 0; i < element.length; i++)
    {
        if(element[i].matches('.active'))
        {
            element[i].classList.remove("active");
        }
    }
}

$('#clear_filter').onclick = function(){

    var gender_elements = document.getElementsByClassName('gender_filter');

    for(var count = 0; count < gender_elements.length; count++)
    {
        gender_elements[count].checked = false;
    }

    var price_elements = document.getElementsByClassName('price_filter');

    remove_active_class(price_elements);

    var brand_elements = document.getElementsByClassName('brand_filter');

    for(var count = 0; count < brand_elements.length; count++)
    {
        brand_elements[count].checked = false;
    }

    $('#search_textbox').value = '';

    load_product(1, '');

}

$('#search_button').onclick = function(){

    var search_query = $('#search_textbox').value;

    if(search_query != '')
    {
        load_product(page = 1, make_query());
    }

}
