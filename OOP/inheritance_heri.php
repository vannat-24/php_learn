<?php
class Bank{
    protected $location;
    protected $name;
    public function __construct($location,$name){
        $this->location=$location;
        $this->name=$name;
    }
    public function bankDefault(){
        echo 'Location:'. $this->location. '<br>';
        echo 'Name:'. $this->name. '<br>';
    }
}
class ABA extends Bank{
    private $user;
    private $status;
    public function __construct($location,$name,$user,$status){
        parent::__construct($location,$name);
        $this->user=$user;
        $this->status=$status;
    }
    public function abaBank(){
        $this->bankDefault();
        echo "total:". $this->user;
        echo 'Status:'. $this->status;
    }
}
class AC extends Bank{
    private $user;
    private $status;
    public function __construct($location,$name,$user,$status){
        parent::__construct($location,$name);
        $this->user=$user;
        $this->status=$status;
    }
    public function acBank(){
        $this->bankDefault();
        echo 'total user:'. $this->user. '<br>';
        echo 'Status:'. $this->status. '<br>';
    }
}

$aba= new ABA("phnum phenh",'ABA Bank',1000,'active');
$aba->abaBank();
echo '<hr>';
$ac=new AC('outdoor meanchey',"AClida Bank",2030,'Active');
$ac->acBank();

?>