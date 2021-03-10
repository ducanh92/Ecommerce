@extends('frontend.layouts.master')

@section('title')
    <title>Home Page</title>
@endsection

@section('css')
	<link href="{{ asset('frontend/home/home.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/home/style.css') }}" rel="stylesheet">
@endsection

@section('js')
	<script src="{{ asset('frontend/home/home.js') }}"></script>
@endsection

@section('content')

	@include('frontend.home.components.slider')

	<section>
		<div class="container">
			<div class="row">
				@include('frontend.components.sidebar')
				
				<div class="col-sm-9 padding-right">

					<!--features-products-->
					@include('frontend.home.components.features-products')
					<!--features-products-->

					<!--category-tab-->
					@include('frontend.home.components.category-tab')
					<!--/category-tab-->

					<!--recommended_items-->
					@include('frontend.home.components.recommended-products')
					<!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>

@endsection