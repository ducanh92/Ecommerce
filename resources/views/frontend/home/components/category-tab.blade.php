<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($parentCategories as $parentCategoriesKey => $parentCategory)
                <li class="{{ $parentCategoriesKey == 0 ? 'active' : ''}}"><a href="#category_{{ strtolower($parentCategory->name) }}" data-toggle="tab">{{$parentCategory->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($parentCategories as $parentCategoriesKey => $parentCategory)
            <div class="tab-pane fade {{ $parentCategoriesKey == 0 ? 'active in' : ''}}" id="category_{{ strtolower($parentCategory->name) }}" >
                @foreach ( $parentCategory->childrenCategories as $childrenCategory )
                    @foreach ( $childrenCategory->products as $childCategoryProduct )
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{ route('product.detail', $childCategoryProduct) }}">
                                            <img src="{{ config('app.base_url') . $childCategoryProduct->feature_image_path }}" alt="" />
                                            <h2>${{ $childCategoryProduct->price }}</h2>
                                            <p>{{ $childCategoryProduct->name }}</p>
                                        </a>
                                        <a href="javascript:" onclick="addProductToCart({{ $childCategoryProduct->id }})" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        @endforeach
    </div>
</div>