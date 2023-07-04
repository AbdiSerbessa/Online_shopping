<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
if (isset($_GET["st"])) {
	# code...
	$trx_id = $_GET["tx"];
		$p_st = $_GET["st"];
		$amt = $_GET["amt"];
		$cc = $_GET["cc"];
		$cm_user_id = $_GET["cm"];
		$c_amt = $_COOKIE["ta"];
	if ($p_st == "Completed") {
		include_once("db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE user_id = '$cm_user_id'";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			# code...
			while ($row=mysqli_fetch_array($query)) {
			$product_id[] = $row["p_id"];
			$qty[] = $row["qty"];
			}
			for ($i=0; $i < count($product_id); $i++) {
				$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,p_status) VALUES ('$cm_user_id','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st')";
				mysqli_query($con,$sql);
			}

			$sql = "DELETE FROM cart WHERE user_id = '$cm_user_id'";
			if (mysqli_query($con,$sql)) {
				?>
					<!DOCTYPE html>
					<html>
						<head>
							<meta charset="UTF-8">
							<title>Ecommerce</title>
							<link rel="stylesheet" href="css/bootstrap.min.css"/>
							<script src="js/jquery2.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						<div class="navbar navbar-inverse navbar-fixed-top">
							<div class="container-fluid">
								<div class="navbar-header">
									<a href="#" class="navbar-brand">Ecommerce</a>
								</div>
								<ul class="nav navbar-nav">
									<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
									<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
								</ul>
							</div>
						</div>
						<p><br/></p>
						<p><br/></p>
						<p><br/></p>
						<div class="container-fluid">

							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Thankyou </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment process is
											successfully completed and your Transaction id is <b><?php echo $trx_id; ?></b><br/>
											you can continue your Shopping <br/></p>
											<a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			}
		}else{
			header("location:index.php");
		}

	}
}
?><html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
	<style>
		body {
			text-align: center;
			padding: 40px 0;
			background: #EBF0F5;
		}
			h1 {
				color: #88B04B;
				font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
				font-weight: 900;
				font-size: 40px;
				margin-bottom: 10px;
			}
			p {
				color: #404F5E;
				font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
				font-size:20px;
				margin: 0;
			}
		i {
			color: #9ABC66;
			font-size: 100px;
			line-height: 200px;
			margin-left:-15px;
		}
		.card {
			background: white;
			padding: 60px;
			border-radius: 4px;
			box-shadow: 0 2px 3px #C8D0D8;
			display: inline-block;
			margin: 0 auto;
		}
			.heading a.continue:link, .heading a.continue:visited {
			text-decoration: none;
			font-family: 'Montserrat', sans-serif;
			letter-spacing: -0.015em;
			font-size: 0.75em;
			padding: 1em;
			color: #fff;
			background: #82ca9c;
			font-weight: bold;
			border-radius: 50px;
			float: right;
			text-align: right;
			-webkit-transition: all 0.25s linear;
			-moz-transition: all 0.25s linear;
			-ms-transition: all 0.25s linear;
			-o-transition: all 0.25s linear;
			transition: all 0.25s linear;
	}
	.heading a.continue:after {
			content: "\276f";
			padding: 0.5em;
			position: relative;
			right: 0;
			-webkit-transition: all 0.15s linear;
			-moz-transition: all 0.15s linear;
			-ms-transition: all 0.15s linear;
			-o-transition: all 0.15s linear;
			transition: all 0.15s linear;
	}
	.heading a.continue:hover, .heading a.continue:focus, .heading a.continue:active {
			background: #f69679;
	}
	.heading a.continue:hover:after, .heading a.continue:focus:after, .heading a.continue:active:after {
			right: -10px;
	}
	</style>
	<body>
		<div class="card">
		<div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
			<i class="checkmark">✓</i>
		</div>
			<h1>Your order placed Successfully</h1>
			<p>We received your purchase request;<br/> We'll be in touch with you shortly!</p>
		</div>
	</body>
</html>