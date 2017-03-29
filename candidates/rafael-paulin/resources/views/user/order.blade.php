@extends('base')

@section('title', 'Acompanhar pedidos')

@section('content')
	<main class="container">
		<div class="row">
			@include('user.cards.orders.details', ['order' => $order])
			@include('user.cards.orders.status')
			@include('user.cards.orders.products', ['products' => $order['products']])
		</div>
	</main>
@endsection