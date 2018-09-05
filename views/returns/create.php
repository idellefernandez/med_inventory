<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Returns */

$this->title = 'Create Returns';
$this->params['breadcrumbs'][] = ['label' => 'Returns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<div class="returns-create">

    <h2 class="text-success"><b><?= Html::encode($this->title) ?></b></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</center>