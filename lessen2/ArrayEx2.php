<?php
$employee=[
    ['001','Jonh deo','Manager','1500'],
    ['002','Jane Smith','Developer','1200'],
    ['003','Michael Brown','Designer','1100'],
    ['004','Sarah Johnson','Accountant','1000'],
    ['005','David Wilson','Assistant','900'],
];
$person=[
    [
        'url'=>'https://i.pinimg.com/1200x/ba/8c/c6/ba8cc6c32dac4d6d8288b999738cb020.jpg',
        'name'=>'Maliza',
        'email'=>'maliza@gmail.com',
        'phone'=>'010272190',
        'city'=>'phnum phenh'
    ]
];
?>




<!DOCTYPE html>
<html lang="en">
<head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead >
            <tr class="">
                <td>ID</td>
                <td>Name</td>
                <td>Position</td>
                <td>Salary</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employee as $i): ?>
                <tr>
                    <td><?= $i[0] ?></td>
                    <td><?= $i[1] ?></td>
                    <td><?= $i[2] ?></td>
                    <td><?= $i[3] ?></td>
                    <td>
                        <button>view</button>
                        <button>Edit</button>
                        <button>Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <hr>

<main>

    <?php foreach ($person as $a): ?>
    <div>
        <div class="justify-content-center text-center">
            <img width="450px" height="550px"  src=<?= $a['url'] ?> alt=<?= $a['url'] ?>>
            <h1>Name:<?=  $a['name'] ?></h1>
            <p>User profile</p>
        </div>
        <div class="text-center">
          <div class="justify-content-start">
            <p>Email:<?= $a['email'] ?> </p>
            <p>Phone:<?= $a['phone'] ?> </p>
            <p>city:<?= $a['city'] ?> </p>
        </div>  
        </div>
        
    </div>
    <?php endforeach?>
</main>




</body>
</html>