<?php

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var $dataProvider ActiveDataProvider */
/** @var $progress ActiveDataProvider */

$this->title = 'Graphic';
?>

<div class="site-index">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?= $progress[1] ?>


    <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_graphic_item',
        'layout' => '<div class="d-flex">{items}</div>{pager}' ,
        'itemOptions' => [
            'tag' => false,
        ],
    ])?>

</div>
