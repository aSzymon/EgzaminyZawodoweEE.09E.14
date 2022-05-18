<?php 

    $conn = new PDO('mysql:host=Localhost;dbname=dane_portalspolecznosciowy_egzamin','root');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Panel administratora</title>
	<link rel="stylesheet" type="text/css" href="styl4.css">
</head>
<body>

	<section id="baner">
		
		<h3>Portal Społecznościowy - panel administratora</h3>

	</section>
	<section id="lewy">
		
		<h4>Użytkownicy</h4>

		<?php 

			$query1 = "SELECT  id,imie,nazwisko,rok_urodzenia,zdjecie
			FROM osoby LIMIT 30";
			$sql1 = $conn -> query($query1);

			while($row=$sql1->fetch(PDO::FETCH_OBJ)){

				echo $row->id.". ".$row->imie." ".$row->nazwisko." ".(date('Y')-$row->rok_urodzenia)." lat";
				echo "<br>";

			}


		 ?>

		<a href="settings.html">Inne ustawienia</a>

	</section>

	<section id="prawy">
		
		<h4>Podaj id użytkownika</h4>
		<form method="POST" action="#">
			<input type="number" name="numer">
			<input type="submit" value="ZOBACZ" id="zobacz">
		</form>
		<hr>
		
		<?php 

		if (!empty($_POST["numer"])) {

			$query2 = "SELECT osoby.imie,osoby.nazwisko,osoby.rok_urodzenia,osoby.opis,osoby.zdjecie,hobby.nazwa FROM osoby INNER JOIN hobby ON osoby.Hobby_id = hobby.id WHERE osoby.id =".$_POST["numer"]."";
			$sql2 = $conn -> query($query2);

			while($row=$sql2->fetch(PDO::FETCH_OBJ)){

				echo "<h2>".$_POST["numer"].". ".$row->imie." ".$row->nazwisko."</h2>";
                echo "<br>";
                echo "<img src=".$row->zdjecie." alt=".$_POST["numer"];
                echo "<br>";
                echo "<p>Rok urodzenia: ".$row->rok_urodzenia."</p>";
                echo "<p>Opis: ".$row->opis."</p>";
                echo "<p>Hobby: ".$row->nazwa."</p>";

			}

		}

		 ?>

	</section>

	<section id="stopka">
		
		Stronę wykonał:00000000000

	</section>

</body>
</html>

<?php 

    $conn = null;
    
 ?>
