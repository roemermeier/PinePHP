<?php

$username = mysql_real_escape_string($_POST["username"]);
$password = md5(mysql_real_escape_string($_POST["password"]));

$db = $GLOBALS["db"];

$query = "SELECT username, password, companyid FROM Users WHERE username='$username' LIMIT 1;";  

$res = $db->query($query);

$serveruser = mysql_fetch_array($res);

if ($serveruser["password"] == $password) {
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $username;
    $_SESSION["companyid"] = $serveruser["companyid"];
    alert("Login successful.", "success");
} else {
    $_SESSION["loggedin"] = false;
    alert("Login failed.", "error");
}
?>
