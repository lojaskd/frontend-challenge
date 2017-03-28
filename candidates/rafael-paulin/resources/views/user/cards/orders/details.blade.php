<div class="col s12 m3">
	<article class="card">
		<div class="card-content">
			<h3 class="card-title">Detalhes do pedido</h3>
			<dl>
				<dt><h4 class="subtitle">Status Atual</h4></dt>
				<dd><span class="data text-success">{{$order['status']}}</span></dd>

				<dt><h4 class="subtitle">Nº do pedido</h4></dt>
				<dd><span class="data">{{$order['id']}}</span></dd>

				<dt><h4 class="subtitle">Produtos</h4></dt>
				<dd>
					<ul id="itensStatus"class="collapsible" data-collapsible="accordion">
						<li>
							<div class="collapsible-header">
								<span class="data">{{count($order['products'])}}</span> <i class="fa fa-caret-right" aria-hidden="true"></i>
							</div>
							<div class="collapsible-body grayBox">
								@php ($status0 = 0)
								@php ($status1 = 0)
								@php ($status2 = 0)
								@php ($status3 = 0)
								@foreach ($order['products'] as $product)
									@if($product['status_id'] == 0)
										@php ($status0++)
									@elseif($product['status_id'] == 1)
										@php ($status1++)
									@elseif($product['status_id'] == 2)
										@php ($status2++)
									@elseif($product['status_id'] == 3)
										@php ($status3++)
									@endif
								@endforeach
								@if($status0 > 0)
									<span class="prodStatus">{{$status0}} @if($status0 > 1)itens enviados @else item enviado @endif para a fábrica</span>
								@endif
								@if($status1 > 0)
									<span class="prodStatus">{{$status0}} @if($status1 > 1)itens @else item @endif em produção</span>
								@endif
								@if($status2 > 0)
									<span class="prodStatus">{{$status0}} @if($status2 > 1)itens @else item @endif com a transportadora</span>
								@endif
								@if($status3 > 0)
									<span class="prodStatus">{{$status0}} @if($status3 > 1)itens @else item @endif entregues</span>
								@endif
							</div>
						</li>
					</ul>
				</dd>
				<dt><h4 class="subtitle">Data do Pedido</h4></dt>
				<dd>
					<span class="data">
						<time datetime="{{$order['ordered_on']['timestamp']}}">{{$order['ordered_on']['day']}}/{{$order['ordered_on']['month']}}/{{$order['ordered_on']['year']}}</time>
					</span>
				</dd>
				<dt><h4 class="subtitle">Valor Total</h4></dt>
				<dd><span class="data">R$ {{$order['total_value']}}</span></dd>
				<dt><h4 class="subtitle">Forma de Pagamento</h4></dt>
				<dd><span class="data">{{$order['payment_method']}}</span></dd>
				<dt><h4 class="subtitle">Prazo de Entrega</h4></dt>
				<dd>
					<span class="data">
						De 
						<time datetime="{{$order['delivery_estimate']['from']['timestamp']}}">
							{{$order['delivery_estimate']['from']['day']}}/{{$order['delivery_estimate']['from']['month']}}/{{$order['delivery_estimate']['from']['year']}}
						</time> 
						a 
						<time datetime="{{$order['delivery_estimate']['to']['timestamp']}}">
							{{$order['delivery_estimate']['to']['day']}}/{{$order['delivery_estimate']['to']['month']}}/{{$order['delivery_estimate']['to']['year']}}
						</time>
					</span>
				</dd>
				<dt><h4 class="subtitle">Endereço de entrega:</h4></dt>
				<dd>
					<span class="data">
						<p>{{$order['address']['street']}} nº {{$order['address']['number']}}, {{$order['address']['comp']}}</p>
						<p>{{$order['address']['cep']}} | {{$order['address']['neighborhood']}}</p>
						<p>{{$order['address']['city']}} - {{$order['address']['state']}}</p>
					</span>
				</dd>
			</dl>
		</div>
	</article>
</div>