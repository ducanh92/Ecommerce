<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
        @foreach ($menuCategories as $menuCategory)
            <li class="dropdown">
                <a href="#">{{ $menuCategory->name }}
                    @if ($menuCategory->childrenCategories->count())
                        <i class="fa fa-angle-down"></i>
                    @endif
                </a>
                
                @include('frontend.components.submenu', ['menuCategory' => $menuCategory])

            </li>
        @endforeach

        <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
</div>