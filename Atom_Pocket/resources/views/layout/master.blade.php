<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Dompet Nesta</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/logo1.png')}}">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('layout.header')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('layout.sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				@yield('content')
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		@include('layout.footer')
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{ asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{ asset('assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{ asset('assets/scripts/klorofil-common.js')}}"></script>
	<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script> -->
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/plug-ins/1.10.25/api/sum().js" type="text/javascript"></script>
	
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
	
<script type="text/javascript">
		
		$(document).ready(function() {
            $('#dompetTable').DataTable({
                dom: "Blfrtip",
				buttons: [       
                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });
        });

		$(document).ready(function() {
            $('#kategoriTable').DataTable({
                dom: "Blfrtip",
				buttons: [       
                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });
        });

		$(document).ready(function() {
            $('#transaksiTable').DataTable({
                dom: "Blfrtip",
				buttons: [       
                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });
        });



        jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
            return this.flatten().reduce( function ( a, b ) {
                var x = parseFloat(a) || 0;
                var y = parseFloat($(b).attr('data-order')) || 0;
                return x + y
            }, 0 );
        } );



        jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
            return this.flatten().reduce( function ( a, b ) {
                if ( typeof a === 'string' ) {
                    a = a.replace(/[^\d.-]/g, '') * 1;
                }
                if ( typeof b === 'string' ) {
                    b = b.replace(/[^\d.-]/g, '') * 1;
                }
         
                return a + b;
            }, 0 );
        } );

		   $(document).ready(function() {
		    // Setup - add a text input to each footer cell
		    $('#detailBiaya thead tr').clone(true).appendTo( '#detailBiaya thead' );
		    $('#detailBiaya thead tr:eq(1) th').each( function (i) {
		        var title = $(this).text();
		        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		 
		        $( 'input', this ).on( 'keyup change', function () {
		            if ( table.column(i).search() !== this.value ) {
		                table
		                    .column(i)
		                    .search( this.value )
		                    .draw();
		            }
		        });
		    });
		    
		    
		 
		    var table = $('#detailBiaya').DataTable({
		        
		        orderCellsTop: true,
                drawCallback: function () {
                var api = this.api();
                    $( api.column(30).footer() ).html(
                        api.column( 30, {page:'current'} ).data().sum()
                      );
                $( api.column( 0 ).footer() ).html('Total');
                },
				dom: "Blfrtip",
				buttons: [  
					{
                        text: 'excel',
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                 
                    {
                        text: 'print',
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },     
                ],
		        fixedHeader: true,
		    });
		    
		  //   table.column( 1 ).data().sum();
		     
		
        });
	</script>

</body>

</html>
