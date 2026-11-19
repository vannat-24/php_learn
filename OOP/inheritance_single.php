<?php

use employee as GlobalEmployee;
use person as GlobalPerson;

    class Person{
        protected $id;
        protected $name;
        protected $gender;
        public function __construct($id, $name,$gender){
            $this->id= $id;
            $this->name= $name;
            $this->gender= $gender;
        }
        public function personInfo(){
            echo "id :". $this->id. "<br>";
            echo "name :". $this->name. "<br>";
            echo "gender :". $this->gender. "<br>";
        }
    }

    class Employee extends Person{
        private $salary;
        private $position;
        public function __construct($id,$name,$gender,$salary,$position){
            parent::__construct($id,$name,$gender);
            $this->salary=$salary;
            $this->position=$position;
        }
        public function employeeInfo(){
            $this->personInfo();
            echo "Salary:". $this->salary. '<br>';
            echo "position:". $this->position . '<br>';
        }
    }

    $p1= new Person(001,'vann','M');
    $p1->personInfo();
    echo "<hr>";
    $p2= new Employee(102,'nattt',"M",120,'Frontend');
    $p2->employeeInfo();


?>