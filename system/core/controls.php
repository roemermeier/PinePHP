<?php

function DisplayCountrySelect($name) { 
//Requires database connection. Not tested when not connected.
    
    $db = $GLOBALS["db"];
    
    $query = "SELECT name, alpha_2 FROM CountryData ORDER BY name ASC";  

    $res = $db->query($query);
    $num_results = mysql_num_rows($res); 
    if ($res == 0) {
        return false;
    }
    
    $html = "<select name='$name' id='$name'>";
    while($country = mysql_fetch_array($res)) {
        $html .= "<option value='" . $country["alpha_2"] . "'>" . $country["name"] . "</option>";
    }
    $html .= "</select>";
    
    echo $html;
    
    return $html;
}
?>
