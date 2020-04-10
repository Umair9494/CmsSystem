<?php
class car{
   var $wheels = 4;
    var $doors = 4;
    var $hood = 1;
    var $engine = 1;

    function __construct(){
       echo $this->wheels = 10;
    }
}

$bmw = new car();
$truck = new car();
$semi = new car();
?>