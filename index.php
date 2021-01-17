<?php
include'classes/calcul.class.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form action="calcul.php" method="post">
			<h2>Claculator</h2>
			<input type="number" name="num1" placeholder="first number">
			<select name="operator">
				<option value="add">Addition</option>
				<option value="sub">Substraction</option>
				<option value="div">Division</option>
				<option value="mul">Multiplication</option>

			</select>
			<input type="number" name="num2" placeholder="Second number">
			<input type="submit" name="submit" value="Calculate">
		</form>
	</body>
</html>
