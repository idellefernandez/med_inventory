<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = 'Create Student';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<div class="student-create">

   <h2 class="text-success"><b><?= Html::encode($this->title) ?></b></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</center>