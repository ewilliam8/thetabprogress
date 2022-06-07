<?php
/** @var $model \common\models\Direction */
?>

<div class="card vw-100 mr-3" style="width: 28rem;">
    <!--    graphic-->
    <canvas id="myChart<?= $model->id ?>" class="m-3"></canvas>
    <script>
        const labels<?= $model->id ?> = [
            '<?= date('d', strtotime("-6 days")) ?>',
            '<?= date('d', strtotime("-5 days")) ?>',
            '<?= date('d', strtotime("-4 days")) ?>',
            '<?= date('d', strtotime("-3 days")) ?>',
            '<?= date('d', strtotime("-2 days")) ?>',
            '<?= date('d', strtotime("-1 days")) ?>',
            'today',
        ];

        const data<?= $model->id ?> = {
            labels: labels<?= $model->id ?>,
            datasets: [{
                label: '<?= $model->title ?>',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: data<?= $model->id ?>,
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
