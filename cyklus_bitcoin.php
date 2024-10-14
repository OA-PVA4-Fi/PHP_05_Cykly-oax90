<?php
/*
 * cyklus
 * Od 1.1.2020 každý měsíc nakupujete bitcoin vždy výši 50 USD.
 * Nákupní cena za 1 BTC je uložena v poli $prices. Hodnota uvedena v USD. Pole je seřazené dle pořadového čísla nákupu.
 *
 * Veškeré výstupy naformátujte uživateli v graficky přívětivé podobě.
 *
 * a) Vypočítejte s využitím cyklů, kolik BTC vlastníte.
 * b) Jaká byla průměrná roční cena BTC?
 * c) Jaká je hodnota Vašeho portfólia v USD a CZK?
 * d) Vypočítejte KPI ukazatele portfólia - průměrnou, minimální, maximulní nákupní cenu ve svém portfóliu.
 * e) Spočítejte, alternativní strategii. Pokud by nákupní cena byla pod Vaši průměrné aktuální nákupní cenou, koupili by jste vždy dvojnásobek BTC. Kolik budete mít koupených BTC a jak se změní KPI ukazatele?
 *
 */

$bitcoinPrices = [
    '2020-01' => 9349.10,
    '2020-02' => 8543.70,
    '2020-03' => 6412.50,
    '2020-04' => 8629.00,
    '2020-05' => 9454.80,
    '2020-06' => 9135.40,
    '2020-07' => 11333.40,
    '2020-08' => 11644.20,
    '2020-09' => 10776.10,
    '2020-10' => 13797.30,
    '2020-11' => 19698.10,
    '2020-12' => 28949.40,
    '2021-01' => 33108.10,
    '2021-02' => 45164.00,
    '2021-03' => 58763.70,
    '2021-04' => 57720.30,
    '2021-05' => 37298.60,
    '2021-06' => 35026.90,
    '2021-07' => 41553.70,
    '2021-08' => 47130.40,
    '2021-09' => 43823.30,
    '2021-10' => 61309.60,
    '2021-11' => 56882.90,
    '2021-12' => 46219.50,
    '2022-01' => 38498.60,
    '2022-02' => 43188.20,
    '2022-03' => 45525.00,
    '2022-04' => 37650.00,
    '2022-05' => 31793.40,
    '2022-06' => 19926.60,
    '2022-07' => 23303.40,
    '2022-08' => 20043.90,
    '2022-09' => 19423.00,
    '2022-10' => 20496.30,
    '2022-11' => 17163.90,
    '2022-12' => 16537.40,
    '2023-01' => 23125.10,
    '2023-02' => 23130.50,
    '2023-03' => 28473.70,
    '2023-04' => 29252.10,
    '2023-05' => 27216.10,
    '2023-06' => 30472.90,
    '2023-07' => 29232.40,
    '2023-08' => 25937.30,
    '2023-09' => 26962.70,
    '2023-10' => 34650.60,
    '2023-11' => 37712.90,
    '2023-12' => 42272.50,
    '2024-01' => 42580.50,
    '2024-02' => 61169.30,
    '2024-03' => 71332.00,
    '2024-04' => 60666.60,
    '2024-05' => 67530.10,
    '2024-06' => 62754.30,
    '2024-07' => 64626.00,
    '2024-08' => 58978.60,
    '2024-09' => 63339.20,
    '2024-10' => 64171.40
];

// reseni:

$cenaNakupu = 50;
$cenaNakupuCelkem = 0;
$nakoupenoBtcCelkem = 0;
$priceAverage = 0;
$lastPrice = 0;
$minimalPrice = 999999999999999999;
$maximalPrice = 0;
foreach($bitcoinPrices as $yearmonth => $price)
{
	$nakoupenoBtc = $cenaNakupu / $price;
	$nakoupenoBtcCelkem += $nakoupenoBtc;
	$cenaNakupuCelkem += $cenaNakupu;
	$priceAverage += $price;
	$lastPrice = $price;
	
	if($price > $maximalPrice)
		$maximalPrice = $price;
	if($price < $minimalPrice)
		$minimalPrice = $price;
}

$priceAverage = $priceAverage / sizeof($bitcoinPrices);
$aktualniHodnotaBtcNaUsd = $lastPrice * $nakoupenoBtcCelkem;
$aktualniHodnotaBtcNaKc = $lastPrice * $nakoupenoBtcCelkem * 23.15;

