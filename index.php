<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Practice</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="script.js" type="text/javascript"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<marquee behavior="alternate" direction="up" width="100%">
	<marquee direction="right" behavior="alternate">AB UTNAL</marquee>
</marquee>
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading">From</div>
					<div class="panel-body">
						<div class="row">

							<!--<form action="controller.php" method="post" id="updateData">
								<div class="col-md-12">
									<input type="text" name="fname" id="fname" placeholder="First Name" class="form-control"> </div>
									<div class="col-md-12">
										<input type="text" name="lname" id="lanme" placeholder="Last Name" class="form-control">
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="email" id="email" placeholder="Email" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<input type="submit" name="submit" value="Update" class="btn btn-warning pull-right">
									</div>
							</form>  -->


							<form action="controller.php" method="post" id="saveData">
								<div class="col-md-12">
									<input type="text" name="fname" id="fname" placeholder="First Name" class="form-control"> </div>
									<div class="col-md-12">
										<input type="text" name="lname" id="lanme" placeholder="Last Name" class="form-control">
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" name="email" id="email" placeholder="Email" class="form-control">
										</div>
									</div>
									<div class="col-md-12">
										<input type="submit" name="submit" class="btn btn-primary pull-right">
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered" id="dataTable">
					</table>
				</div>
			</div>
		</div>
	</div>
	
	
</body>
</html>