<?php
if(isset($_GET['number'])){

    $number = $_GET['number'];

    $even = [];
    $odd = [];

    for($i = 0; $i <= $number; $i++){

        if($i % 2 == 0){
            $even[] = $i;
        }else{
            $odd[] = $i;
        }

    }

    echo "<h2>Even Number</h2>";

    foreach($even as $i){
        echo $i . " ";
    }

    echo "<br><br>";

    echo "<h2>Odd Number</h2>";

    foreach($odd as $i){
        echo $i . " ";
    }
}
?>

<form method="get">
    <input type="number" name="number" required>
    <button type="submit">Submit</button>
</form>