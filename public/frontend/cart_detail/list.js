// Update Cart Product Quantity and Price
$(function(){
    // Increase item quantity when clicking + button

    $('.cart_quantity_up').on('click', function(event){
        event.preventDefault();
        var cartItemId = $(this).attr('data-itemid');
        var currentQuantity = $('#cart_quantity_input_'+cartItemId).val();
        currentQuantity++;
        $('#cart_quantity_input_'+cartItemId).val(currentQuantity);
        updateItemPrice(currentQuantity, cartItemId);
        updateTotalArea();
    })

    // Decrease item quantity when clicking - button

    $('.cart_quantity_down').on('click', function(event){
        event.preventDefault();
        var cartItemId = $(this).attr('data-itemid');
        var currentQuantity = $('#cart_quantity_input_'+cartItemId).val();
        if(currentQuantity > 1) {
            currentQuantity--;
        }
        $('#cart_quantity_input_'+cartItemId).val(currentQuantity);
        updateItemPrice(currentQuantity, cartItemId);
        updateTotalArea();
    })

    // Change item quantity when modifying quantity input box

    $('.cart_quantity_input').on('change', function(event){
        event.preventDefault();
        var cartItemId = $(this).attr('data-itemid');
        var currentQuantity = $('#cart_quantity_input_'+cartItemId).val();
        $('#cart_quantity_input_'+cartItemId).val(currentQuantity);
        updateItemPrice(currentQuantity, cartItemId);
    })
})

// Delete Product Cart
function deleteProductCart(id) {
    $.ajax({
        url: 'cart/deleteFromCart/' + id,
        type: 'GET',
    }).done(function() {
        $('#cart-product-container-'+id).remove();
    });
    updateTotalArea();
    alertify.success('Item deleted from cart');
}

// Update item price
function updateItemPrice(itemQuantity, id) {
    $.ajax({
        url: 'cart/updateItemPrice/' + id + '/',
        type: 'GET',
        data: {
            itemQuantity: itemQuantity,
        }
    }).done(function(response) {
        $('#cart_item_price_'+id).empty();
        $('#cart_item_price_'+id).html(response);
    });
}

// Update total area
function updateTotalArea() {
    $.ajax({
        url: 'cart/getCart',
        type: 'GET',
    }).done(function(response) {
        $('#cart-sub-total-price').empty();
        $('#cart-sub-total-price').html('$'+response.totalPrice);
        $('#cart-total-quantity').empty();
        $('#cart-total-quantity').html(response.totalQuantity);
        $('#cart-total-price').empty();
        $('#cart-total-price').html('$'+response.totalPrice);
    });
}

// Update checkout total area
function updateTotalArea() {
    $.ajax({
        url: 'cart/getCart',
        type: 'GET',
    }).done(function(response) {
        $('#cart-sub-total-price').empty();
        $('#cart-sub-total-price').html('$'+response.totalPrice);
        $('#cart-total-quantity').empty();
        $('#cart-total-quantity').html(response.totalQuantity);
        $('#cart-total-price').empty();
        $('#cart-total-price').html('$'+response.totalPrice);
    });
}
