@extends('master')

@section('content')



<section class="blog single-blog section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<article class="single-post">
					<h3>{{ $company->name }}</h3>
					<ul class="list-inline">
						<li class="list-inline-item">Created at: {{ $company->created_at->toFormattedDateString() }}</li>
					</ul>
					<img src="{{ Storage::url($company->logo) }}" alt="article-01">
					<p>{!! $company->description !!}</p>
					<ul class="social-circle-icons list-inline">
				  		<li class="list-inline-item text-center"><a class="fa fa-facebook" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-twitter" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-google-plus" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-pinterest-p" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-linkedin" href=""></a></li>
				  	</ul>
				</article>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- Search Widget -->
					<div class="widget search p-0">
						<div class="input-group">
						    <input type="text" class="form-control" id="expire" placeholder="Search...">
						    <span class="input-group-addon"><i class="fa fa-search"></i></span>
					    </div>
					</div>
					<!-- Category Widget -->
					<div class="widget category">
						<!-- Widget Header -->
						<h5 class="widget-header">All Categories</h5>
						<ul class="category-list">
							@foreach(\App\Category::withCount('companies')->orderBy('companies_count', 'desc')->get() as $category)
								<li><a href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }} <span class="float-right">({{ $category->companies_count }})</span></a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
</section>

@stop