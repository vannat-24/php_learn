//code php=================================================================================
<?php

//example1=======
$language=['php','javascript','python','java','c++'];

//example2=======

$courses=['PHP Basic','HTML &CSS','JavaScript','Boostrap','My SQL','Laravel'];




?>

//code html and design===========================================================================

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

foreach($language as $index =>$value){
    echo '<div >
    index: ' . $index . '<br> language: ' . $value . '
     </div>';
}
?>

<hr>//===================

<main class="bg-light">
    <div class="row">
        <?php
        foreach($courses as $i): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <h5><?= $i ?></h5>
                        <button>learn Start</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>



</main>



</body>
</html>