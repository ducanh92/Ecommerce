<div class="recommended_items">
    <h2 class="title text-center">recommended items</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            
                @foreach($recommendedProducts as $recommendedKey => $recommendedProduct)
                    @if($recommendedKey == 0)
                    <div class="item active">
                    @endif

                    @if($recommendedKey % 3 == 0 && $recommendedKey > 0)
                    <div class="item">
                    @endif

                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{ route('product.detail', $recommendedProduct) }}">
                                            <img src="{{ config('app.base_url') . $recommendedProduct->feature_image_path }}" alt="" />
                                            <h2>${{ $recommendedProduct->price }}</h2>
                                            <p>{{ $recommendedProduct->name }}</p>
                                        </a>
                                        <a href="javascript:" onclick="addProductToCart({{ $recommendedProduct->id }})" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    @if($recommendedKey % 3 == 2)
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>			
    </div>
</div>