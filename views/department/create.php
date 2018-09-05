<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = 'Create Department';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<div class="department-create">

    <h2 class="text-success"><b><?= Html::encode($this->title) ?></b></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</center>
