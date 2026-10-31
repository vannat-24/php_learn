<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sumject=[
            [
                'khmer'=>50,
                'Physic'=>70,
                'math'=>50,
                'java'=>[1,2,3,4,5]

            ],
            [
                'khmer'=>40,
                "Physic"=>49,
                'math'=>56,
                'java'=>[5,4,3,2,1]

            ]
        ];
        var_dump($sumject[0]['java'][1]);
        echo 'math:'.$sumject[0]['math'] . '<br>';
        echo "java:".$sumject[0]['java'][2]
    ?>
</body>
</html>