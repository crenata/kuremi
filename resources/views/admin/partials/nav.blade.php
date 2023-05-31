<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">
		<img src="{{ asset('public/image/firebase.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">Kuremi
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Anime List</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Genre</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Ongoing</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Jadwal</a>
			</li>
			<!-- <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Dropdown
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li> -->
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		<!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                    <!-- Button trigger modal -->
					<a class="nav-link" id="nav-login-button" href="" data-toggle="modal" data-target="#modal-login">Login</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <!-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> -->
                        <a class="nav-link" id="nav-register-button" href="" data-toggle="modal" data-target="#modal-register">Register</a>
                    @endif
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
	</div>
</nav>

@include('partials.support.modal.auth.login')
@include('partials.support.modal.auth.register')
@include('partials.support.modal.auth.reset')