echo "Vlastním $nakoupenoBtcCelkem BTC za které jsem utratil $cenaNakupuCelkem USD.<br>";
echo "Průměrná cena BTC byla $priceAverage USD<br>";
echo "Nejmenší cena BTC je $minimalPrice<br>";
echo "Největší cena BTC je $maximalPrice<br>";
echo "Aktuální hodnota držených BTC je $aktualniHodnotaBtcNaUsd USD ($aktualniHodnotaBtcNaKc CZK)<br>";

echo "<br><br><br>";


/**
 * Spočítejte jaká vliv by měl na KPI, pokud by jste každý měsíc koupili na Low a Hight cenách.
 */

$marketData = [
    '2024-10-01' => ['price' => 64171.40, 'open' => 63329.90, 'high' => 64497.80, 'low' => 59075.70, 'volume' => 963.18, 'change' => 1.31],
    '2024-09-01' => ['price' => 63339.20, 'open' => 58975.70, 'high' => 66440.70, 'low' => 52644.60, 'volume' => 2340.00, 'change' => 7.39],
    '2024-08-01' => ['price' => 58978.60, 'open' => 64625.70, 'high' => 65587.90, 'low' => 49486.90, 'volume' => 2560.00, 'change' => -8.74],
    '2024-07-01' => ['price' => 64626.00, 'open' => 62768.80, 'high' => 70000.20, 'low' => 53883.40, 'volume' => 2060.00, 'change' => 2.98],
    '2024-06-01' => ['price' => 62754.30, 'open' => 67533.90, 'high' => 71956.50, 'low' => 58589.90, 'volume' => 1600.00, 'change' => -7.07],
    '2024-05-01' => ['price' => 67530.10, 'open' => 60665.00, 'high' => 71872.00, 'low' => 56643.50, 'volume' => 2100.00, 'change' => 11.31],
    '2024-04-01' => ['price' => 60666.60, 'open' => 71329.30, 'high' => 72710.80, 'low' => 59228.70, 'volume' => 2660.00, 'change' => -14.95],
    '2024-03-01' => ['price' => 71332.00, 'open' => 61157.30, 'high' => 73740.90, 'low' => 60138.20, 'volume' => 2700.00, 'change' => 16.61],
    '2024-02-01' => ['price' => 61169.30, 'open' => 42580.10, 'high' => 63915.30, 'low' => 41890.50, 'volume' => 1740.00, 'change' => 43.66],
    '2024-01-01' => ['price' => 42580.50, 'open' => 42272.50, 'high' => 48923.70, 'low' => 38546.90, 'volume' => 2030.00, 'change' => 0.73],
    '2023-12-01' => ['price' => 42272.50, 'open' => 37712.90, 'high' => 44697.60, 'low' => 37618.30, 'volume' => 1630.00, 'change' => 12.09],
    '2023-11-01' => ['price' => 37712.90, 'open' => 34648.30, 'high' => 38400.80, 'low' => 34124.20, 'volume' => 1480.00, 'change' => 8.84],
    '2023-10-01' => ['price' => 34650.60, 'open' => 26962.50, 'high' => 35191.40, 'low' => 26558.40, 'volume' => 1610.00, 'change' => 28.51],
    '2023-09-01' => ['price' => 26962.70, 'open' => 25938.30, 'high' => 27480.70, 'low' => 24923.10, 'volume' => 1150.00, 'change' => 3.95],
    '2023-08-01' => ['price' => 25937.30, 'open' => 29232.30, 'high' => 30168.60, 'low' => 25481.90, 'volume' => 1340.00, 'change' => -11.27],
    '2023-07-01' => ['price' => 29232.40, 'open' => 30472.90, 'high' => 31764.50, 'low' => 28890.70, 'volume' => 1230.00, 'change' => -4.07],
    '2023-06-01' => ['price' => 30472.90, 'open' => 27216.40, 'high' => 31395.40, 'low' => 24838.00, 'volume' => 1770.00, 'change' => 11.97],
    '2023-05-01' => ['price' => 27216.10, 'open' => 29252.10, 'high' => 29816.40, 'low' => 25853.10, 'volume' => 1660.00, 'change' => -6.96],
    '2023-04-01' => ['price' => 29252.10, 'open' => 28473.70, 'high' => 30964.90, 'low' => 27054.30, 'volume' => 2030.00, 'change' => 2.73],
    '2023-03-01' => ['price' => 28473.70, 'open' => 23130.60, 'high' => 29160.40, 'low' => 19591.80, 'volume' => 10260.00, 'change' => 23.10],
    '2023-02-01' => ['price' => 23130.50, 'open' => 23124.70, 'high' => 25236.80, 'low' => 21418.70, 'volume' => 9090.00, 'change' => 0.02],
    '2023-01-01' => ['price' => 23125.10, 'open' => 16537.50, 'high' => 23952.90, 'low' => 16499.70, 'volume' => 8980.00, 'change' => 39.83],
    '2022-12-01' => ['price' => 16537.40, 'open' => 17163.40, 'high' => 18351.80, 'low' => 16331.20, 'volume' => 6610.00, 'change' => -3.65],
    '2022-11-01' => ['price' => 17163.90, 'open' => 20496.10, 'high' => 21464.70, 'low' => 15504.20, 'volume' => 10300.00, 'change' => -16.26],
    '2022-10-01' => ['price' => 20496.30, 'open' => 19422.90, 'high' => 21038.10, 'low' => 18207.90, 'volume' => 8290.00, 'change' => 5.53],
    '2022-09-01' => ['price' => 19423.00, 'open' => 20049.90, 'high' => 22702.50, 'low' => 18191.80, 'volume' => 10910.00, 'change' => -3.10],
    '2022-08-01' => ['price' => 20043.90, 'open' => 23303.40, 'high' => 25205.70, 'low' => 19542.90, 'volume' => 6550.00, 'change' => -13.99],
    '2022-07-01' => ['price' => 23303.40, 'open' => 19926.60, 'high' => 24605.30, 'low' => 18794.40, 'volume' => 5790.00, 'change' => 16.95],
    '2022-06-01' => ['price' => 19926.60, 'open' => 31793.10, 'high' => 31969.90, 'low' => 17630.50, 'volume' => 3790.00, 'change' => -37.32],
    '2022-05-01' => ['price' => 31793.40, 'open' => 37642.00, 'high' => 40021.00, 'low' => 26500.50, 'volume' => 4670.00, 'change' => -15.56],
    '2022-04-01' => ['price' => 37650.00, 'open' => 45529.00, 'high' => 47435.00, 'low' => 37596.00, 'volume' => 12140.00, 'change' => -17.30],
    '2022-03-01' => ['price' => 45525.00, 'open' => 43187.20, 'high' => 48199.00, 'low' => 37182.10, 'volume' => 43700.00, 'change' => 5.41],
    '2022-02-01' => ['price' => 43188.20, 'open' => 38475.60, 'high' => 45755.20, 'low' => 34357.40, 'volume' => 1820.00, 'change' => 12.18],
    '2022-01-01' => ['price' => 38498.60, 'open' => 46217.50, 'high' => 47944.90, 'low' => 32985.60, 'volume' => 2030.00, 'change' => -16.70],
    '2021-12-01' => ['price' => 46219.50, 'open' => 56891.70, 'high' => 59064.30, 'low' => 42587.80, 'volume' => 1900.00, 'change' => -18.75],
    '2021-11-01' => ['price' => 56882.90, 'open' => 61310.10, 'high' => 68990.60, 'low' => 53448.30, 'volume' => 1850.00, 'change' => -7.22],
    '2021-10-01' => ['price' => 61309.60, 'open' => 43824.40, 'high' => 66967.10, 'low' => 43292.90, 'volume' => 2180.00, 'change' => 39.90],
    '2021-09-01' => ['price' => 43823.30, 'open' => 47129.20, 'high' => 52885.30, 'low' => 39646.80, 'volume' => 2210.00, 'change' => -7.02],
    '2021-08-01' => ['price' => 47130.40, 'open' => 41510.00, 'high' => 50498.80, 'low' => 37365.40, 'volume' => 2140.00, 'change' => 13.42],
    '2021-07-01' => ['price' => 41553.70, 'open' => 35030.70, 'high' => 42285.30, 'low' => 29310.20, 'volume' => 2440.00, 'change' => 18.63],
    '2021-06-01' => ['price' => 35026.90, 'open' => 37294.30, 'high' => 41318.00, 'low' => 28901.80, 'volume' => 4140.00, 'change' => -6.09],
    '2021-05-01' => ['price' => 37298.60, 'open' => 57719.10, 'high' => 59523.90, 'low' => 30261.70, 'volume' => 5330.00, 'change' => -35.38],
    '2021-04-01' => ['price' => 57720.30, 'open' => 58763.20, 'high' => 64778.00, 'low' => 47098.50, 'volume' => 2970.00, 'change' => -1.78],
    '2021-03-01' => ['price' => 58763.70, 'open' => 45160.50, 'high' => 61795.80, 'low' => 45008.80, 'volume' => 3010.00, 'change' => 30.11],
    '2021-02-01' => ['price' => 45164.00, 'open' => 33106.80, 'high' => 58335.10, 'low' => 32324.90, 'volume' => 4010.00, 'change' => 36.41],
    '2021-01-01' => ['price' => 33108.10, 'open' => 28951.70, 'high' => 41921.70, 'low' => 28204.50, 'volume' => 5500.00, 'change' => 14.37],
    '2020-12-01' => ['price' => 28949.40, 'open' => 19697.80, 'high' => 29298.80, 'low' => 17600.10, 'volume' => 3850.00, 'change' => 46.97],
    '2020-11-01' => ['price' => 19698.10, 'open' => 18394.60, 'high' => 19831.20, 'low' => 16235.20, 'volume' => 4050.00, 'change' => 42.77],
    '2020-10-01' => ['price' => 13797.30, 'open' => 10776.60, 'high' => 14065.40, 'low' => 10387.60, 'volume' => 2410.00, 'change' => 28.04],
    '2020-09-01' => ['price' => 10776.10, 'open' => 11644.20, 'high' => 12045.90, 'low' => 9877.10, 'volume' => 83880.00, 'change' => -7.46],
    '2020-08-01' => ['price' => 11644.20, 'open' => 11333.20, 'high' => 12444.10, 'low' => 10730.70, 'volume' => 15390.00, 'change' => 2.74],
    '2020-07-01' => ['price' => 11333.40, 'open' => 10961.10, 'high' => 11434.80, 'low' => 10771.80, 'volume' => 13210.00, 'change' => 24.06],
    '2020-06-01' => ['price' => 9135.40, 'open' => 9454.50, 'high' => 10301.80, 'low' => 8865.30, 'volume' => 15350.00, 'change' => -3.38],
    '2020-05-01' => ['price' => 9454.80, 'open' => 8628.60, 'high' => 10033.00, 'low' => 8235.60, 'volume' => 38480.00, 'change' => 9.57],
    '2020-04-01' => ['price' => 8629.00, 'open' => 6412.40, 'high' => 9437.50, 'low' => 6157.40, 'volume' => 39410.00, 'change' => 34.56],
    '2020-03-01' => ['price' => 6412.50, 'open' => 8543.80, 'high' => 9180.80, 'low' => 3869.50, 'volume' => 48240.00, 'change' => -24.94],
    '2020-02-01' => ['price' => 8543.70, 'open' => 9349.30, 'high' => 10482.60, 'low' => 8543.70, 'volume' => 23760.00, 'change' => -8.62],
    '2020-01-01' => ['price' => 9349.10, 'open' => 7196.40, 'high' => 9569.60, 'low' => 6884.10, 'volume' => 23560.00, 'change' => 29.91],
   
];

