<?php

	$conn = new PDO("mysql:host=Localhost;dbname=dane_bioropodruzy_egzamin","root")

// dbname(baza) powinno nazywać się egzamin3 ale nazywam to moimi nazwami aby u mnie w bazie się nie mieszało

?>


<html>
<head>
	<meta charset="utf-8">
	<title>Wycieczki i urlopy</title>
	<link rel="stylesheet" type="text/css" href="styl3.css">
</head>
<body>

	<section id="baner">
		
		<h1>BIURO PODRÓŻY</h1>

	</section>
	<section id="lewy">
		
		<h2>KONTAKT</h2>
		<a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
		<p>telefon: 555666777</p>

	</section>
	<section id="srodkowy">
		
		<h2>GALERIA</h2>

		<!-- działanie skryptu 1 -->

		<?php 

			$query1 = "SELECT nazwaPliku, podpis
			FROM zdjecia
			ORDER BY podpis ASC";

			$sql1 = $conn->query($query1);
       
			while($row1=$sql1->fetch()){

				 echo "<img src='{$row1['nazwaPliku']}' alt='{$row1['podpis']}'/>";

				// echo "<img src='".$row1->nazwaPliku."' alt='".$row1->podpis."'>";

			}

		?>

	</section>
	<section id="prawy">
		
		<h2>PROMOCJE</h2>

		<table>
			
			<tr>
				<td>Jesień</td>
				<td>Grupa 4+</td>
				<td>Grupa 10+</td>
			</tr>
			<tr>
				<td>5%</td>
				<td>10%</td>
				<td>15%</td>
			</tr>

		</table>

	</section>
	<section id="dane">
		
		<h2>LISTA WYCIECZEK</h2>

		<?php

			$query2 = "SELECT id,dataWyjazdu,cel,cena
			FROM wycieczki
			WHERE dostepna = 1";

			$sql2 = $conn->query($query2);

			while($row2=$sql2->fetch(PDO::FETCH_OBJ)) {
				
				echo $row2->id.". ";
				echo $row2->dataWyjazdu.", ";
				echo $row2->cel." ";
				echo "cena: ".$row2->cena;
				echo "<br>";

			}

		?>

	</section>
	<section id="stopka">
		
		<p>Stronę wykonał: 00000000000</p>

	</section>

</body>
</html>

<?php 

$conn = null;

?>