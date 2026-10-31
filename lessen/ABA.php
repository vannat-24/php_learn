<?php
session_start();

if (!isset($_SESSION['ABA_Balance'])) {
    $_SESSION['ABA_Balance'] = 150000;
    $_SESSION['Aclida_Balance'] = 140000;
    $_SESSION['Wing_Balance'] = 120000;
}

$ABA_Balance = (float) $_SESSION['ABA_Balance'];
$Aclida_Balance = (float) $_SESSION['Aclida_Balance'];
$Wing_Balance = (float) $_SESSION['Wing_Balance'];
//function deposit
function deposit(float $balance, float $amount): float
{
    return $balance + $amount;
}
//function withdraw
function withdraw(float $balance, float $amount): float
{
    if ($amount > $balance) {
        return $balance;
    }

    return $balance - $amount;
}
//check condition 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['money'], $_POST['bank'])) {
    $money = filter_var($_POST['money'], FILTER_VALIDATE_FLOAT);
    $bank = $_POST['bank'];

    if ($money !== false && $money > 0) {
        if ($bank === 'aba') {
            if (isset($_POST['deposit'])) {
                $ABA_Balance = deposit($ABA_Balance, $money);
            } elseif (isset($_POST['withdraw'])) {
                $ABA_Balance = withdraw($ABA_Balance, $money);
            }
        } elseif ($bank === 'aclida') {
            if (isset($_POST['deposit'])) {
                $Aclida_Balance = deposit($Aclida_Balance, $money);
            } elseif (isset($_POST['withdraw'])) {
                $Aclida_Balance = withdraw($Aclida_Balance, $money);
            }
        } elseif ($bank === 'wing') {
            if (isset($_POST['deposit'])) {
                $Wing_Balance = deposit($Wing_Balance, $money);
            } elseif (isset($_POST['withdraw'])) {
                $Wing_Balance = withdraw($Wing_Balance, $money);
            }
        }
    }

    $_SESSION['ABA_Balance'] = $ABA_Balance;
    $_SESSION['Aclida_Balance'] = $Aclida_Balance;
    $_SESSION['Wing_Balance'] = $Wing_Balance;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WayPay Balance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-5" style="max-width: 760px;">
    <header class="text-center mb-4">
        <h1 class="h2 fw-bold">WayPay</h1>
        <p class="text-secondary">Manage your bank balances</p>
    </header>

    <div class="row g-3 mb-4">
        <div class="col-md-4"><section class="card h-100 border-0 shadow-sm"><div class="card-body">
            <h2 class="h6 text-secondary">ABA Balance</h2>
            <p class="h4 mb-0"><?= number_format($ABA_Balance, 2) ?></p>
        </div></section></div>
        <div class="col-md-4"><section class="card h-100 border-0 shadow-sm"><div class="card-body">
            <h2 class="h6 text-secondary">Aclida Balance</h2>
            <p class="h4 mb-0"><?= number_format($Aclida_Balance, 2) ?></p>
        </div></section></div>
        <div class="col-md-4"><section class="card h-100 border-0 shadow-sm"><div class="card-body">
            <h2 class="h6 text-secondary">Wing Balance</h2>
            <p class="h4 mb-0"><?= number_format($Wing_Balance, 2) ?></p>
        </div></section></div>
    </div>

    <section class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="h5 mb-3">Make a transaction</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="money" class="form-label">Amount</label>
                    <input class="form-control" id="money" type="number" name="money" placeholder="Enter amount" min="0.01" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="bank" class="form-label">Bank</label>
                    <select class="form-select" id="bank" name="bank">
                        <option value="aba">ABA</option>
                        <option value="wing">Wing</option>
                        <option value="aclida">Aclida</option>
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary" type="submit" name="deposit">Deposit</button>
                    <button class="btn btn-outline-danger" type="submit" name="withdraw">Withdraw</button>
                </div>
            </form>
        </div>
    </section>
</main>
</body>
</html>