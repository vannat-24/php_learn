<?php
class employee{
    public $id;
    public $name;
    public $salary;
    public function __construct($id,$name,$salary)
    {
        $this->id=$id;
        $this->name=$name;
        $this->salary=$salary;
    }
    public function __destruct()
    {
        echo "name: $this->name". '<br>';
        echo "id: $this->id". '<br>';
        echo "salary: $this->salary". '<br>';
        
    }
}

$emp1 = new employee(001,'vannat',1200);
$emp2 = new employee(002,'dara',1000);


?>