// reseni:
$lowPurchaseTotal = 0;
$highPurchaseTotal = 0;
$finalPriceTotal = 0;
$months = count($marketData);

// Loop through each month's data
foreach ($marketData as $date => $data) {
    $lowPurchaseTotal += $data['low'];   // Sum up the lowest prices
    $highPurchaseTotal += $data['high']; // Sum up the highest prices
    $finalPriceTotal += $data['price'];  // Sum up the closing prices of each month
}

// Calculate the average cost of purchasing at low and high prices
$avgLowPurchase = $lowPurchaseTotal / $months;
$avgHighPurchase = $highPurchaseTotal / $months;

// KPI: Difference between low and high average purchases
$purchaseDifference = $avgHighPurchase - $avgLowPurchase;

// KPI: Percentage difference
$percentageDifference = ($purchaseDifference / $avgLowPurchase) * 100;

// Output the results
echo "Average Purchase Price (Low): $" . number_format($avgLowPurchase, 2) . "<br>";
echo "Average Purchase Price (High): $" . number_format($avgHighPurchase, 2) . "<br>";
echo "Difference between Low and High Purchase: $" . number_format($purchaseDifference, 2) . "<br>";
echo "Percentage Difference: " . number_format($percentageDifference, 2) . "%<br>";


?>
