<?php

/*
 * Pole - auta
 * Zjistěte kolik aut máte na skladě a počet prodaných kusů
 */

$cars = array (
	//značka, prodané množství, skladové množství
	array("Volvo",22,18),
	array("BMW",15,13),
	array("Skoda",1203,763),
	array("Hundai",2143,329),
	array("Audi",22,8),
	array("Porsche",4,1),
	array("Saab",5,2),
	array("Land Rover",17,15)
);

//reseni
$pocetAut = sizeof($cars);
$prodane = 0;
$sklad = 0;


foreach ($cars as $car) {
	$nazevX = $car[0];
	$prodaneX = $car[1];
	$skladX = $car[2];
	
	$prodane += $prodaneX;
	$sklad += $skladX;
}

echo "Celkem máme $pocetAut v databázi.<br>";
echo "Máme celkem $sklad na skladě.<br>";
echo "Máme celkem $prodane prodaných.<br>";

?>