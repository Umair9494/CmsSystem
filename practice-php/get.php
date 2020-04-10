<?php

print_r($_GET);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
$id = 10;
$button = "Click Here";
?>
<a href="get.php?id=<?php echo $id; ?>"><?php echo $button ; ?></a>


</body>
</html>