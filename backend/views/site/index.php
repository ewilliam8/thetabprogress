<?php

/** @var yii\web\View $this */
/** @var $dataProvider \yii\data\ActiveDataProvider */

use yii\widgets\ListView;

$this->title = 'Graphic';
?>
<div class="site-index">

<?php echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_graphic_item',
    'layout' => '<div class="d-flex">{items}</div>{pager}' ,
    'itemOptions' => [
        'tag' => false,
    ],
])?>

</div>
