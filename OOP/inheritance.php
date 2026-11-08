<?php
class Animal{
    public string$name;        // អាចចូលប្រើបានគ្រប់ទីកន្លែង
    protected string $species;  // អាចចូលប្រើបានតែក្នុង Class នេះ និង Class កូន
    private bool $isAlive; 

    public function __construct(string$name, string$species) {
        $this->name = $name;
        $this->species = $species;
        $this->isAlive = true;
    }

    public function eat() {
        return "{$this->name} is eating food.";
    }

    protected function getSpeciesInfo() {
        return "Species: {$this->species}";
    }

}



class dog extends Animal{
    public $bread;
    public function __construct($name,$species,$bread){
        parent::__construct($name,$species);
        $this->bread=$bread;
    }
    public function brark(){
        return $this->name. 'says:woff! woff.';
    }
    public function showDetails(){
        return "name:".$this->name. 'bred:'.$this->bread.$this->getSpeciesInfo();
    }
}
$myDog= new Dog('baby','Mamal','Golden Retriever');
echo $myDog->showDetails(). '<br>';


// Exmaple 2==========================

class vechicle{
    public function startEngine() {
        return 'Engine started .<br>'; 
    }

}
class Car extends vechicle{
    public function startEngine()  {
        return 'Car engine stard.<br>';
    }
}
$vehicle= new vechicle();
$car =new Car();
echo $vehicle->startEngine();
echo $car->startEngine();
?>

