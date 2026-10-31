<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $student=[
        [
            'name'=>'vannat',
            'age'=>20
        ],
        [
            'name'=>'dara',
            'age'=>21,
        ],
         [
            'name'=>'thyda',
            'age'=>25,
        ],
         [
            'name'=>'rithy',
            'age'=>15,
        ],
         [
            'name'=>'chanda',
            'age'=>19
        ]
        ];

        $filter=[];
        
        foreach ($filter as $j){
            echo "name:".$j['name']. '<br>';
            echo "age:".$j['age']. '<br>';
        };
        echo date('y m d h i s '). "<br>";
        echo max(3,2,4,2,1,5)


    ?>
</body>
</html>