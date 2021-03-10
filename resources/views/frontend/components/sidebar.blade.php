<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-products-->
            @foreach($parentCategories as $parentCategory)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            @if( $parentCategory->childrenCategories->count() )
                                <a data-toggle="collapse" data-parent="#accordian" href="#{{ strtolower($parentCategory->name) }}">
                                    <span class="badge pull-right">
                                            <i class="fa fa-plus"></i>
                                    </span>
                                    {{ $parentCategory->name }}
                                </a>
                            @else
                                <a href="#">
                                    {{ $parentCategory->name }}
                                </a>
                            @endif
                        </h4>
                    </div>
                    <div id="{{ strtolower($parentCategory->name) }}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($parentCategory->childrenCategories as $childrenCategory)
                                    <li><a href="{{ route('category.products', ['slug' => $childrenCategory->slug, 'category' => $childrenCategory]) }}">{{ $childrenCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--/category-products-->
    
    </div>
</div>