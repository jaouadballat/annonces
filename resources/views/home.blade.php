@extends('master')

@section('content')

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Buy & Sell Near You </h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
					<div class="short-popular-category-list text-center">
						<h2>Popular Category</h2>
						<ul class="list-inline">
							@foreach(\App\Category::withCount('companies')->orderBy('companies_count', 'desc')->take(4)->get() as $category)
							<li class="list-inline-item">
								<a href="{{ route('category', ['id' => $category->id]) }}"><i class="{{ $category->icon }}"></i> {{ $category->name }}</a></li>
							@endforeach
						</ul>
					</div>
					
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
					<form action="#">
						<div class="row">
							<!-- Store Search -->
							<div class="col-lg-3 col-md-12">
								<div class="block d-flex">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="search" placeholder="Search for company">
								</div>
							</div>
							<div class="col-lg-3 col-md-12">
								<div class="block d-flex">
									<select class="form-control mb-2 mr-sm-2 mb-sm-0" name="category">
										<option value="">Select Category</option>
										@foreach($categories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>
										@endforeach
									</select>
									<!-- <button class="btn btn-main">SEARCH</button> -->
								</div>
							</div>
							<div class="col-lg-3 col-md-12">
								<div class="block d-flex">
									<select class="form-control mb-2 mr-sm-2 mb-sm-0" name="category">
										<option value="">Select City</option>
										@foreach($cities as $city)
											<option value="{{ $city->id }}">{{ $city->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-md-12">
								<div class="block d-flex">
									<button class="btn btn-main">SEARCH</button>
								</div>
							</div>
						</div>
					</form>
					
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Trending Ads</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach(\App\Company::orderBy('created_at', 'desc')->take(3)->get() as $company)

			<div class="col-sm-12 col-lg-4">
				<!-- product card -->
				<div class="product-item bg-light">
					<div class="card">
						<div class="thumb-content">
							<!-- <div class="price">$200</div> -->
							<a href="{{ route('company', ['id' => $company->id]) }}">
								<img class="card-img-top img-fluid" src="{{ Storage::url($company->logo) }}">
							</a>
						</div>
						<div class="card-body">
						    <h4 class="card-title"><a href="{{ route('company', ['id' => $company->id]) }}">{{ $company->name }}</a></h4>
						    <ul class="list-inline product-meta">
						    	<li class="list-inline-item">
						    		<a href="{{ route('category', ['id' => $company->category->id]) }}"><i class="{{ $company->category->icon }}"></i>{{ $company->category->name }}</a>
						    	</li>
						    	<li class="list-inline-item">
						    		<a href="{{ route('company', ['id' => $company->id]) }}"><i class="fa fa-calendar"></i>{{ $company->created_at->toFormattedDateString() }}</a>
						    	</li>
						    </ul>
						    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
						
		</div>
	</div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>All Categories</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
				</div>
				<div class="row">
					<!-- Category list -->
					@foreach($categories as $category)
						<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
							<div class="category-block">
								<div class="header">
									<i class="{{ $category->icon }} icon-bg-{{ $category->id }}"></i> 
									<h4>{{ $category->name }}</h4>
								</div>
								<ul class="category-list" >
									@foreach($category->companies->take(2) as $company)
										<li><a href="{{ route('company', ['id' => $company->id]) }}">{{ $company->name }} </a></li>
									@endforeach
							</div>
						</div> <!-- /Category List -->
						<!-- Category list -->		
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>




<!--============================
=            Footer            =
=============================-->

@endsection