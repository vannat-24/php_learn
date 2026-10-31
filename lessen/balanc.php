<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- php text -->
     
     

    <?php
    $ABA_Balance=150000;
     $Aclida_Banlance=140000;
     $Wing_Balance=120000;
     


     function deposit($balance,$amount){
        $ABA_Balance = $balance+$amount;
        return $ABA_Balance;
     }
     function withdraw($balance,$amount){
        $ABA_Balance = $balance-$amount;
        return $ABA_Balance;
     }

     if($_SERVER['REQUEST_METHOD']==='POST'){
        
     }
     ?>

    
<h3>Calculate WayPay</h3>
<div><h1><?php echo "ABA Balance:". $ABA_Balance ?> </h1></div>
<div><h1><?php echo "Acilida Balance:". $Aclida_Banlance ?> </h1></div>
<div><h1><?php echo "Wing Balance:". $Wing_Balance ?> </h1></div>
<form method="post">
    <input type="number" name="money" placeholder="Enter Money"><br>
<button type="submit">Doposit</button>
<button type="submit">Withdraw</button>
<select name="" id="">
    <option value="aba">ABA</option>
    <option value="wing">Wing</option>
    <option value="acilida">Aclida</option>
</select>
</form>

    
</body>
</html>