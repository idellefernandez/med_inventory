<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BackendUser */

$this->title = 'Update Backend User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Backend Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<center>

<div class="backend-user-update">

    <h3 class="text-primary"><b><?= Html::encode($this->title) ?></b></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</center>