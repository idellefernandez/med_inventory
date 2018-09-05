<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Disbursement */

$this->title = 'Create Disbursement';
$this->params['breadcrumbs'][] = ['label' => 'Disbursements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<div class="disbursement-create">

    <h2 class="text-success"><b><?= Html::encode($this->title) ?></b></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
