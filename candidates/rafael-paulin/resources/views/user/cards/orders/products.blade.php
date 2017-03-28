<div class="col s12 m5">
	<article class="card">
		<div class="card-content">
			<h3 class="card-title">Produtos</h3>
			@foreach($products as $product)
				<section class="product">
					<header>
						<figure>
							<img src="{{$product['image']}}">
						</figure>
						<h4>{{$product['name']}}</h4>
						<span class="subtitle"><small>Cód: {{$product['id']}}</small></span>
					</header>
					<main>
						<dl class="horizontal">
							<dt><span class="subtitle">Quantidade:</span></dt>
							<dd><span class="data">{{$product['qtd']}}</span></dd>
							
							<dt><span class="subtitle">Preço total:</span></dt>
							<dd><span class="data">R$ {{$product['total_value']}}</span></dd>

							<dt><span class="subtitle">Nota fiscal:</span></dt>
							<dd><span class="data"><a href="{{$product['invoice_link']}}">Download disponível</a></span></dd>
							
							<dt><span class="subtitle">Status atual:</span></dt>
							<dd>
								<ul class="collapsible" data-collapsible="accordion">
									<li>
										<div class="collapsible-header">
											<span class="data text-success">{{$product['status']}}</span> <i class="fa fa-info" aria-hidden="true"></i>
										</div>
										<div class="collapsible-body">
											<ul class="timeline-horizontal collapsible" data-collapsible="accordion">
												<li>
													<div class="collapsible-header @if($product['status_id'] > 0) done @elseif($product['status_id'] == 0) ongoing @else disabled @endif">
														<i class="fa fa-industry" aria-hidden="true"></i>
													</div>
													<div class="collapsible-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi deleniti nam harum autem vitae facilis impedit optio saepe perspiciatis maxime, consectetur sed earum soluta! Perspiciatis voluptas quisquam recusandae officia dolore.</div>
												</li>
												<li>
													<div class="collapsible-header @if($product['status_id'] > 1) done @elseif($product['status_id'] == 1) ongoing @else disabled @endif">
														<i class="fa fa-archive" aria-hidden="true"></i>
													</div>
													<div class="collapsible-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste corrupti perferendis mollitia. Cumque assumenda pariatur quasi corrupti nostrum excepturi voluptatum obcaecati consequuntur molestiae. Non, inventore cumque quidem magni veritatis! Aperiam.</div>
												</li>
												<li>
													<div class="collapsible-header @if($product['status_id'] > 2) done @elseif($product['status_id'] == 2) ongoing @else disabled @endif">
														<i class="fa fa-truck fa-flip-horizontal" aria-hidden="true"></i>
													</div>
													<div class="collapsible-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore labore qui obcaecati aperiam optio ullam, ratione culpa possimus reprehenderit dignissimos aut sequi maxime doloremque earum asperiores repellendus, accusamus molestiae atque.</div>
												</li>
												<li>
													<div class="collapsible-header @if($product['status_id'] == 3) ongoing @else disabled @endif">
														<i class="fa fa-check" aria-hidden="true"></i>
													</div>
													<div class="collapsible-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae ratione iusto harum quo deleniti pariatur voluptatibus sint doloribus perspiciatis. Voluptas, fugit! Earum mollitia, pariatur consequatur eligendi quis! Dolorum, necessitatibus, magnam?</div>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</dd>
						</dl>
					</main>
				</section>
			@endforeach
		</div>
	</article>
</div>