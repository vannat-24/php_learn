<?php
class person {
    public $id;
    public $name;
    public $email;

    public function __construct($id = 0, $name = '', $email = '') {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function personInfor(){
        echo "ID: {$this->id} <br>";
        echo "name: {$this->name }<br>";
        echo "email: {$this->email} <br>";
    }
}

$person1= new person();
$person1->id=100;
$person1->name ='sivvannat';
$person1 ->email="vant615@gmail.com";
$person1->personInfor();

?>