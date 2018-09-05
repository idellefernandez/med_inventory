<?php


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>
<center>

 <div class="well" style="width: 950px">
<div class="products-form">

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

    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'style'=> 'text-transform:capitalize;']) ?>

    <?= $form->field($model, 'type')->dropDownList(['Tablet' => 'Tablet', 'Capsule' => 'Capsule',
    'Inhalant' => 'Inhalant', 'Medical Supply' => 'Medical Supply']) ?>

    <?= $form->field($model, 'qty')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'qty_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reorder_level')->textInput(['type'=>'number']) ?>

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
