<?php
$num=[83,53,25,55,86,31,54];
$product=[
    [
        'id'=>101,
        'name'=>'computer',
        'price'=>1200.9,
        'description'=>'',
        'image'=>'https://i.pinimg.com/1200x/fe/f7/b3/fef7b3cbaeb59afc974ab04dd20741e6.jpg',
        'qty'=>10
    ],
    [
        'id'=>102,
        'name'=>'keyboard',
        'price'=>49.99,
        'description'=>'Wireless keyboard',
        'image'=>'https://i.pinimg.com/736x/fb/ad/e8/fbade884dc50b472db368baa6d0d86c1.jpg',
        'qty'=>25
    ],
    [
        'id'=>103,
        'name'=>'mouse',
        'price'=>24.5,
        'description'=>'Optical mouse',
        'image'=>'https://i.pinimg.com/736x/bb/31/c2/bb31c26fcffdf72b62c5895e96d42b7a.jpg',
        'qty'=>30
    ],
    [
        'id'=>104,
        'name'=>'monitor',
        'price'=>299.99,
        'description'=>'27-inch monitor',
        'image'=>'https://i.pinimg.com/736x/d7/f6/c4/d7f6c4ba19648c4ad027aaa3a6f7f5da.jpg',
        'qty'=>12
    ],
    [
        'id'=>105,
        'name'=>'headphones',
        'price'=>79.95,
        'description'=>'Over-ear headphones',
        'image'=>'https://i.pinimg.com/736x/a8/33/7f/a8337f50ffaf22a9f4c350ed63362ec8.jpg',
        'qty'=>18
    ]
];

rsort($num);print_r(($num));    
?>

<main>
    <ul>
        <?php foreach($product as $i): ?>
            <li><img height="450px" width="400px" src=<?= $i['image'] ?> alt=""></li>
            <li><?= $i['id'] ?></li>
            <li><?= $i['name'] ?></li>
            <li><?= $i['description'] ?></li>
            <li><?= $i['qty'] ?></li>
            <li><?= $i['price'] ?></li>
            <div><button>delete</button></div>
        <?php endforeach;?>
        
    </ul>
</main>