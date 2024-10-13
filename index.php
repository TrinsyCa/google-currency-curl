<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Currency</title>
</head>
<body>
    <h1>Google Currency CURL For Turkish Lira</h1>
    <?php
        $dollarLink = "https://www.google.com/finance/quote/USD-TRY?sa=X&ved=2ahUKEwiFxc-6k_qEAxVBQvEDHdoSDvsQmY0JegQIBxAv";
        $euroLink = "https://www.google.com/finance/quote/EUR-TRY?sa=X&ved=2ahUKEwjvyJ-3lfqEAxX8RPEDHTU2CbAQmY0JegQIBxAv";
        $sterlinLink = "https://www.google.com/finance/quote/GBP-TRY?sa=X&ved=2ahUKEwi-s-Swp_qEAxVIA9sEHZFWDNUQmY0JegQIBxAv";

        // DOLLAR CURL
        $chDollar = curl_init();
        curl_setopt_array($chDollar, [
            CURLOPT_URL => $dollarLink,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $outputDollar = curl_exec($chDollar);

        curl_close($chDollar);

        // EURO CURL
        $chEuro = curl_init();
        curl_setopt_array($chEuro, [
            CURLOPT_URL => $euroLink,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $outputEuro = curl_exec($chEuro);

        curl_close($chEuro);

        // STERLIN CURL
        $chEuro = curl_init();
        curl_setopt_array($chEuro, [
            CURLOPT_URL => $euroLink,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $outputEuro = curl_exec($chEuro);

        curl_close($chEuro);

        // STERLIN CURL
        $chSterlin= curl_init();
        curl_setopt_array($chSterlin, [
            CURLOPT_URL => $sterlinLink,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $outputSterlin = curl_exec($chSterlin);

        curl_close($chEuro);

        $dollarPreg = preg_match('@<div class="rPF6Lc" jsname="OYCkv"><div class="ln0Gqe"><div jsname="LXPcOd"><div class="AHmHk"><span class=""><div jsname="ip75Cb" class="kf1m0"><div class="YMlKec fxKbKc">(.*?)</div></div></span></div></div><div jsname="CGyduf"></div></div></div>@', $outputDollar, $dollarResult);
        $euroPreg = preg_match('@<div class="rPF6Lc" jsname="OYCkv"><div class="ln0Gqe"><div jsname="LXPcOd"><div class="AHmHk"><span class=""><div jsname="ip75Cb" class="kf1m0"><div class="YMlKec fxKbKc">(.*?)</div></div></span></div></div><div jsname="CGyduf"></div></div></div>@', $outputEuro, $euroResult);
        $sterlinPreg = preg_match('@<div class="rPF6Lc" jsname="OYCkv"><div class="ln0Gqe"><div jsname="LXPcOd"><div class="AHmHk"><span class=""><div jsname="ip75Cb" class="kf1m0"><div class="YMlKec fxKbKc">(.*?)</div></div></span></div></div><div jsname="CGyduf"></div></div></div>@', $outputSterlin, $sterlinResult);

        if($dollarPreg) {
            $dollarInfo = number_format($dollarResult[1], 2, ",",".")."₺";
        }
        if($euroPreg) {
            $euroInfo = number_format($euroResult[1], 2, ",",".")."₺";
        }
        if($sterlinPreg) {
            $sterlinInfo = number_format($sterlinResult[1], 2, ",",".")."₺";
        }
    ?>
    <ul>
        <li>Dollar = <?php echo $dollarInfo ?></li>
        <li>Euro = <?php echo $euroInfo; ?></li>
        <li>Pound = <?php echo $sterlinInfo; ?></li>
    </ul>
</body>
</html>