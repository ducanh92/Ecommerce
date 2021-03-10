{{-- @foreach ($cart->products as $cartItemId => $cartItem)
    <tr>
        <td class="cart_product">
            <a href=""><img src="{{ config('app.base_url') . $cartItem['data']->feature_image_path }}" alt=""></a>
        </td>
        <td class="cart_description">
            <h4><a href="">{{ $cartItem['data']->name }}</a></h4>
            <p>Product ID: {{ $cartItemId }}</p>
        </td>
        <td class="cart_price">
            <p>${{ $cartItem['price'] }}</p>
        </td>
        <td class="cart_quantity">
            <div class="cart_quantity_button">
                <a class="cart_quantity_up" data-itemid="{{ $cartItemId }}" href=""> + </a>
                <input class="cart_quantity_input" id="cart_quantity_input_{{ $cartItemId }}" type="text"
                    name="quantity" value="{{ $cartItem['quantity'] }}" autocomplete="off" size="2">
                <a class="cart_quantity_down" data-itemid="{{ $cartItemId }}" href=""> - </a>
            </div>
        </td>
        <td class="cart_total">
            <p class="cart_total_price">${{ $cartItem['price'] * $cartItem['quantity'] }}</p>
        </td>
        <td class="cart_delete">
            <a class="cart_quantity_delete" onclick="deleteProductCart({{ $cartItemId }})" href="javascript:"><i
                    class="fa fa-times"></i></a>
        </td>
    </tr>
@endforeach --}}
@foreach ($cart->products as $cartItemId => $cartItem)
<tr id="cart-product-container-{{$cartItemId}}">
    <td class="cart_product">
        <a href=""><img src="{{ config('app.base_url') . $cartItem['data']->feature_image_path }}" alt=""></a>
    </td>
    <td class="cart_description">
        <h4><a href="">{{ $cartItem['data']->name }}</a></h4>
        <p>Product ID: {{ $cartItemId }}</p>
    </td>
    <td class="cart_price">
        <p>${{ $cartItem['price'] }}</p>
    </td>
    <td class="cart_quantity">
        <div class="cart_quantity_button">
            <a class="cart_quantity_up" data-itemid="{{ $cartItemId }}" href=""> + </a>
            <input class="cart_quantity_input" data-itemid="{{ $cartItemId }}" id="cart_quantity_input_{{ $cartItemId }}" type="text" name="quantity" value="{{ $cartItem['quantity'] }}" autocomplete="off" size="2">
            <a class="cart_quantity_down" data-itemid="{{ $cartItemId }}" href=""> - </a>
        </div>
    </td>
    <td class="cart_total">
        <p class="cart_total_price"><span id="cart_item_price_{{ $cartItemId }}">{{ $cartItem['price'] *  $cartItem['quantity'] }}<span></p>
    </td>
    <td class="cart_delete">
        <a class="cart_quantity_delete" onclick="deleteProductCart({{ $cartItemId }})" href="javascript:"><i class="fa fa-times"></i></a>
    </td>
</tr>
@endforeach