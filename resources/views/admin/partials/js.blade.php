{{ Html::script('public/js/jquery-3.3.1.min.js') }}
{{ Html::script('public/plugin/select2-4.0.3/dist/js/select2.min.js') }}
{{ Html::script('public/plugin/plyr-3.4.4/dist/plyr.js') }}
{{ Html::script('public/plugin/plyr-3.4.4/dist/plyr.polyfilled.js') }}
{{ Html::script('public/js/popper.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/jquery-ui/jquery-ui.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/raphael/raphael.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/morris.js/morris.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/jquery-knob/dist/jquery.knob.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/moment/min/moment.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/fastclick/lib/fastclick.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/dist/js/adminlte.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/dist/js/pages/dashboard.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/dist/js/demo.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/datatables.net/js/jquery.dataTables.min.js') }}
{{ Html::script('public/plugin/AdminLTE-2.4.5/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}

<!-- {{ Html::script('public/plugin/Semantic-UI-CSS-master/semantic.min.js') }} -->

@yield('bottom-script')

<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>

<script type="text/javascript">
	$("#table-type1").DataTable();
	$("#table-type2").DataTable({
		'paging': true,
		'lengthChange': false,
		'searching': false,
		'ordering': true,
		'info': true,
		'autoWidth': false
	});
</script>