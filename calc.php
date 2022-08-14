<?php

require("CalcProfit.php");

$calc = new CalcProfit($_POST['startDate'], $_POST['sum'], $_POST['term'], $_POST['percent'], $_POST['sumAdd']);

try {
    echo $calc->Profit();
} catch (Exception $e) {
}

