<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var $dataProvider ActiveDataProvider */
/** @var $progress common\models\Progress */

$this->title = 'Graphic';
?>

<div class="site-index">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_graphic_item',
        'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}' ,
        'itemOptions' => [
            'tag' => false,
        ],
    ])?>

    <div class="mt-4">
        <a href="<?php echo Url::to(['/direction/create']); ?>" class="btn btn-outline-success btn-lg " role="button" aria-pressed="true">Add new Direction</a>
    </div>

</div>
