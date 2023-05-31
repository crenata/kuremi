@extends('pages.download.main')

@section('title', 'Download')

@section('stylesheets')
	{{ Html::style('public/css/pages/download/encrypt.css') }}
@endsection

@section('content')
@endsection

@section('content-container')
	<div class="row">
		<div class="center-block">
			<div class="box-content">
				<div class="text-center">
					<h1><b>Decrypt Redirect</b></h1>
					<center><div class="line"></div></center>
				</div>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla inventore sit vel, saepe repellendus esse quia voluptatum, perspiciatis dolore neque, ab nisi! Error atque, suscipit obcaecati doloremque eaque a facilis.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea fugit iure aut deserunt eum ex labore eaque porro voluptatibus eos, saepe magnam odit quia esse ab id eius, ipsa maiores!
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat consequuntur officia velit nisi et ipsa atque, enim ea itaque tempora ad maxime voluptates accusantium unde eaque amet, repellendus optio incidunt!
				<br>
				<br>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero sequi provident quas et aliquid doloribus, dolorem. Officia cumque delectus possimus quidem est quaerat unde, expedita fugiat animi, atque odio suscipit.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis provident labore adipisci ea, velit quia nulla enim quas omnis. At modi soluta ab ducimus placeat, cumque in quibusdam maxime voluptatum!
				<br>
				<br>
				<div class="text-center">
					<!-- <a href="{{ $decrypt }}" target="_blank">{{ $decrypt }}</a> -->
					<a href="{{ route('user.download.video') }}" target="_blank">{{ $decrypt }}</a>
				</div>
			</div>
			<div class="copyright">
				<p>Copyright
					<span class="fa fa-copyright"></span>
					<a href="">Kuremi</a> - Deign Template By Scranaver - All Rights Reserved
				</p>
			</div>
		</div>
	</div>
@endsection

@section('bottomscript')
	
@endsection