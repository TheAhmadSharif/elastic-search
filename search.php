<!DOCTYPE html>
<html>
<head>
	<title>::Search</title>
	<link rel="stylesheet" type="text/css" href="assets/app.css">
	
	<style type="text/css">
		.mtb {
			margin-top: 30px !important;
			margin-bottom: 30px !important;
		} 
	</style>
</head>
<body>
	<?php 
		include('_es.php');
	?>

	<?php 


		
		if (isset($_GET['q'])) {

			$params = [
			    'index' => 'articles',
				    'body'  => [
				        'query' => [
				            'match' => [
				                'title' => $_GET['q']
				            ]
				        ]
				    ]
				];

			$response = $client->search($params)['hits']['hits'];
		}





	 ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<form method="get" action="search.php">
					<div class="form-group mtb">
						<input type="text" name="q" placeholder="search ..." class="form-control">
					</div>


					<div class="form-group mtb">
						<button class="btn btn-primary">Submit</button>
					</div>
				</form>
				<div>
					<?php 
						if (!empty($response)) {
							foreach($response as $result) {
							    echo $result['_source']['title']."<br>";
							}
						}

						
			 		?>
				</div>
			</div>   <!-- End -->
		</div>   <!-- End -->
	</div>  <!-- End Container -->
</body>
</html>