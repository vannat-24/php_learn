<?php
abstract class Vehicle{
    protected $brand;
    public function __construct($brand){
        $this->brand=$brand;
    }
    public function getBrand(){
        return $this->brand;
    }
    abstract public function startEngine();
}

class Car extends Vehicle{
    
    public function startEngine(){
       return $this->brand . ' car engine started with a push button<br>';
    }
}
$myCar=new Car("HYUNDAI");
echo $myCar->getBrand();
echo $myCar->startEngine();

?>