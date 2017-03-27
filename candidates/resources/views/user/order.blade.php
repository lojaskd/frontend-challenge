@extends('base')

@section('title', 'Acompanhar pedidos')

@section('content')
	<main class="container">
		<div class="row">
			@include('user.cards.orders.details')
			@include('user.cards.orders.status')
			@include('user.cards.orders.products')
		</div>
	</main>
@endsection