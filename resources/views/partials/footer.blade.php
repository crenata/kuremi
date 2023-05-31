<footer>
	<div class="kuremi-footer">
		<hr class="footer-line">
		<div class="footer-heading">
			<div class="about">
				<center>
					<h5 class="title">
						<span class="fa fa-question-circle"></span> About
					</h5>
					<div class="line">
						<div class="left-line"></div>
						<div class="center-line"></div>
						<div class="right-line"></div>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur temporibus, sed rerum adipisci quaerat recusandae dolores magnam laboriosam non, ea autem ullam quis repudiandae! Unde excepturi vitae consequuntur, ut ducimus.</p>
				</center>
				<div class="line">
					<div class="left-line"></div>
					<div class="center-line"></div>
					<div class="right-line"></div>
				</div>
			</div> <!-- .end about -->
		</div> <!-- .end footer-heading -->

		<div class="footer-body">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="recent-anime-tv">
							<h3>
								<span class="fa fa-cog"></span>
								<b>Recent Anime TV</b>
							</h3>
							<div class="line">
								<div class="left-line"></div>
								<div class="right-line"></div>
							</div>
							<div class="list">
								@foreach($recentsTv as $recent_tv)
									<li>
										<a href="{{ route('user.album.show', $recent_tv->album->slug) }}">{{ $recent_tv->album->name }}</a>
									</li>
								@endforeach
							</div>
						</div> <!-- .end recent-anime-tv -->
					</div> <!-- .end col-md-4 -->

					<div class="col-md-4">
						<div class="recent-anime-movie">
							<h3>
								<span class="fa fa-cog"></span>
								<b>Recent Anime Movie</b>
							</h3>
							<div class="line">
								<div class="left-line"></div>
								<div class="right-line"></div>
							</div>
							<div class="list">
								@foreach($recentsTv as $recent_tv)
									<li>
										<a href="{{ route('user.album.show', $recent_tv->album->slug) }}">{{ $recent_tv->album->name }}</a>
									</li>
								@endforeach
							</div>
						</div> <!-- .end recent-anime-movie -->
					</div> <!-- .end col-md-4 -->

					<div class="col-md-4">
						<div class="recent-anime-ova">
							<h3>
								<span class="fa fa-cog"></span>
								<b>Recent Anime OVA</b>
							</h3>
							<div class="line">
								<div class="left-line"></div>
								<div class="right-line"></div>
							</div>
							<div class="list">
								@foreach($recentsOva as $recent_ova)
									<li>
										<a href="{{ route('user.album.show', $recent_ova->album->slug) }}">{{ $recent_ova->album->name }}</a>
									</li>
								@endforeach
							</div>
						</div> <!-- .end recent-anime-movie -->
					</div> <!-- .end col-md-4 -->
				</div> <!-- .row -->
			</div> <!-- .container -->
		</div> <!-- .footer-body -->
	</div> <!-- .kuremi-footer -->
	<div class="copyright">
		<p>Copyright
			<span class="fa fa-copyright"></span>
			<a href="">Kuremi</a> - Deign Template By Scranaver - All Rights Reserved
		</p>
	</div>
</footer>

@yield('bottomscript')