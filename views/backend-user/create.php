<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BackendUser */

$this->title = 'Add another User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<div class="backend-user-create">

    <h2 class="text-success"><b><?= Html::encode($this->title) ?></b></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</center>