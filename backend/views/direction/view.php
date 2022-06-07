<?php

use common\models\Progress;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Direction */
/* @var $progress common\models\Progress */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Directions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$progress = Progress::find()->all();
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="d-flex">
    <div class="direction-view w-100 mr-3">
        <div class="card">
            <div class="card-body">
                <h1><?= Html::encode($this->title) ?></h1>
                <p><?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'title',
                        'description:ntext',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="direction-view w-100">
        <div class="card">
            <div class="card-body">
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
                            }
                        }
                    };

                    const myChart<?= $model->id ?> = new Chart(
                        document.getElementById('myChart<?= $model->id ?>'),
                        config<?= $model->id ?>
                    );
                </script>
            </div>
        </div>
    </div>
</div>