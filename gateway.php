<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Responsive Payment getway form design in Hindi</title>
	<link rel="stylesheet" type="text/css" href="./css/gateway.css">
</head>
<style>
	#form_cancel{
	margin-top: -30px;
}
</style>
<body>
<header>
	<?php
		if(array_key_exists('submit', $_POST)){
			require("gateway_function_success.php");
		}
		elseif(array_key_exists('Cancel', $_POST)){
			require("gateway_function_failed.php");
		}
	?>
	<div class="container">
		<div class="left">
			<h3>BILLING ADDRESS</h3>
			<form>
				Full name
				<input type="text" name="" placeholder="Enter name" required/>
				Email
				<input type="text" name="" placeholder="Enter email" required/>

				Address
				<input type="text" name="" placeholder="Enter address" required/>
				
				City
				<input type="text" name="" placeholder="Enter City" required/>
				<div id="zip">
					<label>
						State
						<select>
							<option>Choose State..</option>
							<option>Rajasthan</option>
							<option>Hariyana</option>
							<option>Uttar Pradesh</option>
							<option>Madhya Pradesh</option>
						</select>
					</label>
						<label>
						Zip code
						<input type="number" name="" placeholder="Zip code" required>
					</label>
				</div>
			</form>
		</div>
		<div class="right">
			<h3>PAYMENT</h3>
			<form method="post">
				Accepted Card <br>
				<img src="image/card1.png" width="100">
				<img src="image/card2.png" width="50">
				<br><br>

				Debit/Credit card number
			<input type="text" name="" placeholder="Enter card number" required>
				
				Exp month
				<input type="text" name="" placeholder="Enter Month" required>
				<div id="zip">
					<label>
						Exp year
						<select>
							<option>Choose Year..</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
						</select>
					</label>
						<label>
						CVV
						<input type="number" name="" placeholder="CVV" required>
					</label>
				</div>
				<input type="submit" name="submit" value="Proceed to Checkout">

			</form>
			<form method="post" id="form_cancel">
				<input type="submit"  name="Cancel" value="Cancel">
			</form>
			
		</div>
	</div>
</header>
</body>
</html>