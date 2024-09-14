<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container bg-warning text-center text-white mb-3 p-4">
        <h1 class="mb-3">Генератор чисел для журнала уплотнения грунтов</h1>
        <form action="index.php" method="post">
            <div class="row justify-content-lg-center justify-content-md-start gy-md-4 gy-sm-2 mb-4">
                <div class="col-md-3 col-lg-2">
                    <input type="number" step="any" class="form-control text-center" placeholder="W_est" aria-label="estWl">
                </div>
                <div class="col-md-3 col-lg-2">
                    <input type="number" step="any" class="form-control text-center" placeholder="W_opt" aria-label="optWl">
                </div>
                <div class="col-md-3 col-lg-2">
                    <input type="number" step="any" class="form-control text-center" placeholder="max_P" aria-label="maxP">
                </div>
                <div class="col-md-3 col-lg-2">
                    <input type="number" step="any" class="form-control text-center" placeholder="kup" aria-label="kup">
                </div>
                <div class="col-md-3 col-lg-2">
                    <input type="number" class="form-control text-center" placeholder="col" aria-label="col">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>

    <?php

    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
















