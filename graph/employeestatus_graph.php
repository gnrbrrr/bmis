<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

checkUser();
	
	
	$gpt = "bar";
	
		
     if (!$link) {
         # code...
        echo "Problem in database connection! Contact administrator!" . mysqli_error();
     }else{
             $sql2 ="SELECT * FROM tr_graph_employeestatus ORDER BY pop_id";
             $result2 = mysqli_query($link,$sql2);
             $chart_data2="";
             while ($row2 = mysqli_fetch_array($result2)) { 
     
                $productname2[]  = $row2['status']  ;
                $sales2[] = $row2['total'];
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
                <canvas id="chartjs_bar_gross2"></canvas> 
            </div>
        </body>
      <script src="graph/jquery.js"></script>
      <script src="graph/Chart.min.js"></script>
    <script type="text/javascript">
          var ctx = document.getElementById("chartjs_bar_gross2").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: '<?php echo $gpt; ?>',
                        data: {
                            labels:<?php echo json_encode($productname2); ?>,
                            datasets: [{
                                backgroundColor: [
                                   "#ff004e",
								    "#2ec551",
                                    "#7040fa",
                                    "#ff407b",
                                    "#25d5f2",
                                    "#ffc750",                                   
                                    "#5969ff"
                                ],
                                data:<?php echo json_encode($sales2); ?>,
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