<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach($featuredProducts as $featuredProduct)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{ route('product.detail', $featuredProduct) }}">
                                <img src="{{ config('app.base_url') . $featuredProduct->feature_image_path }}" alt="" />
                                <h2>${{ number_format($featuredProduct->price) }}</h2>
                                <p>{{ $featuredProduct->name }}</p>
                            </a>
                            <a href="javascript:" onclick="addProductToCart({{ $featuredProduct->id }})" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    
</div><!--features_items-->