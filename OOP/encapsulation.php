<?php
class BankAccount{
    private $balance=0;

    public function deposit (float$amount){
        if($amount>0){
            $this->balance+=$amount;
        }
    }

    public function getbalance(){
        return 'Your balance is:'. $this->balance. '$';
    }
};

$acount =new BankAccount();
$acount ->deposit(500);

echo $acount->getbalance();


?>