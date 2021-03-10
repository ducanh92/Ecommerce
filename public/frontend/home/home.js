function addProductToCart(id) {
    $.ajax({
        url: 'http://localhost:8000/cart/addToCart/' + id,
        type: 'GET',
    }).done(function() {
        alertify.success('Item added to cart');
    });
}