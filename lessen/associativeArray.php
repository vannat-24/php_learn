<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $Student=[];
        $Student['name']="sivvannat";
        $Student['Age']=20;
        $Student['Major']="ITE";

        echo "name:".$Student["name"]. "Age:".$Student['Age']. "Major:".$Student['Major'];
        echo "<br>";
        var_dump($Student);echo "<br>";
        foreach($Student as $x=>$y){
            echo "$x : $y <br>";
        }


    ?>
</body>
</html>