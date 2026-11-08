<?php

class TVRemote{
    private $chanel=1;
    private $volume=15;
    private $isTvon= false;

    public function pressPowerButton(){
        $this->isTvon=!$this->isTvon;
        if($this->isTvon){
            if(!$this->isTvon){
                echo 'TV:Power on<br>';
            
            }else{
                echo 'TV:Power off<br>';
            }
        }
    }
}

?>