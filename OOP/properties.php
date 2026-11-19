<?php
class User{
    public int $id;
    public ?string$LastName;
    public readonly string $name;

    public function setName(string$name){
        $this->name=$name;
    }
    public function getName(){
        echo "Name:". $this->name;
    }



}
$nat= new User();
$nat->setName("sivvannat");
$nat->getName();
echo "<hr>";

?>