@extends('frontend.layouts.master')

@section('title')
    <title>Home Page</title>
@endsection

@section('css')
    <link href="{{ asset('frontend/home/home.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('frontend/cart_detail/list.js') }}"></script>
    <script src="{{ asset('frontend/home/home.js') }}"></script>
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('frontend.components.sidebar')
                
                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" />
                                <h3>ZOOM</h3>
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
                                
                                <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        @foreach ($productImages as $productImageKey => $productImage)
                                            @if ($productImageKey == 0)
                                                <div class="item active">
                                                    <a href=""><img src="{{ config('app.base_url') . $productImage->image_path }}" alt=""></a>
                                            @elseif ($productImageKey != 0 && $productImageKey % 3 == 0)
                                                </div>
                                                <div class="item">
                                                    <a href=""><img src="{{ config('app.base_url') . $productImage->image_path }}" alt=""></a>
                                            @elseif ( $productImageKey == ( count($productImages) - 1 ) )
                                                    <a href=""><img src="{{ config('app.base_url') . $productImage->image_path }}" alt=""></a>
                                                </div>
                                            @else
                                                    <a href=""><img src="{{ config('app.base_url') . $productImage->image_path }}" alt=""></a>
                                            @endif
                                        @endforeach
                                    </div>

                                <!-- Controls -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="{{ config('app.base_url') . '/'}}eshopper/images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2>{{ $product->name }}</h2>
                                <p>Web ID: {{ $product->id }}</p>
                                <img src="{{ config('app.base_url') . '/'}}eshopper/images/product-details/rating.png" alt="" />
                                <span>
                                    <span>US ${{ $product->price }}</span>
                                    <label>Quantity in stock: 3</label>
                                    {{-- <input type="text" value="3" /> --}}
                                    <button type="button" class="btn btn-fefault cart"
                                            href="javascript:" onclick="addProductToCart({{ $product->id }})">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </span>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> E-SHOPPER</p>
                                <a href=""><img src="{{ config('app.base_url') . '/'}}eshopper/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li><a href="#details" data-toggle="tab">Details</a></li>
                                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="details" >
                                {!! $product->content !!}
                            </div>
                            
                            <div class="tab-pane fade" id="tag" >
                                @foreach ($product->tags as $tag)
                                    {{ $tag->name }} 
                                @endforeach
                                {{-- <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/gallery4.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            
                            <div class="tab-pane fade active in" id="reviews" >
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <p><b>Write Your Review</b></p>
                                    
                                    <form action="#">
                                        <span>
                                            <input type="text" placeholder="Your Name"/>
                                            <input type="email" placeholder="Email Address"/>
                                        </span>
                                        <textarea name="" ></textarea>
                                        <b>Rating: </b> <img src="{{ config('app.base_url') . '/'}}eshopper/images/product-details/rating.png" alt="" />
                                        <button type="button" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div><!--/category-tab-->
                    
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($recommendedProducts as $recommendedProductsKey => $recommendedProduct)
                                    @if ($recommendedProductsKey == 0)
                                        <div class="item active">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="{{ config('app.base_url') . $recommendedProduct->feature_image_path }}" alt="" />
                                                            <h2>${{ $recommendedProduct->price }}</h2>
                                                            <p>{{ $recommendedProduct->name }}</p>
                                                            <button href="javascript:" onclick="addProductToCart({{ $recommendedProduct->id }})" type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @elseif ($recommendedProductsKey != 0 && $recommendedProductsKey % 3 == 0)
                                        </div>
                                        <div class="item">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="{{ config('app.base_url') . $recommendedProduct->feature_image_path }}" alt="" />
                                                            <h2>${{ $recommendedProduct->price }}</h2>
                                                            <p>{{ $recommendedProduct->name }}</p>
                                                            <button href="javascript:" onclick="addProductToCart({{ $recommendedProduct->id }})" type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @elseif ( $recommendedProductsKey == ( count($recommendedProducts) - 1 ) )
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="{{ config('app.base_url') . $recommendedProduct->feature_image_path }}" alt="" />
                                                            <h2>${{ $recommendedProduct->price }}</h2>
                                                            <p>{{ $recommendedProduct->name }}</p>
                                                            <button href="javascript:" onclick="addProductToCart({{ $recommendedProduct->id }})" type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="{{ config('app.base_url') . $recommendedProduct->feature_image_path }}" alt="" />
                                                            <h2>${{ $recommendedProduct->price }}</h2>
                                                            <p>{{ $recommendedProduct->name }}</p>
                                                            <button href="javascript:" onclick="addProductToCart({{ $recommendedProduct->id }})" type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                @endforeach
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>			
                        </div>
                    </div><!--/recommended_items-->
                    
                </div>
            </div>
        </div>
    </section>
@endsection