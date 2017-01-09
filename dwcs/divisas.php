<?php

	$divisa1 = isset($_POST["divisa1"]) ? $_POST["divisa1"]:0;
	$divisa2 = isset($_POST["divisa2"]) ? $_POST["divisa2"]:0;
	$divisas1 = isset($_POST["divisas1"]) ? $_POST["divisas1"]:null;
	$divisas2 = isset($_POST["divisas2"]) ? $_POST["divisas2"]:null;
	$divisa2 = $divisa1 * $divisas1[0] * $divisas2[0];
	$divisa2 = number_format($divisa2, 2, '.', ',');
	$divisa1 = number_format($divisa1, 2, '.', ',');
?>


<html>
	<head>
	</head>
	<body>
		<form method ="POST" action="divisas.php">
			<input type="number" " name="divisa1" value="<?php echo "$divisa1";?>" step ="any" ></input>
			<select name="divisas1[]"> 
				<option value="1"  selected="selected">USD</option>
				<option value ="1.09664" selectec>EUR</option>
				<option value ="1.227">GBP</option>
				<option value ="0.14847">YUAN</option>
			</select>
			<input type="text" name="divisa2" value="<?php echo "$divisa2";?>"></input>
			<select name="divisas2[]"> 
				<option value="1">USD</option>
				<option value="0.91188" selected="selected">EUR</option>
				<option value="0.81500">GBP</option>
				<option value="6.73543">YUAN</option>
			</select>
			</br>
			<input type="submit" value="convertir"></input>
		</form>
	</body>
</html>