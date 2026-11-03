<?php
class person{
    public string $name;
    public int $age;

    function setname(string $name) {
    $this->name=$name;
    }
    function setage(int$age){
        $this->age=$age;
    }

    function getname(){
        return $this->name;
    }
    function getage(){
        return $this->age;
    }
}

$studnet =new person();
$studnet->setname('vannat');
$studnet->setage(90);

echo 'name:'. $studnet->getname().'Age: '. $studnet->getage();

?>