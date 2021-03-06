@extends('master')

@section('content')

<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Results For "{{ $city->name }}"</h2>
					<p>Results on {{ \Carbon\Carbon::now()->toFormattedDateString() }}</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
						<h4 class="widget-header">All Category</h4>
						<ul class="category-list">
							@foreach(\App\Category::withCount('companies')->orderBy('companies_count', 'desc')->get() as $cat)
							<li><a href="{{ route('category', ['category' => $cat->id]) }}">{{ $cat->name }} <span>{{ $cat->companies_count }}</span></a></li>
							@endforeach
						</ul>
					</div>
					<div class="widget category-list">
						<h4 class="widget-header">Cities</h4>
						<ul class="category-list">
								@foreach(\App\City::withCount('companies')->orderBy('companies_count', 'desc')->take(6)->get() as $c)
								<li><a href="{{ route('city', ['id' => $c->id]) }}">{{ $c->name }} <span>{{ $c->companies_count}}</span> </a></li>
								@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="product-grid-list">
					<div class="row mt-30">
						@foreach($city->companies as $company)
							<div class="col-sm-12 col-lg-4">
				<!-- product card -->
				<div class="product-item bg-light">
					<div class="card">
						<div class="thumb-content">
							<!-- <div class="price">$200</div> -->
							<a href="">
								<img class="card-img-top img-fluid" src="{{ Storage::url($company->logo) }}">
							</a>
						</div>
						<div class="card-body">
						    <h4 class="card-title"><a href="">{{ $company->name }}</a></h4>
						    <ul class="list-inline product-meta">
						    	<li class="list-inline-item">
						    		<a href=""><i class="{{ $company->category->icon }}"></i>{{ $company->category->name }}</a>
						    	</li>
						    	<li class="list-inline-item">
						    		<a href=""><i class="fa fa-calendar"></i>{{ $company->created_at->toFormattedDateString() }}</a>
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
			</div>
		</div>
	</div>
</section>

@stop