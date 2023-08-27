<?php
require_once 'global-library/config.php';
require_once 'include/functions.php';

checkUser();
	
	
	$gpt7 = "bar";
	
		
     if (!$link) {
         # code...
        echo "Problem in database connection! Contact administrator!" . mysqli_error();
     }else{
             $sqlh ="SELECT * FROM tr_graph_household ORDER BY pop_id";
             $rsh = mysqli_query($link,$sqlh);
             $charth_data="";
             while ($rowh = mysqli_fetch_array($rsh)) { 
     
                $productnameh[]  = $rowh['status']  ;
                $salesh[] = $rowh['total'];
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
            <div style="width:100%;height:20%;text-align:center; color:#ffffff;">			    
                <canvas id="chartjs_bar_grossh"></canvas>
            </div>
        </body>
      <script src="graph/jquery.js"></script>
      <script src="graph/Chart.min.js"></script>
    <script type="text/javascript">
          var ctx = document.getElementById("chartjs_bar_grossh").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: '<?php echo $gpt7; ?>',
                        data: {
                            labels:<?php echo json_encode($productnameh); ?>,
                            datasets: [{
                                backgroundColor: [
                                   "#5969ff",
                                    "#ff407b",
                                    "#25d5f2",
                                    "#ffc750",
                                    "#2ec551",
                                    "#7040fa",
                                    "#ff004e"
                                ],
                                data:<?php echo json_encode($salesh); ?>,
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