<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/app.css">
	<title>Mi sitio</title>
</head>
<body>

	<header>

		{{-- <h4>{{ request()->url('/') }}</h4> --}}

		<?php function activeLink($url) {
				return request()->is($url) ? 'active' : '';
			} ?>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Blog</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
				
		      <li class="nav-item {{ activeLink('/') }}">
		        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
		      </li>

		      <li class="nav-item {{ activeLink('saludos*') }}">
		        <a class="nav-link" href="{{ route('saludos', 'Default') }}">Saludo</a>
		      </li>

		      <li class="nav-item {{ activeLink('mensajes/create') }}">
		        <a class="nav-link" href="{{ route('mensajes.create') }}">Contactos</a>
		      </li>

		      @if (auth()->check())

		        <li class="nav-item {{ activeLink('mensajes*') }}">
		        	<a class="nav-link" href="{{ route('mensajes.index') }}">Mensajes</a>
		      	</li>

		      	@if ( auth()->user()->hasRoles(['admin']) )
		      		<li class="nav-item {{ activeLink('usuarios*') }}">
		        	<a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
		      	</li>
		      	@endif

		      @endif

		    </ul>
			
			<ul class="navbar-nav mr-auto">
		    
		    @if (auth()->guest())			
		      <li class="nav-item {{ activeLink('login') }}">
		        <a class="nav-link" href="/login">Login</a>
		      </li>
		    @else
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          {{ auth()->user()->name }}
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="/logout">Cerrar sesión</a>
		        </div>
		      </li>
		      @endif
		      
		    </ul>	    
		  </div>
		</nav>

	</header>

	<div class="container">

		@yield('contenido')

		<footer>Copyright ® {{ date('Y') }} </footer>

	</div>
	
	<script src="/js/app.js"></script>
</body>
</html>