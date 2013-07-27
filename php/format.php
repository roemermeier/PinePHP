<?php

function format_price($price) {
    return number_format($price, 2, ',', '.');
}

function UNIXtoISO_timestring($unixtime) {
    return str_replace(" ", "T", $unixtime) . "Z";
}
?>
