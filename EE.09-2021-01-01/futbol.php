<?php 

$conn = new PDO("mysql:host=Localhost;dbname=egzamin","root");

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rozgrywki futbolowe</title>
	<link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>

	<section id="baner">
		
		<h2>Światowe rozgrywski piłkarskie</h2>
		<img src="obraz1.jpg" alt="boisko">

	</section>
 

		<?php 

			$query1 = "SELECT zespol1, zespol2, wynik, data_rozgrywki
			FROM rozgrywka
			WHERE zespol1 = 'EVG'";

			$sql1 = $conn->query($query1);

			while($row1=$sql1->fetch(PDO::FETCH_OBJ)){
			
				echo "<section id='mecze'>";

					echo "<h3>".$row1->zespol1." - ".$row1->zespol2."</h3>";
					echo "<h3>".$row1->wynik."</h3>";
					echo "<p>w dniu: ".$row1->data_rozgrywki."</p>";
				
				echo "</section>";

			}

		 ?>


	<section id="glowny">
		
		<h2>Reprezentacja Polski</h2>

	</section>

	<section id="lewy">
		
		<p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>

		<form method="POST" action="#">
			
			<input type="number" name="numer">
			<input type="submit" value="Sprawdź">

		</form>

		<ul> 

			<?php 

			if(!empty($_POST['numer'])) {

				$query2 = "SELECT imie, nazwisko 
				FROM zawodnik
				WHERE id =".$_POST["numer"]."";

				$sql2 = $conn -> query($query2);

				while($row2=$sql2->fetch(PDO::FETCH_OBJ)){

					echo "<li>".$row2->imie." ".$row2->nazwisko."</li>";

				}
			}

			?>

		</ul>

	</section>

	<section id="prawy">
		
		<img src="zad1.png" alt="piłkarz">
		<p>Autor: 00000000000</p>

	</section>

</body>
</html>

<?php 

$conn = null;

 ?>