<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $score=80;
        switch($score){
            case 80:
                echo "Grade A";break;
            case 70:
                echo "Grade B";break;
            case 60:
                echo "Grade C";break;
            default:
                echo "your grade is either!!";

        }
    ?>
</body>
</html>