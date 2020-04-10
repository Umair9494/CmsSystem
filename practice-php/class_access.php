<?php
class car{
    public $wheels = 4;
    private $doors = 4;
    protected $hood = 1;
    var $engine = 1;

    function showproperty(){
        $this->wheels = 10;
    }
}

$bmw = new car();
$truck = new car();
$semi = new car();

echo $bmw->wheels;
?>