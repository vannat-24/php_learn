<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
echo "hello every one"."<br>";

    $name = "vannat";
    $salary =1200; 
    function Show (){
    global $salary;

    $salary +=20;
    }
    show();
    echo $salary;

    echo "<br> ". "<hr>";

    echo "function with parameter <br>";

    function non_return_non_par(){
        $id = 001;
        $name = "vannat";
        $email = "vant@gmail.com";
        $swd = 1234;
        if($email === "vant@gmail.com"&& $swd===1234){
            echo "ID:".$id. "<br>";
            echo "name:".$name . "<br>";

        }else{
            echo "this passwore and Email is not currect. <br>";
        }
    }
    non_return_non_par();

    echo "<hr>";
    echo "non_return_with_para". "<br>";

    $price = 150;
    $qty = 30;
    
    function non_re_with_para($price, $qty){
        echo "Price: ".$price."<br>";
        echo "Quantity: ".$qty . "<br>";
        echo "Total:". $price * $qty . "<br>";
    }
    non_re_with_para($price, $qty). "<br>";



    //Return function with parameter

    function factorial($number){
        $result = 0;
        for($i = 1; $i <= $number; $i++){
            $result += $i;
        }
        return $result;
    }
    echo factorial(10) . "<br>";
    ?>
</body>
</html>