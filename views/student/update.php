<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = 'Update Student: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<center>
<div class="student-update">

    <h2 class="text-primary"><b><?= Html::encode($this->title) ?></b></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</center>
