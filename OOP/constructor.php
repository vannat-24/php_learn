<?php
class person{
    public string$name;
    public int$age;
    function __construct(string$name,int$age){
        $this->name=$name;
        $this->age=$age;
    }
    function __destruct(){
        echo 'name:'.$this->name.'<br>';
        echo 'age:'. $this->age. '<br>';
    }
    
    
    
    
}

$nat=new person('sivvannat',20);

?>