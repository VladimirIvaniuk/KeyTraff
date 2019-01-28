<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder;
$orders = $db->getFirst();
$sums = $db->getSecond();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="color: cadetblue;">
    <div class="container" style="margin-top: 40px">
    <div class="row">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Номер заказа, имя товара, цена, количество, имя оператора за которым числится заказ ,
                            ГДЕ количество товара >2 И id оператора 10 ИЛИ 12
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Номер заказа</th>
                    <th>Имя товара</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Имя оператора</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($orders as $order):?>
                    <tr>
                        <td><?= $order['id'];?></td>
                        <td><?= $order['name'];?></td>
                        <td><?= $order['price'];?></td>
                        <td><?= $order['count'];?></td>
                        <td><?= $order['fio'];?></td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Имя товара, количество товара, и сумма (price) по каждому товару (сгруппировать)
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Наименование товара</th>
                    <th>Количество товара</th>
                    <th>Общая сумма по товару</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($sums as $sum):?>
                    <tr>
                        <td><?= $sum['name'];?></td>
                        <td><?= $sum['count'];?></td>
                        <td><?= $sum['общая сумма по товару'];?></td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>