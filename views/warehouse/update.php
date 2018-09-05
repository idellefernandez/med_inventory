<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Warehouse */

$this->title = 'Update Item: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Warehouses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<center>
<div class="warehouse-update">

    <h3 class="text-primary"><b><?= Html::encode($this->title) ?></b></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</center>