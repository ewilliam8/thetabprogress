<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Progress */

$this->title = 'Update Progress: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Progresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="progress-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
