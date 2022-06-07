<?php 

	$conn = new PDO("mysql:host=Localhost;dbname=dane_zgloszenienakartewedkarska_egzamin","root");

		$adres = $_POST['adres'];
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];

	if (!empty($adres) && !empty($imie) && !empty($nazwisko)) {

		$query = "INSERT INTO karty_wedkarskie(adres,data_zezwolenia,id,imie,nazwisko,punkty)
		VALUES ('$adres','','','$imie','$nazwisko','')";

		$sql = $conn->query($query);

	}	

	$conn = null;

?>