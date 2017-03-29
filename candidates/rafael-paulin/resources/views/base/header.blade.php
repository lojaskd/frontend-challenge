<header class="container">
	@if(Request::is('login'))
		<div class="row">
			<div id="login-logo" class="col s12">
				<figure>
					<img src="/img/footer-logo.png" alt="LojasKD.com.br">
				</figure>
			</div>
		</div>
	@else
		<nav>
			<div class="nav-wrapper">
				<div class="brand-logo">
						Acompanhar Pedido<br>
						<small><a href="http://www.lojasKD.com.br">LojasKD.com.br</a></small>
				</div>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li>
						<a href="#">Login/Cadastro <i class="fa fa-external-link" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="#">Atendimento <i class="fa fa-external-link" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="#">Promoções <i class="fa fa-external-link" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="#">Sair <i class="fa fa-external-link" aria-hidden="true"></i></a>
					</li>
				</ul>
			</div>
		</nav>
	@endif
</header>