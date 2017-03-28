<!DOCTYPE html>
<html html lang="pt-BR">
	<head>
		<title>LojasKD: Sua Loja de Móveis Online! - @yield('title')</title>
		@include('base.meta')

		<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
		<script src="https://use.fontawesome.com/56e23b0af1.js"></script>

		@include('base.styles')
	</head>
	<body class="@yield('bodyClass')">
		@include('base.header')

		@yield('content')

		@include('base.footer')

		@include('base.scripts')
	</body>
</html>