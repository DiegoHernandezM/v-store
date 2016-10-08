@extends('store.template')

@section('content')
	<div class="container text-center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart">&nbsp; </i> Detalle del producto</h1>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="product-block">
					<img src="{{ $product->image }}" width="350px" height="400px">
				</div>
			</div>
			<div class="col-md-6">
				<div class="product-block">
					<h3>{{$product->name}}</h3><hr>
					<div class="product-info panel">
						<p>{{$product->description}}</p>
						<h3><span class="label label-success">Precio: $ {{number_format($product->price,2)}}</span></h3>
						<p><a href="#" class="btn btn-warning btn-block">¡La quiero! &nbsp;<i class="fa fa-cart-plus fa-2x"></i></a></p>
					</div>
				</div>
			</div>
			<a href="{{ route('home')}}" class="btn btn-primary">
			<i class="fa fa-chevron-circle-left"></i>&nbsp;Regresar
			</a><br>
		</div>
		
	</div></br></br>
@stop