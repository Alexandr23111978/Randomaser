<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="css/style.css">-->
</head>
<body>
<div class="container text-center text-white p-4" style="background-color: #0e1c50">
    <h3 class="mb-3">Генератор чисел для журнала уплотнения грунтов</h3>
    <form action="index.php" method="post">
        <div class="row justify-content-lg-center justify-content-md-start gy-md-4 gy-sm-2 mb-4">
            <div class="col-md-3 col-lg-2">
                <input type="number" step="any" class="form-control text-center" placeholder="W_est" aria-label="estWl"
                       name="estWl">
            </div>
            <div class="col-md-3 col-lg-2">
                <input type="number" step="any" class="form-control text-center" placeholder="W_opt" aria-label="optWl"
                       name="optWl">
            </div>
            <div class="col-md-3 col-lg-2">
                <input type="number" step="any" class="form-control text-center" placeholder="max_P" aria-label="maxP"
                       name="maxP">
            </div>
            <div class="col-md-3 col-lg-2">
                <input type="number" step="any" class="form-control text-center" placeholder="kup" aria-label="kup"
                       name="kup">
            </div>
            <div class="col-md-3 col-lg-2">
                <input type="number" class="form-control text-center" placeholder="V_cil" aria-label="colV" name="colV">
            </div>
            <div class="col-md-3 col-lg-2">
                <input type="number" class="form-control text-center" placeholder="col" aria-label="col" name="col">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Сгенерировать журнал</button>
        <button class='btn btn-success' name='saveDB'>Сохранить в базе данных</button>
        <button class='btn btn-success' name='outExel'>Отправить в файл Excel</button>
    </form>
</div>

<?php
$resultArray = [];
if (isset($_POST["submit"])) {
    if ($_POST["estWl"] && $_POST["optWl"] && $_POST["kup"] && $_POST["maxP"] && $_POST["colV"] && $_POST["col"] !== null) {
        $est = $_POST["estWl"];
        $opt = $_POST["optWl"];
        $maxP = $_POST["maxP"];
        $kup = $_POST["kup"];
        $colV = $_POST["colV"];
        $col = $_POST["col"];
        echo "<div class='container bg-secondary pt-2 pb-2'><div class='row justify-content-center'>
                        <div class='col-md-1 bg-customer2  text-center'><b>№-п/п</b></div>
                        <div class='col-md-1 bg-customer2  text-center'><b>m-вл</b></div>
                        <div class='col-md-1 bg-customer2  text-center'><b>m-сх</b></div>
                        <div class='col-md-1 bg-customer2  text-center'><b>Р-вл</b></div>
                        <div class='col-md-1 bg-customer2  text-center'><b>Р-сх</b></div>
                        <div class='col-md-1 bg-customer2  text-center'><b>V-кольца</b></div>
                        <div class='col-md-1 bg-customer2  text-center'><b>W-est</b></div>
                        <div class='col-md-1 bg-customer2  text-center'><b>max-P</b></div>
                        <div class='col-md-1 bg-customer2  text-center'><b>Куп-тр</b></div>
                        <div class='col-md-1 bg-customer2  text-center'><b>Куп-факт</b></div>
                        </div></div>";



        for ($i = 1; $i <= $col; $i++) {
            $estWl = mt_rand(intval($est) - 2, intval($est) + 3) + mt_rand(0, 99) / 100;
            if ($kup <= 0.98) {
                $kupF = $kup + mt_rand(0, 2) / 100;
            } elseif ($kup == 0.99) {
                $kupF = $kup + mt_rand(0, 1) / 100;
            } else $kupF = $kup;
            $massWl = round((1 + 0.01 * $estWl) * $colV * $maxP * $kupF, 2);
            $massSx = round($massWl / (1 + 0.01 * $estWl), 2) + mt_rand(0, 9) / 100;
            $plWl = round($massWl / $colV, 2);
            $plSx = round($plWl / (1 + 0.01 * $estWl), 2);

            $estWlCorr = round((($massWl - $massSx) / $massSx * 100), 2);
            $plSxCorr = round($massSx / $colV, 2);
            $kupFCorr = round($plSxCorr / $maxP, 2);


            echo "<div class='container bg-secondary'><div class='row justify-content-center'>
                       <div class='col-md-1 bg-customer2  text-center'>$i</div>
                       <div class='col-md-1 bg-customer2  text-center'>$massWl</div>
                       <div class='col-md-1 bg-customer2  text-center'>$massSx</div>
                       <div class='col-md-1 bg-customer2  text-center'>$plWl</div>
                       <div class='col-md-1 bg-customer2  text-center'>$plSxCorr</div>
                       <div class='col-md-1 bg-customer2  text-center'>$colV</div>
                       <div class='col-md-1 bg-customer2  text-center'>$estWlCorr</div>
                       <div class='col-md-1 bg-customer2  text-center'>$maxP</div>
                       <div class='col-md-1 bg-customer2  text-center'>$kup</div>
                       <div class='col-md-1 bg-customer2  text-center'>$kupFCorr</div>    
                    </div></div>";

            $resultOnce = ['№' => $i, 'massWl' => $massWl, 'massSx' => $massSx, 'plWl' => $plWl, 'plSx' => $plSxCorr, 'colV' => $colV, 'estWlCorr' => $estWlCorr, 'maxP' => $maxP, 'kup' => $kup, 'kupF' => $kupFCorr];

            $resultArray[] = $resultOnce;
        }
        var_dump($resultArray);


    } else echo "<div class='container bg-danger text-center text-white mb-3 p-4'><h2>Нужно заполнить все поля!!!!</h2></div>";


}
if(isset($_POST["saveDB"])) {
    echo "Кнопка была нажата <br>";
    var_dump($resultArray); //не срабатывает, выдает пустой массив
}

?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
















