<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Warehouse */

$this->title = 'Add an Item';
$this->params['breadcrumbs'][] = ['label' => 'Warehouse', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<div class="warehouse-create">

    <h2 class="text-success"><b><?= Html::encode($this->title) ?></b></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</center>