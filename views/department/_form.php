<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>
<center>

 <div class="well" style="width: 950px">
<div class="department-form">

    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-5',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-3',
            'error' => '',
            'hint' => '',

        ],
    ],
]);
?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'shortname')->textInput(['autofocus' => true, 'style'=> 'text-transform:capitalize;']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

</div>
  </div>
  <div class="form-group col-sm-offset-4">
    </div></div>
</div>
  
    <?php ActiveForm::end(); ?>

</div>
