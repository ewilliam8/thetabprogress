<?php
/** @var $model \common\models\Direction */

use common\models\Progress;
$progress = Progress::find()->all();
?>

<div class="card vw-100 mr-3" style="width: 28rem;">
    <?php $array = [];
    foreach ($progress as $item) {
            if( $item['created_by'] == Yii::$app->user->id &&
                $item['direction_id'] == $model->id) {
                    array_unshift($array, $item->value);
            }
        }
    ?>

    <script> const value<?= $model->id ?> = [<?= $array[6] ?>, <?= $array[5] ?>, <?= $array[4] ?>, <?= $array[3] ?>, <?= $array[2] ?>, <?= $array[1] ?>, <?= $array[0] ?>]; </script>

    <canvas id="myChart<?= $model->id ?>" class="m-3"></canvas>
    <script>
    const labels<?= $model->id ?> = ['<?= date('d', strtotime("-6 days")) ?>', '<?= date('d', strtotime("-5 days")) ?>', '<?= date('d', strtotime("-4 days")) ?>', '<?= date('d', strtotime("-3 days")) ?>', '<?= date('d', strtotime("-2 days")) ?>', '<?= date('d', strtotime("-1 days")) ?>', 'today'];

    const data<?= $model->id ?> = {
        labels: labels<?= $model->id ?>,
        datasets: [{
            label: '<?= $model->title ?>',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: value<?= $model->id ?>,
            tension: 0.4,
        }]
    };

    const config<?= $model->id ?> = {
        type: 'line',
        data: data<?= $model->id ?>,
        options: {
            plugins: {
                legend: {
                    display: false,
                }
            }}
    };

    const myChart<?= $model->id ?> = new Chart(
        document.getElementById('myChart<?= $model->id ?>'),
        config<?= $model->id ?>
    );
    </script>

    <div class="card-body">
        <p class="card-text"><?= $model->title ?></p>
    </div>
</div>
