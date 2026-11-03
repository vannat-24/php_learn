<?php
class animal{
    public int$name;
    public function eat(){
        return $this->name. "it eating food<br>";
    }
}
class dog extends animal{
    public function bark(){
        return $this->name. 'is barking :woff woff!<br>';
    }
}

$myDog= new dog();
echo $myDog->eat();
echo $myDog->bark();


?>