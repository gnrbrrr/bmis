<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

checkUser();
	
	
	$gpt = "bar";
	
		
     if (!$link) {
         # code...
        echo "Problem in database connection! Contact administrator!" . mysqli_error();
     }else{
             $sql1 ="SELECT * FROM tr_graph_civilstatus ORDER BY pop_id";
             $result1 = mysqli_query($link,$sql1);
             $chart_data1="";
             while ($row1 = mysqli_fetch_array($result1)) { 
     
                $productname1[]  = $row1['status']  ;
                $sales1[] = $row1['total'];
            }
     
     
     }     
     
    ?>
    <!DOCTYPE html>
    <html lang="en"> 
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <title>Graphical Summary</title>
			<link rel="shortcut icon" href="<?php echo WEB_ROOT; ?>images/favicon.ico">
        </head>
        <body>
            <div style="width:100%;height:20%;text-align:center">			    
                <canvas id="chartjs_bar_gross1"></canvas> 
            </div>
        </body>
      <script src="graph/jquery.js"></script>
      <script src="graph/Chart.min.js"></script>
    <script type="text/javascript">
          var ctx = document.getElementById("chartjs_bar_gross1").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: '<?php echo $gpt; ?>',
                        data: {
                            labels:<?php echo json_encode($productname1); ?>,
                            datasets: [{
                                backgroundColor: [
                                   "#5969ff",
								    "#ffc750",
                                    "#2ec551",
                                    "#ff407b",
                                    "#25d5f2",                                   
                                    "#7040fa",
                                    "#ff004e"
                                ],
                                data:<?php echo json_encode($sales1); ?>,
                            }]
                        },
                        options: {
                               legend: {
                            display: false,
                            position: 'bottom',
     
                            labels: {
                                fontColor: '#71748d',
                                fontFamily: 'Circular Std Book',
                                fontSize: 14,
                            }
                        },
     
     
                    }
                    });
        </script>
    </html>