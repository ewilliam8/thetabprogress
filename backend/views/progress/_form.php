<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\Direction;

/* @var $this yii\web\View */
/* @var $model common\models\Progress */
/* @var $direction common\models\Direction */
/* @var $form yii\bootstrap4\ActiveForm */

$direction = Direction::find()->andWhere(['created_by' => Yii::$app->user->id])->all();
?>

<div class="progress-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
        $form->field($model, 'direction_id')->dropDownList(
            \yii\helpers\ArrayHelper::map
            ($direction, 'id', 'title'),
            [
                'prompt' => 'Choose category',
            ])->label(false);
    ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <?=  $form->field($model, 'created_by')
              ->hiddenInput(['value'=> Yii::$app->user->id])
              ->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
