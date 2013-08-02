<?php

function format_price($price) {
    return number_format($price, 2, ',', '.') . " " . $_SESSION["currency_symbol"];
}

function UNIXtoISO_timestring($unixtime) {
    return str_replace(" ", "T", $unixtime) . "Z";
}
?>
