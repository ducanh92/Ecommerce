@if ($menuCategory->childrenCategories->count())
    <ul role="menu" class="sub-menu">
        @foreach ($menuCategory->childrenCategories as $childrenCategory)
            <li>
                <a href="{{ route('category.products', ['slug' => $childrenCategory->slug, 'category' => $childrenCategory]) }}">{{ $childrenCategory->name }}</a>
                @if ($childrenCategory->childrenCategories->count())
                    @include('frontend.components.submenu', ['menuCategory' => $childrenCategory])
                @endif
            </li>
        @endforeach
    </ul>
@endif
