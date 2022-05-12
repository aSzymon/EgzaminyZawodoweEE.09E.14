<?php 

	$conn = new PDO("mysql:host=Localhost;dbname=egzamin2","root")

// jak coś zamiast egzamin jest egzamin2 bo inaczej by mi się bazy mieszały

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>piłka nożna</title>
	<link rel="stylesheet" type="text/css" href="styl2.css">
</head>
<body>

	<section id="baner">
		
		<h3>Reprezentacja polski w piłce nożnej</h3>
		<img src="obraz1.jpg" alt="reprezentacja">

	</section>

	<section id="lewy">
		
		<form method="POST" action="liga.php">
			
			<select name="listaWybor">
				<option>Bramkarze</option>
				<option>Obrońcy</option>
				<option>Pomocnicy</option>
				<option>Napastnicy</option>
			</select>

			<input type="submit" name="przycisk" value="Zobacz">

		</form>

		<img src="zad2.png" alt="piłka">

		<p>Autor: 00000000000</p>

	</section>

	<section id="prawy">
		
		<ol type="1">
			<!-- działanie skryptu 1 -->

			<?php 

				$wybor = boolval($_POST['listaWybor']);

				$query1 = "SELECT imie,nazwisko
						FROM zawodnik
						WHERE id = ".$wybor;

				$sql1 = $conn->query($query1);

				while($row1=$sql1->fetch(PDO::FETCH_OBJ)) {

					echo "<li>";

						echo "<p>".$row1->imie."</p>";
						echo "<p>".$row1->nazwisko."</p>";

					echo "</li>";

				}

			?>

		</ol>

	</section>

	<section id="glowny">
		
		<h3>Liga mistrzów</h3>

	</section>

	<section id="liga">
		
		<!-- działanie skryptu 2 -->

	</section>

</body>
</html>

<?php 

	$conn = null;

?>