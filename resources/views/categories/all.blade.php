<x-app title="{{$category->name}}">

	<div class="defaultContainer my-5 ">
		<div class="d-flex align-items-center justify-content-center ">
			<h1 class="h2 m-3">Todo acerca de {{ $category->name }}</h1>
		</div>
		<div class="row justify-content-start gx-1 gy-2 m-3"> 
		 	@foreach ($products as $product)
			 <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-2">
				<a href="{{route('products.info', $product->id)}}" class="text-decoration-none text-reset">
					<div class="card shadow-sm h-100" style="max-width: 180px;">
						<img src="{{ $product->file->route }}" class="card-img-top img-fluid" alt="imagen-producto" style="object-fit: cover; height: 150px;">
						<div class="card-body text-center">
							<h2 class="card-title h6 fw-bold product-title">{{ $product->name }}</h2>
							<p class="card-text product-details" style="font-size: 0.9rem;">{{ $product->details }}.</p>
							<h3 class="card-text fs2">${{ $product->price }}.</h3>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div> 
	</div>
</x-app>