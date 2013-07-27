<?php

function DisplayCountrySelect($name) {
    $db = $GLOBALS["db"];
    $query = "SELECT name, alpha_2 FROM CountryData ORDER BY name ASC";  

    $res = $db->query($query);
    
    echo "<select name='$name' id='$name'>";
    while($country = mysql_fetch_array($res)) {
        echo "<option value='" . $country["alpha_2"] . "'>" . $country["name"] . "</option>";
    }
    echo "</select>";
}
?>
