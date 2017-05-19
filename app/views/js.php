<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url; ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url; ?>dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- DataTable -->
<script src="<?php echo base_url; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url; ?>plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url; ?>dist/js/demo.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		//generate menu
		$.ajax( {
			url: '<?php echo base_url; ?>handler/getmenu',
			cache: false,
			success: function(handler) {
				$('#sidebar-menu').append(handler);
			}
		} )

		$('.content-wrapper').load('<?php echo base_url; ?>handler/getpage');
	});

	function oppage(link) {
		$('.content-wrapper').empty().load('<?php echo base_url; ?>handler/getpage/'+link);
	}
</script>