<?php
$name = "SomeCookie";
$value = 100;
$expiration = time() + (60*60*7*24);;
setcookie($name,$value,$expiration);
//echo "Cookies is set in the browser";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies</title>
</head>
<body>
<?php
if(isset($_COOKIE["SomeCookie"]))
{
    $someOne = $_COOKIE["SomeCookie"];
    echo $someOne;
}
else{
    $name = "";
}
?>
</body>
</html>