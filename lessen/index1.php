<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $cursce=["HTML","CSS","JavaScript"];
        $Backend=array("PHP","Laravel","Rest API");
        foreach ($cursce as $it) {
            echo "Cursce is:$it"."<br> <br>";
        }
        echo "Backend <br> ";
        foreach($Backend as $i){
            echo "Backend:$i". "<br>";
        }

        



    ?>
</body>
</html>