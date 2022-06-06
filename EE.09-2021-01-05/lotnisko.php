<?php 

setcookie("strona_coastko","user",time()+7200);
echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";

$conn = new PDO("mysql:host=Localhost;dbname=dane_lotnisko1_egzamin","root");

$query1 = "SELECT czas,kierunek,nr_rejsu, status_lotu
		FROM przyloty
		ORDER BY czas ASC;";

$sql1 = $conn-> query($query1);

echo "<table border=1>";

echo "<tr>";

	echo "<th>CZAS</th>";
	echo "<th>KIERUNEK</th>";
	echo "<th>NUMER REJSU</th>";
	echo "<th>STATUS</th>";

echo "</tr>";

while($row1=$sql1->fetch(PDO::FETCH_OBJ)) {

echo "<tr>";

	echo "<td>".$row1->czas."</td>";
	echo "<td>".$row1->kierunek."</td>";
	echo "<td>".$row1->nr_rejsu."</td>";
	echo "<td>".$row1->status_lotu."</td>";

echo "</tr>";

}

echo "</table>";

$conn = null;

?>