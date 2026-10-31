<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root {
            --bg-1: #f4f7ff;
            --bg-2: #dfe8ff;
            --card-bg: rgba(255, 255, 255, 0.82);
            --card-border: rgba(255, 255, 255, 0.7);
            --primary: #5b6cff;
            --primary-dark: #4758df;
            --accent: #8cc7ff;
            --text: #1d2a3a;
            --muted: #697c96;
            --shadow: 0 24px 60px rgba(44, 62, 108, 0.18);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, var(--bg-1), var(--bg-2));
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
        }

        .calculator {
            width: min(440px, 92vw);
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 28px;
            padding: 28px 22px 24px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(12px);
        }

        h1 {
            margin: 0 0 22px;
            text-align: center;
            font-size: 2.2rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        input {
            width: 100%;
            border: 1px solid rgba(91, 108, 255, 0.18);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.78);
            padding: 14px 16px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(91, 108, 255, 0.12);
        }

        .button-row {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 12px;
        }

        button {
            border: none;
            border-radius: 14px;
            padding: 14px 10px;
            font-size: 1.4rem;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            box-shadow: 0 12px 24px rgba(91, 108, 255, 0.26);
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 28px rgba(91, 108, 255, 0.3);
        }

        .reset-link {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            color: var(--primary-dark);
            font-weight: 700;
            padding: 12px 16px;
            border-radius: 12px;
            background: rgba(91, 108, 255, 0.08);
        }

        .result-box {
            margin-top: 22px;
            padding: 18px 16px;
            text-align: center;
            border-radius: 18px;
            background: linear-gradient(135deg, rgba(91,108,255,0.12), rgba(140,199,255,0.14));
        }

        .result-label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.75rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .result-value {
            margin: 0;
            font-size: clamp(2rem, 9vw, 2.8rem);
        }
    </style>
</head>
<body>
    <?php
    $result = 0;
    $num1 = null;
    $num2 = null;

    function add($num1, $num2) {
        return $num1 + $num2;
    }

    function minus($num1, $num2) {
        return $num1 - $num2;
    }
    function div($num1,$num2){
        if($num2===0){
            echo "the number is can't Division <br>";
        }
        return $num1/$num2;
    }
    function mult($num1 , $num2){
        return $num1 *$num2;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num1 = $_POST['num1'] ?? 0;
        $num2 = $_POST['num2'] ?? 0;

        if (isset($_POST['add'])) {
            $result = add( $num1, $num2);
        } if (isset($_POST['minus'])) {
            $result = minus( $num1, $num2);
        }if(isset($_POST['mult'])){
            $result = mult( $num1,$num2);
        }if(isset($_POST['div'])){
            $result= div($num1,$num2);
        }
    }
    ?>

    <div class="calculator">
        <h1>Calculate</h1>

        <form method="post">
            <input type="number" placeholder="Number 1" name="num1" value="<?= htmlspecialchars($num1) ?>">
            <input type="number" placeholder="Number 2" name="num2" value="<?= htmlspecialchars($num2) ?>">

            <div class="button-row">
                <button type="submit" name="add" value="add">+</button>
                <button type="submit" name="minus" value="minus">-</button>
                <button type="submit" name="mult" value="mult">x</button>
                <button type="submit" name="div" value="div">%</button>
            </div>

            <a href="Calculater.php" class="reset-link">Reset</a>
        </form>

        <main class="result-box">
            <span class="result-label">Result</span>
            <h2 class="result-value"><?= $result ?></h2>
        </main>
    </div>
</body>
</html>