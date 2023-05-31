@extends('pages.download.main')

@section('title', 'Download')

@section('stylesheets')
	{{ Html::style('public/css/pages/download/download.css') }}
@endsection

@section('content')
@endsection

@section('content-container')
	<div class="row">
		<div class="center-block">
			<div class="box-content">
				<div class="text-center">
					<h4><b>KUREMI - Owari no Seraph S1 E1 480p.mp4</b></h4>
					<center><div class="line"></div></center>
				</div>
				<div class="info">
					<table>
						<tbody>
							<tr>
								<td>
									<span class="fa-layers fa-stack fa-sm" style="background:MistyRose; border-radius: 4px; border: 1px solid #BCBCBC;">
										<i class="fa fa-file"></i>
									</span>
								</td>
								<td>Filename :</td>
								<td></td>
								<td>KUREMI - Owari no Seraph S1 E1 480p.mp4</td>
							</tr>
							<tr>
								<td>
									<span class="fa-layers fa-stack fa-sm" style="background:MistyRose; border-radius: 4px; border: 1px solid #BCBCBC;">
										<i class="fa fa-hdd"></i>
									</span>
								</td>
								<td>Size :</td>
								<td></td>
								<td>{{ Helper::getFileSizeFromUrl("http://localhost:223/kuremi/public/trailer/20190114e0730a09fc5b941f7bab6818a519d5ca5c3bff88dd44b.mp4") }}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="download">
					<center>
						<a href="http://localhost:223/kuremi/public/trailer/20190114e0730a09fc5b941f7bab6818a519d5ca5c3bff88dd44b.mp4" download="KUREMI - Owari no Seraph S1 E1 480p">Download</a>
					</center>
				</div>
				<br>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero sequi provident quas et aliquid doloribus, dolorem. Officia cumque delectus possimus quidem est quaerat unde, expedita fugiat animi, atque odio suscipit.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis provident labore adipisci ea, velit quia nulla enim quas omnis. At modi soluta ab ducimus placeat, cumque in quibusdam maxime voluptatum!
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