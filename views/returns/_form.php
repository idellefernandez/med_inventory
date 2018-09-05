<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Department;
use app\models\Products;


/* @var $this yii\web\View */
/* @var $model app\models\Returns */
/* @var $form yii\widgets\ActiveForm */
?>
<center>

 <div class="well" style="width: 860px">
<div class="returns-form">

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

    <?= $form->field($model, 'id')->textInput(['autofocus' => true, 'style'=> 'text-transform:capitalize;']) ?>

    <?= $form->field($model, 'prod_id')->dropDownList(
        ArrayHelper::map(Products::find()->all(), 'id','name','type'),
        ['prompt'=>'Select Product'])?>


    <?= $form->field($model, 'qty')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'date_returned')->textInput(['type'=>'date']) ?>

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
