<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Direction;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $direction \common\models\Direction */

$this->title = 'Progresses';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="progress-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Progress', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'direction_id',
            [
                'attribute' => 'direction.title',
                // 'content' => $dataProvider,
            ],
            'value',
            [
                'attribute' => 'date',
                'content' => function($model) {
                    return Yii::$app->formatter->asRelativeTime($model->created_at);
                }
            ],
            // 'created_at',
            // 'updated_at',
            //'created_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
