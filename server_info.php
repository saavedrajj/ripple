<?php
/* Refresh polling interval */
$page = $_SERVER['PHP_SELF'];
$sec = "5";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
	<title>Ripple - IE Tech Challenge</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
	<style>
		canvas {
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
	</style>
</head>
<body>
		<div class="container">
		<h1>Ripple - IE Tech Challenge</h1>
		<h2>server_info</h2>		
		<?php 
		/**
 		*
 		* Makes a JSON-RPC call to the  rippled server
		*
 		* @return      @time @seq
 		*
 		*/
 		function serverInfo() {
 			$curl = curl_init();
 			curl_setopt_array($curl, array(
 				CURLOPT_URL => "https://s1.ripple.com:51234/server_info",
 				CURLOPT_RETURNTRANSFER => true,
 				CURLOPT_ENCODING => "",
 				CURLOPT_MAXREDIRS => 10,
 				CURLOPT_TIMEOUT => 0,
 				CURLOPT_FOLLOWLOCATION => true,
 				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 				CURLOPT_CUSTOMREQUEST => "POST",
 				CURLOPT_POSTFIELDS =>"{\n \"method\": \"server_info\",\n \"params\": [\n {\n \"api_version\": 1\n }\n ]\n}",
 				CURLOPT_HTTPHEADER => array(
 					"Content-Type: application/json"
 				),
 			));

 			$response = curl_exec($curl);
 			curl_close($curl);
 			$json = json_decode($response);
 			$time = $json->result->info->time;

 			$dateTime = new DateTime($time);
 			$time = $dateTime->format('U');

 			$seq = $json->result->info->validated_ledger->seq;
 			/* Append output in data.txt file */
 			$file = 'data.txt';
 			$current = file_get_contents($file);
 			$current .= $time . "," . $seq . "\n";
 			file_put_contents($file, $current);
 		}

 		serverInfo();

 		/* Populates data.txt values in $graph_data array */
 		$graph_data = array();
 		$handle = fopen("data.txt", "r");
 		if ($handle) {
 			$i=0;
 			while (($line = fgets($handle)) !== false) {
 				$data = explode(",", $line);
 				$dt = new DateTime("@$data[0]"); 
 				$epochtime = $dt->format('d/m/Y H:i:s');
 				$graph_data [$i] = array(
 					1 => $epochtime,
 					2 => $data[1]
 				);
 				$i++;
 			}
 			fclose($handle);
 		} else {}
 		?>

 		<div>
 			<canvas id="canvas"></canvas>
 			<div id="result"></div>
 		</div>
 		<script>
 			var timeFormat = 'DD/MM/YYYY h:mm:ss';
 			var APIarray = [
 			];
 		</script>

 		<?php
 		foreach ($graph_data as $value) {
 			$i = $value[1];
 			$j = $value[2];           
 			?>
 			<script> 		   
 				APIarray.push(["<?php echo $i; ?>", <?php echo $j; ?>]);
 			</script>
 			<?php
 		}
 		?>
 		<script>
 			var data = {
 				labels: [],
 				datasets: [{
 					label: "Sequence Number",
 					fill:  false,
 					borderColor: "blue",
 					data: []
 				}]
 			};

 			Chart.pluginService.register({
 				beforeInit: function(chart) {
 					var data = chart.config.data;
 					for (var i = 0; i < APIarray.length; i++) {
 						data.labels.push(APIarray[i][0]);
 						data.datasets[0].data.push(APIarray[i][1]);
 					}
 				}
 			});

 			var config = {
 				type:    'line',
 				data:    data,
 				options: {
 					responsive: true,
 					title:      {
 						display: true,
 						text:    "Time (UTC) vs Sequence Number"
 					},
 					scales:     {
 						xAxes: [{
 							type: "time",
 							time:       {
 								format: timeFormat,
 								tooltipFormat: 'h:mm:ss a'
 							},
 							scaleLabel: {
 								display:     true,
 								labelString: 'Time (UTC)'
 							}
 						}],
 						yAxes: [{
 							scaleLabel: {
 								display:     true,
 								labelString: 'Sequence number'
 							}
 						}]
 					}
 				}
 			};

 			window.onload = function () {
 				var ctx = document.getElementById("canvas").getContext("2d");
 				window.myLine = new Chart(ctx, config);
 			};
 		</script>
 	</div>
 	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body>
 </html>