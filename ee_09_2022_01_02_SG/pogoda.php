<?php 

 $conn = new PDO("mysql:host=Localhost;dbname=dane_prognozadlawroclawia_egzamin","root");

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Prognoza pogody Wrocław</title>
	<link rel="stylesheet" type="text/css" href="styl2.css">
</head>
<body>

	<section id="banerLewy">
			
		<img src="logo.png" alt="meteo">

	</section>
	<section id="banerSrodkowy">
		
		<h1>Prognoza dla Wrocławia</h1>

	</section>
	<section id="banerPrawy">
		
		<p>maj, 2019 r.</p>

	</section>
	<section id="glowny">
		
		<table>

			<tr>
				
				<th>DATA</th>
				<th>TEMPERATURA W NOCY</th>
				<th>TEMPERATURA W DZIEŃ</th>
				<th>OPADY [mm/h]</th>
				<th>CIŚNIENIE [hPa]</th>

			</tr>

			<?php 

				$query = "SELECT *
				FROM pogoda
				WHERE miasta_id = 1
				ORDER BY data_prognozy ASC";

				$sql=$conn->query($query);

				while ($row=$sql->fetch(PDO::FETCH_OBJ)) {
					
					echo '<tr>';

						echo '<td>'.$row->data_prognozy.'</td>';
						echo '<td>'.$row->temperatura_noc.'</td>';
						echo '<td>'.$row->temperatura_dzien.'</td>';
						echo '<td>'.$row->opady.'</td>';
						echo '<td>'.$row->cisnienie.'</td>';

					echo '</tr>';

				}

			?>	

		</table>

	</section>
	<section id="lewy">
		
		<img src="obraz.jpg" alt="Polska, Wrocław">

	</section>
	<section id="prawy">
		
		<a href="kwerendy.txt">Pobierz kwerendy</a>

	</section>
	<section id="stopka">
		
		<p>Stronę wykonał: 00000000000</p>

	</section>

</body>
</html>

<?php 

	$conn = null;

?>