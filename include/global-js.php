<?php
if (!defined('WEB_ROOT')) {
	header('Location: ../index.php');
	exit;
}
?>
	<!-- ===== jQuery ===== -->
    <script src="<?php echo WEB_ROOT; ?>plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- ===== Bootstrap JavaScript ===== -->
    <script src="<?php echo WEB_ROOT; ?>bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="<?php echo WEB_ROOT; ?>js/jquery.slimscroll.js"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="<?php echo WEB_ROOT; ?>js/waves.js"></script>
	<script src="<?php echo WEB_ROOT; ?>plugins/components/toast-master/js/jquery.toast.js"></script>
	<script src="<?php echo WEB_ROOT; ?>js/toastr.js"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="<?php echo WEB_ROOT; ?>js/sidebarmenu.js"></script>
    <!-- ===== Custom JavaScript ===== -->
    <script src="<?php echo WEB_ROOT; ?>js/custom.js"></script>
    <!-- ===== Plugin JS ===== -->
    <script src="<?php echo WEB_ROOT; ?>plugins/components/chartist-js/dist/chartist.min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>plugins/components/moment/moment.js"></script>
    <script src="<?php echo WEB_ROOT; ?>plugins/components/fullcalendar/fullcalendar.js"></script>
    <script src="<?php echo WEB_ROOT; ?>js/db2.js"></script>
	<script src="<?php echo WEB_ROOT; ?>plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
	<script src="<?php echo WEB_ROOT; ?>plugins/components/switchery/dist/switchery.min.js"></script>
	<script src="<?php echo WEB_ROOT; ?>plugins/components/custom-select/custom-select.min.js" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT; ?>plugins/components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT; ?>plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	<script src="<?php echo WEB_ROOT; ?>plugins/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="sweetalert2.min.js"></script>
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
	
	<script>
	jQuery(document).ready(function() {
		// Switchery
		var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
		$('.js-switch').each(function() {
			new Switchery($(this)[0], $(this).data());
		});
		// For select 2
		$(".select2").select2();
		$('.selectpicker').selectpicker();
		//Bootstrap-TouchSpin
		$(".vertical-spin").TouchSpin({
			verticalbuttons: true,
			verticalupclass: 'ti-plus',
			verticaldownclass: 'ti-minus'
		});
		var vspinTrue = $(".vertical-spin").TouchSpin({
			verticalbuttons: true
		});
		if (vspinTrue) {
			$('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
		}
		$("input[name='tch1']").TouchSpin({
			min: 0,
			max: 100,
			step: 0.1,
			decimals: 2,
			boostat: 5,
			maxboostedstep: 10,
			postfix: '%'
		});
		$("input[name='tch2']").TouchSpin({
			min: -1000000000,
			max: 1000000000,
			stepinterval: 50,
			maxboostedstep: 10000000,
			prefix: '$'
		});
		$("input[name='tch3']").TouchSpin();
		$("input[name='tch3_22']").TouchSpin({
			initval: 40
		});
		$("input[name='tch5']").TouchSpin({
			prefix: "pre",
			postfix: "post"
		});

	});
	</script>
    <script>
    $(function() {
        $('#myTable').DataTable();

        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],

            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
     $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            // 'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
	
	$('#hof7').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t2').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t3').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t4').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t5').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t6').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t7').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t8').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t9').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t10').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t11').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t12').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t13').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t14').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t15').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t16').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t17').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t18').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t19').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t20').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t21').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t22').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t24').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t25').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t26').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t27').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t28').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t29').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
	
	$('#t30').DataTable({
        dom: 'Bfrtip',
        buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
        ]
    });
    </script>
	
	<script type="text/javascript">
    //Alerts
    $(".myadmin-alert .closed").click(function(event) {
        $(this).parents(".myadmin-alert").fadeToggle(350);
        return false;
    });
    /* Click to close */
    $(".myadmin-alert-click").click(function(event) {
        $(this).fadeToggle(350);
        return false;
    });
    $(".showtop").click(function() {
        $(".alerttop").fadeToggle(350);
    });
    $(".showtop2").click(function() {
        $(".alerttop2").fadeToggle(350);
    });
    /** Alert Position Bottom  **/
    $(".showbottom").click(function() {
        $(".alertbottom").fadeToggle(350);
    });
    $(".showbottom2").click(function() {
        $(".alertbottom2").fadeToggle(350);
    });
    /** Alert Position Top Left  **/
    $("#showtopleft").click(function() {
        $("#alerttopleft").fadeToggle(350);
    });
    /** Alert Position Top Right  **/
    $("#showtopright").click(function() {
        $("#alerttopright").fadeToggle(350);
    });
    /** Alert Position Bottom Left  **/
    $("#showbottomleft").click(function() {
        $("#alertbottomleft").fadeToggle(350);
    });
    /** Alert Position Bottom Right  **/
    $("#showbottomright").click(function() {
        $("#alertbottomright").fadeToggle(350);
    });
    </script>
	
	<script>
		$(document).ready(function(){
			setTimeout(function(){
				$(".alert-success").fadeOut("slow", function () {
				$(".alert-success").remove();
			});
			}, 10000);
		});
		
		$(document).ready(function(){
			setTimeout(function(){
				$(".alert-danger").fadeOut("slow", function () {
				$(".alert-danger").remove();
			});
			}, 10000);
		});
	</script>
	<!-- /#wrapper -->
	
    <!--Morris JavaScript -->
    <script src="<?php echo WEB_ROOT; ?>plugins/components/raphael/raphael-min.js"></script>
    <script src="<?php echo WEB_ROOT; ?>plugins/components/morrisjs/morris.js"></script>
    
    <!--Style Switcher -->
    <script src="<?php echo WEB_ROOT; ?>plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
	
	