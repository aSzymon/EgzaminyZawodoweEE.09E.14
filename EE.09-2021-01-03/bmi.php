<?php

	$conn = new PDO("mysql:host=Localhost;dbname=dane_obliczswojebmi_egzamin","root")

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Twoje BMI</title>
	<link rel="stylesheet" type="text/css" href="styl3.css">
</head>
<body>

	<section id="logo">
		
		<img src="wzor.png" alt="wzór BMI">

	</section>
	<section id="baner">
		
		<h1>Oblicz swoje BMI</h1>

	</section>
	<section id="glowny">
		
		<table>
			
			<tr>

				<th>Interpretacja BMI</th>
				<th>Wartość minimalna</th>
				<th>Wartość maksymalna</th>

			</tr>

			<?php 

				$query1 = "SELECT informacja,wart_min, wart_max FROM bmi";

				$sql1 = $conn->query($query1);

				while ($row1=$sql1->fetch(PDO::FETCH_OBJ)) {

					echo "<tr>";

						echo "<td>".$row1->informacja."</td>";
						echo "<td>".$row1->wart_min."</td>";
						echo "<td>".$row1->wart_max."</td>";

					echo "</tr>";

				}
			?>

		</table>

	</section>
	<section id="lewy">
		
		<h2>Podaj wagę i wzrost</h2>

		<form method="POST" action="bmi.php"> 
			
			Waga: <input type="number" name="waga" minlength="1"><br>
			Wzrost w cm: <input type="number" name="wzrost" minlength="1"><br>
			<input type="submit" value="Oblicz i zapamiętaj wynik" name="przycisk">

		</form>

		<?php 

		if (isset($_POST['przycisk'])) {
			
			if (!empty($_POST['waga']) && !empty($_POST['wzrost'])) {

				$waga = $_POST['waga'];
				$wzrost = $_POST['wzrost'];		

				$BMI = ($waga/($wzrost*$wzrost))*10000;	

				echo "Twoja waga: ".$waga."; Twój wzrost: ".$wzrost."<br> BMI wynosi: ".$BMI;

				$przedzial = 0;

				if(($BMI >= 0) && ($BMI <= 18)){

					$przedzial = 1;
					
				}

				if (($BMI >= 19) && ($BMI <= 25)) {
					
					$przedzial = 2;

				} 

				if(($BMI >= 26) && ($BMI <= 30)) {

					$przedzial = 3;

				}

				if (($BMI >= 31) && ($BMI <= 100)) {
					
					$przedzial = 4;

				}

				$query2 = "INSERT INTO wynik 
				(id,bmi_id,data_pomiaru,wynik) 
				VALUES ('',$przedzial,date('Y-m-d'),$BMI)";

				$sql2 = $conn->query($query2);

			}

		}

		?>

	</section>
	<section id="prawy">
		
		<img src="rys1.png" alt="ćwieczenia">

	</section>
	<section id="stopka">

		Autor: 00000000000
		<a href="kwerendy.txt">Zobacz kwerendy</a>

	</section>

</body>
</html>

<?php 

	$conn = null;

?>