<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Returns */

$this->title = 'Update Returns: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Returns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<center>
<div class="returns-update">

    <h3 class="text-primary"><b><?= Html::encode($this->title) ?></b></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</center>