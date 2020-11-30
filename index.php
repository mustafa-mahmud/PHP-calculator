<?php
$num = '';
$result = '';
$cookie_name1 = 'num';
$cookie_value1 = '';
$cookie_name2 = 'op';
$cookie_value2 = '';

/* if (isset($_POST['display'])) {
$num = $_POST['display'];
} else {
$num = '';
} */

if (isset($_POST['submit'])) {
  $num = $_POST['display'] . $_POST['submit'];
} else {
  $num = '';
}

if (isset($_POST['op'])) {
  $cookie_value1 = $_POST['display'];
  setcookie($cookie_name1, $cookie_value1, time() + (60 * 60 * 24 * 30), '/');

  $cookie_value2 = $_POST['op'];
  setcookie($cookie_name2, $cookie_value2, time() + (60 * 60 * 24 * 30), '/');

  $num = '';
}

if (isset($_POST['equals'])) {
  $num = $_POST['display'];
  $result = $num + $_COOKIE[$cookie_name1];

  switch ($_COOKIE[$cookie_name2]) {
  case '+':
    $result = $_COOKIE[$cookie_name1] + $num;
    break;
  case '/':
    $result = $_COOKIE[$cookie_name1] / $num;
    break;
  case '-':
    $result = $_COOKIE[$cookie_name1] - $num;
    break;
  case 'x':
    $result = $_COOKIE[$cookie_name1] * $num;
    break;
  }

  $num = $result;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP Calculator</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<form action="index.php" method="post">
		<table width="100%" height="50%" border="1">
			<tr>
				<td colspan="4"><input style="width: 98%;" type="text" name="display" id="" value=<?php echo $num; ?>></td>
			</tr>
			<tr>
				<td><input name="submit" type="submit" value="7"></td>
				<td><input name="submit" type="submit" value="8"></td>
				<td><input name="submit" type="submit" value="9"></td>
				<td><input name="op" type="submit" value="/"></td>
			</tr>
			<tr>
				<td><input name="submit" type="submit" value="4"></td>
				<td><input name="submit" type="submit" value="5"></td>
				<td><input name="submit" type="submit" value="6"></td>
				<td><input name="op" type="submit" value="+"></td>
			</tr>
			<tr>
				<td><input name="submit" type="submit" value="1"></td>
				<td><input name="submit" type="submit" value="2"></td>
				<td><input name="submit" type="submit" value="3"></td>
				<td><input name="op" type="submit" value="-"></td>
			</tr>
			<tr>
				<td><input name="submit" type="submit" value="0"></td>
				<td><input name="submit" type="submit" value="C"></td>
				<td><input name="equals" type="submit" value="="></td>
				<td><input name="op" type="submit" value="x"></td>
			</tr>
		</table>
	</form>
</body>

</html>