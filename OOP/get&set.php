<?php
class Person{
    private int$id;
private string$name;
private string$email;
public function __construct(int$id,string$name,string$email){
$this->id=$id;
$this->name=$name;
$this->email=$email;
}
public function show(){
    echo "name:". $this->name. '<br>';
    echo "id:". $this->id. '<br>';
    echo 'email:'. $this->email. '<br>';
}

//function change variable
public function setId($id){
    $this->id=$id;
}
public function setName($name){
    $this->name=$name;
}
public function setEmail($email){
    $this->email=$email;
}

}

$p1= new Person(001,'vann','van@gmial.com');
$p1->show();
echo "<hr>";
$p1->setName("sivvannat");
$p1->show();


?>