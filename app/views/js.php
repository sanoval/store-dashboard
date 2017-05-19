<!-- jQuery 2.2.3 -->
<script src="/public/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/public/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/public/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/public/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="/public/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- DataTable -->
<script src="/public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- jvectormap -->
<script src="/public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="/public/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/public/dist/js/demo.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		//generate menu
		$.ajax( {
			url: '/public/handler/getmenu',
			cache: false,
			success: function(handler) {
				$('#sidebar-menu').append(handler);
			}
		} )

		$('.content-wrapper').load('/public/handler/getpage');
	});

	function oppage(link) {
		$('.content-wrapper').empty().load('/public/handler/getpage/'+link);
	}
</script>