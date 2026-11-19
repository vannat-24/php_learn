<?php
abstract class Shap{
    abstract public function area();
    abstract public function perimter();

    public function describe(){
        return"រាងនេះមានផ្ទៃក្រឡា". $this->area(). 'នឹងបរិមាត្រ'. $this->perimter();
    }
}

//inheritance

class Circla extends Shap{
    public function __construct(private float$radius){}
    public function area(){
        return M_PI * $this->radius**2;
    }​
    public function perimter(){
        return 2*M_PI*$this->radius;
    }
}

class Ractangle extends Shap{
    public function __construct(private float$width,private float$heidth){}
    public function area(){
        return $this->width*$this->heidth;
    }
    public function perimter(){
        return ($this->width+$this->heidth)*2;
    }
}
$shaps=[new Circla(10),new Ractangle(4,7)];
foreach($shaps as $shap){
    echo $shap->describe();
}

?>