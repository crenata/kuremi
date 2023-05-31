<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ asset('public/plugin/AdminLTE-2.4.5/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Alexander Pierce</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">

			<li class="treeview {{ Request::is('admin') ? 'active' : '' }}">
				<a href="{{ route('admin.home') }}">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-book"></i> <span>Documentation</span>
				</a>
			</li>

			<li class="treeview {{ Request::is('admin/user') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-users"></i> <span>Users</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="#">
							<i class="fa fa-circle-o"></i> <span>Add User</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-circle-o"></i> <span>View Users</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ Request::is('admin/status', 'admin/status/create') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-signal"></i> <span>Status</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('status.create') }}">
							<i class="fa fa-circle-o"></i> <span>Add Status</span>
						</a>
					</li>
					<li>
						<a href="{{ route('status.index') }}">
							<i class="fa fa-circle-o"></i> <span>View Status</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ Request::is('admin/musim', 'admin/musim/create') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-bolt"></i> <span>Musim</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('musim.create') }}">
							<i class="fa fa-circle-o"></i> <span>Add Musim</span>
						</a>
					</li>
					<li>
						<a href="{{ route('musim.index') }}">
							<i class="fa fa-circle-o"></i> <span>View Musims</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ Request::is('admin/genre', 'admin/genre/create') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-align-center"></i> <span>Genres</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('genre.create') }}">
							<i class="fa fa-circle-o"></i> <span>Add Genre</span>
						</a>
					</li>
					<li>
						<a href="{{ route('genre.index') }}">
							<i class="fa fa-circle-o"></i> <span>View Genres</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ Request::is('admin/type', 'admin/type/create') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-paperclip"></i> <span>Type Anime</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('type.create') }}">
							<i class="fa fa-circle-o"></i> <span>Add Type</span>
						</a>
					</li>
					<li>
						<a href="{{ route('type.index') }}">
							<i class="fa fa-circle-o"></i> <span>View Types</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ Request::is('admin/day', 'admin/day/create') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-calendar"></i> <span>Days</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('day.create') }}">
							<i class="fa fa-circle-o"></i> <span>Add Day</span>
						</a>
					</li>
					<li>
						<a href="{{ route('day.index') }}">
							<i class="fa fa-circle-o"></i> <span>View Days</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ Request::is('admin/album', 'admin/album/create') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-suitcase"></i> <span>Albums</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('album.create') }}">
							<i class="fa fa-circle-o"></i> <span>Add Album</span>
						</a>
					</li>
					<li>
						<a href="{{ route('album.index') }}">
							<i class="fa fa-circle-o"></i> <span>View Albums</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ Request::is('admin/negara', 'admin/negara/create') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-user"></i> <span>Negaras</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('negara.create') }}">
							<i class="fa fa-circle-o"></i> <span>Add Negara</span>
						</a>
					</li>
					<li>
						<a href="{{ route('negara.index') }}">
							<i class="fa fa-circle-o"></i> <span>View Negaras</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ Request::is('admin/peran', 'admin/peran/create') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-user"></i> <span>Perans</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('peran.create') }}">
							<i class="fa fa-circle-o"></i> <span>Add Peran</span>
						</a>
					</li>
					<li>
						<a href="{{ route('peran.index') }}">
							<i class="fa fa-circle-o"></i> <span>View Perans</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ Request::is('admin/insight', 'admin/insight/create') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-user"></i> <span>Insights</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('insight.create') }}">
							<i class="fa fa-circle-o"></i> <span>Add Insight</span>
						</a>
					</li>
					<li>
						<a href="{{ route('insight.index') }}">
							<i class="fa fa-circle-o"></i> <span>View Insights</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ Request::is('admin/video', 'admin/video/create') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-video-camera"></i> <span>Videos</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ route('video.create') }}">
							<i class="fa fa-circle-o"></i> <span>Upload Video</span>
						</a>
					</li>
					<li>
						<a href="{{ route('video.index') }}">
							<i class="fa fa-circle-o"></i> <span>View Videos</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="{{ Request::is('admin/comment') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-comment"></i> <span>Comment</span>
				</a>
			</li>

			<li class="{{ Request::is('admin/help') ? 'active' : '' }}">
				<a href="#">
					<i class="fa fa-question-circle"></i> <span>Help</span>
				</a>
			</li>

			<li>
				<a href="{{ route('admin.logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					<i class="fa fa-sign-out"></i> <span>Sign Out</span>
				</a>
				<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>

		</ul>
	</section> <!-- .sidebar -->
</aside>