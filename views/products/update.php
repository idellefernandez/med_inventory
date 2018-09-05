<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Update Products: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<center>
<div class="products-update">

    <h3 class="text-primary"><b><?= Html::encode($this->title) ?></b></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</center>
