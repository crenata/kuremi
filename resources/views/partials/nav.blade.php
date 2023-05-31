<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="{{ route('home') }}">
		<img src="{{ asset('public/image/firebase.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">Kuremi
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('home') }}">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('animelist') }}">Anime List</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('genres') }}">Genre</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('ongoings') }}">Ongoing</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('jadwal') }}">Jadwal</a>
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
		{{ Form::open(array('route' => 'search', 'class' => 'form-inline my-2 my-lg-0', 'method' => 'get')) }}
			{{ Form::text('keyword', null, array('class' => 'form-control mr-sm-2', 'placeholder' => 'Search')) }}
			{{ Form::submit('Search', array('class' => 'btn btn-outline-success my-2 my-sm-0')) }}
		{{ Form::close() }}
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
                <li class="nav-item dropdown history-dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="history-tab dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            			<div class="history">
            				<ul class="nav nav-tabs" id="myTab" role="tablist">
            					<li class="nav-item">
            						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
            					</li>
            					<li class="nav-item">
            						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            					</li>
            				</ul>
            				<div class="tab-content" id="myTabContent">
            					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            						<p>This is Tab 1</p>
            					</div>
            					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            						<p>This is Tab 2</p>
            					</div>
            				</div>
            			</div>
                    	<div class="dropdown-divider"></div>
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
<script type="text/javascript">
	$('.history-tab').click('.nav-tabs a', function() {
		$(this).closest('.dropdown').addClass('dontClose');
	});
	$('.history-dropdown').on('hide.bs.dropdown', function(e) {
		if ($(this).hasClass('dontClose')) {
			e.preventDefault();
		}
		$(this).removeClass('dontClose');
	});
</script>
@include('partials.support.modal.auth.login')
@include('partials.support.modal.auth.register')
@include('partials.support.modal.auth.reset')