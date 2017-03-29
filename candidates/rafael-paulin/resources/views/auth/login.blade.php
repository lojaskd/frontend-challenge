@extends('base')

@section('title', 'Acompanhar pdido | Login')

@section('bodyClass', 'inverse')
@section('content')
	<main class="container">
		<div class="row">
			<div class="col s12 m4 offset-m4">
				<article class="card">
					<div class="card-content">
						<h2 class="card-title">Acompanhar pedido</h2>
						<form id='acompanhar' method="POST" action="{{url('/fakelogin')}}">
							{{ csrf_field() }}
							<div class="input-field">
								<input id="orderNumber" name="orderNumber" type="text" required>
								<label for="orderNumber">Número do pedido</label>
							</div>
							<div class="input-field">
								<input id="cpfCnpj" name="cpfCnpj" type="text" required>
								<label for="cpfCnpj">CPF ou CNPJ</label>
							</div>
							<div class="input-field">
								<button class="btn" type="submit" name="action">Acompanhar</button>
							</div>
						</form>
						<footer class="center-align">
							<a href="http://www.lojaskd.com.br">LojasKD.com.br</a>
						</footer>
					</div>
				</article>
			</div>
		</div>
	</main>
@endsection
@section('extra-scripts')
	<script>
		jQuery.validator.addMethod("cpfCnpjLength", function(value, element, param) {
			return this.optional(element) || value.length == param[0] || value.length == param[1];
		}, "mensagem qualquer");

		$(document).ready(function(){
			$('#acompanhar').validate({
				errorPlacement: function(error, element) {
					error.insertAfter( element.parent());
				},
				rules: {
					orderNumber: {
						required: true,
						number: true
					},
					cpfCnpj: {
						required: true,
						cpfCnpjLength: [14, 18]
					}
				},
				messages: {
					orderNumber: {
						required: 'Esse campo não pode ficar em branco',
						number: 'Por favor, insira somente números'
					},
					cpfCnpj: {
						required: 'Esse campo não pode ficar em branco',
						cpfCnpjLength: 'Este campo deve conter 11 (CPF) ou 14 (CNPJ) dígitos',
					}
				},
				submitHandler: function(form) {
					form.submit();
				},
			});

			$('#cpfCnpj').mask('00000-000', {
				onKeyPress: function(cpfCnpj, e, field, options){
					var masks = ['000.000.000-00Z', '00.000.000/0000-00'];
					mask = (cpfCnpj.length < 15) ? masks[0] : masks[1];
					$('#cpfCnpj').mask(mask, options);
				},
			    translation: {
    				'Z': {
						pattern: /[0-9]/,
						optional: true
					}
				}
			});
		});
	</script>
@endsection