<!DOCTYPE html>
<html>
<head>
	<title>:: Search</title>
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


	<div class="container">
		<div class="row">
			<div class="col-sm-6">

				<?php 


					if (!empty($_POST)) {
						if (isset($_POST['title'], $_POST['title'], $_POST['title'])) {
							$title = $_POST['title'];
							$body = $_POST['body'];
							$keywords = $_POST['keywords'];
							$elasticSearch = array();
							$elasticSearch['index'] = 'articles';
							$elasticSearch['type'] = 'blog';
							// $elasticSearch['id'] = '3';
							$elasticSearch['body'] = array(
								'title' => $title,
								'body' => $body, 
								'keywords' => $keywords
							);
							$result = $client->index($elasticSearch);

							if ($result) {
								print_r($result);
							}

							

						}

					}


				 ?>
				<form method="post">
					<div class="form-group mtb">
						<input type="text" name="title" placeholder="Title ..." class="form-control">
					</div>

					<div class="form-group mtb">
						<textarea name="body" class="form-control">Body</textarea>
					</div>

					<div class="form-group mtb">
						<input type="text" name="keywords" placeholder="keywords ..." class="form-control">
					</div>

					<div class="form-group mtb">
						<button class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>  <!-- End col  -->
		</div>  <!-- End row -->
	</div>  <!-- End Container -->
	
</body>
</html>