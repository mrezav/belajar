<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{ url('/') }}" class="navbar-brand">Laravel</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="{{ Set_active::page_active('siswa', Request::segment(1)) }}"><a href="{{ url('siswa') }}">Siswa</a></li>
				<li class="{{ Set_active::page_active('kelas', Request::segment(1)) }}"><a href="{{ url('kelas') }}">Kelas</a></li>	
				<li class="{{ Set_active::page_active('email', Request::segment(1)) }}"><a href="{{ url('email') }}">Kirim email</a></li>				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
				<li class="dropdown"><a href="" data-toggle="dropdown">{{ Auth::user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{ url('logout') }}">Logout</a></li>
					</ul>
				</li>
				@endif
			</ul>
		</div>
	</div>
</nav>