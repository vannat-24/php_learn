<?php
class Person{
    protected $id;
    protected $name;
    public function __construct($id,$name){
        $this->id=$id;
        $this->name=$name;
    }
    public function personInfo(){
        echo "id:". $this->id. '<br>';
        echo "name:". $this->name. '<br>';
    }
}
class student extends Person{
    protected $gender;
    protected $subject;
    public function __construct($id,$name,$gender,$subject){
        parent::__construct($id,$name);
        $this->gender=$gender;
        $this->subject = $subject;
    }
    function studnetInfo(){
        $this->personInfo();
        echo 'gender:'. $this->gender. "<br>";
        echo 'subject:'. $this->subject. "<br>";
    }
}
class Teacher extends student{
    private $salary;
    private $skills;
    public function __construct ($id,$name,$gender,$subject,$salary,$skills){
    parent::__construct($id,$name,$gender,$subject);
    $this->salary=$salary;
    $this->skills=$skills;
    }
    public function teacherInfo(){
        $this->studnetInfo();
        echo 'salary:'. $this->salary;
        echo ':skills'. $this->skills;
    }
}

$teacher = new Teacher(101,'test','12','khmer',230,'speaking....');
$teacher ->personInfo();
echo '<hr>';
$teacher->studnetInfo();
echo '<hr>';
$teacher ->teacherInfo();
?>