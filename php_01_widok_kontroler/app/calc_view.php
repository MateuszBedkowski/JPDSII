<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator rat</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_kwota">Kwota: </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php if (isset($kwota)) {print($kwota);} ?>" /><br />
	<label for="id_miesiace">Liczba miesiecy: </label>
	<input id="id_miesiace" type="text" name="miesiace" value="<?php if (isset($miesiace)) {print($miesiace);} ?>" /><br />
	<label for="id_procent"> Oprocentowanie: </label>
	<input id="id_procent" type="text" name="procent" value="<?php if (isset($procent)) {Print($procent);} ?>" /><br />
	<input type="submit" value="Oblicz rate" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
	foreach ( $messages as $msg ) {
		echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesieczna rata: '.$result.' zl'; ?>
</div>
<?php } ?>

</body>
</html>