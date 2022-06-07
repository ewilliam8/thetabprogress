<?php
/** @var $model \common\models\Progress */
?>
<?= $model->id ?>
<script>
    let data<?= $model->direction_id ?> = [
        '<?= $model->value ?>',
        '<?= $model->value ?>',
        '<?= $model->value ?>',
    ];
</script>
