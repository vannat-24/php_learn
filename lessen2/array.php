<?php 
$num=[1,2,3,4,5,5,6,7];
foreach($num as $i){
echo 'numbre :'. $i. "<br>";
}

$courses=['php','github','laravel','deploy'];
echo '<hr>';
foreach ($courses as $j){
    echo "Courses :". $j. "<br>";
}
echo '<hr>';

$courses[4]="html";
foreach ($courses as $a){
    echo 'all course:'. $a. "<br>";
}
?>
<?php 
echo "<br>";
function find ($num){
    $even =[];
    $odd = [];
    for($i=1;$i<=$num;$i++){
        if($i%2===0){
            $even[]=$i;
        }else{
            $odd[]=$i;
        }
    }
    return [$even,$odd];
 
}
   $num = $_POST['num'];
    [$even,$odd]=find($num);
?>

<main>
    <form method="post">
    <input type="number" name="num" value="<?php $num ?? 0 ?>" placeholder="input number">
    <button type="submit">submit</button>
    <button><a href="">clear</a></button>
    </form>
    
<hr>
<h3>Goup of Even number</h3>
<ul>
    <?php foreach($even as $value): ?>
        <li><?= $value ?>  </li>
        <?php endforeach?>
</ul>
<hr>
<h3>Group of odd number</h3>
<ul>
    <?php 
    foreach($odd as $value):
    ?>
    <li><?= $value ?></li>
    <?php endforeach?>
</ul>

</main>