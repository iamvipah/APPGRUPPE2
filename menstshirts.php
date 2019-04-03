<!DOCTYPE html>
<html>
<head>
	<title>Mens clothes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style_mensclothes.css">
</head>


<?php
require 'top.php';
require 'includes/dbh.inc.php';
?>

<body>

	<!-- product filter -->






	<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
		<div class="row">
			<?php
			$query = 'SELECT * FROM Clothes WHERE Category="Tshirt"';
			$result = mysqli_query($conn,$query);	

			
			if (mysqli_num_rows($result)>0):
				while ($Clothes = mysqli_fetch_assoc($result)):
				?>		
			<!-- Clothing cards -->
			<div style="margin-bottom: 20px;" class="col-md-6 col-sm-6 col-lg-3">
				<form method="post" action="clothing.php?action=add&id=<?php echo $Clothes['IdClothes'];?>">
				<div style="height: 450px;" class="card shadow text-center">
					<div class="card-block">
						<img src="Bilder/clothes/<?php echo $Clothes ['ProductImage'];?>" alt="" class="img-fluid" style="height: 250px;">
						<div class="card-title">
							<h4><?php echo $Clothes['Name'];?></h4>
						</div>
						<div class="card-text">
							<?php echo $Clothes['Quantity'];?> in stock
						</div>
						<div class="card-text">
							<h3>£ <?php echo $Clothes['Price'];?></h3>
						</div>
						<input style="width: 80%; margin-left: 10%; " type="text" name="quantity" class="form-control" value="1"/>
						<a style="margin-top: 10px; margin-bottom: 10px;" href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
					</div>
				</div>
			</form>
			</div>

			<?php
		endwhile;
endif;
			?>
		</div>
	</div>
</body>

<?php
require 'bottom.php';
?>

</html>